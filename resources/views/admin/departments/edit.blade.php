@extends('layouts.admin')

@section('page')
    Department
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Edit Department</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.department.update',['department' => $department->id ]) }}" method="POST">
                        @csrf
                        @method('PUT')
                      <div class="card-body">
                        <div class="form-group">
                          <label for="nameField">Name</label>
                          <input type="text" value="{{ old('name')??$department->name }}" class="form-control @error('name') is-invalid @enderror" id="nameField" name="name" placeholder="Enter department">
                          @error('name')
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
