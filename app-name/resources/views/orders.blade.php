<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Zamówienia</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .title{
            text-align: center;
            background-color: transparent
        }
        .table-container{
            background-color: #212121;
            margin: 3%;
            color: white;
            padding: 2vw;
        }
        table{
            width: 100%;
            background-color: #3D3D3D;
        }
        table, td, th{
            border-width: thin;
            border-color: white;
            text-align: center;
        }
        .box-footer a:hover {
            background-color: white;
        }

    </style>
</head>
<body>
@include('layouts.navigation')
<h2></h2>
<div class="table-container shadow-sm">
    <div class="title">
        <h2 style="font-size: xx-large">Złożone zamówienia</h2>
    </div>
</div>
@auth
    <div class="table-container shadow-sm">
        @php
            $temp = 0;
        @endphp
        @foreach($orders as $order)
            @if($order->user_id == \Auth::user()->id)
                @php
                    $temp = 1;
                @endphp
                @break;
            @endif
        @endforeach
        @if($temp == 1)
            <table data-toggle="table">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Data</th>
                    <th>Gry</th>
                    <th>Email</th>
                    <th>Płatność</th>
                    <th>Edytuj/Anuluj</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    @if($order->user_id == \Auth::user()->id)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                @foreach($order->gry as $index => $gra)
                                    {{ $gra }}
                                    @if($index < count($order->gry) - 1)
                                        ,
                                    @endif
                                @endforeach
                            </td>

                            <td>{{ $order->email }}</td>
                            <td>{{ $order->platnosc }}</td>
                            <td>
                                <div class="box-footer przyciski">
                                    <a href="{{ route('editorder', ['id' => $order->id]) }}" class="btn btn-success " style="width: 100%; background-color: #FFB302">Edit</a>
                                    <a href="{{ route('deleteorder', ['id' => $order->id]) }}" onclick="return confirm('Are you really want to delete this order?')" class="btn btn-danger succ" style="width: 100%">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        @else
            <b>Nie złożyłeś jeszcze żadnego zamówienia.</b>
        @endif
    </div>
    <br>
    @endauth
    </div>

    @guest
        <div class="table-container shadow-sm">
            <b>Zaloguj się, aby przejrzeć swoje zamówienia!</b>
        </div>
    @endguest
</body>
</html>
