
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
            

            
            <div class="row">
        <div class="col-12-sm">
          <div class="card">
            <div class="card-header">
              
              <h2 class="text-black text-2xl">
                Product Details
                <a href="{{ route('product.index') }}" class=" px-4 btn btn-primary btn-sm float-end">BACK</a>
              </h2>
            </div>
            <div class="card-body w-75 d-flex align-items-center justify-content-between m-auto px-5">
                                <div style="flex-basis:50%">
                                    <form action="code.php" method="POST"> 
                                    <div class="mb-3 d-grid align-items-center text-black text-lg ">
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
                                

                                <div >
                                    <img src="storage/{{ $product->image }}" class="card-img-top" style="width: 250px; margin: auto ;" alt="...">
                                </div>

                            </div>
                    
                                

                        </div>
                    </div>

                </div>
            </div>
                    


@endsection

