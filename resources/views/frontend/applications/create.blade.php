@extends('layouts.frontend')

@section('content')
    <div class="min-w-screen my-10 flex flex-col items-center justify-center py-5">
        <h3 class="text-4xl"> New Job Application</h3>
        <div class="flex justify-center items-center w-full lg:w-2/3">
            @livewire('common.applications.application-form')
        </div>
    </div>
@endsection
