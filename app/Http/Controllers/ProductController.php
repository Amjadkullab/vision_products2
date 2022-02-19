<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\client;
use App\Models\product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= product::latest('id')->paginate(5);
        return view('admin.Products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = category::select('id','name')->get();
        $clients = client::select('id','name')->get();

        return view('admin.Products.create',compact('categories'),compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

         'name'=> 'required',
         'content'=> 'required',
         'image' => 'required',
         'price' => 'required',
         'category_id' => 'required',
         'client_id' => 'required'

        ]);

      $ex=$request->file('image')->getClientOriginalExtension();
      $new_img_name= 'vision_products_'. time() . '.'.$ex;
      $request->file('image')->move(public_path('uploads'),$new_img_name);

      product::create([

      'name' => $request->name,
      'slug' => Str::slug( $request->name),
      'content' => $request->content,
      'image' =>   $new_img_name,
      'price' => $request->price,
      'category_id' => $request->category_id,
      'client_id' => $request->client_id

      ]);

          return redirect()->route('products.index')->with('success', 'Product Added Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {

        $categories = category::select('id','name')->get();
        $clients = client::select('id','name')->get();

        return view('admin.Products.edit', compact('product','categories','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $request->validate([

            'name'=> 'required',
            'content'=> 'required',
            'image' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'client_id' => 'required'

           ]);
           $new_img_name=$product->image;
           if($request->has('image')){

           $ex=$request->file('image')->getClientOriginalExtension();
           $new_img_name= 'vision_products_'. time() . '.'.$ex;
           $request->file('image')->move(public_path('uploads'),$new_img_name);
           }

           $product->update ([

            'name' => $request->name,
            'slug' => Str::slug( $request->name),
            'content' => $request->content,
            'image' =>   $new_img_name,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'client_id' => $request->client_id

            ]);
            return redirect()->route('products.index')->with('success', 'Product Updated Successfully');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success','Product Deleted Successfully');

    }
}
