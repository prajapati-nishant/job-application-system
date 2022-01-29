@extends('layouts.frontend')

@section('content')

    <div class="min-w-screen my-48 flex items-center justify-center py-5">
        <div class="w-full bg-white  px-5 py-16 md:py-24 text-gray-800">
            <div class="w-full max-w-6xl mx-auto">
                <div class="text-center max-w-xl mx-auto">
                    <h1 class="text-6xl md:text-7xl font-bold mb-5 text-gray-600">Job Portal</h1>
                    <h3 class="text-xl mb-5 font-light">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                    <a class="btn btn-primary btn-lg" href="{{ route('application.create') }}">
                        Apply Now
                    </a>
                </div>
            </div>
        </div>
    </div>


@endsection


