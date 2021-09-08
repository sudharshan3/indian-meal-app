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
                <a class="nav-link menubuttons" href="./menu.php">
                    <i class="bi bi-basket2-fill "></i>
                    <small>Menu</small>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link menubuttons active" href="./settings.php">
                    <i class="bi bi-gear-fill "></i>
                    <small>Settings</small>
                </a>
            </li>
        </ul>

    </div>
    <div>
        <div class=' py-2 px-3 sticky-top bg-danger text-white d-flex align-items-center justify-content-between shadow-sm'>
            <h3 class=""> <i class="bi bi-gear-fill me-2"></i> Settings</h3>
            <h3>
               <a href="./logout.php" class="btn btn-danger btn-lg">

               <i class="bi bi-box-arrow-in-left"></i> Logout
               </a> </h3>
        </div>
        <div class="container pb-5 mt-2 mb-5">

        <?php
                    if (isset($_SESSION['addstatus'])){
                        ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> <?php   echo $_SESSION['addstatus'];?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                    <?php                      
                        unset($_SESSION['addstatus']);
                    } else if(isset($_SESSION['editstatus'])){
                    ?>
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Updated!</strong> <?php   echo $_SESSION['editstatus'];?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                    <?php
                          unset($_SESSION['editstatus']);
                        } else if(isset($_SESSION['delstatus'])){
                    ?>
                                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Deleted!</strong> <?php   echo $_SESSION['delstatus'];?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php
                          unset($_SESSION['delstatus']);
                        } 
                    ?>


            <ul class="nav nav-pills my-3 shadow-sm p-0 nav-justified bg-white" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active mb-0" id="category-home-tab" data-bs-toggle="pill" data-bs-target="#category-home" type="button" role="tab" aria-controls="category-home" aria-selected="true">
                    <i class="bi bi-ui-checks-grid "></i>
                    Category
                </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link mb-0" id="type-home-tab" data-bs-toggle="pill" data-bs-target="#type-home" type="button" role="tab" aria-controls="type-home" aria-selected="false">
                    <i class="bi bi-funnel-fill "></i>
                    Types
                </button>
                </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="category-home" role="tabpanel" aria-labelledby="category-home-tab">
                    <a class="btn btn-success rounded-circle position-fixed m-3 p-3 text-white shadow-lg" style="bottom: 4rem;right: 0;" data-bs-toggle='modal' data-bs-target='#categoryadd'>
                        <h3 class="mb-0"><i class="bi bi-plus-lg"></i> </h3>
                    </a>
                    
                    <div class="row">
                        <?php
                       if ($cat_status == 0){
                           echo "<div class='col-12 text-center'>
                           <div class='py-5 my-5'>
                           <h2 class='text-muted'>
                           No items to display
                           </h2>
                           </div>
                           
                           
                           </div>";
                       }
                       else{
                        foreach($cat_items as $i){
                            echo "<div class='col-sm-12 col-md-6'>
                                <div class='bg-white rounded shadow-sm p-3 mb-2'>
                                    <div class='py-2'>
                                        <h5>".$i['category_name']."</h5>
                                    </div>                           
                                    <div class='row w-100'>
                                        <div class='col-6'>
                                            <a data-bs-name='".$i['category_name']."' data-bs-id='".$i['id']."' class='btn btn-outline-primary w-100' data-bs-toggle='modal' data-bs-target='#categoryedit'>
                                                <i class='bi bi-pencil-fill'>
                                                </i> Edit
                                            </a>
                                        </div>
                                        <div class='col-6'>
                                            <a data-bs-href='./delete.php?cat_deleteid=".$i['id']."' data-bs-toggle='modal' data-bs-target='#categorydelete' class='btn btn-outline-danger w-100'><i class='bi bi-trash-fill'></i>
                                                 Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>";
                                                }
                       }
                     
                            
                        
                  
           
                    ?>


                    </div>
                </div>
                <div class="tab-pane fade" id="type-home" role="tabpanel" aria-labelledby="type-home-tab">
                    <a class="btn btn-success rounded-circle position-fixed m-3 p-3 text-white shadow-lg" style="bottom: 4rem;right: 0;" data-bs-toggle='modal' data-bs-target='#typeadd'>
                        <h3 class="mb-0"><i class="bi bi-plus-lg"></i> </h3>
                    </a>
                    
                    <div class="row">
                        <?php

                        
                       
if ($type_status == 0){
    echo "<div class='col-12 text-center'>
    <div class='py-5 my-5'>
    <h2 class='text-muted'>
    No items to display
    </h2>
    </div>
    
    
    </div>";
}
else{
 foreach($type_items as $i){
     echo "<div class='col-sm-12 col-md-6'>
         <div class='bg-white rounded shadow-sm p-3 mb-2'>
             <div class='py-2'>
                 <h5>".$i['type_name']."</h5>
             </div>                           
             <div class='row w-100'>
                 <div class='col-6'>
                     <a data-bs-name='".$i['type_name']."' data-bs-id='".$i['id']."' class='btn btn-outline-primary w-100' data-bs-toggle='modal' data-bs-target='#typeedit'>
                         <i class='bi bi-pencil-fill'>
                         </i> Edit
                     </a>
                 </div>
                 <div class='col-6'>
                     <a data-bs-href='./delete.php?type_deleteid=".$i['id']."' data-bs-toggle='modal' data-bs-target='#typedelete' class='btn btn-outline-danger w-100'><i class='bi bi-trash-fill'></i>
                          Delete</a>
                 </div>
             </div>
         </div>
     </div>";
                         }
}

     
 


?>
                    </div>
                </div>


            </div>
        </div>

    </div>


    <!-- Add Modal -->
    <div class="modal fade" id="categoryadd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Category</h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add_category" method="POST" action="add.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="cat_name" class="col-form-label">Category Name</label>
                            <input required  placeholder="Enter Category name" type="text" class="form-control" id="cat_name" name="a_cat_name">
                        </div>

                    </div>
                    <div class="modal-footer w-100" style="flex-wrap: nowrap;">
                        <button type="button" class="btn btn-outline-secondary w-50" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="add_cat" class="btn btn-success w-50">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Modal -->
    <!-- Add Type Modal -->
    <div class="modal fade" id="typeadd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Type</h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add_category" method="POST" action="add.php">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="type_name" class="col-form-label">Type Name</label>
                            <input required  placeholder="Enter Type name" type="text" class="form-control" id="type_name" name="a_type_name">
                        </div>

                    </div>
                    <div class="modal-footer w-100" style="flex-wrap: nowrap;">
                        <button type="button" class="btn btn-outline-secondary w-50" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="add_type" class="btn btn-success w-50">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Add Type Modal -->
    <!-- Edit Modal -->
    <div class="modal fade" id="categoryedit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Category</h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit_category" method="POST" action="edit.php">
                    <div class="modal-body">
                        <input required  type="hidden" class="form-control catid" name="cat_id">
                        <div class="mb-3">
                            <label for="cat_name" class="col-form-label">Category Name</label>
                            <input required  placeholder="Enter Category name" type="text" class="form-control e_cat_name" id="e_cat_name" name="e_cat_name">
                        </div>

                    </div>
                    <div class="modal-footer w-100" style="flex-wrap: nowrap;">
                        <button type="button" class="btn btn-outline-secondary w-50" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="edit_cat" class="btn btn-primary w-50">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal -->
    <!-- Edit Type Modal -->
    <div class="modal fade" id="typeedit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Type</h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="edit_type" method="POST" action="edit.php">
                    <div class="modal-body">
                        <input required  type="hidden" class="form-control typeid" name="type_id">
                        <div class="mb-3">
                            <label for="type_name" class="col-form-label">Type Name</label>
                            <input required  placeholder="Enter Type name" type="text" class="form-control e_type_name" id="e_type_name" name="e_type_name">
                        </div>

                    </div>
                    <div class="modal-footer w-100" style="flex-wrap: nowrap;">
                        <button type="button" class="btn btn-outline-secondary w-50" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" name="edit_type" class="btn btn-primary w-50">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Type Modal -->
    <!-- Delete Modal -->
    <div class="modal fade" id="categorydelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Category</h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <h1 class="display-1 text-danger">
                            <i class='bi bi-trash-fill'></i>
                        </h1>
                        <h3>Are you sure want to Delete this category?</h3>
                    </div>

                </div>
                <div class="modal-footer w-100" style="flex-wrap: nowrap;">
                    <button type="button" class="btn btn-outline-secondary w-50" data-bs-dismiss="modal">No</button>
                    <a name="delete_cat" class="btn btn-danger w-50 delete_cat">Yes</a>
                </div>

            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <!-- Delete type Modal -->
    <div class="modal fade" id="typedelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="staticBackdropLabel">Delete Category</h5>
                    <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <h1 class="display-1 text-danger">
                            <i class='bi bi-trash-fill'></i>
                        </h1>
                        <h3>Are you sure want to Delete this category?</h3>
                    </div>

                </div>
                <div class="modal-footer w-100" style="flex-wrap: nowrap;">
                    <button type="button" class="btn btn-outline-secondary w-50" data-bs-dismiss="modal">No</button>
                    <a name="delete_type" class="btn btn-danger w-50 delete_type">Yes</a>
                </div>

            </div>
        </div>
    </div>
    <!-- Delete type Modal -->
</body>
<script>
    var cat_deletemodal = document.getElementById('categorydelete')
    cat_deletemodal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var recipient = button.getAttribute('data-bs-href')
        var modalbutton = cat_deletemodal.querySelector('.delete_cat')
        modalbutton.setAttribute("href", recipient);

    })

    var type_deletemodal = document.getElementById('typedelete')
    type_deletemodal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var recipient = button.getAttribute('data-bs-href')
        var modalbutton = type_deletemodal.querySelector('.delete_type')
        modalbutton.setAttribute("href", recipient);

    })


    var cat_editmodal = document.getElementById('categoryedit')
    cat_editmodal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var iddata = button.getAttribute('data-bs-id')
        var namedata = button.getAttribute('data-bs-name')

        var idvalue = cat_editmodal.querySelector('.catid')
        var namevalue = cat_editmodal.querySelector('.e_cat_name')
        idvalue.setAttribute("value", iddata);
        namevalue.setAttribute("value", namedata);

    })

    var type_editmodal = document.getElementById('typeedit')
    type_editmodal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget
        var iddata = button.getAttribute('data-bs-id')
        var namedata = button.getAttribute('data-bs-name')

        var idvalue = type_editmodal.querySelector('.typeid')
        var namevalue = type_editmodal.querySelector('.e_type_name')
        idvalue.setAttribute("value", iddata);
        namevalue.setAttribute("value", namedata);

    })
</script>

</html>

<?php
}
else{
    header('Location:login');
    exit();
}
?>