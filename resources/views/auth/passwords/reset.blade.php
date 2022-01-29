@extends('layouts.frontend')

@section('content')
    <section class="flex items-center my-24 md:my-48 justify-center text-center">
        <div class="w-full px-5 md:w-6/12">
            <div class="card shadow-2xl bg-base-100">
                <div class="card-header">
                    <h2 class="mt-3 mb-0 text-2xl font-bold text-primary">
                        {{ __('Reset Password') }}
                    </h2>
                </div>
                <div class="card-body">
                    <form id="resetPassword" method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Email Address</span>
                            </label>
                            <input class="input input-bordered @error('email') input-error @enderror" id="email"
                                   type="email"
                                   name="email"
                                   value="{{ $email ?? old('email') }}" required autocomplete="email"/>
                            @error('email')
                            <label class="label-text-alt text-red-600 text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </label>
                            @enderror
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Password</span>
                            </label>
                            <input class="input input-bordered @error('password') input-error @enderror" id="password"
                                   type="password"
                                   name="password" required autocomplete="current-password">
                            @error('password')
                            <label class="label-text-alt text-red-600 text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </label>
                            @enderror
                        </div>
                        <div class="form-control">
                            <label class="label">
                                <span class="label-text">Confirm Password</span>
                            </label>
                            <input class="input input-bordered @error('password_confirmation') input-error @enderror"
                                   id="password_confirmation"
                                   type="password"
                                   name="password_confirmation" required autocomplete="current-password">
                            @error('password_confirmation')
                            <label class="label-text-alt text-red-600 text-left" role="alert">
                                <strong>{{ $message }}</strong>
                            </label>
                            @enderror
                        </div>
                        <div class="form-control mt-6">
                            <button type="button" id="resetPasswordBtn" class="btn btn-primary">
                                Reset Password
                            </button>
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
            Auth.resetPassword();
        });
    </script>
@endpush
