<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function get_customer_name($menu_name)
    {
        $customers = DB::table('customers')
        ->join('orders', 'customers.id', '=', 'orders.customer_id')
        ->join('order_items', 'order_items.order_id', '=', 'orders.order_id')
        ->join('menus', 'order_items.menu_id', '=', 'menus.menu_id')
        ->where('menus.name', $menu_name)
        ->select('customers.name')
        ->get();
        return $customers;
    }
}
