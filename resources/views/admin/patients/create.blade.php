@extends('layouts.admin')

@section('page')
    Patient
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Add Patient</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.patient.store') }}" method="POST">
                        @csrf
                      <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6">
                              <label for="firstNameField">First Name</label>
                              <input type="text" value="{{ old('first_name') }}" class="form-control @error('first_name') is-invalid @enderror" id="firstNameField" name="first_name" placeholder="Enter First Name">
                              @error('first_name')
                                  <div class="invalid-feedback">
                                    {{ $message }}
                                  </div>
                              @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastNameField">Last Name</label>
                                <input type="text" value="{{ old('last_name') }}" class="form-control @error('last_name') is-invalid @enderror" id="lastNameField" name="last_name" placeholder="Enter Last Name">
                                @error('last_name')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="emailField">Email</label>
                                <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="emailField" name="email" placeholder="Enter Email">
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
                                <input type="text" value="{{ old('telephone') }}" class="form-control @error('telephone') is-invalid @enderror" id="telephoneField" name="telephone" placeholder="Enter Telephone">
                                @error('telephone')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="dobField">Date of birth</label>
                                <input type="date" value="{{ old('date_of_birth') }}" class="form-control @error('date_of_birth') is-invalid @enderror" id="dobField" name="date_of_birth">
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
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected':'' }}>Male</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected':'' }}>Female</option>
                                </select>
                                @error('gender')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="nicField">National Identity Card</label>
                                <input type="text" value="{{ old('national_identity_card') }}" class="form-control @error('national_identity_card') is-invalid @enderror" id="nicField" name="national_identity_card" placeholder="Enter NIC No">
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
                                <label for="addressField">Address</label>
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="addressField">{{ old('address') }}</textarea>
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
                                    <div class="form-group col-md-12">
                                        <label for="infraField" >Current Infrastructure</label>
                                        <select name="infrastructure" class="form-control @error('infrastructure') is-invalid @enderror select2" style="width: 100%;" id="infraField">
                                            <option value="">--Select--</option>
                                            @foreach ($infrastructures as $id => $name)
                                                <option value="{{ $id }}" {{ $id == old('infrastructure') ? 'selected':'' }}>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                        @error('infrastructure')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="bloodGroup">Blood Group</label>
                                        <select class="form-control @error('blood_group') is-invalid @enderror select2" style="width: 100%;" name="blood_group" id="bloodGroup">
                                            <option value="">--Select--</option>
                                            <option value="O+" {{ old('blood_group') == 'O+' ? 'selected':'' }}>O+</option>
                                            <option value="A+" {{ old('blood_group') == 'A+' ? 'selected':'' }}>A+</option>
                                            <option value="B+" {{ old('blood_group') == 'B+' ? 'selected':'' }}>B+</option>
                                            <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected':'' }}>AB+</option>
                                            <option value="O-" {{ old('blood_group') == 'O-' ? 'selected':'' }}>O-</option>
                                            <option value="A-" {{ old('blood_group') == 'A-' ? 'selected':'' }}>A-</option>
                                            <option value="B-" {{ old('blood_group') == 'B-' ? 'selected':'' }}>B-</option>
                                            <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected':'' }}>AB-</option>
                                        </select>
                                        @error('blood_group')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="tensionField">Tension(Pa)</label>
                                        <input type="number" value="{{ old('tension') }}" class="form-control @error('tension') is-invalid @enderror" id="tensionField" name="tension" placeholder="Enter tension">
                                        @error('tension')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="heightField">Height(m)</label>
                                        <input type="number" value="{{ old('height') }}" class="form-control @error('height') is-invalid @enderror" id="heightField" name="height" placeholder="Enter height">
                                        @error('height')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="weightField">Weight(kg)</label>
                                        <input type="number" value="{{ old('weight') }}" class="form-control @error('weight') is-invalid @enderror" id="weightField" name="weight" placeholder="Enter weight">
                                        @error('weight')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="allergiesField" class="form-label">Allergies</label>
                                        <textarea class="form-control @error('allergies') is-invalid @enderror" id="allergiesField" name="allergies" rows="3">{{ old('allergies') }}</textarea>
                                        @error('allergies')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="noteField" class="form-label">Previous Note</label>
                                        <textarea class="form-control @error('previous_note') is-invalid @enderror" id="noteField" name="previous_note" rows="3">{{ old('previous_note') }}</textarea>
                                        @error('previous_note')
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
