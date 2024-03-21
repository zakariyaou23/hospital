@if (session('success'))
    <div class="alert alert-card alert-success text-center mt-1" role='alert'>
        <strong class="text-capitalize">{{ session('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('info'))
    <div class="alert alert-card alert-info text-center mt-1" role='alert'>
        <strong class="text-capitalize">{{ session('info') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-card alert-danger mt-1" role='alert'>
        <strong class="text-capitaize">{{ session('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
