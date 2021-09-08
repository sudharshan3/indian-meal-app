<?php
// $serverName = "localhost";
$serverName = "sql176.main-hosting.eu";
$userName = "u210545861_root";
$password = "Fj[7pImQs";
$dbname= "u210545861_menu_list";

$con = mysqli_connect($serverName,$userName,$password,$dbname);
if(mysqli_connect_errno()){
    echo "Failed to Connect DB";
    exit();
}

$mainmenu = "SELECT * FROM `mainmenu` ORDER BY `Number`+0 ASC";
$cattable = "SELECT * FROM `menu_category`";
$typetable = "SELECT * FROM `menu_type`";
$select_menu = mysqli_query($con,$mainmenu);
$select_cat = mysqli_query($con,$cattable);
$select_type = mysqli_query($con,$typetable);
$cat_status = 1;
$type_status = 1;

while($row=mysqli_fetch_assoc($select_menu)){  
    $items[] = $row;   
    $number[] = $row["Number"];   
    $name[] = $row["Name"];  
    $category[] = $row["Category"];  
    $type[] = $row["Type"];  
}


if (mysqli_num_rows($select_type) == 0){
    $type_status = 0;
} 
else {
while($typerow=mysqli_fetch_assoc($select_type)){  
    $type_items[] = $typerow;
    $type_name[] = $typerow["type_name"];  
}
}


if (mysqli_num_rows($select_cat) == 0){
        $cat_status = 0;
} 
else {
    while($catrow=mysqli_fetch_assoc($select_cat)){  
        $cat_items[] = $catrow;
        $cat_name[] = $catrow["category_name"];  
    }
}




 $shrink_category= array_unique($category);
 $shrink_type= array_unique($type);

?>