<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admin = count(User::select()->where('is_admin', 1)->get());
        $user = count(User::select()->where('is_admin', 0)->get());
        $product = count(Product::all());
        return view('admin.home', [
            'admin' => $admin,
            'user' => $user,
            'product' => $product,
        ]);
    }
}
