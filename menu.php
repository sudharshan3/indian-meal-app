<?php 
session_start();
include("db.php");
if($_SESSION['username'] && $_SESSION['password']){
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
</head>

<body class="bg-light" style="background: url('./assets/images/banner.svg'); ">
    <div class="bg-white fixed-bottom w-100 py-2 px-1 rounded shadow-lg">

        <ul class="nav nav-pills nav-justified">
            <li class="nav-item">
                <a class="nav-link menubuttons" href="./dashboard.php">
                    <i class="bi bi-grid-fill "></i>
                    <small>Dashboard</small>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menubuttons active" href="./menu.php">
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
        <div class=' py-1 px-3 sticky-top bg-danger text-white d-flex align-items-center justify-content-between shadow-sm'>
            <h4 class="mb-0"> 
                <i class="bi bi-basket2-fill me-2"></i> 
                Menu List
            </h4>
            <h4 class="mb-0">
                <a href="./logout.php" class="btn btn-danger btn-lg">

                    <i class="bi bi-box-arrow-in-left"></i> Logout
                </a>
            </h4>
        </div>

        <div class="container mt-3 pb-5 mb-5">
            <?php
                    if (isset($_SESSION['addstatus'])){
                        ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong>
                    <?php   echo $_SESSION['addstatus'];?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php                      
                        unset($_SESSION['addstatus']);
                    } else if(isset($_SESSION['editstatus'])){
                    ?>
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <strong>Updated!</strong>
                    <?php   echo $_SESSION['editstatus'];?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                          unset($_SESSION['editstatus']);
                        } else if(isset($_SESSION['delstatus'])){
                    ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Deleted!</strong>
                        <?php   echo $_SESSION['delstatus'];?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                          unset($_SESSION['delstatus']);
                        } 
                    ?>

                        <a class="btn btn-success rounded-circle position-fixed m-3 p-3 text-white shadow-lg" data-bs-toggle='modal' data-bs-target='#menuadd' style="bottom: 4rem;right: 0;">
                            <h3 class="mb-0"><i class="bi bi-plus-lg"></i> </h3>
                        </a>
                        <div class="menu_product row">


                            <?php foreach($items as $item){
    
     
     
    $spaceless = preg_replace('/\s+/', '', $item["Category"]);
    $data_value1 = strtolower($spaceless);
    $data_value2 = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $data_value1);
    $data_value = str_replace('&', '', $data_value2);
    
    $type = strtolower($item["Type"]);
    
    
    if ($item["Type"] == "Vegan"){
        $color = "success";
    } else if ($item["Type"] == "Non-Veg"){
        $color = "danger";
    } else if ($item["Type"] == "Veg"){
        $color = "primary";
    } else if ($item["Type"] == "Desserts"){
        $color = "warning";
    } else if ($item["Type"] == "Beverages"){
        $color = "info";
    }  else {
        $color = "dark";
    }
    
    
      echo   "<div class=' col-lg-6 col-md-12 col-sm-12 col-xs-12 ".$type." filter ".$data_value."'>
      <div class='shadow-sm rounded px-4 py-3 my-2 bg-white'>
  

          <div class='d-flex justify-content-between align-items-start mb-2'>
              <div>
                  <h6 class='pe-2'><b> ".$item["Number"].". <span class='menu-title'>".$item["Name"]."</span></b></h6>
    
                  <small class=' badge bg-".$color."'>".$item["Type"]."</small>
              </div>
              <h6 class='text-danger text-nowrap'><b>".$item["Price"]."</b> </h6>
          </div>
          <small class='descnew'>".$item["Description"]."</small>
          <hr>
       
          <div class='row w-100'>
          <div class='col-6'>
              <a  class='btn btn-outline-primary w-100 me-2' data-bs-toggle='modal' data-bs-target='#menuedit' 
              bs-id='".$item['id']."'
              bs-number='".$item['Number']."' 
              bs-name='".$item['Name']."'
              bs-type='".$item['Type']."'
              bs-category='".$item['Category']."'
              bs-price='".$item['Price']."'
              bs-desc='".$item['Description']."'
              
              
              >
                  <i class='bi bi-pencil-fill'>
                  </i>
                   Edit</a>
          </div>
          <div class='col-6'>
              <a href='#' class='btn btn-outline-danger w-100 ms-2' data-bs-href='./delete.php?menu_deleteid=".$item['id']."' data-bs-toggle='modal' data-bs-target='#menudelete'><i class='bi bi-trash-fill'></i>
                   Delete</a>
          </div>
      </div>
      </div>
    </div>";
    }
    ?>



                        </div>
        </div>
    </div>


    <!-- Edit Modal -->
    <div class="modal fade" id="menuedit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Menu</h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="mformscroll" method="POST" action="edit.php">
                    <div class="modal-body ">

                        <input required type="hidden" class="form-control e_menu_id" name="e_menu_id">
                        <div class="mb-3">
                            <label for="e_menu_number" class="col-form-label">Number</label>
                            <input required placeholder="Enter Number" type="text" class="form-control" id="e_menu_number" name="e_menu_number">
                        </div>
                        <div class="mb-3">
                            <label for="e_menu_name" class="col-form-label">Menu Name</label>
                            <input required placeholder="Enter Menu name" type="text" class="form-control" id="e_menu_name" name="e_menu_name">
                        </div>
                        <div class="mb-3">
                            <label for="e_menu_price" class="col-form-label">Price</label>
                            <input required placeholder="Enter Price" type="text" class="form-control" id="e_menu_price" name="e_menu_price">
                        </div>
                        <div class="mb-3">
                            <label for="e_menu_type" class="col-form-label">Type</label>
                            <select required class="form-select" id="e_menu_type" name="e_menu_type">
                                        <option value="" selected disabled>Select Type</option>
                                        <?php 
                                        foreach($type_items as $i){
                                            echo "<option value='".$i['type_name']."'>".$i['type_name']."</option>";
                                        }
                                        ?>
                                        </select>
                        </div>
                        <div class="mb-3">
                            <label for="e_menu_category" class="col-form-label">Category</label>
                            <select required class="form-select" id="e_menu_category" name="e_menu_category">
                                <option value="" selected disabled>Select Category</option>
                                <?php 
                                foreach($cat_items as $i){
                                    echo "<option value='".$i['category_name']."'>".$i['category_name']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="e_menu_description" class="col-form-label">Description</label>
                            <textarea type="text" class="form-control" id="e_menu_description" name="e_menu_description"> </textarea>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="e_menu_image" class="col-form-label">Upload Image</label>
                            <input class="form-control" type="file" id="e_menu_image" name="e_menu_image">
                        </div> -->

                    </div>
                    <div class="modal-footer w-100" style="flex-wrap: nowrap;">
                        <button type="button" class="btn btn-outline-secondary w-50" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="edit_menu" class="btn btn-primary w-50">Submit</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    <!-- Add Modal -->
    <div class="modal fade" id="menuadd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Menu</h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="mformscroll" method="POST" action="add.php">
                    <div class="modal-body">

                        <input required type="hidden" class="form-control a_menu_id" name="a_menu_id">
                        <div class="mb-3">
                            <label for="a_menu_number" class="col-form-label">Number</label>
                            <input required placeholder="Enter Number" type="text" class="form-control" id="a_menu_number" name="a_menu_number">
                        </div>
                        <div class="mb-3">
                            <label for="a_menu_name" class="col-form-label">Menu Name</label>
                            <input required placeholder="Enter Menu name" type="text" class="form-control" id="a_menu_name" name="a_menu_name">
                        </div>
                        <div class="mb-3">
                            <label for="a_menu_price" class="col-form-label">Price</label>
                            <input required placeholder="Enter Price" type="text" class="form-control" id="a_menu_price" name="a_menu_price">
                        </div>
                        <div class="mb-3">
                            <label for="a_menu_type" class="col-form-label">Type</label>
                            <select required class="form-select" id="a_menu_type" name="a_menu_type">
                                        <option value="" selected disabled>Select Type</option>
                                        <?php 
                                        foreach($type_items as $i){
                                            echo "<option value='".$i['type_name']."'>".$i['type_name']."</option>";
                                        }
                                        ?>
                                        </select>
                        </div>
                        <div class="mb-3">
                            <label for="a_menu_category" class="col-form-label">Category</label>
                            <select required class="form-select" id="a_menu_category" name="a_menu_category">
                                <option value="" selected disabled>Select Category</option>
                                <?php 
                                foreach($cat_items as $i){
                                    echo "<option value='".$i['category_name']."'>".$i['category_name']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="a_menu_description" class="col-form-label">Description</label>
                            <textarea type="text" class="form-control" id="a_menu_description" name="a_menu_description"> </textarea>
                        </div>

                    </div>
                    <div class="modal-footer w-100" style="flex-wrap: nowrap;">
                        <button type="button" class="btn btn-outline-secondary w-50" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="add_menu" class="btn btn-success w-50">Add Menu</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- Add Modal -->
    <!-- Delete type Modal -->
    <div class="modal fade" id="menudelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete menu</h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <h1 class="display-1 text-danger">
                            <i class='bi bi-trash-fill'></i>
                        </h1>
                        <h3>Are you sure want to Delete this menu Item ?</h3>
                    </div>

                </div>
                <div class="modal-footer w-100" style="flex-wrap: nowrap;">
                    <button type="button" class="btn btn-outline-secondary w-50" data-bs-dismiss="modal">No</button>
                    <a name="delete_menu" class="btn btn-danger w-50 delete_menu">Yes</a>
                </div>

            </div>
        </div>
    </div>
    <!-- Delete type Modal -->

    <script>
        var menu_deletemodal = document.getElementById('menudelete')
        menu_deletemodal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var recipient = button.getAttribute('data-bs-href')
            var modalbutton = menu_deletemodal.querySelector('.delete_menu')
            modalbutton.setAttribute("href", recipient);

        })
        var menu_editmodal = document.getElementById('menuedit')
        menu_editmodal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget
            var id = button.getAttribute('bs-id')
            var name = button.getAttribute('bs-name')
            var number = button.getAttribute('bs-number')
            var price = button.getAttribute('bs-price')
            var description = button.getAttribute('bs-desc')
            var type = button.getAttribute('bs-type')
            var category = button.getAttribute('bs-category')

            var idvalue = menu_editmodal.querySelector('.e_menu_id')
            var numbervalue = menu_editmodal.querySelector('#e_menu_number')
            var namevalue = menu_editmodal.querySelector('#e_menu_name')
            var typevalue = menu_editmodal.querySelector('#e_menu_type')
            var categoryvalue = menu_editmodal.querySelector('#e_menu_category')
            var pricevalue = menu_editmodal.querySelector('#e_menu_price')
            var descvalue = menu_editmodal.querySelector('#e_menu_description')

            idvalue.setAttribute("value", id);
            namevalue.setAttribute("value", name);
            numbervalue.setAttribute("value", number);
            pricevalue.setAttribute("value", price);
            descvalue.value = description;
            typevalue.value = type;
            categoryvalue.value = category;




        })
    </script>
</body>

</html>

<?php
}
else{
    header('Location:login');
    exit();
}
?>