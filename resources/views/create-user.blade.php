@extends('layouts.app') <!-- Assuming you have a master layout using Bootstrap -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create User') }}</div>

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="first_name">{{ __('First Name') }}</label>
                            <input type="text" class="form-control" name="first_name" required>
                        </div>

                        <div class="form-group">
                            <label for="last_name">{{ __('Last Name') }}</label>
                            <input type="text" class="form-control" name="last_name" required>
                        </div>

                        <div class="form-group">
                            <label for="user_image">{{ __('User Image') }}</label>
                            <input type="file" class="form-control-file" name="user_image" required accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.querySelector('input[name="user_image"]').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const img = document.createElement('img');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                img.src = event.target.result;
                document.body.appendChild(img);
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
