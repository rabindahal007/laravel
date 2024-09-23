<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Login;
use Illuminate\Support\Facades\Session;
use Validator;

class ProductController extends Controller
{
    public function index()
    {
        // Retrieve all books to display on the welcome page
        $books = Book::all();
        return view('welcome', compact('books'));
    }

    public function add()
    {
        return view('add');
    }

    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = Login::where('username', $credentials['username'])->first();

        if ($user && $user->password === $credentials['password']) {
            Session::put('user', $user->username);
            return redirect()->route('home')->with('success', 'You are logged in!');
        } else {
            return back()->withErrors(['login_failed' => 'Invalid username or password.']);
        }
    }

    public function logout()
    {
        Session::forget('user');
        return redirect()->route('home')->with('success', 'You are logged out!');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'Book_Name' => 'required',
            'Description' => 'nullable',
            'Book_Link' => 'nullable',
            'Category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        Book::create($data);

        return redirect()->route('home')->with('success', 'Book added successfully!');
    }

    public function edit(Book $book)
    {
        return view('edit', ['book' => $book]);
    }

    public function update(Book $book, Request $request)
    {
        $data = $request->validate([
            'Book_Name' => 'required',
            'Description' => 'nullable',
            'Book_Link' => 'nullable',
            'Category' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($book->image) {
                $oldImagePath = public_path('images/' . $book->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        } else {
            unset($data['image']);
        }

        $book->update($data);

        return redirect()->route('home')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        if ($book->image) {
            $imagePath = public_path('images/' . $book->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $book->delete();

        return redirect()->route('home')->with('success', 'Book deleted successfully!');
    }
    public function import(Request $request)
{
    // Check if a file is uploaded and valid
    if (!$request->hasFile('csv_file') || !$request->file('csv_file')->isValid()) {
        return back()->withErrors(['csv_file' => 'No valid file was uploaded.']);
    }

    $file = $request->file('csv_file');
    $filePath = $file->store('csv_files');
    $csvData = array_map('str_getcsv', file(storage_path('app/' . $filePath)));
    $header = array_shift($csvData);  // Remove the header row

    // Validate CSV headers
    if ($header !== ['Book_Name', 'Description', 'Category']) {
        return back()->withErrors(['csv_file' => 'CSV headers do not match the required format.']);
    }

    // Loop through each row and process the data
    foreach ($csvData as $row) {
        if (count($row) != 3) continue;  // Skip rows that don't have 3 columns

        try {
            // Update or create book entry
            Book::updateOrCreate(
                ['Book_Name' => $row[0]],  // Find by Book_Name
                ['Description' => $row[1], 'Category' => $row[2]]  // Update or create with these values
            );
        } catch (\Exception $e) {
            \Log::error('Error importing row: ' . json_encode($row) . ' - ' . $e->getMessage());
        }
    }

    return back()->with('success', 'Books imported successfully!');
}

    



    
    
       
    }




