@extends('layouts.infrastructure')
@section('page')
    Patient
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Patients</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="/infrastructure/patient/create" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Patient</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @include('alerts.messages')
            <div class="table-responsive">
                <table id="patientTable" class="table table-border table-striped custom-table mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="delete_patient" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="/apps/assets/img/sent.png" alt="" width="50" height="46">
                    <h3>Are you sure want to delete this Patient?</h3>
                    <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('special-scripts')
    <script>
        $(function(){
            $('#patientTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                url: "{{ route('ajax.patients') }}",
                },
                columns: [
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'date_of_birth',
                        name: 'date_of_birth'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'telephone',
                        name: 'telephone'
                    },
                    {
                        data: 'email',
                        name: 'email'
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
        // $(document).ready(function(){
        //     $('body').on('click','.deletePatient', function(e){
        //         var id = $(this).data('id');
        //         console.log(id);
        //     });
        // });
    </script>
@endpush
