<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::where('active', '!=', 0)->get();
        $ads = Ad::where('active', '!=', 0)->get();
        $products = Product::where('active', '!=', 0)->get();
        $productNews = Product::whereDate('created_at', '>=', Carbon::now()->subDays(7))->get();

        return view('layouts.web', [
            'categories' => $categories,
            'ads' => $ads,
            'products' => $products,
            'productNews' => $productNews,
        ]);
    }

    public function productWithCategory($id)
    {
        $categories = Category::where('active', '!=', 0)->get();
        $categorieWithId = Category::find($id);
        $ads = Ad::where('active', '!=', 0)->get();
        $products = Product::where('category_id', '=', $id)->get();

        return view('layouts.web', [
            'categories' => $categories,
            'categorieWithId' => $categorieWithId,
            'ads' => $ads,
            'products' => $products
        ]);
    }

    public function productDetail($id)
    {
        $product = Product::find($id);

        return view('layouts.web', [
            'product' => $product
        ]);
    }

    public function search(Request $request)
    {
        $ads = Ad::all();
        $categories = Category::all();

        $query = Product::query();

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('query_search')) {
            $query->where('name', 'like', '%' . $request->query_search . '%');
        }

        $products = $query->get();

        return view('layouts.web', [
            'ads' => $ads,
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
