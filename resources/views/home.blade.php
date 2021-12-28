@extends('layouts.app')


@section('content')
    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}  
        </div>
    @endif
    @include('components.expense-add-form')

    <h1>Twoje wydatki</h1>
    @foreach ($expenses as $expense)
    <ul>
        <li>{{ $expense->name }}</li>
    </ul>
    
    @endforeach
    <h1>Twoje wpływy</h1>
    @foreach ($incomes as $income)
    <ul>
        <li>{{ $income->name }}</li>
    </ul>
    
        
    @endforeach
@endsection