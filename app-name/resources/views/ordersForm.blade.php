@php
    $selectedGame = request('game');
@endphp

    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Złóż zamówienie</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color: #181818;
            color: white;
            font-family: 'figtree', sans-serif;
        }

        .title {
            text-align: center;
            background-color: transparent;
        }

        .table-container {
            background-color: #212121;
            border-radius: 10px;
            padding: 20px;
            margin: 3%;
        }

        input {
            margin-bottom: 10px;
            color: #181818;
        }
    </style>
</head>
<body>
@include('layouts.navigation')
<div class="py-12" style="border-radius: 10px">
<div class="table-container shadow-sm" style="margin: 3%; border-radius: 10px">
    <br>
    <div class="title">
        <h2 style="font-size: xx-large">Make an order - {{ $gameName }}</h2>
    </div>
    <br>
</div>
<h2></h2>
@auth
        <div class="table-container shadow-sm" style="display: flex; padding: 5%; margin: 3%; border-radius: 10px">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="box box-primary">
                <form role="form"  action="{{ route('saveorder') }}" id="comment-form" method="post" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <div class="box">
                        <div class="box-body">
                            <!--<div class="form-group{{ $errors->has('message')?'has-error':'' }}" id="roles_box">-->
                            <div id="roles_box" style="display: flex; flex-wrap: wrap; width: 100%">

                                <h5>Personal information:</h5>
                                <div class="blokInput" style="display: flex; justify-content: space-between; width: 100%">
                                    <div class="form-group row">
                                        <label for="imie_i_nazwisko" class="col-sm-12 col-form-label">Full Name</label>
                                        <div class="col-sm-12">
                                            <input style="width: 100%" type="text" class="form-control" id="imie_i_nazwisko" name="imie_i_nazwisko" placeholder="Jan Kowalski" required pattern="[A-Za-ząćęłńóśźżĄĆĘŁŃÓŚŹŻ ]+" title="Enter a valid full name">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="ulica_i_nr_domu" class="col-sm-12 col-form-label">Address</label>
                                        <div class="col-sm-12">
                                            <input style="width: 100%" type="text" class="form-control" id="ulica_i_nr_domu" name="ulica_i_nr_domu" placeholder="Nadbystrzycka 44A" required title="Enter a valid address">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="kod_pocztowy" class="col-sm-12 col-form-label">Postal code</label>
                                        <div class="col-sm-12">
                                            <input style="width: 100%" type="text" class="form-control" id="kod_pocztowy" name="kod_pocztowy" placeholder="20-081" required pattern="[0-9]{2}-[0-9]{3}" title="Enter a valid postal code in the format XX-XXX">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="miejscowosc" class="col-sm-12 col-form-label">City</label>
                                        <div class="col-sm-12">
                                            <input style="width: 100%" type="text" class="form-control" id="miejscowosc" name="miejscowosc" placeholder="Lublin" required pattern="[A-Za-ząćęłńóśźżĄĆĘŁŃÓŚŹŻ ]+" title="Enter a valid city name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="telefon" class="col-sm-12 col-form-label">Phone number</label>
                                        <div class="col-sm-12">
                                            <input style="width: 100%" type="tel" class="form-control" id="telefon" name="telefon" placeholder="123-456-789" required pattern="[1-9]{1}[0-9]{2}-*[0-9]{3}-*[0-9]{3}" title="Enter a valid phone number">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-sm-12 col-form-label">E-mail</label>
                                        <div class="col-sm-12">
                                            <input style="width: 100%" type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required title="Enter a valid email address">
                                        </div>
                                    </div>

                                </div>


                                <div class="headeryForm"><h5>Games:</h5><h5>Payment method:</h5></div>

                                <div class="containerBlok">

                                <div class="blokCheck">

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="gry[]" id="FIFA" value="fifa24" @if($selectedGame === 'EA Sports FC 24') checked @endif>
                                    <label class="custom-control-label" for="FIFA">EA Sports FC 24</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="gry[]" id="GT7" value="GranTurismo7" @if($selectedGame === 'Gran Turismo® 7') checked @endif>
                                    <label class="custom-control-label" for="GT7">Gran Turismo® 7</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="gry[]" id="SP2" value="Spider-Man 2" @if($selectedGame === 'Marvel’s Spider-Man 2') checked @endif>
                                    <label class="custom-control-label" for="SP2">Marvel’s Spider-Man 2</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="gry[]" id="GTA5" value="GTA5" @if($selectedGame === 'Grand Theft Auto V Online') checked @endif>
                                    <label class="custom-control-label" for="GTA5">Grand Theft Auto V Online</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="gry[]" id="TLoU" value="The Last of Us" @if($selectedGame === 'The Last of Us™ Part II Remastered') checked @endif>
                                    <label class="custom-control-label" for="TLoU">The Last of Us™ Part II Remastered</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="gry[]" id="NBA2k24" value="NBA2k24" @if($selectedGame === 'NBA 2K24 Kobe Bryant Edition for PS5™') checked @endif>
                                    <label class="custom-control-label" for="NBA2k24">NBA 2K24 Kobe Bryant Edition for PS5™</label>
                                </div>
                                </div>


                                <div class="blokRadio" >

                                <div class="custom-control custom-radio">
                                    <input type="radio" id="platnosconline" name="platnosc" class="custom-control-input" value="Płatność online">
                                    <label class="custom-control-label" for="platnosconline">Płatność online</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="kartaplatnicza" name="platnosc" class="custom-control-input" value="Karta płatnicza">
                                    <label class="custom-control-label" for="kartaplatnicza">Karta płatnicza</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="BLIK" name="platnosc" class="custom-control-input" value="BLIK">
                                    <label class="custom-control-label" for="BLIK">BLIK</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="przelew" name="platnosc" class="custom-control-input" value="Przelew tradycyjny">
                                    <label class="custom-control-label" for="przelew">Przelew tradycyjny</label>
                                </div>
                                </div>
                                <!--<textarea name="message" id="message" cols="40" rows="10" required></textarea>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer przyciski">
                        <a href="{{ route('orders') }}" class="btn btn-secondary" onclick="return confirm('Are you really want to cancel this order?')">Anuluj</a>
                        <button type="submit" class="btn btn-success">Zamów</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endauth
@guest
    <div class="table-container">
        <b>Zaloguj się, aby złożyć zamówienie!</b>
    </div>
@endguest
</body>
</html>
