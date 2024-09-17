<?php

namespace App\Http\Controllers;
use App\Models\Tutorial;

use Illuminate\Http\Request;

class productController extends Controller
{
    public function index(){
        $products= Tutorial::all();
        return view('productF.index',['products'=> $products]);
    }
    public function create(){
        return view('productF.create');

    }
    public function store(Request $request){
        $data = $request->validate([
            'name'=> 'required',
            'quantity'=> 'required|numeric',
            'price'=> 'required|numeric',
            'description'=> 'nullable',

            

        ]);
        $newProduct= Tutorial::create($data);
        return redirect(route('product.index'));
        
    }
    public function edit(Tutorial $product){
        return view('productF.edit', ['product'=>$product]);
    }
    public function update(Tutorial $product, Request $request){
        $data = $request->validate([
            'name'=> 'required',
            'quantity'=> 'required|numeric',
            'price'=> 'required|numeric',
            'description'=> 'nullable'
        ]);
        $product->update($data);
        return  redirect(route('product.index'),)->with('success',"sucessfully updated");

    }
    public function destroy(Tutorial $product){
        $product->delete();
        return  redirect(route('product.index'),)->with('success',"deleted updated");
    }
    
}
