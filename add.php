<?php 
session_start();
include("db.php");
if (isset($_POST['add_cat'])){
    $name = $_POST['a_cat_name'];
    $add_query = "INSERT INTO `menu_category`(`category_name`) VALUES ('$name')";
    $add_category= mysqli_query($con,$add_query);
    if ($add_category){
        $_SESSION['addstatus'] = "<strong>'$name'</strong> Created Successfully !";
       header("location:settings.php");
    }else{
        echo "Failed to Connect DB";
        exit();
    }
}

if (isset($_POST['add_type'])){
    $name = $_POST['a_type_name'];
    $add_query = "INSERT INTO `menu_type`(`type_name`) VALUES ('$name')";
    $add_type=mysqli_query($con,$add_query);
    if ($add_type){
        $_SESSION['addstatus'] = "<strong>'$name'</strong> Created Successfully !";
       header("location:settings.php");
    }else{
        echo "Failed to Connect DB";
        exit();
    }
}

if (isset($_POST['add_menu'])){
    $name = $_POST['a_menu_name'];
    $number = $_POST['a_menu_number'];
    $type = $_POST['a_menu_type'];
    $category = $_POST['a_menu_category'];
    $price = $_POST['a_menu_price'];
    $desc = $_POST['a_menu_description'];

    $add_query = "INSERT INTO `mainmenu`(`Number`,`Name`,`Price`,`Type`,`Category`,`Description`) VALUES ('$number','$name','$price','$type','$category','$desc')";
    $add_menu=mysqli_query($con,$add_query);
    if ($add_menu){
        $_SESSION['addstatus'] = "<strong>'$name'</strong> Created Successfully !";
       header("location:menu.php");
    }else{
        echo "Failed to Connect DB";
        exit();
    }
}

?>