<!doctype html>
<html lang="en">
  <head>
    <base href = "/public">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artisan</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- style.css -->
    <link rel="stylesheet" href="home/style.css">
  </head>
  <body>
    
    <!-- navbar starts here -->

    @include ('home.nav')

    <!-- navbar ends here -->

    <!-- sale section starts here  -->
    <div style="max-width:100vw; overflow:hidden" class="p-md-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
            <div class="card-header">
              
              <h2 class="text-black text-2xl">
                Product Details
                <a href="{{ route('product.index') }}" class=" px-4 btn btn-primary btn-sm float-end">BACK</a>
              </h2>
            </div>
            <div class="card-body w-100 d-lg-flex flex-row-reverse align-items-center justify-content-between m-auto px-5">

                                <div>
                                    <img src="storage/{{ $product->image }}" class="card-img-top" style="width: 300px; margin: auto ;" alt="...">
                                </div>


                                <div style="flex-basis:50%; margin-right:5rem">
                                    <form action="" method=""> 
                                    <div class="mb-3 d-grid align-items-center text-black text-lg">
                                        <label  for="name"> Title :</label>
                                        <p class="form-control"> {{ $product->title }} </p>
                                    </div>
                                    <div class="mb-3 d-grid align-items-center text-black text-lg"> 
                                        <label for="email"> Description :</label>
                                        <p class="input_color form-control" style="height:8rem" >{{ $product->description}}</p>
                                    </div>
                                    <div class="mb-3 d-grid align-items-center text-black text-lg">
                                        <label for="phone">Regular Price :</label>
                                        <p class="form-control"> {{ $product->price }}  </p>
                                    </div>
                                    <div class="mb-3 d-grid align-items-center text-black text-lg">
                                        <label for="course"> Discount Price :</label>
                                        <p class="form-control"> {{ $product->discount_price }} </p>
                                    </div>
                                    <div class="mb-3 d-grid align-items-center text-black text-lg">
                                        <label for="phone">Quantity :</label>
                                        <p class="form-control"> {{ $product->quantity }}  </p>
                                    </div>
                                    <div class="mb-3 d-grid align-items-center text-black text-lg">
                                        <label for="course"> Category :</label>
                                        <p class="form-control"> {{ $product->category->category_name }}</p>
                                    </div>
                                        
                                </form>

                                </div>
                                

                                

                            </div>
                    
                                

                        </div>
                    </div>
                </div>

                <div class="m-5">
                <form action="{{ url('add_cart', $product->id) }}" method="POST" class="d-flex justify-content-center">

                  @csrf
                  <button type="submit" class="btn btn-sm btn-primary bg-blue-500 m-2" style="width: 120px;">Add to Cart</button>
                  <input class="w-25 h-25 my-1" type="number" name="quantity" value="1" min="1">

                </form>
                </div>
            </div>

    </div>
           



    <!-- footer starts here-->
      
    @include ('home.footer')

    <!-- footer ends here -->

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
