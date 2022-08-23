<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;


class AdminController extends Controller
{
    public function order(){

        $orders = Order::all();

        return view('admin.order', compact('orders'));

    }

    public function destroy($id){

        Order::find($id)->delete();
        return redirect()->back()->with('message','Order has been deleted successfully');

    }

    public function delivered($id){

        $order = Order::find($id);
        $order->delivery_status = "Delivered";
        $order->save();
        $order->payment_status = "Paid";
        $order->save();
        return redirect()->back();

    }

    public function searchOrder(Request $request){

        $seachText = $request->search;
        $orders = order::where('name','LIKE', "%$seachText%")->orWhere('user_id','LIKE', "%$seachText%")->get();
        return view('admin.order', compact('orders'));

    }

    public function dashboard(){

       
        $totalCustomer = sizeof(User::all());
        $totalProducts = sizeOf(Product::all());
        $totalOrders = sizeof(Order::all());
        $orderDelivered = 0;
        $orderProcessing = 0;
        $revenue = 0;
        $orders = Order::all();
        foreach($orders as $order){
            
            $revenue += $order->price;

            if($order->product_delivery == "Delivered"){
                $orderDelivered += 1;
            }
            else{
                $orderProcessing += 1;
            }

        }

        $calculations = [$totalCustomer, $totalProducts, $totalOrders, $orderDelivered, $orderProcessing, $revenue ];



        


        return view('admin.dashboard', compact('calculations'));


    }
}
