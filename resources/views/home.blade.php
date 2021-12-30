@extends('layouts.app')


@section('content')

<div class="flex flex-row">
    <div class="basis-1/3">
        <div class="m-10 mt-20 basis-1/4">
            @include('components.expense-summary')
        </div>
        <div class="m-10 mt-20 basis-1/4">
            @include('components.expense-income-summary')
        </div>
    </div>
    
    <div class="ml-10 mr-10 basis-1/2">
    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}  
        </div>
    @endif
    <div class="md-10">
    @include('components.expense-add-form')
</div>
<div class="m-10"></div>
    @include('components.bottom-expenses-income')
    </div>
</div>



@endsection