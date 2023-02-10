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
                    <div class="row g-0">

                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title text-center">Account Title: {{$account->title}}</h5>
                                <p class="card-text">Account Number: {{$account->account_number}}</p>
                                <p class="card-text">Account Type: {{$account->type}}</p>
                                <p class="card-text">Savings: {{$account->credit}}</p>
                                <p class="card-text">Status: {{$account->status}}</p>
                                <p class="card-text">Account opening date: {{$account->date_opened}}</p>
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
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

    </script>

    @endsection
