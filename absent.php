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
    if($RoleName!="Manager"){
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
    $key = '?Date';
    $filteredURL = preg_replace('~(\?|&)'.$key.'=[^&]*~', '$1', $url);
    $filteredURL = str_replace("?", '', $filteredURL);
    if(!isset($params["Date"])){
        $date = date('Y-m-d', time());
        
    }
    else{
        $date = $params["Date"];
    }
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Absent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <input type="date" name="DateAbsent" id="DateAbsent" value="<?php echo $date;?>">
    <button type="button" onclick="SearchDate()">Search</button>
    <div class=" container mt-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $counter=1;
                    $sql = "SELECT * FROM `user` LEFT JOIN staffabsent ON user.UserID = staffabsent.StaffID AND staffabsent.AbsentDate ='".$date."' WHERE user.RoleID = 2";
                    $result = $conn->query($sql);
                    if($result->num_rows>0){
                        while($row = $result->fetch_assoc()){
                            if($row["Status"]==1){
                                $absent = "Absent";
                            }
                            else if($row["Status"]==2){
                                $absent = "Attended";
                            }
                            else{
                                $absent = "Not Set";
                            }
                            echo '<tr>
                                <th scope="row">'.$counter.'</th>
                                <td>'.$row["UserName"].'</td>
                                <td>'.$absent.'</td>
                                <td>'.$row["Description"].'</td>
                                <td><button type="button" onclick="UpdateData(\''.$row["UserID"].'\', \''.$row["UserName"].'\');">Update</button></td>
                            </tr>';
                            $counter++;
                        }
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="updatestatus.php" method="post">
                    <div class="modal-body">

                        <input type="text" name="UserIDInput" id="UserIDInput" class="d-none">
                        <input type="date" name="InputedDate" id="InputedDate" class="d-none">
                        <div class="row mt-1">
                            <div class="col-3">Name : </div>
                            <div class="col-9">
                                <p id="Username"></p>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">Status : </div>
                            <div class="col-9">
                                <select name="Status" id="Status">
                                    <option value="1">Absent</option>
                                    <option value="2">Attended</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-3">Reason : </div>
                            <div class="col-9">
                                <textarea type="text" name="Reason" id="Reason"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script>
function SearchDate() {
    var link = "<?php echo $filteredURL; ?>" + "?Date=" + $("#DateAbsent").val();
    window.location.href = link;
}

function UpdateData(useriddata, UserName) {
    userid = document.getElementById("UserIDInput");
    userid.value = useriddata;
    Username = document.getElementById("Username");
    Username.innerHTML = UserName;
    InputedDate = document.getElementById("InputedDate");
    InputedDate.value = document.getElementById("DateAbsent").value;
    $('#exampleModal').modal('show');
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
</script>


</html>