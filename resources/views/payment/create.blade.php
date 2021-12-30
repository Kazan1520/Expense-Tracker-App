@extends('layouts.app')

@section('content')
    <form action="{{ route('payment.store') }}" method="POST">
        @csrf
        <h1 style="font-size: 40px">Tworzenie przelewu</h1>
        <label for="">Nazwa przelewu:</label>
        <input type="text" name="name" id="">
        <br><br>
        <label for="">Kwota przelewu</label>
        <input type="number" step="0.01" name="amount">
        <br><br>
        <label for="">Wybierz odbiorce przelewu:</label>
        <select name="payer" id="">
            @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
            {{-- <option value=""></option> --}}
        </select>
        <br><br>
        <button type="submit" style="background-color: greenyellow; padding: 15px; border-radius:15px">Wykonaj przelew</button>
    </form>
@endsection