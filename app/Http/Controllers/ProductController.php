<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
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
    public function get_products(){
        $products = DB::table('pets')
        ->get();
        return view('pages.productpage', compact('products'));
    }
    public function createOrder(Request $data){
        $order = Order::create([
            'user_id' => 1
        ]);
        $pet = DB::table('pets')->where('pet_id',$data->input('name'))->first();
        $orderItem = OrderItem::create([
            'quantity' => 1,
            'pet_id' => $pet->pet_id,
            'order_id' => $order->id
        ]);
        $orderItem->save();
        $order->save();
        return $order;
    }
}