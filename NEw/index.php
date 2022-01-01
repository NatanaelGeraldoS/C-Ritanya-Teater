<?php
    include('connect.php');
    if(isset($_COOKIE["UserID"])){
        $sql = "SELECT * FROM user AS a JOIN role AS r ON a.RoleID = r.RoleID WHERE a.UserID = '".$_COOKIE["UserID"]."'" ;
        $link = $conn->query($sql);
        if($link->num_rows>0){
            while($row = $link->fetch_assoc()){
                $Username = $row["UserName"];
                $RoleName = $row["RoleName"];
            }
        }
    }
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                </ul>
                <form class="d-flex navbar-nav">
                    <?php
                    if(isset($_COOKIE["UserID"])) {
                        echo "<li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button'
                            data-bs-toggle='dropdown' aria-expanded='false'>
                            ".$Username."
                        </a>
                        <ul class='dropdown-menu dropdown-menu-lg-end' aria-labelledby='navbarDropdown'>
                            <li><a class='dropdown-item' href='#'>Profile</a></li>
                            <li><a class='dropdown-item' href='logout.php'>LogOut</a></li>
                        </ul>
                    </li>";
                    }
                    else{
                        echo "<a href='login.php' class='btn btn-outline-light' style='margin-right:20px'>Login</a>
                        <a href='register.php' class='btn btn-outline-light' style='margin-right:20px'>Register</a>
                        <a href='HELP.php' class='btn btn-outline-light'>Need Help?</a>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </nav>
    <div class="main">
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" style="height:525px">
                    <img src="https://s-media-cache-ak0.pinimg.com/originals/b1/c9/d6/b1c9d6d8bc1817e909d832de2d496b12.jpg"
                        class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Movie Title</h5>
                        <p>Movie Description</p>
                    </div>
                </div>
                <div class="carousel-item" style="height:525px">
                    <img src="https://s-media-cache-ak0.pinimg.com/originals/b1/c9/d6/b1c9d6d8bc1817e909d832de2d496b12.jpg"
                        class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Movie Title</h5>
                        <p>Movie Description</p>
                    </div>
                </div>
                <div class="carousel-item" style="height:525px">
                    <img src="https://s-media-cache-ak0.pinimg.com/originals/b1/c9/d6/b1c9d6d8bc1817e909d832de2d496b12.jpg"
                        class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Movie Title</h5>
                        <p>Movie Description</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <h1>Hello <?php echo $Username;?>, Your Role Is <?php echo $RoleName;?></h1>
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