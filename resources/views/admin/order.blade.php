
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
                    <h2 class="h2_text">All Order</h2>
                    <form action="{{ url('order/search') }}" class="d-md-flex w-50 justify-content-center m-auto" method="get">
                        
                        @csrf
                        <input class="input_color form-control me-3  mb-3" type="text" name="search" placeholder="Search for something">
                        <input type="submit" class="btn btn-primary btn-sm mb-3" name="search" value="Search">
                          
                    </form>
                </div>
            <div class="container mt-5">
                  <div class="row  align-items-center">
                    <div class="col-12">
                    <div class="card">
                    <div class="card-header">
                        <h4 style="color:black; letter-spacing: .3rem;">
                            Order
                        </h4>
                        </div>
                        
                        <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                <th scope="col">User Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Address</th>
                                <th scope="col">Product Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Price ($)</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Payment</th>
                                <th scope="col">Delivery</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($orders as $order)
                                <tr>

                                <td>{{ $order->user_id }}</td>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->email }}</td>
                                <td>{{ $order->phone }}</td>
                                <td>{{ $order->address }}</td>
                                <td>{{ $order->product_id }}</td>
                                <td>{{ $order->product_title }}</td>
                                <td>{{ $order->price }}</td>
                                <td>{{ $order->quantity }}</td>
                                @if($order->payment_status != "Paid")
                                    <td>{{ $order->payment_status }}</td>
                                @else
                                    <td class="text-success font-extrabold">{{ $order->payment_status }}</td>
                                @endif
                                
                                <td>{{ $order->delivery_status }}</td>


                                <td>   
                                @if($order->delivery_status != "Delivered")
                                    <a href="{{ url('order/delivered', $order->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-primary btn-sm hero-btn mb-2">Delivered</a>
                                @endif
                                
                                    <form action="{{ url('order/destroy', $order->id) }}" method="POST" class="d-inline">
                                        @csrf
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

