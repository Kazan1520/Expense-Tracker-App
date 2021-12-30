@extends('layouts.app')

@section('content')
@if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
<div class="flex flex-row ">
    <div class="m-20 mr-10 w-full">@include('payment.to-me')</div>
    <div class="m-20 ml-10 w-full" >@include('payment.from-me')</div>
            {{-- <button href="{{ route('payment.create') }}" style="background-color: greenyellow; padding:15px; border-radius:20px; margin: 10px">Wykonaj płatność</button> --}}
        </div>
    </div>
</div>
@endsection
