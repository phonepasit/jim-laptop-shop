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
    public function index(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $adminQuery = Admin::query();
        $userQuery = User::query();
        $productQuery = Product::query();
        $orderQuery = Order::query();

        if ($start_date && $end_date) {
            $adminQuery->whereBetween('created_at', [$start_date, $end_date]);
            $userQuery->whereBetween('created_at', [$start_date, $end_date]);
            $productQuery->whereBetween('created_at', [$start_date, $end_date]);
            $orderQuery->whereBetween('created_at', [$start_date, $end_date]);
        }

        $admin = $adminQuery->count();
        $user = $userQuery->count();
        $product = $productQuery->count();
        $order = $orderQuery->count();

        return view('admin.home', compact('admin', 'user', 'product', 'order'));
    }
}
