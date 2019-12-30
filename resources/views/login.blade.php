<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="https://virginiogomez.cl//templates/yoo_glass/favicon.ico" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.4.4/sweetalert2.min.css">
    <link rel="stylesheet" href="css/blog.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <title>Empresa Simulada</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

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
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="index"><img src="https://virginiogomez.cl//images/logo.jpg" class="img-fluid" alt="Responsive image"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="../auth/logout"></a></li>
        </ul>

    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Login</h2>
            {% if errors %}
                {% include 'partials/errors.blade.php' %}
            {% endif %}
            <form method="post">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="text" class="form-control" name="email" id="inputEmail">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="Password" class="form-control" name="password" id="inputPassword">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/sweetalert2/6.4.4/sweetalert2.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>