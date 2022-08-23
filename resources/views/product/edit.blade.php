


@extends('admin.home')
<style>
        .div_center{
            text-align:center;
            padding-top:40px;
        }
        .h2_text{
            font-size:40px;
            padding-bottom:40px;
        }
        .input_color{
            color:black;
        }
    </style>
@section('content')
            @if (\Session::has('message'))

            <div class="alert alert-success d-flex justify-between align-items-center">
                    {!! \Session::get('message') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>

                </div>
                
            @endif

            <div class="div_center">
                    <h2 class="h2_text">Edit Product</h2>
                </div>

                <div class="container mt-5">
                  <div class="row  align-items-center justify-content-center">
                    <div class="col-10">
                    <div class="card">
                        <div class="card-body">

                        <form action="{{ route('product.update', $product) }}" enctype="multipart/form-data" method="POST">
                                            @method('PUT')
                                            @csrf

                                            <input class="input_color form-control w-50  mx-auto my-5" type="text" name="title" placeholder="Product Title" value="{{ $product->title }}" required>
                                            <textarea class="input_color form-control w-50  mx-auto my-5" type="text" name="description" rows='5' placeholder="Product description"> {{ $product->description }}"</textarea>
                                            <input class="input_color form-control w-50  mx-auto my-5" type="number" name="price" placeholder="Product Price" value="{{ $product->price }}" required>
                                            <input class="input_color form-control w-50  mx-auto my-5" type="number" name="discount" placeholder="Discount Price" value="{{ $product->discount_price }}">
                                            <input class="input_color form-control w-50  mx-auto my-5" type="number" name="quantity" placeholder="Product Quantity" value="{{ $product->quantity }}" required>
                                            
                                            <select class="form-control w-50  mx-auto my-5 bg-white" id="inlineFormCustomSelect" name="category" required>
                                                @foreach($categories as $category )
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                            <input type="file" class="form-control w-50  mx-auto my-5 " id="validatedCustomFile" name="image" value="{{ $product->image }}" >

                                            <button type="submit" class="btn btn-primary text-white bg-blue-700" name="submit">Update Product</button>
                                        </form>
                                        
                                    
                        </div>
                    </div>
                    </div>
                </div>
                </div>
       


@endsection

