@extends('layouts.admin')

@section('page')
    Infrastructure
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Edit Infrastructure</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.infrastructure.update',['infrastructure' => $infrastructure->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                      <div class="card-body row">
                        <div class="form-group col-md-6">
                          <label for="nameField">Name</label>
                          <input type="text" value="{{ old('name')??$infrastructure->name }}" class="form-control @error('name') is-invalid @enderror" id="nameField" name="name" placeholder="Enter name">
                          @error('name')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                          @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="typeField">Type</label>
                            <select name="type" class="form-control @error('type') is-invalid @enderror select2" id="typeField" style="width: 100%;">
                                <option value="">--Select--</option>
                                <option value="hospital" {{ (old('type')??$infrastructure->type) == 'hospital' ? 'selected':'' }}>Hospital</option>
                                <option value="clinic" {{ (old('type')??$infrastructure->type) == 'clinic' ? 'selected':'' }}>Clinic</option>
                                <option value="pharmacy" {{ (old('type')??$infrastructure->type) == 'pharmacy' ? 'selected':'' }}>Pharmacy</option>
                                <option value="laboratory" {{ (old('type')??$infrastructure->type) == 'laboratory' ? 'selected':'' }}>Laboratory</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emergencyPhone">Emergency Phone</label>
                            <input type="text" value="{{ old('emergency_number')??$infrastructure->emergency_number }}" class="form-control @error('emergency_number') is-invalid @enderror" id="emergencyPhone" name="emergency_number" placeholder="Enter phone">
                            @error('emergency_number')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="locationField">Location</label>
                            <input type="text" value="{{ old('location')??$infrastructure->location }}" class="form-control @error('location') is-invalid @enderror" id="locationField" name="location" placeholder="Enter location">
                            @error('location')
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
                                    <option value="{{ $id }}" {{ $id == (old('subdivision')??$infrastructure->subdivision_id) ? 'selected':'' }}>{{ $name }}</option>
                                @endforeach
                            </select>
                            @error('subdivision')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
@endsection
