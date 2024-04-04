@extends('layouts.infrastructure')
@section('page')
    Department
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-sm-5 col-5">
            <h4 class="page-title">Departments</h4>
        </div>
        <div class="col-sm-7 col-7 text-right m-b-30">
            <a href="/infrastructure/department/create" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Add Department</a>
        </div>
    </div>
    @include('alerts.messages')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="departmentTable" class="table table-striped custom-table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Department Name</th>
                            <th>Description</th>
                            <th class="text-right">Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
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
        function deleteDepartment(id){
            $('#deleteForm').attr('action','/infrastructure/department/'+id);
            $('#deleteModal').modal('show');
        }
        function closeModal(){
            $('#deleteForm').attr('action','#');
        }
        $(function(){
            $('#departmentTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                url: "{{ route('ajax.infrastructure.departments') }}",
                },
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'description',
                        name: 'description'
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
