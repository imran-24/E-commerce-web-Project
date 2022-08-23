<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- style.css -->
    <link rel="stylesheet" href="{{ asset('home/style.css') }}">
  </head>
  <body>
    
    <!-- navbar starts here -->

    @include ('home.nav')

    <!-- navbar ends here -->

    <!-- sale section starts here  -->

    @include ('home.sale')

    <!-- sale section ends here  -->

    <!-- Why shop with us starts here -->

    @include ('home.why')

    <!-- Why shop with us ends here -->

     <!-- New arrival start here-->
      
     @include ('home.new_arrival')
     
    <!-- New arrival ends here -->

    <!-- Products start here-->
    
    @include ('home.product')

    <!-- Products end -->

    <!-- Subscribe starts here  -->

    @include ('home.subscribe')

    <!-- subscribe ends here -->

    <!-- footer starts here-->
      
    @include ('home.footer')

    <!-- footer ends here -->

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
