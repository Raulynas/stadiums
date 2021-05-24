<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <title>City Play</title>
</head>

<style>
    html,
    body {
        width: 100%;
        margin: 0;
        padding: 0;
    }

    body {
        background-image: url(https://eskipaper.com/images/stadium-wallpaper-2.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    .title {
        border-bottom: 1.5px solid white;
        margin-bottom: 180px;
    }

    .title>h1 {
        font-size: 80px;
        text-align: center;
    }

    .select-wrapper input.select-dropdown {
        margin: 0;
    }

    .label {
        background-color: transparent;
        font-size: 18px
    }
</style>

<body>
    <div class="wrapper ">
        <div class="title white-text">
            <h1>Book your time slot today!</h1>
        </div>
        <a class='dropdown-trigger btn' href='#' data-target='dropdown1'>Choose your City</a>
        <ul id='dropdown1' class='dropdown-content'>
            <li><a href="{{route("stadiums.show", "Vilnius")}}">Vilnius</a></li>
            <li><a href="{{route("stadiums.show", "Kaunas")}}">Kaunas</a></li>
            <li class="divider" tabindex="-1"></li>
            @foreach ($stadiums as $stadium)
            <li><a href="{{route("stadiums.show", "$stadium->city")}}">{{$stadium->city}}</a></li>
            @endforeach
        </ul>
    </div>





    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
    <script>
        $(document).ready(function(){
$('.dropdown-trigger').dropdown(
);
    });
    </script>

</body>

</html>