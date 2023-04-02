<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

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
        $user = $data->user();
        $information = $user->information()->first();
        if($information->current_order_id <= 0){
            $order = Order::create([
                'user_id' => $data->user()->id,
                'description' => "Order#",
                'purchased' => false
            ]);
            $pet = DB::table('pets')->where('pet_id',$data->input('name'))->first();
            $orderItem = OrderItem::create([
                'quantity' => 1,
                'pet_id' => $pet->pet_id,
                'order_id' => $order->id
            ]);
            $orderItem->save();
            $order->save();
            $information->update([
                'current_order_id' => $orderItem->order_id
            ]);
            $information->save();
            $order_id = $order->order_id;
            $purchased = false;
            $order_items = DB::table('order_items')->where('order_items.order_id',$order_id)->join('pets', 'pets.pet_id', '=', 'order_items.pet_id')->get();
            return view('pages.cartpage', compact(['purchased','order_id','order_items']));
        }
        else{
            $order = DB::table('orders')->where('order_id',$information->current_order_id)->first();
            if($order != null && $order->purchased == false){
                $pet = DB::table('pets')->where('pet_id',$data->input('name'))->first();
                $orderItem = OrderItem::create([
                    'quantity' => 1,
                    'pet_id' => $pet->pet_id,
                    'order_id' => $order->order_id
                ]);
                $purchased = false;
                $orderItem->save();
                $order_id = $order->order_id;
                $order_items = DB::table('order_items')->where('order_items.order_id',$order_id)->join('pets', 'pets.pet_id', '=', 'order_items.pet_id')->get();
                return view('pages.cartpage', compact(['purchased','order_id','order_items']));
            }
            else{
                $ordere = Order::create([
                    'user_id' => $data->user()->id,
                    'description' => "",
                    'purchased' => false
                ]);
                $pet = DB::table('pets')->where('pet_id',$data->input('name'))->first();
                $orderItem = OrderItem::create([
                    'quantity' => 1,
                    'pet_id' => $pet->pet_id,
                    'order_id' => $ordere->id
                ]);
                $orderItem->save();
                $ordere->save();
                $information->update([
                    'current_order_id' => $orderItem->order_id
                ]);
                $information->save();
                $order_id = $ordere->order_id;
                $purchased = false;
                $order_items = DB::table('order_items')->where('order_items.order_id',$order_id)->join('pets', 'pets.pet_id', '=', 'order_items.pet_id')->get();
                return view('pages.cartpage', compact(['purchased','order_id','order_items']));
            }
        }
    }
    public function get_orders(Request $request){
        $user = $request->user();
        $orders = DB::table('orders')->where('user_id',$user->id)->get();
        return view('pages.orderspage', compact('orders'));
    }
    public function get_order(Request $request){
        $user = $request->user();
        $order = DB::table('orders')->where('user_id',$user->id)->where('order_id',$request->order_id)->first();
        if($order != null){
            $order_id = $request->order_id;
            $purchased = $order->purchased;
            $order_items = DB::table('order_items')->where('order_items.order_id',$request->order_id)->join('pets', 'pets.pet_id', '=', 'order_items.pet_id')->get();
            if($order->purchased){
                $price = DB::table('order_items')->where('order_items.order_id',$request->order_id)->join('pets', 'pets.pet_id', '=', 'order_items.pet_id')->sum('price');
                return view('pages.cartpage', compact(['price','purchased','order_id','order_items']));
            }
            else{
                return view('pages.cartpage', compact(['purchased','order_id','order_items']));
            }
        }
        return "Invalid Credential";
    }
    public function remove_order_item(Request $request){
        $user = $request->user();
        $o_item = DB::table('order_items')->where('order_items.order_item_id',$request->order_item_id)->join('orders', 'orders.order_id', '=', 'order_items.order_id')->first();
        if($o_item->purchased == false && $o_item->user_id == $user->id){
            $order_item = DB::table('order_items')->where('order_items.order_item_id',$request->order_item_id)->delete();
            $order_id = $request->order_id;
            $purchased = $o_item->purchased;
            $order_items = DB::table('order_items')->where('order_items.order_id',$order_id)->join('pets', 'pets.pet_id', '=', 'order_items.pet_id')->get();
            return view('pages.cartpage', compact(['purchased','order_id','order_items']));
        }
        return "Invalid Credential";
    }
    public function purchase_order(Request $request){
        $user = $request->user();
        $order = DB::table('orders')->where('user_id',$user->id)->where('order_id',$request->order_id);
        if($order != null && $order->first()->purchased == false){
            $order->update([
                'purchased' => true
            ]);
            $user->information()->update([
                'current_order_id' => -1
            ]);
            return Redirect::route('orders');
        }
        return "Invalid Credential";
    }
    public function get_wish_list(Request $request){
        $user = $request->user();
        $wish_lists = DB::table('wish_lists')->where('user_id',$user->id)->join('pets', 'pets.pet_id', '=', 'wish_lists.pet_id')->get();
        return view('pages.wishlist', compact('wish_lists'));
    }
    public function remove_wishlist(Request $request){
        $user = $request->user();
        $wish_list = DB::table('wish_lists')->where('user_id',$user->id)->where('pet_id',$request->pet_id);
        if($wish_list != null){
            $wish_list->delete();
            $wish_lists = DB::table('wish_lists')->where('user_id',$user->id)->join('pets', 'pets.pet_id', '=', 'wish_lists.pet_id')->get();
            return view('pages.wishlist', compact('wish_lists'));
        }
        else{
            return "Invalid Request";
        }
    }
    public function add_wishlist(Request $request){
        $user = $request->user();
        $pet = DB::table('pets')->where('pet_id',$request->pet_id)->first();
        if($pet != null){
            if(DB::table('wish_lists')->where('user_id',$user->id)->where('pet_id',$request->pet_id)->first() == null){
                $wish_list = DB::table('wish_lists')->insert([
                    'user_id' => $user->id,
                    'pet_id' => $pet->pet_id
                ]);
            }
            $wish_lists = DB::table('wish_lists')->where('user_id',$user->id)->join('pets', 'pets.pet_id', '=', 'wish_lists.pet_id')->get();
            return view('pages.wishlist', compact('wish_lists'));
        }
        return "Invalid Request";
    }
}
