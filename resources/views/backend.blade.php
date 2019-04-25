<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Admin </title>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" id="bootstrap-css">
    <link href="{{asset('css/style.css')}}" rel="stylesheet" id="bootstrap-css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet">
</head>
<style>
    body{
        color: #fff;
        display: flex;
        position: relative;
        justify-content: space-around;
        background: url({{URL::to('images/2.jpg')}}) no-repeat center;
        background-size: cover;
        height: 100vh;
    }
</style>
<body>

<div class="wrapper fadeInDown">
    @include('includes.validator')
    <div id="formContent">
        <h1 style="font-family: 'Indie Flower', cursive; color: black; font-weight: bolder">E-Chantier</h1>
        <h3 style="font-family: 'Indie Flower', cursive; color: black;">Connexion</h3>
        <br>
        <!-- Login Form -->
        <form method="post" action="{{url('dashboard/login')}}">
            @csrf
            <input type="text" id="login" class="fadeIn second" name="admin_email" placeholder="Votre Email">
            <input type="password" id="password" class="fadeIn third" name="admin_password" placeholder="Mot de Passe">
            <input type="submit" class="fadeIn fourth" value="connexion">

        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#" style="text-decoration: none;">Mot de passe Oublie?</a><br>
        </div>

    </div>
</div>
<script src="{{asset('admin/js/vendor/jquery-1.12.4.min.js')}}"></script>
</body>
</html>
