<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Login; // Import the Login model
use Illuminate\Support\Facades\Session; // Import Session facade

class ProductController extends Controller
{
    // Display a list of all books
    public function index()
    {
        $books = Book::all();
        return view('welcome', ['books' => $books]);
    }

    // Show the form to add a new book
    public function add()
    {
        return view('add');
    }

    // Show the login form
    public function loginForm()
    {
        return view('login');
    }

    // Handle login functionality
    public function login(Request $request)
    {
        // Validate the login form inputs
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Retrieve the user from the logins table
        $user = Login::where('username', $credentials['username'])->first();

        // Check if the user exists and password matches
        if ($user && $user->password === $credentials['password']) {
            // Set the session to mark the user as logged in
            Session::put('user', $user->username);
            return redirect()->route('home')->with('success', 'You are logged in!');
        } else {
            return back()->withErrors(['login_failed' => 'Invalid username or password.']);
        }
    }

    // Handle user logout functionality
    public function logout()
    {
        Session::forget('user');
        return redirect()->route('home')->with('success', 'You are logged out!');
    }

    // Store a newly created book in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'Book_Name' => 'required',
            'Description' => 'nullable',
            'Book_Link' => 'required',
            'Category' => 'required', // Adjusted to match your table column name
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Made image validation nullable
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        // Create a new book record
        Book::create($data);

        // Redirect to the home page
        return redirect()->route('home')->with('success', 'Book added successfully!');
    }

    // Show the form to edit a book
    public function edit(Book $book)
    {
        return view('edit', ['book' => $book]);
    }

    // Update an existing book in the database
    public function update(Book $book, Request $request)
    {
        // Validate the incoming request data
        $data = $request->validate([
            'Book_Name' => 'required',
            'Description' => 'nullable',
            'Book_Link' => 'required',
            'Category' => 'required', // No need for category validation against a non-existent table
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        ]);

        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($book->image) {
                $oldImagePath = public_path('images/' . $book->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Save the new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        } else {
            // If no new image, keep the old image
            unset($data['image']);
        }

        // Update the book record
        $book->update($data);

        // Redirect to the home page
        return redirect()->route('home')->with('success', 'Book updated successfully!');
    }

    // Remove the specified book from the database
    public function destroy(Book $book)
    {
        // Delete the image if it exists
        if ($book->image) {
            $imagePath = public_path('images/' . $book->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the book record
        $book->delete();

        // Redirect to the home page
        return redirect()->route('home')->with('success', 'Book deleted successfully!');
    }
}
