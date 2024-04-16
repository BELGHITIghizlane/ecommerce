<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class Ecommercecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products= Product::all();
        return view('product.index',['products'=>$products]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products=new Product;

        return view('product.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


      $request->validate([
           'name'=>'required',
           'description'=>'required',
            'quantity'=>'required|numeric',
            'image'=>'required|image',
            'price'=>'required|numeric',

        ]);

        $produit= new Product;


        if($request->hasFile('image')){
          $drf=  $request->file('image')->store('images');

        };
        $produit->name= $request->name ;
        $produit->description= $request->description ;
        $produit->quantity= $request->quantity ;
        $produit->price= $request->price ;
        $produit->image=$drf;

        $produit->save();
        return redirect()->route("pro.index");

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
    public function edit($id)
    {
        $product=Product::find($id);
        return view('product.edit',compact('product'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'quantity' => 'required',
        'image' => 'required|image', // Ensure image is required and it's an actual image
        'price' => 'required',
    ]);

    // Find the product by ID
    $product = Product::find($id);


    // Handle the image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images'); // Change 'images' to your desired storage path
        // Update the image path in the database
        $product->image = $imagePath;
    }

    // Update other fields
    $product->name = $request->name;
    $product->description = $request->description;
    $product->quantity = $request->quantity;
    $product->price = $request->price;

    // Save the product
    $product->save();

    // Redirect with success message
    return redirect()->route("pro.index")->with('success', 'Product updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        $product=Product::find($id);
        $product->delete();
        return redirect()->route("pro.index");
    }
}
