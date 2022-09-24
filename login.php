<?php
require_once 'php/App/init.php';
require_once 'php/Data.php';

if (isset($_SESSION["login"])) {
    header("Location: muzakki.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css">
    <!-- Icons -->
    <script src="https://kit.fontawesome.com/71cd5983fb.js" crossorigin="anonymous"></script>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Zakat.com</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="muzakki.php">Muzakki</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="mustahik.php">Mustahik</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body p-5">

                            <h3 class="text-center">Login</h3>
                            <hr class="my-4">

                            <form action="" method="POST">
                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-solid fa-user"></i></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Username" id="name" name="name" type="text" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="input-group input-group-merge input-group-alternative">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></i></span>
                                        </div>
                                        <input class="form-control" placeholder="Password" id="password" name="password" type="password" required>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-dark" type="submit" name="login">Login</button>
                                </div>

                                <hr class="my-4">
                                <ul class="text-left">
                                    <li>username : indra rusyana</li>
                                    <li>password : 207006040</li>
                                </ul>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>