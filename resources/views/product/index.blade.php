
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
                    <h2 class="h2_text">All Product</h2>
            </div>
            <div class="container mt-5">
                  <div class="row  align-items-center">
                    <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-end align-items-baseline">
                        <div>
                            <a href="{{ route('product.create') }}" class="btn btn-success">Add Product</a>
                        </div>
                        
                        </div>
                        <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Price ($)</th>
                                <th scope="col">Discount</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($products as $product)
                                <tr>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->discount_price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->category->category_name }}</td>

                                <td>   
                                      <a href="{{ route('product.show', $product) }}" class="btn btn-success btn-sm hero-btn">View</a>
                                      <a href="{{ route('product.edit', $product) }}" class="btn btn-secondary btn-sm hero-btn">Edit</a>
                                    <form action="{{ route('product.destroy', $product) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" name="delete" class="btn btn-warning btn-sm bg-yellow-500">Delete</button>
                                    </form>
                                </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>

                        </div>
                    </div>
                    </div>
                </div>
                </div>   
                
                
            </div>
        </div>


@endsection

