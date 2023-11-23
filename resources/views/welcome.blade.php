@extends('layouts.app')

@section('content')
<div class="container" id="app" style="font-family: Nunito">
    <div class="row">
        <div class="col-md-6">
            <img src="/banner/online-medicine-concept_160901-152.jpg" class="img-fluid" style="border:1px solid #ccc;">
        </div>
        <div class="col-md-6">
            <h2>Create an Account & Book your appointment</h2>
            <p>Lorem ipsum dolor sit amet consectetur, 
                adipisicing elit. Neque possimus praesentium aut maxime ducimus facilis tempore adipisci ratione 
                unde voluptatum recusandae, perferendis delectus hic libero fugiat 
                deleniti optio reprehenderit nesciunt?
                Neque possimus praesentium aut maxime ducimus facilis tempore adipisci ratione 
                unde voluptatum recusandae, perferendis delectus hic libero fugiat 
                deleniti optio reprehenderit nesciunt?
            </p>
                <div class="mt-5">
                    <a href="{{url('/register')}}"><button class="btn btn-success h-50">Register as Patient</button></a>
                    <a href="{{url('/login')}}"><button class="btn btn-secondary h-50 ml-10">Login</button></a>
                </div>
        </div>
    </div>    
    <hr>

    <!-- datepicker component -->
  <find-doctor></find-doctor>
</div>

@endsection
