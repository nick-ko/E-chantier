<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login | Dashboard </title>
        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" id="bootstrap-css">
        <link href="{{asset('css/style.css')}}" rel="stylesheet" id="bootstrap-css">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
    </head>
    <body>
    <style>
        body{
            color: #fff;
            display: flex;
            position: relative;
            justify-content: space-around;
            background: url({{URL::to('images/1.jpg')}}) no-repeat center;
            background-size: cover;
            height: 100vh;
        }
    </style>
    <div class="wrapper fadeInDown">

        <div id="formContent">
            @include('includes.validator')
            <h1 style="font-family: 'Indie Flower', cursive; color: black; font-weight: bolder">E-Chantier</h1>
            <h3 style="font-family: 'Indie Flower', cursive; color: #0c1923">Espace Chef Chantier</h3>
            <br>
            <!-- Login Form -->
            <form method="post" action="{{url('/login')}}">
                @csrf
                <input type="text" id="login" class="fadeIn second" name="chief_email" placeholder="Votre Email">
                <input type="password" id="password" class="fadeIn third" name="chief_password" placeholder="Mot de Passe">
                <input type="submit" class="fadeIn fourth" value="connexion">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#" style="text-decoration: none;">Mot de passe Oublie?</a><br>
            </div>

        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>
</html>
