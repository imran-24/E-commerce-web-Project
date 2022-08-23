<!doctype html>
<html lang="en">
  <head>
    <base href = "/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artisan</title>
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
                    <h2 class="h2_text">Order Cart</h2>
            </div>
            <div class="container mb-5">
                  <div class="row  align-items-center">
                    <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-end align-items-baseline">
                        
                        
                        </div>
                        <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Price ($)</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Payment Status</th>
                                <th scope="col">Delivery Status</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $totalPrice = 0;
                                ?>
                              @foreach($orders as $order)
                             
                                <tr>
                                <td>{{ $order->product_title }}</td>
                                <td>{{ $order->price }}</td>
                                <?php 
                                    $totalPrice = $totalPrice + $order->price;
                                ?>
                                
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->payment_status }}</td>
                                <td>{{ $order->delivery_status }}</td>                               
                                <td><img style="width:150px" src="storage/{{ $order->image }}" alt=""></td>
                                <td> 
                                    @if($order->payment_status != "Paid")  
                               
                                    <form action="{{ route('order_data.destroy', $order) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" name="delete" class="btn btn-warning btn-sm bg-yellow-500">Cancel</button>
                                    </form>
                                    @endif
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

        

           



    <!-- footer starts here-->
      
    @include ('home.footer')

    <!-- footer ends here -->

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
