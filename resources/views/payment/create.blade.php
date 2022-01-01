@extends('layouts.app')

@section('content')
<div class="sm:mt-0">
  <div class="md:col-span-1">
    <div class="px-4 sm:px-0 w-full">
@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <div class="mt-5 md:mt-0 md:col-span-2">
      <h3 class="m-6 text-4xl font-medium leading-6 text-gray-900 text-center">Request a payment</h3>
    <form action="{{ route('payment.store') }}" method="POST" class="w-1/3 mx-auto">
        @csrf
        <div class="shadow sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6 rounded-2xl">
            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-6 sm:col-span-4">
        <label for="">Name:</label>
        <input type="text" name="name" id=""class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        <br><br>
        <label for="">Amount</label>
        <input type="number" step="0.01" name="amount"class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        <br><br>
        <label for="">Receiver</label>
        <select name="payee" id=""class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
            {{-- <option value=""></option> --}}
        </select>
        <br><br>
        <div class="text-center">   <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-black bg-gray-300 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Request a payment</button>
        </div>
            </div></div></div></div>
      </form>
    </div></div></div>
@endsection