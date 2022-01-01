<?php
    include('connect.php');
    if(isset($_COOKIE["UserID"])){
        header('Location: index.php');
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
    <link rel="shortcut icon" href="Assets/Logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">C'Ritanya Teater</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li> -->
                </ul>
                <form class="d-flex">

                    <a href="register.html" class="btn btn-outline-light" type="submit"
                        style="margin-right: 20px;">Register</a>
                    <a href="register.html" class="btn btn-outline-light" type="submit">Need Help?</a>
                </form>
            </div>
        </div>
    </nav>
    <div class="main">
        <div class="logo d-flex">
            <img src="Assets/Logo.png" alt="Logo" class="mx-auto" style="width: 300px;">
        </div>
        <form method="POST" action="loginAction.php" enctype="multipart/form-data" class="w-50 mx-auto">
            <div class="mb-3">
                <label for="username" class="form-label">Email address</label>
                <input type="username" class="form-control" id="username" name="username" aria-describedby="username">
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="Password" class="form-control" id="Password" name="Password">
            </div>
            <button type="submit" class="btn btn-outline-dark w-100">Submit</button>
        </form>
    </div>
    <div class=" mt-5">

        <footer class="bg-dark">
            <div class="container p-4">
                <div class="row">
                    <div class="col-lg-9 col-md-12 mb-4">
                        <h5 class=" text-light">@C’Ritanya Teater 2021 Hak Cipta Dilindungi</h5>

                    </div>
                    <div class="col-lg-3 col-md-12 mb-4 d-flex justify-content-around py-2">
                        <img src="Assets/facebook.png" alt="" width="50" height="auto">
                        <img src="Assets/twitter.png" alt="" width="50" height="auto">
                        <img src="Assets/instagram.png" alt="" width="50" height="auto">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-around py-2" style="background-color: rgba(0, 0, 0, 0.2);">
                <a href="" style="color:white; text-decoration: none;">Cookie Notice</a>
                <a href="" style="color:white; text-decoration: none;">Privacy Policy</a>
                <a href="" style="color:white; text-decoration: none;">Accessbility</a>
                <a href="" style="color:white; text-decoration: none;">Security</a>
                <a href="" style="color:white; text-decoration: none;">Term of Use</a>
            </div>
        </footer>

    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>

</html>