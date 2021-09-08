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
    <meta name="title" content="Indian Meal - LUTON">
    <meta name="description" content="Tasty indian foods. George street, LUTON">
    <meta name="keywords" content="food,luton,indian foods, idly, sambar, uk">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/custom.css">
    <link rel="stylesheet" href="./assets/css/animate.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet " href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css ">
    <link rel="stylesheet " href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css ">
    <link rel="stylesheet " href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css ">
    <link href="http://fonts.cdnfonts.com/css/helvetica-neue-9" rel="stylesheet">

    <style>

    </style>
</head>

<body style="position:relative">

    <a href="#contactregion" id='contactwidget' class="btn btn-danger rounded-circle position-fixed m-3 p-3 text-white shadow-lg" style="bottom: 1rem;right: 0;z-index:99999!important;display: none;">
        <h4 class="mb-0"><i class="bi bi-telephone-fill"></i> </h4>
    </a>
    <section class="bg-danger rounded-bottom " style="padding-bottom: 9rem;">
        <div class="container text-center text-white py-5">
            <img class="pb-2 mb-4 homeimage wow zoomIn " src="./assets/images/HEADERLOGO.png" alt="" style="width:90%">
            <!-- <h1 class="display-1 pb-2 wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".5s" style="font-weight: bolder;letter-spacing: 3px;">
                <span>INDIAN</span>
                <span>MEALS</span>
            </h1> -->
            <!-- <h2 class=" ">
                <span class="badge rounded-pill bg-warning text-dark wow fadeInUp" data-wow-duration=".8s" data-wow-delay=".9s">George Street , LUTON, Bedfordshire</span>
            </h2> -->
        </div>
    </section>
    <section class="position-relative" style="transform: translateY(-10rem);">
        <div class="container">

            <div class="wow fadeInUp owl-carousel home_slider" data-wow-duration="1s" data-wow-delay="1s">
                <div class="shadow item  rounded bg-warning m-3 slide_img" style="background-image: url('./assets/images/store\ \(1\).jpg');"></div>
                <div class="shadow item  rounded bg-warning m-3 slide_img" style="background-image: url('./assets/images/store\ \(2\).jpg');"></div>
            </div>


        </div>
    </section>
    <section style="transform: translateY(-8rem);">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 wow zoomIn" data-wow-duration=".8s" data-wow-delay="0.1s">
                    <div class="shadow rounded text-white text-center py-3 m-2 bg-primary">

                        <h3 class="mt-2 text-uppercase">We’re open 7 days a week</h3>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 wow zoomIn" data-wow-duration=".8s" data-wow-delay="0.2s">
                    <div class="shadow rounded text-white  text-center py-3 m-2 bg-danger">
                        <h6>MONDAY TO SATURDAY</h6>
                        <h3 class="mt-2">10.00-21.00</h3>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 wow zoomIn" data-wow-duration=".8s" data-wow-delay="0.3s">
                    <div class="shadow rounded text-dark  text-center py-3 m-2 bg-warning">
                        <h6>SUNDAY AND BANK HOLIDAY</h6>
                        <h3 class="mt-2">11.00-20.00</h3>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section style="transform: translateY(-4rem);">
        <div class="container">
            <div class="shadow rounded text-white  text-center p-3 m-2 bg-success">

                <h6 class="m-0 notice"> FOOD ALLERGIES and INTOLERANCES Please speak to our staff about the ingredients in your meal While placing order. Thank you


                </h6>

            </div>
            <div class="shadow rounded text-white  text-center p-3 m-2 bg-danger">

                <h6 class="m-0 notice"> As we use shared equipment, We cannot guarantee that our food is 100% free of any allergen


                </h6>

            </div>
        </div>
    </section>
    <section class="bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <h1 class="display-4 mb-4" style="font-weight: bolder;letter-spacing: 3px;">MENU</h1>
                </div>
                <div class="bg-light menu_type sticky-top py-2" align="center">
                    <?php
                    $sorted = rsort($shrink_type);
               
    foreach($shrink_type as $type){
        $typeclass = strtolower($type);
        
        if ($type == "Vegan"){
            $color = "soft-success";
        } else if ($type == "Non-Veg"){
            $color = "soft-danger";
        } else if ($type == "Veg"){
            $color = "soft-primary";
        } else if ($type == "Desserts"){
            $color = "soft-warning";
        } else if ($type == "Beverages"){
            $color = "soft-info";
        }  else {
            $color = "soft-dark";
        }

echo "<button class='smallbuttons btn btn-sm btn-default filter-button bg-".$color." ' data-filter='".$typeclass."'>".$type."</button>";
    }
    ?>

                </div>
                <div class="bg-light menu-category mb-3 rounded" align="center" style="position: sticky;top:3.5rem">
                    <button class="btn  btn-default filter-button bigbuttons selected" data-filter="all">All Day Menu</button>

                    <?php
                 foreach($shrink_category as $value){
                    $spaceless = preg_replace('/\s+/', '', $value);
                    $data_value1 = strtolower($spaceless);
                    $data_value2 = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $data_value1);
                    $data_value = str_replace('&', '', $data_value2);
                    echo  "<button class='btn  btn-default bigbuttons filter-button ' data-filter='".$data_value."'>".$value."</button>" ;
                  }
                 ?>

                </div>
                <br/>
                <div class="text-center  w-100">
                    <h6 class="cat_heading text-uppercase" style="display: none;">

                    </h6>
                </div>
                <div class="menu_product row ">


                    <?php 
                      
                    foreach($items as $item){                      
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
                          <div class='d-flex justify-content-between align-items-start'>
                              <div>
                                  <h6 class='pe-2'><b> ".$item["Number"].". <span class='menu-title'>".$item["Name"]."</span></b></h6>

                                  <small class=' badge bg-".$color."'>".$item["Type"]."</small>
                              </div>
                              <h5 class='text-danger text-nowrap'><b>".$item["Price"]."</b> </h5>
                          </div>

                          <hr>
                          <small class='descnew'>".$item["Description"]."</small>
                      </div>
                  </div>";
                  }
                  ?>




                </div>



            </div>
        </div>
    </section>


    <section class="bg-danger py-5" id="contactregion">
        <div class="container text-center text-white">
            <h1 class="display-4 mb-4" style="font-weight: bolder;letter-spacing: 3px;">CONTACT US</h1>
            <div class="row">
                <div class="col-sm-12 col-lg-4 mb-3 h-100">
                    <div class="shadow-lg bg-white rounded p-3 text-dark text-center alginall">
                        <div>
                            <h4> <i class="bi bi-geo-alt-fill  text-danger"></i></h4>
                            <h6 class="m-0 ">Location</h6>
                            <hr>
                        </div>

                        <div class="text-center mb-4 h-30">
                            <h5 class="mb-1">
                                Pitch 9, George Street, LUTON, Bedfordshire LU1 2AQ
                            </h5>
                            <small>
                                <strong>LANDMARK: OPPOSITE TO SPECSAVERS</strong>
                            </small>

                        </div>
                        <a href="https://goo.gl/maps/Xh9nHismV3WNsS426" target="_blank" class="btn btn-lg btn-danger w-100 rounded-pill">Get Directions</a>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4 mb-3 ">
                    <div class="shadow-lg bg-white rounded p-3 text-dark text-center  alginall">
                        <div>
                            <h4> <i class="bi bi-telephone-fill  text-success"></i></h4>
                            <h6 class="m-0 ">Phone</h6>
                            <hr>
                        </div>

                        <div class="text-center mb-4 h-30">
                            <h5 class="mb-1">
                                07827 016 786
                            </h5>


                        </div>
                        <a href="tel:07377700775" target="_blank" class="btn btn-lg btn-success w-100 rounded-pill">Call Now</a>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4 mb-3">
                    <div class="shadow-lg bg-white rounded p-3 text-dark text-center  alginall">
                        <div>
                            <h4> <i class="bi bi-envelope-fill  text-primary p-2"></i></h4>
                            <h6 class="m-0 ">Email</h6>
                            <hr>
                        </div>

                        <div class="text-center mb-4 h-30">
                            <h5 class="mb-1">
                                indian.meals@yahoo.co.uk
                            </h5>


                        </div>
                        <a href="mailto:indian.meals@yahoo.co.uk" target="_blank" class="btn btn-lg btn-primary w-100 rounded-pill">Mail Us</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js "></script> -->


    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="./assets/js/custom.js"></script>
    <script src="./assets/js/wow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js "></script>


    <script>
        new WOW().init();
        $("#owl-demo").owlCarousel({
            navigation: true
        });
        $(function() {
            $(".owl-carousel").owlCarousel();
        });
        $('.home_slider').owlCarousel({
            center: true,
            loop: true,
            nav: false,
            autoplay: true,
            dots: false,
            margin: 0,
            autoplayTimeout: 4000,
            responsive: {
                0: {
                    items: 1
                }

            }
        })
    </script>


</body>




</html>