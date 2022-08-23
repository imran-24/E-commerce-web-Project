<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artisan</title>
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

    <section class="my-24">
        <div class="container px-10">
          <div class="m-3">
            <h1 class="text-3xl font-extrabold">Get in Touch</h1>
            <p class="fs-6 test-seconday text-2xl font-bold">If you have any questions or need help. please fill out the form below. We do our best to respond within 1 business day.</p>
          </div>
          
            <div class="row input-group mx-auto d-grid">
              <div class="col-lg-5 col-sm-12 col-md-6">
                <form action="{{ url('store_contact_info') }}" method="post">
                    @csrf
                <input type="text"  class="form-control mb-3  p-2" name="name" id="" placeholder="Name">
                <input type="text"  class="form-control mb-3 p-2" name="email" id="" placeholder="Your email address">
                <select class="form-select mb-3 text-secondary p-2" name="purpose" >
                  <option selected>Select a Purpose</option>
                  <option value="1">Product Questions (New Customers)</option>
                  <option value="1">Product Supports (Existing Customers)</option>
                  <option value="1">Feedback / Feature Request</option>

                  <option value="2">Advertising / Press Inquiries</option>
                  <option value="3">Business Inquiries</option>
                </select>
                <input  class="form-control mb-3 p-2" type="text" name="subject" placeholder="Subject">
                <textarea  class="form-control mb-3 p-2" name="message" id="" cols="40" rows="2" placeholder="Message"></textarea>
                <button class="btn btn-dark px-4 my-4">Submit</button>
                </form>
              </div>
            
          </div>
          
        </div>
      </section>

    <!-- footer starts here-->
      
    @include ('home.footer')

    <!-- footer ends here -->

 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
