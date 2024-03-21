@extends('layouts.infrastructure')
@section('page')
    Doctors
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Doctors</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="/infrastructure/doctor/create" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Doctor</a>
        </div>
    </div>
    @include('alerts.messages')
    <div class="row doctor-grid">
        @forelse ($doctors as $doctor)
        <div class="col-md-4 col-sm-4  col-lg-3">
            <div class="profile-widget">
                <div class="doctor-img">
                    <a class="avatar" href="{{ route('infrastructure.doctor.show',['doctor' => $doctor->staff_id]) }}"><img alt="" src="/apps/assets/img/user.jpg" onerror="this.src='/apps/assets/img/user.jpg'; this.onerror=null"></a>
                </div>
                <div class="dropdown profile-action">
                    <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="{{ route('infrastructure.doctor.edit',['doctor' => $doctor->staff_id]) }}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); deleteDoctor({{ $doctor->id }});"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                    </div>
                </div>
                <h4 class="doctor-name text-ellipsis"><a href="{{ route('infrastructure.doctor.show',['doctor' => $doctor->staff_id]) }}">{{ $doctor->name }}</a></h4>
                <div class="doc-prof">{{ $doctor->department_name }}</div>
                <div class="user-country">
                    <i class="fa fa-map-marker"></i> {{ $doctor->address }}
                </div>
            </div>
        </div>
        @empty
        <div class="col-md-4 col-sm-4  col-lg-3">
            <p>No doctors</p>
        </div>
        @endforelse
    </div>
    <div id="deleteModal" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="#" id="deleteForm">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body text-center">
                        <img src="/apps/assets/img/sent.png" alt="" width="50" height="46">
                        <h3>Are you sure you want to delete this doctor?</h3>
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
        function deleteDoctor(id){
            $('#deleteForm').attr('action','/infrastructure/doctor/'+id);
            $('#deleteModal').modal('show');
        }
        function closeModal(){
            $('#deleteForm').attr('action','#');
        }
    </script>
@endpush
