<nav class="navbar navbar-expand-lg  text-format1">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ url('/') }}">ARTISAN</a>
          <button class="navbar-toggler btn-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon "></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
              <li class="nav-item px-3">
                <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
              </li>
              
              <li class="nav-item px-3">
                <a class="nav-link" href="#product">products</a>
              </li>
              
              <li class="nav-item px-3">
                <a class="nav-link" href="{{ url('contact_us') }}">contact us</a>
              </li>
              <li class="nav-item px-3">
                <a class="nav-link" href="{{ route('order_data.index') }}">order</a>
              </li>
              <li class="nav-item px-3">
                <a class="nav-link" href="{{ route('cart.index') }}">
                  <img style="width:20px" src="/images/trolley-cart.png" alt="">
                </a>
              </li>
              @if (Route::has('login'))

              @auth

              
                  <x-app-layout>
                  </x-app-layout>
            

              @else
                  <li class="nav-item my-sm-2 my-lg-0 px-3">
                     <a class="nav-link btn btn-sm btn-primary text-white" href="{{ route('login') }}">Login</a>
                  </li>
                  @if (Route::has('register'))
                  <li class="nav-item px-3 ">
                     <a class="nav-link btn btn-sm btn-secondary text-white " href="{{ route('register') }}">register</a>
                  </li>
                  @endif
              @endauth
              @endif
              
            </ul>
              <!-- <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>  -->
          </div>
        </div>
      </nav>