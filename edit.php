<?php 
session_start();
include("db.php");
if (isset($_POST['edit_cat'])){
    $id = $_POST['cat_id'];
    $name = $_POST['e_cat_name'];
    $edit_query = "UPDATE `menu_category` SET id=$id,category_name='$name' WHERE id=$id";
    $edit_category=mysqli_query($con,$edit_query);
    if ($edit_category){
        $_SESSION['editstatus'] = "<strong>'$name'</strong> Updated Successfully !";
       header("location:settings.php");
    }else{
        echo "Failed to Connect DB";
        exit();
    }
}

if (isset($_POST['edit_type'])){
    $id = $_POST['type_id'];
    $name = $_POST['e_type_name'];
    $edit_query = "UPDATE `menu_type` SET id=$id,type_name='$name' WHERE id=$id";
    $edit_category=mysqli_query($con,$edit_query);
    if ($edit_category){
        $_SESSION['editstatus'] = "<strong>'$name'</strong> Updated Successfully !";
       header("location:settings.php");
    }else{
        echo "Failed to Connect DB";
        exit();
    }
}

if (isset($_POST['edit_menu'])){
    $id = $_POST['e_menu_id'];
    $name = $_POST['e_menu_name'];
    $number = $_POST['e_menu_number'];
    $type = $_POST['e_menu_type'];
    $category = $_POST['e_menu_category'];
    $price = $_POST['e_menu_price'];
    $desc = $_POST['e_menu_description'];
    

    $edit_query = "UPDATE `mainmenu` SET id=$id,Name='$name',Number='$number',Type='$type',Category='$category',Price='$price',Description='$desc' WHERE id=$id";
    $edit_category=mysqli_query($con,$edit_query);
    if ($edit_category){
        $_SESSION['editstatus'] = "<strong>'$name'</strong> Updated Successfully !";
       header("location:menu.php");
    }else{
        echo "Failed to Connect DB";
        exit();
    }
}

?>