<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <title>Admin Panel</title>
  </head>
  <body>
  <div class="bg-red-500 header">
    <p>ARTISAN</p>
    <button class="nav-toggle">
          <i class="fas fa-bars"></i>	
    </button>
  </div>
  <div class="div-container">
  <aside class="sidebar"> 
		<div class="title"> 
			<p > <span>ADMIN</span></p>
			<button class="close">
					<i class="fas fa-times"></i>
			</button>
		</div>
		<div class="links">
			<ul>
        <li><a  href="{{ url('/adminDashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('product.create') }}">Add product</a></li>
        <li><a href="{{ route('product.index') }}">Show product</a></li>
        <li><a href="{{ route('category.index') }}">Category</a></li>
        <li class="mb-4"><a href="{{ url('order') }}">Order</a></li>
        <x-app-layout>
    
        </x-app-layout>

			</ul>
		</div>
		
	</aside>
  <div class="main-body">
            
            @yield('content')

  </div>
  </div>
  
	<script>
    
      const toggle = document.querySelector(".nav-toggle")
      const closebtn = document.querySelector(".close")
      const aside = document.querySelector(".sidebar")

      toggle.addEventListener("click",function(){
        
        aside.classList.add("show-sidebar")
        
      })

      closebtn.addEventListener("click",function(){
        
        if (aside.classList.contains("show-sidebar")){
          
          aside.classList.remove("show-sidebar")
        }
        
      })
  </script>

    



    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
<!-- 
           


     -->