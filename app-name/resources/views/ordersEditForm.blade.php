<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edytuj zamówienie</title>
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
        input{
            color: black;
            width: 100%;
        }
        .box {
            display: flex;
            justify-content: center;
        }
        .box-footer{
            float: right;
        }
    </style>
</head>
<body>
@include('layouts.navigation')
<div class="table-container shadow-sm" style="margin: 3%; border-radius: 10px">
    <div class="title">
        <h2 style="font-size: xx-large">Edytuj zamówienie</h2>
    </div>
</div>
<h2></h2>
<div class="table-container shadow-sm" style="display: flex; padding: 5%; margin: 3%; border-radius: 10px">
    @auth
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="box box-primary ">
            <form role="form" id="comment-form" method="post" action="{{ route('updateorder', $order) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <!--<imput name="_method" type="hidden" value="PUT">-->
                <div class="box">
                    <div class="box-body">
                        <!--<div class="form-group{{ $errors->has('message')?'has-error':'' }}" id="roles_box">-->
                        <div id="roles_box" style="display: flex; flex-wrap: wrap; width: 100%">


                            <h5>Personal information:</h5>
                            <div class="blokInput" style="display: flex; justify-content: space-between; width: 100%">
                            <div class="form-group row">
                                <label for="imie_i_nazwisko" class="col-sm-12 col-form-label">Imie i Nazwisko</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="imie_i_nazwisko" name="imie_i_nazwisko" placeholder="Jan Kowalski" required value="{{ $order->imie_i_nazwisko }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="ulica_i_nr_domu" class="col-sm-12 col-form-label">Ulica i numer domu/mieszkania</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="ulica_i_nr_domu" name="ulica_i_nr_domu" placeholder="Nadbystrzycka 44A" required value="{{ $order->ulica_i_nr_domu }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kod_pocztowy" class="col-sm-12 col-form-label">Kod pocztowy</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="kod_pocztowy" name="kod_pocztowy" placeholder="20-081" pattern="[0-9]{2}-[0-9]{3}" required value="{{ $order->kod_pocztowy }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="miejscowosc" class="col-sm-12 col-form-label">Miejscowość</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="miejscowosc" name="miejscowosc" placeholder="Lublin" required value="{{ $order->miejscowosc }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="telefon" class="col-sm-12 col-form-label">Numer telefonu</label>
                                <div class="col-sm-12">
                                    <input type="tel" class="form-control" id="telefon" name="telefon" placeholder="123-456-789" pattern="[1-9]{1}[0-9]{2}-*[0-9]{3}-*[0-9]{3}" required value="{{ $order->telefon }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-12 col-form-label">E-mail</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" required value="{{ $order->email }}">
                                </div>
                            </div>
                            </div>


                                <div class="headeryForm"><h5>Games:</h5><h5>Payment method:</h5></div>

                                <div class="containerBlok">

                                    <div class="blokCheck">

                                @foreach(['fifa24', 'GranTurismo7', 'Spider-Man 2', 'GTA5', 'The Last of Us', 'NBA2k24'] as $gra)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="gry[]" id="{{ $gra }}" value="{{ $gra }}"
                                               @if(in_array($gra, explode(',', $order->gry)))
                                                   checked
                                            @endif
                                        >
                                        <label class="custom-control-label" for="{{ $gra }}">{{ $gra }}</label>
                                    </div>
                                @endforeach
                                    </div>

                                    <div class="blokRadio" >
                            <h5>Płatność:</h5>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="platnosconline" name="platnosc" class="custom-control-input" value="Płatność online"
                                       @if($order->platnosc == "Płatność online")
                                           checked
                                    @endif
                                >
                                <label class="custom-control-label" for="platnosconline">Płatność online</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="kartaplatnicza" name="platnosc" class="custom-control-input" value="Karta płatnicza"
                                       @if($order->platnosc == "Karta płatnicza")
                                           checked
                                    @endif>
                                <label class="custom-control-label" for="kartaplatnicza">Karta płatnicza</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="BLIK" name="platnosc" class="custom-control-input" value="BLIK"
                                       @if($order->platnosc == "BLIK")
                                           checked
                                    @endif>
                                <label class="custom-control-label" for="BLIK">BLIK</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="przelew" name="platnosc" class="custom-control-input" value="Przelew tradycyjny"
                                       @if($order->platnosc == "Przelew tradycyjny")
                                           checked
                                    @endif>
                                <label class="custom-control-label" for="przelew">Przelew tradycyjny</label>
                            </div>
                                    </div>
                                </div>
                            <!--<textarea name="message" id="message" cols="40" rows="10" required></textarea>-->
                        </div>
                    </div>
                </div>
                <div class="box-footer przyciski">
                    <a href="{{ route('orders') }}" class="btn btn-secondary">Anuluj</a>
                    <button type="submit" class="btn btn-success">Zapisz</button>
                    <h2></h2>
                </div>
            </form>
        </div>
    @endauth
</div>
@guest
    <div class="table-container">
        <b>Zaloguj się, aby złożyć zamówienie!</b>
    </div>
@endguest
</body>
</html>
