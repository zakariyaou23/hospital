@extends('layouts.infrastructure')
@section('page')
    Add Doctor
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Doctor</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{ route('infrastructure.doctor.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="firstNameField">First Name <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" id="firstNameField" name="first_name">
                            @error('first_name')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="lastNameField">Last Name</label>
                            <input type="text"  value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" id="lastNameField" name="last_name">
                            @error('last_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="emailField">Email <span class="text-danger">*</span></label>
                            <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="emailField" name="email">
                            @error('email')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label for="passwordField">Password <span class="text-danger">*</span></label>
                        <input type="text" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="passwordField" name="password">
                        @error('password')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="dobField">Date of Birth <span class="text-danger">*</span></label>
                            <div class="@error('date_of_birth') @else cal-icon @enderror">
                                <input type="text" value="{{ old('date_of_birth') }}" class="form-control @error('date_of_birth') is-invalid @enderror datetimepicker" id="dobField" name="date_of_birth">
                                @error('date_of_birth')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="gen-label">Gender <span class="text-danger">*</span></label>
                            <div class="form-check-inline ">
                                <label class="form-check-label">
                                    <input type="radio" name="gender" value="Male" class="form-check-input @error('gender') is-invalid @enderror" {{ old('gender') == 'Male' ? 'checked':'' }}>Male
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="gender" value="Female" class="form-check-input @error('gender') is-invalid @enderror" {{ old('gender') == 'Female' ? 'checked':'' }}>Female
                                </label>
                            </div>
                            @error('gender')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="nicField">National Identity Card No</label>
                                <input type="text" value="{{ old('national_identity_card') }}" class="form-control @error('national_identity_card') is-invalid @enderror" id="nicField" name="national_identity_card">
                                @error('national_identity_card')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="subdivisionField" >Subdivision <span class="text-danger">*</span></label>
                                <select name="subdivision" class="form-control @error('subdivision') is-invalid @enderror select2" style="width: 100%;" id="subdivisionField">
                                    <option value="">--Select--</option>
                                    @foreach ($subdivisions as $id => $name)
                                        <option value="{{ $id }}" {{ $id == old('subdivision') ? 'selected':'' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('subdivision')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="addressField">Address <span class="text-danger">*</span></label>
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="addressField">{{ old('address') }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="telephoneField">Telephone <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('telephone') }}" class="form-control @error('telephone') is-invalid @enderror" id="telephoneField" name="telephone">
                            @error('telephone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-light">
                        <h3 class="card-title">More Details</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="department">Department <span class="text-danger">*</span></label>
                                <select class="form-control @error('department') is-invalid @enderror select2" style="width: 100%;" name="department" id="department">
                                    <option value="" selected>--Select--</option>
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
                            <div class="form-group col-md-6">
                                <label for="referenceField">Reference ID</label>
                                <input type="number" value="{{ old('reference') }}" class="form-control @error('reference') is-invalid @enderror" id="referenceField" name="reference" placeholder="Enter any referral ID">
                                @error('reference')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="maritalStatusField">Marital Status <span class="text-danger">*</span></label>
                                <select name="marital_status" class="form-control  @error('marital_status') is-invalid @enderror select2" style="width: 100%;" id="maritalStatusField">
                                    <option value="" selected>{{ __("Select") }}</option>
                                    <option value="Single" {{ old('marital_status') == 'Single' ? 'selected':'' }}>{{ __("Single") }}</option>
                                    <option value="Married" {{ old('marital_status') == 'Married' ? 'selected':'' }}>{{ __("Married") }}</option>
                                    <option value="Widowed" {{ old('marital_status') == 'Widowed' ? 'selected':'' }}>{{ __("Widowed") }}</option>
                                    <option value="Separated" {{ old('marital_status') == 'Separated' ? 'selected':'' }}>{{ __("Separated") }}</option>
                                    <option value="Not Specified" {{ old('marital_status') == 'Not Specified' ? 'selected':'' }}>{{ __("Not Specified") }}</option>
                                </select>
                                @error('marital_status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="joinField">Date of Joining <span class="text-danger">*</span></label>
                                <div class="@error('joining_date') @else cal-icon @enderror">
                                    <input type="text" value="{{ old('joining_date') }}" class="form-control @error('joining_date') is-invalid @enderror datetimepicker" id="dobField" name="joining_date">
                                    @error('joining_date')
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="salaryField">Salary (FCFA) <span class="text-danger">*</span></label>
                                <input type="number" value="{{ old('salary') }}" class="form-control @error('salary') is-invalid @enderror" id="salaryField" name="salary" placeholder="Enter Salary">
                                @error('salary')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="contractField">Contract Type <span class="text-danger">*</span></label>
                                <select name="contract_type" class="form-control @error('contract_type') is-invalid @enderror select2" style="width: 100%;" id="contractField">
                                    <option value="">--{{ __("Select") }}--</option>
                                    <option value="Full Time" {{ old('contract_type') == 'Full Time'?'selected':'' }}>Full Time</option>
                                    <option value="Part Time" {{ old('contract_type') == 'Part Time'?'selected':'' }}>Part Time</option>
                                </select>
                                @error('contract_type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
