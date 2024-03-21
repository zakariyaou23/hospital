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
                      <h3 class="card-title">Add Infrastructure</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.infrastructure.store') }}" method="POST">
                        @csrf
                      <div class="card-body row">
                        <div class="form-group col-md-6">
                          <label for="nameField">Name</label>
                          <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="nameField" name="name" placeholder="Enter name">
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
                                <option value="hospital" {{ old('type') == 'hospital' ? 'selected':'' }}>Hospital</option>
                                <option value="clinic" {{ old('type') == 'clinic' ? 'selected':'' }}>Clinic</option>
                                <option value="pharmacy" {{ old('type') == 'pharmacy' ? 'selected':'' }}>Pharmacy</option>
                                <option value="laboratory" {{ old('type') == 'laboratory' ? 'selected':'' }}>Laboratory</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emergencyPhone">Emergency Phone</label>
                            <input type="text" value="{{ old('emergency_number') }}" class="form-control @error('emergency_number') is-invalid @enderror" id="emergencyPhone" name="emergency_number" placeholder="Enter phone">
                            @error('emergency_number')
                                <div class="invalid-feedback">
                                  {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="locationField">Location</label>
                            <input type="text" value="{{ old('location') }}" class="form-control @error('location') is-invalid @enderror" id="locationField" name="location" placeholder="Enter phone">
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
                                    <option value="{{ $id }}" {{ $id == old('subdivision') ? 'selected':'' }}>{{ $name }}</option>
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
                        <button type="submit" class="btn btn-primary">Save</button>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
@endsection
