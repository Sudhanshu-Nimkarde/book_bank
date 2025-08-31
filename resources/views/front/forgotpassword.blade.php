@extends('front.layouts.app')

@section('main')
<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>

        @if(Session::has('success'))
        <div class="alert alert-success">
            <p class="mb-0 pb-0">{{ Session::get('success') }}</p>
        </div>
        @endif

        @if(Session::has('error'))
        <div class="alert alert-danger">
            <p class="mb-0 pb-0">{{ Session::get('error') }}</p>
        </div>
        @endif

        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Forgot Password</h1>
                    <form action="{{ route('account.processforgotpassword') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="mb-2">Enter Your Email*</label>
                            <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="example@example.com">
                            @error('email')
                                <p class="invalid-feedback">{{ $message }}</p>
                            @enderror
                        </div> 
                        <div class="text-center">
                            <p>Click on send button to get password reset link</p>
                        </div>
                        <div class="justify-content-center d-flex">
                            <button type="submit" class="btn btn-primary mt-2">SEND</button>
                        </div>
                        <div class="mt-4 text-center">
                            <p>Already have an account? <a  href="{{ route('account.login') }}">Back to Login</a></p>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
        <div class="py-lg-5">&nbsp;</div>
    </div>
</section>
@endsection

{{-- @extends('front.layouts.app')

@section('main')
<section class="section-5">
    <div class="container my-5">
        <div class="py-lg-2">&nbsp;</div>

        @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p class="mb-0 pb-0">{{ $error }}</p>
            @endforeach
        </div>
        @endif

        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card shadow border-0 p-5">
                    <h1 class="h3">Reset Password</h1>
                    <form action="{{ route('password.update') }}" method="post">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <label for="email" class="mb-2">Email Address</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $email ?? old('email') }}" readonly>
                        </div> 

                        <div class="mb-3">
                            <label for="password" class="mb-2">New Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="mb-2">Confirm New Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        </div>

                        <div class="justify-content-center d-flex">
                            <button type="submit" class="btn btn-primary mt-2">Reset Password</button>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
        <div class="py-lg-5">&nbsp;</div>
    </div>
</section>
@endsection --}}
