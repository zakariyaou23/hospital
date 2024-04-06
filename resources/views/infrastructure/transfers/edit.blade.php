@extends('layouts.infrastructure')
@section('page')
   Update Transfer
@endsection
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Update Transfer</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form action="{{ route('infrastructure.transfer.update',['transfer' => $transfer->id]) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Patient Name</label>
                            <select class="form-control select" disabled>
                                <option value="" selected>{{ $patients[$transfer->patient_id] }}</option>
                            </select>
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
                            <select class="form-control select" disabled>
                                <option value="" selected>{{ $infrastructures[$transfer->to_infrastructure_id] }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Note</label>
                    <textarea disabled cols="30" name="note" rows="4" class="form-control @error('note') is-invalid @enderror">{{ $transfer->note }}</textarea>
                </div>
                <div class="form-group">
                    <label class="display-block">Status</label>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="status" value="success" class="form-check-input @error('status') is-invalid @enderror" {{ (old('status')??$transfer->status) == 'success' ? 'checked':'' }}>Approve
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="status" value="pending" class="form-check-input @error('status') is-invalid @enderror" {{ (old('status')??$transfer->status) == 'pending' ? 'checked':'' }}>Pending
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" name="status" value="failed" class="form-check-input @error('status') is-invalid @enderror" {{ (old('status')??$transfer->status) == 'failed' ? 'checked':'' }}>Reject
                        </label>
                    </div>
                    @error('status')
                        <div class="text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Reason</label>
                    <textarea cols="30" name="reason" rows="4" class="form-control @error('reason') is-invalid @enderror">{{ old('reason') }}</textarea>
                    @error('reason')
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
