<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TAI | Komentarze</title>
    <!-- Fonts -->
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

        .box {
            display: flex;
            justify-content: center;
        }
        .box-footer{
            float: right;
        }

        .alert-danger {

            background-color: white;
            padding: 2% 4% 2% 4%;
            margin: 0 4% 0 4%;
            color: #B22222;
            font-size: larger;
            font-weight: bold;
        }
        .alert-danger {
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-weight: bold;
        }
    </style>
</head>
<body>
@include('layouts.navigation')
<div class="table-container">
    <br>
    <div class="title"> <h1 style="font-size: xx-large; color: white">Edit your message</h1> </div><br>
    @if ($errors->any())
        <div class="alert alert-danger" id="error-alert">
            <span class="close-btn" onclick="closeErrorAlert()">×</span>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <script>
            // Dodaj kod JavaScript
            document.addEventListener('DOMContentLoaded', function () {
                setTimeout(function () {
                    closeErrorAlert();
                }, 10000); // Zamykanie po 10 sekundach
            });

            function closeErrorAlert() {
                var errorAlert = document.getElementById('error-alert');
                if (errorAlert) {
                    errorAlert.style.display = 'none';
                }
            }
        </script>
    @endif
    <br>
    <div class="box box-primary ">
        <form role="form" id="comment-form" method="post" action="{{ route('update', $comment) }}">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            <div class="box">
                <div class="box-body">
                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}" id="roles_box" style="display: flex">
                        <div></div>
                        <div style="width: 100%; color: #181818; display: inline-block;"><textarea name="message" id="message" style="width: 100%; height: 100%; resize: none; border: 0; border-radius: 10px" required>{{$comment->message}}</textarea></div>
                        <div></div>
                    </div>
                </div>
            </div>
            <br>
            <div class="box-footer" style="display: flex; justify-content: center; width: 100%">
                <button type="reset" class="btn btn-success canc" style="width: 100%;">Cancel</button>
                <button type="submit" class="btn btn-success succ" style="width: 100%">Apply</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>





