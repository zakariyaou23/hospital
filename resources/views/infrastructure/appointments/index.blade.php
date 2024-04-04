@extends('layouts.infrastructure')
@section('page')
    Appointments
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Appointments</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="/infrastructure/appointment/create" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Appointment</a>
        </div>
    </div>
    @include('alerts.messages')
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <table id="appointmentTable" class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th>Appointment ID</th>
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
                        {{-- <tr>
                            <td>APT0001</td>
                            <td><img width="28" height="28" src="/apps/assets/img/user.jpg" class="rounded-circle m-r-5" alt=""> Denise Stevens</td>
                            <td>35</td>
                            <td>Henry Daniels</td>
                            <td>Cardiology</td>
                            <td>30 Dec 2018</td>
                            <td>10:00am - 11:00am</td>
                            <td><span class="custom-badge status-red">Inactive</span></td>
                            <td class="text-right">
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="edit-appointment.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_appointment"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr> --}}
                    </tbody>
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
                        <h3>Are you sure you want to delete this appointment?</h3>
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
            $('#deleteForm').attr('action','/infrastructure/appointment/'+id);
            $('#deleteModal').modal('show');
        }
        function closeModal(){
            $('#deleteForm').attr('action','#');
        }
        $(function(){
            $('#appointmentTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                url: "{{ route('ajax.infrastructure.appointments') }}",
                },
                columns: [
                    {
                        data: 'id',
                        name: 'appointments.id'
                    },
                    {
                        data: 'patient_name',
                        name: 'patients.first_name'
                    },
                    {
                        data: 'doctor_name',
                        name: 'doctors.first_name'
                    },
                    {
                        data: 'department_name',
                        name: 'departments.name'
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
