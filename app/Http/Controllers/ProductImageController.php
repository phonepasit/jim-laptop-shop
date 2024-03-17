<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product_image = ProductImage::select()->where('product_id',$id)->get();
        $product = Product::select()->where('id',$id)->first();
        return view('admin.product-image.index',compact('product_image','id', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $product_image = ProductImage::all();
        $product = Product::select()->where('id',$id)->first();
        return view('admin.product-image.create', [
            'id' => $id,
            'product_image' => $product_image,
            'product' => $product
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $extension = $image->getClientOriginalExtension();
                $filename = time() . rand(1, 1000) . '.' . $extension;
                $image->move('uploads/Product_image/', $filename);
                $product_image = new ProductImage;
                $product_image->product_id = $id;
                $product_image->image = $filename;
                $product_image->save();
            }
        }

        return redirect()->route('admin.product-image.index', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product_image = ProductImage::find($id);

        $destination = 'uploads/Product_image/'.$product_image->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $product_image->delete();
        return redirect()->route('admin.product-image.index', ['id' => $product_image->product_id]);
    }
}
