@extends('layouts.infrastructure')
@section('page')
    Edit Department
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Edit Department</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{ route('infrastructure.department.update',['department' => $department->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Department Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name')??$department->name }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea cols="30"name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description')??$department->description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Update Department</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
