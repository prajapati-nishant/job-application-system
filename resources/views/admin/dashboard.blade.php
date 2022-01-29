@extends('layouts.app')

@section('content')
    <div class="w-full">
        <div class="mb-4">
            <div class="shadow-lg rounded-2xl p-4 bg-white dark:bg-gray-700 w-full">
                <div class="flex flex-col items-center text-center py-4">
                    <h1 class="md:prose-2xl">Welcome {{ Auth::user()->name }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
