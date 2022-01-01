@extends('layouts.app')

@section('content')
@if(session()->get('success'))
<div class="alert alert-success">
{{ session()->get('success') }}  
</div>
@endif
    @include('expense.list')
@endsection