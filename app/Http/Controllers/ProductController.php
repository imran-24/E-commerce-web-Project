<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->get();
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        // $data = $request->validate([
        //     'title' => 'required',
        //     'description' => '',
        //     'price' => 'required',
        //     'discount' => '',
        //     'quantity' => 'required',
        //     'category_id' => 'required',
        //     'image' => 'required',
        // ]);

       


        $image_path = request('image')->store('uploads','public');
        
        $image = Image::make(public_path("storage/{$image_path}"))->fit(500,500);
        $image->save();

        

        Product::create([

            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),

            'discount_price' => $request->input('discount'),
            'image' => $image_path,
            'category_id' => $request->input('category'),

        ]);

        return redirect()->route('product.index')->with('message',$request->input('title') .' added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.showAdmin', compact('product'));
    }

       /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function showCustomer($id)
    {
        $product = Product::find($id);
        return view('product.showCustomer', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $data = $request->validate([
            'title' => 'required',
            'description' => '',
            'price' => 'required',
            'discount' => 'required',
            'quantity' => 'required',
            'category_id' => 'reduired',
            'image' => ''

            

        ]);
        if(request('image')){
            $image_path = request('image')->store('profiles','public');

            $image = Image::make(public_path("storage/{$image_path}"))->fit(1000,1000);
            $image->save();

            $data['image'] = $image_path;
        }

        $product->update($data);

        return redirect()->route('product.index')->with('message',$product->title .' has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        
        return redirect()->back()->with('message',$product->title .' has been deleted successfully');
    }

    public function searchProduct(Request $request){

        $seachText = $request->search;
       
        $products = Product::where('title','LIKE', "%$seachText%")->orWhere('category_id','LIKE', "%$seachText%")->paginate(10);
        return view('home.userpage', compact('products'));

    }
}
