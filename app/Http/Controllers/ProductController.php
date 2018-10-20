<?php

namespace App\Http\Controllers;

use Image;
use App\Product;
use App\Photo;
use File;
use Carbon\Carbon;
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
        //
        $products = Product::all();
        return view('productions.index', ['products' =>$products,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
          return view('productions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $this->validate($request, [
        //     'name' => 'required',
        //     'description' => 'required',
        //     'image' => 'image',]);

            $new_product = new Product();

            if($request->file('image')) {
              $image = $request->file('image');
              $filename = time() . "." . $image->getClientOriginalExtension();
              Image::make($image)->save(public_path('files/products_img/' . $filename));
              $image = $filename;
            }

            $new_product->name = $request->name;
            $new_product->description = $request->description;
            $new_product->price = $request->price;
            $new_product->count = $request->count;
            $new_product->type = $request->type;
            $new_product->meta_keywords = $request->meta_keywords;
            $new_product->meta_description = $request->meta_description;
            $new_product->created_at = Carbon::now('Europe/Samara');
            $new_product->updated_at = Carbon::now('Europe/Samara');
            $new_product->save();

            //сохранение фото через метод связи
            $new_product->photos()->create([
              'product_id' => $new_product->id,
              'name' => $image,
              'alt' => $request->alt,
              'created_at' => Carbon::now('Europe/Samara'),
              'updated_at' => Carbon::now('Europe/Samara'),
              ]);

            return redirect()->route('productions.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);
        return view('productions.show',['product' => $product,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if($request->name){
          $update_product = Product::find($id);
          $update_product->name = $request->name;
          $update_product->updated_at = Carbon::now('Europe/Samara');
          $update_product->save();
          return redirect()->back();
        }

        if($request->price){
          $update_product = Product::find($id);
          $update_product->price = $request->price;
          $update_product->updated_at = Carbon::now('Europe/Samara');
          $update_product->save();
          return redirect()->back();
        }

        if($request->description){
          $update_product = Product::find($id);
          $update_product->description = $request->description;
          $update_product->updated_at = Carbon::now('Europe/Samara');
          $update_product->save();
          return redirect()->back();
        }

        if($request->image){
          if($request->file('image')) {
            $image = $request->file('image');
            $filename = time() . "." . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('files/products_img/' . $filename));
            $image = $filename;

            $update_product = Product::find($id);

            $update_product->photos()->create([
              'product_id' => $update_product->id,
              'name' => $image,
              'alt' => $request->alt,
              'created_at' => Carbon::now('Europe/Samara'),
              'updated_at' => Carbon::now('Europe/Samara'),
              ]);

            $update_product->updated_at = Carbon::now('Europe/Samara');
            $update_product->save();
            return redirect()->back();

          }
          return redirect()->back();

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy_photo($id)
    {
        //
        if(File::exists(public_path('files/products_img/'.Photo::find($id)->name)))
       {
           File::delete(public_path('files/products_img/'.Photo::find($id)->name));
          Photo::find($id)->delete();
          return redirect()->back();
       }
    }

    public function destroy_product($id)
    {
        //
        $product = Product::find($id);

        foreach($product->photos as $photo)
        {
          // if(File::exists(public_path('files/products_img/'.$photo->name)))
            File::delete(public_path('files/products_img/'.$photo->name));
            Photo::find($photo->id)->delete();
        }
        $product->delete();
        return redirect()->back();
    }

    public function order($id)
    {
        //
        $product = Product::find($id);
        return view('productions.order',['product' => $product,]);
    }
}
