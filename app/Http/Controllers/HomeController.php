<?php



namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Contact;


class HomeController extends Controller
{
    public function redirect()
    {
        

        $userType = Auth::user()->user_type;
        if($userType == '1'){
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
        else{
            
            $products = Product::paginate(9);
            return view('home.userpage', compact('products'));
            
        }
  
    }


    public function index()
    {
        $products = Product::paginate(9);
        return view('home.userpage', compact('products'));
    }

    public function addCart(Request $request, $id)
    {
        $product = Product::find($id);
        $user = Auth::user();
        $quantity = $request->input('quantity');
        $price = ($product->price) * $quantity;

        if($product->discount_price){
            $price = ($product->discount_price) * $quantity;
        }

        Cart::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'address' => $user->address,
            'product_title' => $product->title,
            'price' => $price,
            'quantity' => $quantity,
            'product_id' => $product->id,
            'image' => $product->image,

        ]);

        return redirect()->back();
    }

    public function cashOrder()
    {
        $user = Auth::user();
        $userId = $user->id;

        $datas = cart::where('user_id', '=', $userId )->get();


        foreach($datas as $data){
            Order::create([
                'user_id' => $data->user_id,
                'name' => $data->name,
                'email' => $data->email,
                'phone' => $data->phone,
                'address' => $data->address,
                'product_title' => $data->product_title,
                'price' => $data->price,
                'quantity' => $data->quantity,
                'product_id' => $data->product_id,
                'image' => $data->image,
                'payment_status' => "Cash On Delivery",
                'delivery_status' => "Processing",
            ]);

            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
        }


        return redirect()->back()->with('message','Order Placed Successfully');
    }

    public function contactUs(){

        return view('home.contact_us');

    }

    public function storeContactInfo(Request $request){

        

        Contact::create([
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'purpose'=> $request->input('purpose'),
            'subject'=> $request->input('subject'),
            'message'=> $request->input('message'),

        ]);
        return redirect()->back();
    }


}

