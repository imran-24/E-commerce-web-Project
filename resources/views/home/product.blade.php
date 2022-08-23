<section class="container mt-5" id="product">
      <h2 class="title text-center">Products</h2>
      <div class="div_center">
                    
                    <form action="{{ url('/product_search') }}" class="d-md-flex w-50 justify-content-center m-auto" method="get">
                        
                        @csrf
                        <input class="input_color form-control me-3  mb-3" type="text" name="search" placeholder="Search for something">
                        <input type="submit" class="btn btn-primary btn-sm mb-3 bg-blue-600" name="search" value="Search">
                          
                    </form>
                </div>
      <div class="row  p-0">
          
        @foreach($products as $product)
          <div class="col-md-6 col-lg-4 col-10 mt-4 mb-4 m-auto">
            <div class="card py-sm-3">
              
                <img src="storage/{{ $product->image }}" class="card-img-top" style="width: 250px; margin: auto ;" alt="...">
                <div class="card-body d-flex align-items-baseline justify-content-center">
                  <h5 class="card-title mx-4 text-2xl font-extrabold ">{{ $product->title }}</h5>
                  @if($product->discount_price != 0 || $product->discount_price != null)
                    
                    <p class=" ml-2 text-success">
                      <span style="color:black">
                        Discount-price:<br>
                      </span>
                      ${{ $product->discount_price }}
                    </p>

                    <p style="text-decoration:line-through;color: red;" class=" mx-4 text-red-500">
                   
                        Price:<br>
                     
                      ${{ $product->price }}
                    </p>
                  @else
                    <p class=" ml-2 text-success">
                    <span style="color:black">
                        Price:<br>
                      </span>
                      ${{ $product->price }}
                    </p>
                  
                  @endif
                  
                </div>

                
                
                <div class="d-grid justify-content-center align-items-center">
                  <a href="{{ url('product_details', $product->id) }}" class="btn btn-sm btn-success m-2">Product Detail</a>
                
                  <form action="{{ url('add_cart', $product->id) }}" method="POST" class="d-flex justify-content-evenly">

                    @csrf
                    <button type="submit" class="btn btn-sm btn-warning bg-yellow-500 my-2" style="width: 120px;">Add to Cart</button>
                    <input class="w-25 h-25 my-1" type="number" name="quantity" value="1" min="1">

                  </form>
                  
                    
                    

          
                  

                </div>
            </div>
        </div>
        @endforeach
        <div class="row">
        {!!$products->withQueryString()->links('pagination::bootstrap-5')!!}
        </div>

        
      

       
    

    
    
    </section>