@extends('layouts.infrastructure')
@section('page')
    Add Appointment
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Appointment</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{ route('infrastructure.appointment.store') }}" method="POST">
                @csrf
                <input type="hidden" name="infrastructure" id="infrastructure" value="{{ auth()->user()->infrastructure_id }}">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Patient Name</label>
                            <select class="form-control @error('patient') is-invalid @enderror select" name="patient">
                                <option value="">Select</option>
                                @foreach ($patients as $id => $name)
                                    <option value="{{ $id }}" {{ $id == old('patient') ? 'selected':'' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('patient')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Department</label>
                            <select class="form-control @error('department') is-invalid @enderror select" name="department" id="department">
                                <option value="">Select</option>
                                @foreach ($departments as $id => $name)
                                    <option value="{{ $id }}" {{ $id == old('department') ? 'selected':'' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('department')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Doctor</label>
                            <select class="form-control @error('doctor') is-invalid @enderror select" name="doctor" id="doctor">
                                <option value="">Select</option>
                            </select>
                            @error('doctor')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <div class="@error('date') @else cal-icon @enderror">
                                <input type="text" value="{{ old('date') }}" class="form-control @error('date') is-invalid @enderror datetimepicker" id="dateField" name="date">
                                @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Time</label>
                            <div class="@error('time') @else time-icon @enderror">
                                <input type="text" value="{{ old('time') }}" class="form-control @error('time') is-invalid @enderror timepicker" id="timeField" name="time">
                                @error('time')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea cols="30" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="display-block">Appointment Status</label>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="status" value="approved" class="form-check-input @error('status') is-invalid @enderror" {{ old('status') == 'approved' ? 'checked':'' }}>Approved
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="status" value="pending" class="form-check-input @error('status') is-invalid @enderror" {{ old('status') == 'pending' ? 'checked': (old('status') ? '': 'checked') }}>Pending
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="status" value="refused" class="form-check-input @error('status') is-invalid @enderror" {{ old('status') == 'refused' ? 'checked':'' }}>Rejected
                        </label>
                    </div>
                    @error('status')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Create Appointment</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('special-scripts')
    <script>
        $(document).ready(function(){
            $('#department').change(function(){
                var department = $(this).val();
                var infrastructure = $('#infrastructure').val();
                if(department){
                    $.ajax({
                    type:"GET",
                    url:"{{route('ajax.select.doctors')}}?department="+department+"&infrastructure="+infrastructure,
                    success:function(res){
                        var resLength = Object.keys(res).length;
                        $("#doctor").empty();
                        $("#doctor").append('<option value="">Select</option>');
                        if(res && (resLength > 0)){
                            $.each(res,function(key,value){
                                $("#doctor").append('<option value="'+key+'">'+value+'</option>');
                            });
                        }
                    }
                    });
                }else{
                    $("#doctor").empty();
                    $("#doctor").append('<option value="">Select</option>');
                }
            });
        });
    </script>
@endpush
