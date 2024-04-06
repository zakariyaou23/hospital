@extends('layouts.infrastructure')
@section('page')
   Initiate Transfer
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Initiate Transfer</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{ route('infrastructure.transfer.store') }}" method="POST">
                @csrf
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
                            <label>From</label>
                            <select class="form-control select" disabled>
                                <option value="" selected>{{ $infrastructures[auth()->user()->infrastructure_id] }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>To</label>
                            <select class="form-control @error('to_infrastructure') is-invalid @enderror select" name="to_infrastructure" id="to_infrastructure">
                                <option value="">Select</option>
                                @foreach ($infrastructures as $id => $name)
                                    @if ($id != auth()->user()->infrastructure_id)
                                        <option value="{{ $id }}" {{ $id == old('to_infrastructure') ? 'selected':'' }}>{{ $name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('to_infrastructure')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Note</label>
                    <textarea cols="30" name="note" rows="4" class="form-control @error('note') is-invalid @enderror">{{ old('note') }}</textarea>
                    @error('note')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
