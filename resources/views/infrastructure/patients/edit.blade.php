@extends('layouts.infrastructure')
@section('page')
    Edit Patient
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Edit Patient</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{ route('infrastructure.patient.update',['patient' => $patient->id ]) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="patient" value="{{ $user->id }}">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="firstNameField">First Name <span class="text-danger">*</span></label>
                            <input type="text" value="{{ old('first_name')??$user->first_name }}" class="form-control @error('first_name') is-invalid @enderror" id="firstNameField" name="first_name">
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
                            <input type="text"  value="{{ old('last_name')??$user->last_name }}" class="form-control @error('last_name') is-invalid @enderror" id="lastNameField" name="last_name">
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
                            <input type="email" value="{{ old('email')??$user->email }}" class="form-control @error('email') is-invalid @enderror" id="emailField" name="email">
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
                            <div class="cal-icon">
                                <input type="text" value="{{ old('date_of_birth')??$user->date_of_birth }}" class="form-control @error('date_of_birth') is-invalid @enderror datetimepicker" id="dobField" name="date_of_birth">
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
                                    <input type="radio" name="gender" value="Male" class="form-check-input is-invalid" {{ (old('gender')??$user->gender) == 'Male' ? 'checked':'' }}>Male
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="gender" value="Female" class="form-check-input @error('gender') is-invalid @enderror" {{ (old('gender')??$user->gender) == 'Female' ? 'checked':'' }}>Female
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
                                <input type="text" value="{{ old('national_identity_card')??$user->national_identity_card }}" class="form-control @error('national_identity_card') is-invalid @enderror" id="nicField" name="national_identity_card">
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
                                <label for="addressField">Address <span class="text-danger">*</span></label>
                                <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="addressField">{{ old('address')??$user->address }}</textarea>
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
                            <input type="text" value="{{ old('telephone')??$user->telephone }}" class="form-control @error('telephone') is-invalid @enderror" id="telephoneField" name="telephone">
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
                                <label for="bloodGroup">Blood Group</label>
                                <select class="form-control @error('blood_group') is-invalid @enderror select2" style="width: 100%;" name="blood_group" id="bloodGroup">
                                    <option value="">--Select--</option>
                                    <option value="O+" {{ (old('blood_group')??$patient->blood_group) == 'O+' ? 'selected':'' }}>O+</option>
                                    <option value="A+" {{ (old('blood_group')??$patient->blood_group) == 'A+' ? 'selected':'' }}>A+</option>
                                    <option value="B+" {{ (old('blood_group')??$patient->blood_group) == 'B+' ? 'selected':'' }}>B+</option>
                                    <option value="AB+" {{ (old('blood_group')??$patient->blood_group) == 'AB+' ? 'selected':'' }}>AB+</option>
                                    <option value="O-" {{ (old('blood_group')??$patient->blood_group) == 'O-' ? 'selected':'' }}>O-</option>
                                    <option value="A-" {{ (old('blood_group')??$patient->blood_group) == 'A-' ? 'selected':'' }}>A-</option>
                                    <option value="B-" {{ (old('blood_group')??$patient->blood_group) == 'B-' ? 'selected':'' }}>B-</option>
                                    <option value="AB-" {{ (old('blood_group')??$patient->blood_group) == 'AB-' ? 'selected':'' }}>AB-</option>
                                </select>
                                @error('blood_group')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tensionField">Tension(mm Hg) <span class="text-danger">*</span></label>
                                <input type="text" value="{{ old('tension')??$patient->tension }}" class="form-control @error('tension') is-invalid @enderror" id="tensionField" name="tension">
                                @error('tension')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="heightField">Height(m) <span class="text-danger">*</span></label>
                                <input type="number" value="{{ old('height')??$patient->height }}" class="form-control @error('height') is-invalid @enderror" id="heightField" name="height">
                                @error('height')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="weightField">Weight(kg) <span class="text-danger">*</span></label>
                                <input type="number" value="{{ old('weight')??$patient->weight }}" class="form-control @error('weight') is-invalid @enderror" id="weightField" name="weight">
                                @error('weight')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="allergiesField" class="form-label">Allergies <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('allergies') is-invalid @enderror" id="allergiesField" name="allergies" rows="3">{{ old('allergies')??$patient->allergies }}</textarea>
                                @error('allergies')
                                    <div class="invalid-feedback">
                                      {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="noteField" class="form-label">Previous Note</label>
                                <textarea class="form-control @error('previous_note') is-invalid @enderror" id="noteField" name="previous_note" rows="3">{{ old('previous_note')??$patient->previous_note }}</textarea>
                                @error('previous_note')
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
