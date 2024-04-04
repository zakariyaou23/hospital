@extends('layouts.infrastructure')
@section('page')
    Staff
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Staff</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="/infrastructure/staff/create" class="btn btn-primary float-right btn-rounded"><i class="fa fa-plus"></i> Add Staff</a>
        </div>
    </div>
    <div class="row filter-row">
        <div class="col-sm-6 col-md-9">
            <div class="form-group form-focus select-focus">
                <label class="focus-label">Role</label>
                <select class="select floating" id="roles">
                    <option value="">Select Role</option>
                    @foreach ($roles as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="#" onclick="event.preventDefault(); onChange();" class="btn btn-success btn-block"> Search </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="staffTable" class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th style="min-width:200px;">Name</th>
                            <th>Staff ID</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th style="min-width: 110px;">Join Date</th>
                            <th>Role</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody</tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="deleteModal" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="#" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body text-center">
                        <img src="/apps/assets/img/sent.png" alt="" width="50" height="46">
                        <h3>Are you sure you want to delete this department?</h3>
                        <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('special-scripts')
    <script>
        function deleteStaff(id){
            $('#deleteForm').attr('action','/infrastructure/staff/'+id);
            $('#deleteModal').modal('show');
        }
        function closeModal(){
            $('#deleteForm').attr('action','#');
        }
        function onChange(){
            var role = $('#roles').val();
            if($.fn.dataTable.isDataTable('#staffTable')){
                console.log("Loaded");
                if(role){
                    $('#staffTable').DataTable().ajax.url(`{{ route('ajax.infrastructure.staffs') }}?role=`+role).load();
                }else{
                    $('#staffTable').DataTable().ajax.url(`{{ route('ajax.infrastructure.staffs') }}`).load();
                }
            }else{
                console.log("Not loaded");
            }

        }
        $(function(){
            $('#staffTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                url: "{{ route('ajax.infrastructure.staffs') }}",
                },
                columns: [
                    {
                        data: 'name',
                        name: 'users.first_name'
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'email',
                        name: 'users.email'
                    },
                    {
                        data: 'telephone',
                        name: 'users.telephone'
                    },
                    {
                        data: 'joining_date',
                        name: 'joining_date'
                    },
                    {
                        data: 'role_name',
                        name: 'roles.name'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                    }
                ]
            });
        });
    </script>
@endpush
