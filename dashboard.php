<?php 
session_start();
include("db.php");
if($_SESSION['username'] && $_SESSION['password'] && $_SESSION['fullname'] ){
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/ficonred.png" type="image/gif" sizes="128x128">
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/images/ficonred.png">
    <link rel="icon" type="image/png" href="./assets/images/ficonred.png" sizes="32x32">
    <link rel="shortcut icon" href="./assets/images/ficonred.png">
    <meta name="title" content="Login">
    <meta name="description" content="Tasty indian foods. George street, LUTON">
    <meta name="keywords" content="food,luton,indian foods, idly, sambar, uk">
    <title>Admin</title>
    <link rel="stylesheet" href="./assets/css/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
        .sideasset-right{
            right: -2.5rem;
            top: 1.5rem;
        }
        .sideasset-left{
            left: -2.5rem;
            top: 1.5rem;
        }
        @media(max-width:772px){
            .sideasset-right{
            right: -5rem;
            top: 1.5rem;
        }
        .sideasset-left{
            left: -5rem;
            top: 1.5rem;
        }
        }
    </style>
</head>

<body class="bg-light" style="background: url('./assets/images/banner.svg'); ">
    <div class="bg-white fixed-bottom w-100 py-2 px-1 rounded shadow-lg">

        <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
                <a class="nav-link menubuttons active" href="./dashboard.php">
                    <i class="bi bi-grid-fill "></i>
                    <small>Dashboard</small>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menubuttons" href="./menu.php">
                    <i class="bi bi-basket2-fill "></i>
                    <small>Menu</small>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menubuttons" href="./settings.php">
                    <i class="bi bi-gear-fill "></i>
                    <small>Settings</small>
                </a>
            </li>
        </ul>

    </div>
    <div>
        <div class=' py-2 px-3 sticky-top bg-danger text-white d-flex align-items-center justify-content-between shadow-sm'>
            <h3 class=""> <i class="bi bi-grid-fill me-2"></i> Dashboard</h3>
            <h3>
                <a href="./logout.php" class="btn btn-danger btn-lg">

                    <i class="bi bi-box-arrow-in-left"></i> Logout
                </a>
            </h3>
        </div>
        <div class="container mt-2 mb-5 pb-5">
            <div class="row">
                <div class="col-xs-12">

                    <div class="shadow-sm rounded bg-danger text-white m-2 p-3 overflow-hidden" style="position: relative;">
                        <div class="position-absolute sideasset-right" >
                            <img src="./assets/images/tomato.png" alt="" style="width: 8rem" >
                        </div>
                        <div class="position-absolute sideasset-left">
                            <img src="./assets/images/tomato.png" alt="" style="width: 8rem;">
                        </div>
                        <div class="text-center py-2 px-1">                        
                            <h6 class="mb-2">Welcome Back!</h6>
                            <h1 class="font-weight-bold"><?php echo $_SESSION['fullname']; ?></h1>                           
                        </div>
                     

                     

                    </div>
                </div>
                <div class="col-xs-12 col-md-6" onclick="window.location.href='./menu.php'" style="cursor: pointer;">

                    <div class="shadow-sm rounded bg-white m-2 p-3">
                        <div class="d-flex justify-content-between align-items-center py-2 px-1">
                            <div class="d-flex align-items-center">
                                <h4 class="rounded bg-success text-white p-2 me-2">
                                    <i class="bi bi-basket2-fill "></i>
                                </h4>
                                <h4 class="text-success">Menu Items</h4>
                            </div>
                            <div>
                                <h1 class="display-1 text-success" style="font-weight: bolder;">
                                    <?php
                                echo count($items);
                                ?>
                                </h1>

                            </div>
                        </div>

                        <!-- <div class="bg-light rounded p-2 text-muted">
                            <small>Last updated 20/08/2020 06.33PM</small>
                        </div> -->

                    </div>
                </div>
           
                <div class="col-xs-12 col-md-6" onclick="window.location.href='./settings.php'" style="cursor: pointer;">
                    <div class="shadow-sm rounded bg-white m-2 p-3">
                        <div class="d-flex justify-content-between align-items-center py-2 px-1">
                            <div class="d-flex align-items-center">
                                <h4 class="rounded bg-primary text-white p-2 me-2">
                                    <i class="bi bi-ui-checks-grid "></i>
                                </h4>
                                <h4 class="text-primary">Categories</h4>
                            </div>
                            <div>
                                <h1 class="display-1 text-primary" style="font-weight: bolder;">
                                    <?php
                                if($cat_status == 0){
                                    echo "0";
                                }else{
                                    echo count($cat_items);
                                }
                               
                                ?>
                                </h1>

                            </div>
                        </div>

                        <!-- <div class="bg-light rounded p-2 text-muted">
                            <small>Last updated 20/08/2020 06.33PM</small>
                        </div> -->

                    </div>
                </div>
                <div class="col-xs-12 col-md-6" onclick="window.location.href='./settings.php'" style="cursor: pointer;">
                    <div class="shadow-sm rounded bg-white m-2 p-3">
                        <div class="d-flex justify-content-between align-items-center py-2 px-1">
                            <div class="d-flex align-items-center">
                                <h4 class="rounded bg-info text-white p-2 me-2">
                                    <i class="bi bi-funnel-fill "></i>
                                </h4>
                                <h4 class="text-info">Types</h4>
                            </div>
                            <div>
                                <h1 class="display-1 text-info" style="font-weight: bolder;">
                                    <?php
                                if($type_status == 0){
                                    echo "0";
                                }else{
                                    echo count($type_items);
                                }
                               
                                ?>
                                </h1>

                            </div>
                        </div>

                        <!-- <div class="bg-light rounded p-2 text-muted">
                            <small>Last updated 20/08/2020 06.33PM</small>
                        </div> -->

                    </div>
                </div>



            </div>
        </div>

    </div>
</body>

</html>


<?php
}
else{
    header('Location:login');
    exit();
}
?>