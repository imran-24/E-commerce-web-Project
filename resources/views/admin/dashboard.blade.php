
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
    <div class="m-auto">
        <div class="d-flex flex-wrap justify-content-center align-items-center">
            <div style="flex-basis:22%" >
                <div style="height:10rem;background: #101820FF " class=" d-grid p-3  m-2">
                    <h1 class="font-bold">{{ $calculations[1] }}</h1>
                    <p class="text-stone-400 text-sm" >Total Products</p>
                </div>
            </div>
            <div style="flex-basis:22%">
                <div style="height:10rem;background: #101820FF  " class="d-grid p-3  m-2">
                    <h1 class="font-bold">{{ $calculations[2] }}</h1>
                    <p class="text-stone-400 text-sm">Total Orders</p>
                </div>
            </div>
            <div style="flex-basis:22%">
                <div style="height:10rem;background: #101820FF  " class="d-grid p-3  m-2">
                    <h1 class="font-bold">{{ $calculations[0] }}</h1>
                    <p class="text-stone-400 text-sm">Total Customers</p>
                </div>
            </div>
            <div style="flex-basis:22%">
                <div style="height:10rem;background: #101820FF  " class="d-grid p-3  m-2">
                    <h1 class="font-bold">{{ $calculations[5] }}</h1>
                    <p class="text-stone-400 text-sm">Total Revenues</p>
                </div>
            </div>
            <div style="flex-basis:22%">
                <div style="height:10rem;background: #101820FF " class="d-grid p-3  m-2">
                    <h1 class="font-bold">{{ $calculations[3] }}</h1>
                    <p class="text-stone-400 text-sm">Total Delivered</p>
                </div>
            </div>
            <div style="flex-basis:22%">
                <div style="height:10rem;background: #101820FF  " class="d-grid p-3  m-2">
                    <h1 class="font-bold">{{ $calculations[4] }}</h1>
                    <p class="text-stone-400 text-sm">Total Processing</p>
                </div>
            </div>

        </div>
    </div> 


@endsection

