<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image',
            'price' => 'required',
            'description' => 'required' 
        ]);

        $image = $request->image; 

        $image_new_name = time().$image->getClientOriginalName();

        $image->move('uploads/products', $image_new_name);
        
        Product::create([
            'name' => $request->name,
            'image' => 'uploads/products/'.$image_new_name,
            'price' => $request->price,
            'description' => $request->description
        ]);

        session()->flash('success','New product has been added.');

        return redirect()->route('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

         $product->name = $request->name;
         
         $product->price = $request->price;

         $product->description = $request->description;

         $product->save();


        if($request->hasFile('image')){

            unlink($product->image);

            $image = $request->image;

            $image_new_name = time().$image->getClientOriginalName();

            $image->move('uploads/products', $image_new_name);

            $product->image = 'uploads/products/'.$image_new_name;

            $product->save();

            }


            session()->flash('success','Product has been updated');

            return redirect()->route('products');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success','Product has been deleted');
        return redirect()->route('products');
    }
}
