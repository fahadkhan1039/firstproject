@extends('admin.layout.app')
@section('title', 'Create New User')
@section('content')
    <style type="text/css">
        .custom-form-group label {
            font-weight: bold;
            color: #333;
        }

        .custom-btn {
            background-color: #4CAF50;
            color: white;
        }

        .custom-btn:hover {
            background-color: #45a049;
        }

        .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }
    </style>

    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="card-title mb-0">Add New User</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.data') }}">

                        @csrf
                        <div class="row">
                            <!-- Name Field -->
                            <div class="col-md-6">
                                <div class="form-group custom-form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter your name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Email Field -->
                            <div class="col-md-6">
                                <div class="form-group custom-form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                             <!-- Phone Number Field -->
                             <div class="col-md-12 my-3">
                                <div class="form-group custom-form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter your phone number" value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Password Field -->
                            <div class="col-md-6">
                                <div class="form-group custom-form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">
                                    @error('password')
                                        <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Confirm Password Field -->
                            <div class="col-md-6">
                                <div class="form-group custom-form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Re-enter your password">
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div class="col-12 mt-3">
                                <button type="submit" class="btn custom-btn w-100">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#4CAF50',
        });
    @endif

    @if(session('info'))
        Swal.fire({
            icon: 'info',
            title: 'Info!',
            text: '{{ session('info') }}',
            confirmButtonColor: '#3085d6',
        });
    @endif
</script>
@endpush
