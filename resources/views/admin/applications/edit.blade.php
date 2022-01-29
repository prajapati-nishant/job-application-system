@extends('layouts.app')

@section('content')
    <div class="w-full px-10 my-5">
        <h3 class="text-4xl"> Edit Job Application</h3>
        <div class="flex justify-center items-center w-full">
            @livewire('common.applications.application-form',['id'=>$id])
        </div>
    </div>
@endsection
