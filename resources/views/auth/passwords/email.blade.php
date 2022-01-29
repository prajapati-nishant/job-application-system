@extends('layouts.frontend')

@section('content')
    <section class="flex items-center my-28 md:my-60  justify-center text-center">
        <div class="w-full px-5 md:w-6/12">
            <div class="card shadow-2xl bg-base-100">
                <div class="card-header">
                    <h2 class="mt-3 mb-0 text-2xl font-bold text-primary">
                        Reset Password
                    </h2>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            <div class="flex-1 text-left">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <label>{{ session('status') }}</label>
                            </div>
                        </div>
                    @endif
                    <form id="forgotPassword" method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Email</span>
                            </label>
                            <input class="input input-bordered @error('email') input-error @enderror" id="email" type="email"
                                   name="email"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus/>
                            @error('email')
                                <label class="label-text-alt text-red-600 text-left" role="alert">
                                    <strong>{{ $message }}</strong>
                                </label>
                            @enderror
                        </div>
                        <div class="form-control mt-6">
                            <button type="button"  id="forgotPasswordBtn" class="btn btn-primary">
                                Send Password Reset Link
                            </button>
                        </div>
                        <div class="form-control mt-5">
                            <a class="text-primary" href="{{ route('login') }}">
                                Back to Login
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script src="{{ asset('js/auth.js') }}"></script>
    <script>
        $(document).ready(function () {
            Auth.forgotPassword();
        });
    </script>
@endpush
