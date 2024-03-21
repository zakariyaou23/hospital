@extends('layouts.admin')
@section('page')
Staffs
@endsection

@section('content')
    <div class="container-fluid">
        @include('alerts.messages')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Staffs</h3>
                        <div class="card-tools">
                            <a href="/admin/staff/create" class="btn btn-tool btn-primary"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Search criterias</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
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
                                    <div class="col-md-6">
                                        <select name="infrastructure" class="form-control @error('infrastructure') is-invalid @enderror select2" id="infrastructureField" style="width: 100%;">
                                            <option value="">--Select--</option>
                                        </select>
                                        @error('infrastructure')
                                            <div class="invalid-feedback">
                                              {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table id="dataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Infrastructure</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($staffs as $staff)
                                    <tr>
                                        <td>{{ $staff->first_name }} {{ $staff->last_name }}</td>
                                        <td>{{ $staff->role_name }}</td>
                                        <td>{{ $staff->address }}</td>
                                        <td>{{ $staff->telephone }}</td>
                                        <td>{{ $staff->email }}</td>
                                        <td>{{ $staff->department_name }}</td>
                                        <td>{{ $staff->infrastructure_name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.staff.edit', ['staff' => $staff->id]) }}"
                                                    class="text-primary w-50 mr-2"><i class="fas fa-edit"></i></a>
                                                <a href="" data-toggle="modal"
                                                    data-target="#delete{{ $staff->id }}" class="text-danger w-50"><i
                                                        class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="delete{{ $staff->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog modal-dialog-centered " role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><i class="fas fa-trash"></i>
                                                        {{ __('Delete') }}: {{ $staff->first_name }}</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('admin.staff.destroy', ['staff' => $staff->user_id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-body p-4">
                                                        <p>Are you sure ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light"
                                                            data-dismiss="modal">No</button>
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fas fa-trash"></i> Yes, Proceed</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No staffs found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Department</th>
                                    <th>Infrastructure</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
@push('special-scripts')
    <script>
        $(function() {
            $('#dataTable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
