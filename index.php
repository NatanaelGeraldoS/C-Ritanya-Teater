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
    else{
        header('Location: login.php');
        exit;
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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">C'Ritanya Teater</a>
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

                    <a href="logout.php" class="btn btn-outline-light" style="margin-right: 20px;">Log
                        Out</a>
                    <a href="register.html" class="btn btn-outline-light" type="submit">Need Help?</a>
                </form>
            </div>
        </div>
    </nav>
    <div class="main" style="width:100%; overflow-x: hidden;">
        <div class="header mb-5">
            <img src=" Assets/HeaderUser.png" alt="Header" height="200px" width="100%">
            <div class="ImageandName d-flex">
                <img src="Assets/Logo.png" alt="" class="Profile">
                <h3 class="name">C???Ritanya Teater<br>
                    Welcome Back, <?php echo $Username;?>, <br>Your Role Is
                    <?php echo $RoleName;?></h3>
            </div>


        </div>
        <div class="container">
            <?php
                if($RoleName == "User"){
                    echo "<div class='row'>
                        <div class='col-lg-12 col-sm-6'>Make Our Safe  & Clean Theatre All Yours
                        <a href='booking.php' class='btn btn-outline-danger btn-lg w-50'>Book Now</a></div>
                        <div class='col-lg-12 col-sm-6'>Host a Private Theater Rental at C'Ritanya Theatre! 
                        It's perfect for an everyday getaway or a special occasion.

                        Certain theaters now offer Private Theater Rentals for larger groups. 
                        Just select showtimes for a group size that fits your number of guests.

                        Question? The answer may be in our FAQ.</div>
                    </div>";
                }
                if($RoleName == "Manager"){
                    echo "<a href='absent.php' class='btn btn-outline-dark btn-lg w-50'>Staff Absent</a>";
                }
                if($RoleName == "Manager" || $RoleName == "Staff"){
                    echo "<a href='Problem.php' class='btn btn-outline-dark btn-lg w-50'>Room Notes</a>";
                }
            ?>
        </div>

    </div>
    <div class=" mt-5">

        <footer class="bg-dark">
            <div class="container p-4">
                <div class="row">
                    <div class="col-lg-9 col-md-12 mb-4">
                        <h5 class=" text-light">@C???Ritanya Teater 2021 Hak Cipta Dilindungi</h5>

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