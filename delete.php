<?php
session_start();
include("db.php");

if(isset($_GET['cat_deleteid'])){
    $id = $_GET['cat_deleteid'];

    $delete = "DELETE FROM `menu_category` WHERE id=$id";
    $delete_category=mysqli_query($con,$delete);
    if ($delete_category){
        $_SESSION['delstatus'] = " Deleted Successfully !";
       header("location:settings.php");
    }else{
        echo "Failed to Connect DB";
        exit();
    }

}

if(isset($_GET['type_deleteid'])){
    $id = $_GET['type_deleteid'];

    $delete = "DELETE FROM `menu_type` WHERE id=$id";
    $delete_type=mysqli_query($con,$delete);
    if ($delete_type){
        $_SESSION['delstatus'] = " Deleted Successfully !";
       header("location:settings.php");
    }else{
        echo "Failed to Connect DB";
        exit();
    }

}

if(isset($_GET['menu_deleteid'])){
    $id = $_GET['menu_deleteid'];

    $delete = "DELETE FROM `mainmenu` WHERE id=$id";
    $delete_menu=mysqli_query($con,$delete);
    if ($delete_menu){
        $_SESSION['delstatus'] = " Deleted Successfully !";
       header("location:menu.php");
    }else{
        echo "Failed to Connect DB";
        exit();
    }

}
?>