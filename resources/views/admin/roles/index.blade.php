@extends('layouts.admin')

@section('page')
    Roles
@endsection
@section('content')
    <div class="container-fluid">
        @include('alerts.messages')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Roles</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="dataTable" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $role)
                                    <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.role.edit', ['role' => $role->id]) }}"
                                                    class="text-primary w-50 mr-2"><i class="fas fa-edit"></i></a>
                                                <a href="" data-toggle="modal"
                                                    data-target="#delete{{ $role->id }}" class="text-danger w-50"><i
                                                        class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="delete{{ $role->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel1" data-backdrop="static" data-keyboard="false">
                                        <div class="modal-dialog modal-dialog-centered " role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"><i class="fas fa-trash"></i>
                                                        {{ __('Delete') }}: {{ $role->name }}</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST"
                                                    action="{{ route('admin.role.destroy', ['role' => $role->id]) }}">
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
                                        <td colspan="2">No roles found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
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
