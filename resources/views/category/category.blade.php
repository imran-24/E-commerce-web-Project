
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
        

            @if (\Session::has('message'))

                <div class="alert alert-success d-flex justify-between align-items-center">
                    {!! \Session::get('message') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>

                </div>
                
            @endif

                <div class="div_center">
                    <h2 class="h2_text">Add Category</h2>
                    <form action="{{ route('category.store') }}" class="d-md-flex w-50 justify-content-between align-items-center m-auto" method="POST">
                        
                        @csrf
                        <input class="input_color form-control me-3  mb-3" type="text" name="name" placeholder="Write category name">
                        <input type="submit" class="btn btn-primary btn-sm mb-3" name="submit" value="Add Category">
                          
                    </form>
                </div>

                <div class="container mt-5">
                  <div class="row  align-items-center justify-content-center">
                    <div class="col-10">
                    <div class="card">
                        <div class="card-header">
                        <h4 style="color:black; letter-spacing: .3rem;">
                            Category
                        </h4>
                        </div>
                        <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($categories as $category)
                                <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>   
                                    <form action="{{ route('category.destroy', $category) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure?')" name="delete" class="btn btn-warning btn-sm hero-btn">Delete</button>
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