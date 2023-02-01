@extends('admin.parent.master')
@section('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://kit.fontawesome.com/d1b8dba2c9.js" crossorigin="anonymous"></script>

@endsection

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row purchace-popup">
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
        </div>
        <div class="row">
            <div class="grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Accounts List</h4>
                        <table id="example" class="display table table-striped table-responsive" style="width:100%">

                            <thead>
                                <tr>
                                    <th>Account Number</th>
                                    <th>Account Tilte</th>
                                    <th>Type</th>
                                    <th>Credit</th>
                                    <th>Open date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($accounts as $key => $account)
                                <tr>
                                    <td>{{$account->account_number}}</td>
                                    <td>{{$account->title}}</td>
                                    <td>{{$account->type}}</td>
                                    <td>{{$account->credit}}</td>
                                    <td>{{$account->date_opened}}</td>
                                    <td>{{$account->status}}</td>
                                    <td><a href="{{route('account.show',['account'=>$account->id])}}" class="btn btn-dark btn-sm">Open</a></td>

                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Account Number</th>
                                    <th>Account Tilte</th>
                                    <th>Type</th>
                                    <th>Credit</th>
                                    <th>Open date</th>
                                    <th>Status</th>
                                    <th>Actions</th>

                                </tr>
                            </tfoot>
                        </table>

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
            $('#example').DataTable({
                responsive: true
            });

        });

    </script>

    @endsection
