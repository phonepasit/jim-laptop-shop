<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(7);
        return view('admin.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('active', '!=', 0)->get();
        return view('admin.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $this->isvaildPrice($request);
        if ($product != false) {
            $product = new product;
            $product->category_id = $request->input('category_id');
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/Product/', $filename);
                $product->image = $filename;
            }
            $product->price = $request->input('price');
            $product->price_sale = $request->input('price_sale');
            $product->quantity = $request->input('quantity');
            $product->active = $request->input('active');
            $product->save();
            return redirect('admin/product')->with('status', 'product Image Added Successfully');
        }
        Session::flash('error', 'Please enter a Sale price that is less than the original price');
        return redirect()->back();
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
        $category = Category::where('active', '!=', 0)->get();
        $product = product::find($id);
        return view('admin.product.edit', compact('product', 'category'));
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
        $product = $this->isvaildPrice($request);
        if ($product != false) {
            $product = product::find($id);
            $product->category_id = $request->input('category_id');
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extention;
                $file->move('uploads/Product/', $filename);
                $product->image = $filename;
            }
            $product->price = $request->input('price');
            $product->price_sale = $request->input('price_sale');
            $product->quantity = $request->input('quantity');
            $product->active = $request->input('active');
            $product->save();
            return redirect('admin/product');
        } else {
            Session::flash('error', 'Please enter a Sale price that is less than the original price');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = product::find($id);

        $destination = 'uploads/Product/'.$product->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }

        $product->delete();
        return redirect()->back();
    }

    protected function isvaildPrice(Request $request)
    {
        $Price = $request->input('price');
        $Price_sale = $request->input('price_sale');
        if ($Price < $Price_sale || $Price <= 0 || $Price_sale <= 0) {
            return false;
        }
        return true;
    }
}
