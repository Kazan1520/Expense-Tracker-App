@extends('layouts.app')

@section('content')
    <div>
        <div class="to-me" style="background-color: rgb(250, 228, 167); border-radius:15px; width: 50%; margin: 15px; ">
            <h2 style="font-size: 40px; justify-content:center">Płatności wykonane do mnie</h2>
            @if (isset($toMe) && $toMe->count())
                <table class="table table-bordered">
                    <tr>
                        <th width="80px">Lp.</th>
                        <th>Nazwa</th>
                        <th>Status</th>
                        <th>Kwota</th>
                        <th>Termin należności</th>
                    </tr>
                    @foreach($toMe as $item)
                        <tr
                        @if ($item->status == 'waiting')
                            style="color: orange;"
                        @endif
                        @if ($item->status == 'approved')
                            style="color: green;"
                        @endif
                        @if ($item->status == 'rejected')
                            style="color: red;"
                        @endif
                        >
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->amount }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                    @endforeach 
                </table>              
            @else
                Nie otrzymano żadnego przelewu
            @endif
        </div>

        <div class="to-me" style="background-color: rgb(250, 228, 167); border-radius:15px; width: 50%; margin: 15px; ">
            <h2 style="font-size: 40px; justify-content:center">Płatności wykonane przeze mnie</h2>
            @if (isset($fromMe) && $fromMe->count())
                <table class="table table-bordered">
                    <tr>
                        <th width="80px">Lp.</th>
                        <th>Nazwa</th>
                        <th>Status</th>
                        <th>Kwota</th>
                        <th>Termin należności</th>
                    </tr>
                    @foreach($fromMe as $item)
                    <tr
                    @if ($item->status == 'waiting')
                        style="color: orange;"
                    @endif
                    @if ($item->status == 'approved')
                        style="color: green;"
                    @endif
                    @if ($item->status == 'rejected')
                        style="color: red;"
                    @endif
                    >
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->status }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->created_at }}</td>
                    </tr>
                    @endforeach
                </table>
            @else
                Nie wykonałeś żadnego przelewy, wykonaj swój pierwszy przelew!
            @endif
            
                
            <div style="margin: 20px">
                <a href="{{ route('payment.create') }}" style="background-color: greenyellow; padding:15px; border-radius:20px;">Wykonaj płatność</a>

            </div>
            {{-- <button href="{{ route('payment.create') }}" style="background-color: greenyellow; padding:15px; border-radius:20px; margin: 10px">Wykonaj płatność</button> --}}
        </div>
    </div>
@endsection
