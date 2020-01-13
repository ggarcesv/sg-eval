<DOCTYPE html>
<html lang="en">
<head>
<title>@yield('title', 'Empresa Simulada')</title>

<link rel="icon" type="image/x-icon" href="https://virginiogomez.cl//templates/yoo_glass/favicon.ico" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.19.0/dist/sweetalert2.min.css">
    


    <style>
        nav div ul li a{
            color: #effff8;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            margin: 0.5em 1.7em;
            padding: 0.3em;
        }
        nav{
            background-color: #3b3e44;
            border-radius: 0.5em;
        }
        nav div ul li div a{
            color: #385a8a;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            padding: 0.5em 1em;
            margin: 0.5em 0.1em;

        }
        html body nav {
            background-color: #385a8a;
            text-align: right;
            margin: 0.5em;
        }
        img{
            height: 10em;
            width: 15em;
        }

    </style>
    <style rel="stylesheet">
        SECTION {
            padding: 0.3em;
            background-color: #f0f0f0;
            overflow: auto;
        }
        SECTION > DIV {
            float: left;
            padding: 0.3em;
            display: inline-block;
        }
        SECTION > DIV + DIV {
            width: 4em;
            text-align: center;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="page-header">
         @yield('header')
        </div>
        @yield('content')
    </div>
</body>
</html>