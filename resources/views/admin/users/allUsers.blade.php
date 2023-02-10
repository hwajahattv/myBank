@extends('admin.parent.master')
@section('styles')
<link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://kit.fontawesome.com/d1b8dba2c9.js" crossorigin="anonymous"></script>

@endsection

@section('content')


<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalRoleForm" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Change the role of this user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="form bg-dark" action="" id="role-form" method="post">
                @csrf
                <div class="modal-body">
                    <select class="form-control form-control-sm" name="role" id="">
                        @foreach($roles as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex justify-content-center">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                    <button onclick="return confirmation();" class="btn btn-primary btn-sm">Save</button>

                </div>
            </form>
        </div>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
    const RoleFormModal = new bootstrap.Modal(document.getElementById('modalRoleForm'), options)


    function confirmation() {
        if (confirm('are you sure to change the role?')) {
            document.getElementById('role-form').submit();
        } else {
            return false;
        }
    }

</script>
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
                        <h4 class="card-title">Users List</h4>
                        @if(session()->has('message'))
                        <div class="d-flex justify-content-center">
                            <div class="alert alert-success center-block">
                                {{ session()->get('message') }}
                            </div>
                        </div>
                        @endif
                        @if(session()->has('error'))
                        <div class="d-flex justify-content-center">
                            <div class="alert alert-danger center-block">
                                {{ session()->get('error') }}
                            </div>
                        </div>
                        @endif

                        <table id="example" class="display table table-striped table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Phone #</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key => $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->fullName}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        {{$user->role}}
                                        <!-- Modal trigger button -->
                                        <button type="button" class="btn btn-outline-primary btn-sm btn-role-edit" data-bs-toggle="modal" data-bs-target="#modalRoleForm" data-user-id="{{$user->id}}">
                                            <i class=" fa-solid fa-user-pen"></i>
                                        </button>

                                    </td>
                                    <td>{{$user->phone_no}}</td>
                                    <td><a id="" data-method="delete" href="{{route('user.destroy',['user'=>$user->id])}}" class="btn btn-danger btn-sm delete">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Phone #</th>
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
            $('#example').DataTable();
        });
        $(".btn-role-edit").on("click", function() {
            var id = $(this).attr("data-user-id");
            $('#role-form').attr('action', '/change/role/' + id);
        });

    </script>
    <script src="{{asset('public/front-assets/js/app.js')}}"></script>

    @endsection
