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
    if($RoleName!="Manager" && $RoleName!="Staff"){
        header('Location: index.php');
        exit;  
    }
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    $url.= $_SERVER['HTTP_HOST'];   
    $url.= $_SERVER['REQUEST_URI'];  
    $url_components = parse_url($url);
    if(isset($url_components['query'])){
        parse_str($url_components['query'], $params);
    }
    $key = '?Room';
    $filteredURL = preg_replace('~(\?|&)'.$key.'=[^&]*~', '$1', $url);
    $filteredURL = str_replace("?", '', $filteredURL);

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problem Room</title>
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

                    <a href="logout.php" class="btn btn-outline-light" style="margin-right: 20px;">Log
                        Out</a>
                    <a href="register.html" class="btn btn-outline-light" type="submit">Need Help?</a>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <?php
                    $sql1 = "SELECT * FROM room" ;
                    $result = $conn->query($sql1);
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                            $link = $filteredURL;
                            $link.="?Room=".$row["RoomID"];
                            echo "
                            <a href='".$link."'  class='card mt-3'>
                                <div class='card-body'>
                                Room ".$row["RoomNumber"]."
                                </div>
                            </a>";
                        }
                    }
                ?>
            </div>
            <div class="col-6">
                <?php
                    if(isset($params["Room"])){
                        if($RoleName == "Manager" ){
                            echo '<form method="POST" action="addproblem.php" enctype="multipart/form-data" class="mx-auto row mt-3">
                        <input type="text" class="form-control d-none" name="roomid" id="roomid" value='.$params["Room"].'>
                        <input type="text" class="form-control w-75" placeholder="New Problem"
                            aria-label="New Problem" aria-describedby="button-addon2" name="addproblem" id="addproblem">
                        <button class="btn btn-outline-secondary w-25" type="submit" id="button-addon2">Add
                            New</button>
                    </form>';
                        }
                        
                
                            
                            $sql = "SELECT * FROM `roomproblem` WHERE `RoomId` = ".$params["Room"];
                            $result = $conn->query($sql);
                            if($result->num_rows>0){
                                echo '<div class="card mt-3">
                                <div class="card-body">
                                    <div class="input-group mb-3">
                                    </div>';
                                while($row = $result->fetch_assoc()){
                                    echo '<div class="input-group my-3">
                                    <div class="form-control">'.$row["ProblemDescription"].'</div>';
                                    if($RoleName == "Manager"){
                                        echo '<form method="POST" action="DeleteProblem.php" enctype="multipart/form-data" class="mx-auto row mt-3">
                                        <input type="text" class="form-control d-none" name="ProblemID" id="ProblemID" value='.$row["ProblemID"].'>
                                        <button class="input-group-text" type="submit">Delete</button>
                                    </form>
                                  ';
                                    }
                                    echo '</div>';
                                    
                                }
                            }
                        }
                ?>
            </div>
        </div>
    </div>
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