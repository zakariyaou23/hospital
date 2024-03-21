@extends('layouts.admin')

@section('page')
    Staff
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Add Staff</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.staff.update',['staff' => $staff->id ]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="staff" value="{{ $staff->user_id }}">
                      <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                              <label for="firstNameField">First Name</label>
                              <input type="text" value="{{ old('first_name')??$user->first_name }}" class="form-control @error('first_name') is-invalid @enderror" id="firstNameField" name="first_name" placeholder="Enter First Name">
                              @error('first_name')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastNameField">Last Name</label>
                                <input type="text" value="{{ old('last_name')??$user->last_name }}" class="form-control @error('last_name') is-invalid @enderror" id="lastNameField" name="last_name" placeholder="Enter Last Name">
                                @error('last_name')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="emailField">Email</label>
                                <input type="email" value="{{ old('email')??$user->email }}" class="form-control @error('email') is-invalid @enderror" id="emailField" name="email" placeholder="Enter Email">
                                @error('email')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="passwordField">Password</label>
                                <input type="text" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="passwordField" name="password" placeholder="Enter Password">
                                @error('password')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="telephoneField">Telephone</label>
                                <input type="text" value="{{ old('telephone')??$user->telephone }}" class="form-control @error('telephone') is-invalid @enderror" id="telephoneField" name="telephone" placeholder="Enter Last Name">
                                @error('telephone')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dobField">Date of birth</label>
                                <input type="date" value="{{ old('date_of_birth')??$user->date_of_birth }}" class="form-control @error('date_of_birth') is-invalid @enderror" id="dobField" name="date_of_birth" placeholder="Enter Last Name">
                                @error('date_of_birth')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="genderField">Gender</label>
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror select2" id="genderField" style="width: 100%;">
                                    <option value="">--Select--</option>
                                    <option value="Male" {{ (old('gender')??$user->gender) == 'Male' ? 'selected':'' }}>Male</option>
                                    <option value="Female" {{ (old('gender')??$user->gender) == 'Female' ? 'selected':'' }}>Female</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="nicField">National Identity Card</label>
                                <input type="text" value="{{ old('national_identity_card')??$user->national_identity_card }}" class="form-control @error('national_identity_card') is-invalid @enderror" id="nicField" name="national_identity_card" placeholder="Enter NIC No">
                                @error('national_identity_card')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="subdivisionField" >Subdivision</label>
                                <select name="subdivision" class="form-control @error('subdivision') is-invalid @enderror select2" style="width: 100%;" id="subdivisionField">
                                    <option value="">--Select--</option>
                                    @foreach ($subdivisions as $id => $name)
                                        <option value="{{ $id }}" {{ $id == (old('subdivision')??$user->subdivision_id) ? 'selected':'' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('subdivision')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="addressField">Address</label>
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="addressField">{{ old('address')??$user->address }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-light">
                                <h3 class="card-title">More Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="infraField" >Infrastructure</label>
                                        <select name="infrastructure" class="form-control @error('infrastructure') is-invalid @enderror select2" style="width: 100%;" id="infraField">
                                            <option value="">--Select--</option>
                                            @foreach ($infrastructures as $id => $name)
                                                <option value="{{ $id }}" {{ $id == (old('infrastructure')??$user->infrastructure_id) ? 'selected':'' }}>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                        @error('infrastructure')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="department">Role</label>
                                        <select class="form-control @error('role') is-invalid @enderror select2" style="width: 100%;" name="role" id="role">
                                            <option value="" selected>--Select--</option>
                                            @foreach ($roles as $id => $name)
                                                <option value="{{ $id }}" {{ $id == (old('role')??$user->role_id) ? 'selected':'' }}>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="department">Department</label>
                                        <select class="form-control @error('department') is-invalid @enderror select2" style="width: 100%;" name="department" id="department">
                                            <option value="" selected>--Select--</option>
                                            @foreach ($departments as $id => $name)
                                                <option value="{{ $id }}" {{ $id == (old('department')??$staff->department_id) ? 'selected':'' }}>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                        @error('department')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="referenceField">Reference ID</label>
                                        <input type="number" value="{{ old('reference')??$staff->reference_id }}" class="form-control @error('reference') is-invalid @enderror" id="referenceField" name="reference" placeholder="Enter any referral ID">
                                        @error('reference')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="maritalStatusField">Marital Status</label>
                                        <select name="marital_status" class="form-control  @error('marital_status') is-invalid @enderror select2" style="width: 100%;" id="maritalStatusField">
                                            <option value="" selected>{{ __("Select") }}</option>
                                            <option value="Single" {{ (old('marital_status')??$staff->marital_status) == 'Single' ? 'selected':'' }}>{{ __("Single") }}</option>
                                            <option value="Married" {{ (old('marital_status')??$staff->marital_status) == 'Married' ? 'selected':'' }}>{{ __("Married") }}</option>
                                            <option value="Widowed" {{ (old('marital_status')??$staff->marital_status) == 'Widowed' ? 'selected':'' }}>{{ __("Widowed") }}</option>
                                            <option value="Separated" {{ (old('marital_status')??$staff->marital_status) == 'Separated' ? 'selected':'' }}>{{ __("Separated") }}</option>
                                            <option value="Not Specified" {{ (old('marital_status')??$staff->marital_status) == 'Not Specified' ? 'selected':'' }}>{{ __("Not Specified") }}</option>
                                        </select>
                                        @error('marital_status')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="joinField">Date of Joining</label>
                                        <input type="date" value="{{ old('joining_date')??$staff->joining_date }}" class="form-control @error('joining_date') is-invalid @enderror" id="joinField" name="joining_date" placeholder="Enter Last Name">
                                        @error('joining_date')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="salaryField">Salary (FCFA)</label>
                                        <input type="number" value="{{ old('salary')??$staff->salary }}" class="form-control @error('salary') is-invalid @enderror" id="salaryField" name="salary" placeholder="Enter Salary">
                                        @error('salary')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="contractField">Contract Type</label>
                                        <select name="contract_type" class="form-control @error('contract_type') is-invalid @enderror select2" style="width: 100%;" id="contractField">
                                            <option value="" selected>{{ __("Select") }}</option>
                                            <option value="Full Time" {{ (old('contract_type')??$staff->contract_type) == 'Full Time'?'selected':'' }}>Full Time</option>
                                            <option value="Part Time" {{ (old('contract_type')??$staff->contract_type) == 'Part Time'?'selected':'' }}>Part Time</option>
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
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
@endsection
