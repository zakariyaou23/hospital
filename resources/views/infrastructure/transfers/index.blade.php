@extends('layouts.infrastructure')
@section('page')
    Transfers
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Transfers</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="/infrastructure/transfer/create" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Transfer</a>
        </div>
    </div>
    @include('alerts.messages')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="card-title">Transfers</h4>
                <ul class="nav nav-tabs nav-tabs-top">
                    <li class="nav-item"><a class="nav-link active" href="#top-tab1" data-toggle="tab">Pending</a></li>
                    <li class="nav-item"><a class="nav-link" href="#top-tab2" data-toggle="tab">Initiated</a></li>
                    <li class="nav-item"><a class="nav-link" href="#top-tab3" data-toggle="tab">Approved</a></li>
                    <li class="nav-item"><a class="nav-link" href="#top-tab4" data-toggle="tab">Rejected</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="top-tab1">
                        <div class="table-responsive">
                            <table id="appointmentTable" class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>Transfer ID</th>
                                        <th>Patient Name</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Initiator</th>
                                        <th>Recipient</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="top-tab2">
                        <div class="table-responsive">
                            <table id="appointmentTable2" class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>Transfer ID</th>
                                        <th>Patient Name</th>
                                        <th>Doctor Name</th>
                                        <th>Department</th>
                                        <th>Appointment Date</th>
                                        <th>Appointment Time</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="top-tab3">
                        <div class="table-responsive">
                            <table id="appointmentTable3" class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>Transfer ID</th>
                                        <th>Patient Name</th>
                                        <th>Doctor Name</th>
                                        <th>Department</th>
                                        <th>Appointment Date</th>
                                        <th>Appointment Time</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="top-tab4">
                        <div class="table-responsive">
                            <table id="appointmentTable4" class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>Transfer ID</th>
                                        <th>Patient Name</th>
                                        <th>Doctor Name</th>
                                        <th>Department</th>
                                        <th>Appointment Date</th>
                                        <th>Appointment Time</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
                        <h3>Are you sure you want to delete this transfer?</h3>
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
        function deleteAppointment(id){
            $('#deleteForm').attr('action','/infrastructure/transfer/'+id);
            $('#deleteModal').modal('show');
        }
        function closeModal(){
            $('#deleteForm').attr('action','#');
        }
        $(function(){
            $('#transferTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                url: "{{ route('ajax.infrastructure.transfers') }}?status=pending",
                },
                columns: [
                    {
                        data: 'id',
                        name: 'transfers.id'
                    },
                    {
                        data: 'patient_name',
                        name: 'patients.first_name'
                    },
                    {
                        data: 'from_instrastructure',
                        name: 'from_instrastructures.name'
                    },
                    {
                        data: 'to_instrastructure',
                        name: 'to_instrastructures.name'
                    },
                    {
                        data: 'date',
                        name: 'date'
                    },
                    {
                        data: 'time',
                        name: 'time'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: false,
                        searchable: false,
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
