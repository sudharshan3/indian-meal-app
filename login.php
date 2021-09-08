<?php include("db.php");?>
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
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body class="bg-danger" style="background: url('./assets/images/banner.svg');">
    <section class="d-flex justify-content-center align-items-center" style="height:100vh;overflow: hidden;">
        <div class="container">
            <!-- <div class="text-center w-100 mb-5">
                <img src="./assets/images/HEADERLOGO.png" alt="" style="width: 20rem;">
            </div> -->
            <div class="bg-white text-center rounded shadow-lg px-3 px-md-5 px-md-5  py-3   mx-sm-1 mx-md-5 mx-md-5 mx-md-5">
                <div>
                    <h1>
                        <i class="bi bi-person-bounding-box"></i>
                    </h1>
                    <h2 class="mb-3" style="font-weight:bolder;letter-spacing: 2px;">ADMIN PORTAL</h2>
                </div>
               <?php
               if(isset($_GET['error'])){
               ?>
                                       <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error!</strong> <?php   echo $_GET['error'];?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
               <?php
               }
               unset($_GET['error']);
               ?>

                <form method="POST" action="validate.php">
                    <div class="input-group input-group-lg mb-4">
                        <span class="input-group-text bg-danger text-white" id="inputGroup-sizing-lg"><i class="bi bi-person-circle"></i>
                        </span>
                        <input required type="text" name="admin_name" class="form-control" placeholder="Enter Username">
                    </div>
                    <div class="input-group input-group-lg mb-4">
                        <span class="input-group-text bg-danger text-white" id="inputGroup-sizing-lg">
                            <i class="bi bi-lock-fill"></i>
                        </span>
                        <input required type="password" name="admin_pass" class="form-control" placeholder="Enter password" id="password">
                        <span class="input-group-text bg-danger text-white" id="togglebtn" onclick="showpass();">
                            <i class="bi bi-eye-fill"></i>
                        </span>
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button name="admin_login" class="btn btn-danger btn-lg" type="submit">Login</button>

                    </div>
                </form>
            </div>
        </div>
    </section>

</body>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    function showpass() {
        var y = $("#password")
        var x = $("#password").attr('type');
        var icon = $("#togglebtn")
        console.log(x)
        if (x === "password") {
            icon.html(`<i class="bi bi-eye-slash-fill"></i>`)
            y.attr("type", "text")
        } else {
            y.attr("type", "password")
            icon.html(`<i class="bi bi-eye-fill"></i>`)
        }
    }
</script>

</html>