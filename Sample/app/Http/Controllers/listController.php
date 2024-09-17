<?php

namespace App\Http\Controllers;

use App\Models\Todolist;

use Illuminate\Http\Request;

class listController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists=Todolist::all();
        return view("to-dolist.index",['lists'=>$lists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("to-dolist.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $data= $request->validate([
            'name'=>'required'

        ]);
        $newList= Todolist::create($data);
        return redirect(route('to-dolist.index'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todolist $list)
    {
        $list->delete();
        return redirect(route('to-dolist.index'));
        
    }
}
