


@extends('admin.home')
<style>
        .div_center{
            text-align:center;
            padding-top:40px;
        }
        .h2_text{
            font-size:40px;
           
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
                    <h2 class="h2_text">Add Product</h2>
            </div>

                <div class="container mt-5">
                  <div class="row  align-items-center justify-content-center">
                    <div class="col-10">
                    <div class="card">
                        <div class="card-body">

                        <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
                                            
                                            @csrf

                                            <input class="input_color form-control w-50  mx-auto my-3" type="text" name="title" placeholder="Product Title" required>
                                            <textarea class="input_color form-control w-50  mx-auto my-3" type="text" name="description" rows='5' placeholder="Product description"></textarea>
                                            <input class="input_color form-control w-50  mx-auto my-3" type="number" name="price" placeholder="Product Price" required>
                                            <input class="input_color form-control w-50  mx-auto my-3" type="number" name="discount" placeholder="Discount Price">
                                            <input class="input_color form-control w-50  mx-auto my-3" type="number" name="quantity" placeholder="Product Quantity" required>
                                            
                                            <select class="form-control w-50  mx-auto my-3 bg-white" id="inlineFormCustomSelect" name="category" required>
                                                @foreach($categories as $category )
                                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                            <input type="file" class="form-control w-50  mx-auto my-3 " id="validatedCustomFile" name="image" required>

                                            <button type="submit" class="btn btn-primary text-white bg-blue-700 float-end" name="submit">Add Product</button>
                                        </form>
                                        
                                    
                        </div>
                    </div>
                    </div>
                </div>
                </div>
       


@endsection

