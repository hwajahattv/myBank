@extends('admin.parent.master')
@section('styles')
<script src="https://kit.fontawesome.com/d1b8dba2c9.js" crossorigin="anonymous"></script>

@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        {{-- <div class="row purchace-popup">
            <div class="col-12 stretch-card grid-margin">
                <div class="card card-secondary">
                    <span class="card-body d-lg-flex align-items-center">
                        <p class="mb-lg-0">Get tons of UI components, Plugins, multiple layouts, 20+ sample pages, and more! </p>
                        <a href="https://www.bootstrapdash.com/product/stellar-admin/?utm_source=organic&utm_medium=banner&utm_campaign=free-preview" target="_blank" class="btn btn-warning purchase-button btn-sm my-1 my-sm-0 ml-auto">Upgrade To Pro</a>
                        <button class="close popup-dismiss ml-2">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </span>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="grid-margin stretch-card">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="g-0">

                        <div class="">

                            <div class="card-body  bg-light ">
                                <h5 class="display-3 text-center">{{$transaction[0]->amount_of_transaction}}$</h5>
                                <p class="card-text"><span class="font-weight-bold"> Transaction Type: </span>{{$transaction[0]->name}}</p>
                                <p class="card-text"><span class="font-weight-bold">Date: </span>{{$transaction[0]->date}}</p>
                                <p class="card-text"><span class="font-weight-bold">Sender account: </span>{{$transaction[0]->FromAccountTitle}} - {{$transaction[0]->FromAccountNumber}}</p>
                                <p class="card-text"><span class="font-weight-bold">Receiver account: </span>{{$transaction[0]->ToAccountTitle}} - {{$transaction[0]->ToAccountNumber}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- content-wrapper ends -->


    @endsection

    @section('scripts')
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    @endsection
