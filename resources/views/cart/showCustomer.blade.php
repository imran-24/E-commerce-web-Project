<!doctype html>
<html lang="en">
  <head>
    <base href = "/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- style.css -->
    <link rel="stylesheet" href="home/style.css">
  </head>
  <body>
    
    <!-- navbar starts here -->

    @include ('home.nav')

    <!-- navbar ends here -->

    @if (\Session::has('message'))

    <div class="alert alert-success d-flex justify-between align-items-center">
                    {!! \Session::get('message') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>

                </div>
                
            @endif

            <div class="div_center">
                    <h2 class="h2_text">Product Cart</h2>
            </div>
            <div class="container mb-5">
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
                                <th scope="col">Quantity</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $totalPrice = 0;
                                ?>
                              @foreach($carts as $cart)
                                <tr>
                                <td>{{ $cart->product_title }}</td>
                                <td>{{ $cart->price }}</td>
                                <?php 
                                    $totalPrice = $totalPrice + $cart->price;
                                ?>
                                <form action="{{ route('cart.update', $cart) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <td><input type="number" name="quantity" id="" value="{{ $cart->quantity }}"></td>                               
                                <td><img style="width:150px" src="storage/{{ $cart->image }}" alt=""></td>
                                <td>   
                                <button type="submit" name="update" class="btn btn-secondary bg-slate-500 btn-sm ">UPDATE</button>
                                </form>
                                    <form action="{{ route('cart.destroy', $cart) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" name="delete" class="btn btn-warning btn-sm bg-yellow-500">REMOVE</button>
                                    </form>
                                </td>
                                </tr>
                              @endforeach
                                

                              
                            </tbody>
                            
                        </table>
                        <div>
                            <p class="lead text-center font-bold text-green-500">
                                Total Price : $ {{ $totalPrice }}
                            </p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>   
                
                
            </div>
        </div>

        <div class="m-5">
            <h1 class="text-center h4">Proceed To Order</h1>
            <div class="d-flex justify-content-center">
            <a href="{{ url('cash_order') }}" class="btn btn-primary btn-sm hero-btn m-2">Cash On Delivery</a>
            <a href="" class="btn btn-secondary btn-sm hero-btn m-2">Pay Using Card</a>
            </div>
        </div>

           



    <!-- footer starts here-->
      
    @include ('home.footer')

    <!-- footer ends here -->

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
