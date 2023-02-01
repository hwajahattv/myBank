@extends('mobileUI.parent.master')
@section('content')
<div class="container d-flex justify-content-around">
    <a href="{{route('transfer.index')}}">

        <div class="card text-white bg-success" style="max-width: 250px; border-radius: 20px">
            <img class="card-img-top" width="200px" src="{{asset('public/assets/images/wallet.png')}}" alt="Title">
            <div class="card-body">
                <h4 class="card-title text-center">Add Money</h4>
                {{-- <p class="card-text">Text</p> --}}
            </div>
        </div>
    </a>
    <a href="">
        <div class="card text-white bg-success" style="max-width: 250px; border-radius: 20px">
            <img class="card-img-top" src="{{asset('public/assets/images/withdrawal.png')}}" alt="Title">

            <div class="card-body">
                <h4 class="card-title text-center">Withdraw Money</h4>
                {{-- <p class="card-text">Text</p> --}}
            </div>
        </div>
    </a>
    <a href="">
        <div class="card text-white bg-success" style="max-width: 250px; border-radius: 20px">
            <img class="card-img-top" width="200px" src="{{asset('public/assets/images/investment.png')}}" alt="Title">


            <div class="card-body">
                <h4 class="card-title text-center">Invest Money</h4>
                {{-- <p class="card-text">Text</p> --}}
            </div>
        </div>
    </a>

</div>

@endsection
