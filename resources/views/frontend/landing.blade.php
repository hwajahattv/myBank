@extends('frontend.master')

@section('style')
<style>
    html {
        background-color: #000056;
    }

    * {
        margin: 0;
        padding: 0;
    }

    .main {
        padding: 200px 0px;
        width: 100%;
        height: 100%;
        background-color: #000056;
        color: white;
        text-align: center;
        display: inline-block;

    }

    .content {
        padding: 10px;
        background-color: #ff0017;
        border-radius: 50%;
    }

</style>

@endsection

@section('content')
<div class="hero">
    <h1><span class="content">my</span> Bank</h1>
</div>
<div>
    <a class="btn btn-primary btn-lg m-4" href="{{route('client.auth')}}">Get Started</a>

</div>

@endsection
