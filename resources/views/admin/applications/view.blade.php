@extends('layouts.app')

@section('content')
    <div class="w-full px-10 my-5">
        <h3 class="text-xl font-semibold text-gray-800 mb-5">{{ $application->name }}</h3>
        <div class="card shadow-xl bg-base-100 application-form">
            <div class="card-body">
                @livewire('common.applications.view',['application'=>$application,'from_form'=>false])
            </div>
        </div>
    </div>
@endsection
