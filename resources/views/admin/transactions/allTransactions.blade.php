@extends('admin.parent.master')
@section('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
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
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Transactions List</h4>
                        <table id="example" class="display table table-striped table-responsive" style="width:100%">

                            <thead>
                                <tr>
                                    <th>TID</th>
                                    <th>Action</th>
                                    <th>Amount</th>
                                    <th>Sender Title</th>
                                    <th>Sender Acc. #</th>
                                    <th>Receiver Title</th>
                                    <th>Receiver Acc. #</th>
                                    <th>Transaction Type</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $key => $transaction)
                                <tr>
                                    <td>{{$transaction->id}}</td>
                                    <td><a href="{{route('transaction.show',['transaction'=>$transaction->id])}}" class="btn btn-dark btn-xs">Open</a></td>
                                    <td>{{$transaction->amount_of_transaction}}</td>
                                    <td>{{$transaction->FromAccountTitle}}</td>
                                    <td>{{$transaction->FromAccountNumber}}</td>
                                    <td>{{$transaction->ToAccountTitle}}</td>
                                    <td>{{$transaction->ToAccountNumber}}</td>
                                    <td>{{$transaction->name}}</td>
                                    <td>{{$transaction->date}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>TID</th>
                                    <th>Action</th>
                                    <th>Amount</th>
                                    <th>Sender Title</th>
                                    <th>Sender Acc. #</th>
                                    <th>Receiver Title</th>
                                    <th>Receiver Acc. #</th>
                                    <th>Transaction Type</th>
                                    <th>Date</th>
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
            $('#example').DataTable();
        });

    </script>

    @endsection
