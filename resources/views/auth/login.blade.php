@extends('layouts.frontend')


@section('content')

    <section class="container my-16 md:my-48">
        <div class="grid grid-cols-1 lg:grid-cols-12 items-center">
            <div class="lg:col-start-4 lg:col-span-6 text-center px-5 lg:px-10">
                <div class="card shadow-2xl bg-base-100">
                    <div class="card-header">
                        <h2 class="mt-3 mb-0 text-2xl font-bold text-primary">
                            Administrator Login
                        </h2>
                    </div>
                    <div class="card-body">
                        <form id="login" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-control">
                                <label class="label">
                                    <span class="label-text">Email</span>
                                </label>
                                <input class="input input-bordered @error('email') input-error @enderror" id="email"
                                       type="email" name="email" value="{{ old('email') }}"
                                       autocomplete="email" autofocus/>
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
                                <input class="input input-bordered @error('password') input-error @enderror"
                                       id="password" type="password" name="password"
                                       autocomplete="current-password">
                                @error('password')
                                <label class="label-text-alt text-red-600 text-left" role="alert">
                                    <strong>{{ $message }}</strong>
                                </label>
                                @enderror
                            </div>
                            <div class="form-control">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <label class="cursor-pointer label">
                                            <input type="checkbox" name="remember" id="remember"
                                                   {{ old('remember') ? 'checked' : '' }}
                                                   class="checkbox checkbox-primary">
                                            <span class="checkbox-mark"></span>
                                            <label for="remember" class="ml-2 block text-sm text-gray-900">
                                               Remember Me
                                            </label>
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <div class="text-sm">
                                            <a class="font-medium text-primary" href="{{ route('password.request') }}">
                                                Forgot Your Password?
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-control mt-6">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="{{ asset('js/auth.js') }}"></script>
    <script>
        $(document).ready(function () {
            Auth.login();
        });
    </script>
@endpush
