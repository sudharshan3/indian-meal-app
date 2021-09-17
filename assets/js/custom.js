
$(document).ready(function(){
  
  $(window).on('scroll',function(){
        var scr = $(window).scrollTop();
      if(scr > 1200){
          $("#contactwidget").fadeIn()
      } else if(scr<1200){
        $("#contactwidget").fadeOut()
      }

  });
 

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        $(".filter-button").removeClass('selected');
    //    $(this).parent().parent().find(".filter-button").removeClass(".active");
       
        
        $(this).addClass('selected');
      
        if(value == "all")
        {
            $(".cat_heading").css("display","block");
            $(".cat_heading").html("<b class='mb-2 text-uppercase'>all day menu</b>")
            $('.filter').show('1000');
        } else if(value == "brunch"){
            $(".cat_heading").css("display","block");
            $(".cat_heading").html("<b class='mb-2 text-uppercase'>South Indian & Sri Lankan-cuisines</b>")
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        } else if(value == "wraps"){
            $(".cat_heading").css("display","block");
            $(".cat_heading").html("<b class='mb-2 text-uppercase'>DELHI DELI WRAPS</b> <br><small> Wrap containing a filling enfolded in an Indian flatbread</small>")
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        } else if(value == "chaat"){
            $(".cat_heading").css("display","block");
            $(".cat_heading").html("<b class='mb-2 text-uppercase'>MUMBAI FAMOUS CHAAT</b> <br><small> Set of snacks something sweet, sour, tangy, spicy and crunchy</small>")
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        } else if(value == "wok-meal"){
            $(".cat_heading").css("display","block");
            $(".cat_heading").html("<b class='mb-2 text-uppercase'>KOLKATA STYLE WOK MEAL</b> <br><small> A popular pasta, fried rice and noodles</small>")
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        } 
        else if(value == "veg-meal"){
            $(".cat_heading").css("display","block");
            $(".cat_heading").html("<b class='mb-2 text-uppercase'>Vegetable Meal Deal</b> ")
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        } 
        else if(value == "egg-meal"){
            $(".cat_heading").css("display","block");
            $(".cat_heading").html("<b class='mb-2 text-uppercase'>Egg Meal Deal</b> ")
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        }
        else if(value == "chicken-meal"){
            $(".cat_heading").css("display","block");
            $(".cat_heading").html("<b class='mb-2 text-uppercase'>Chicken Meal Deal</b> ")
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        }
        else if(value == "lamb-meal"){
            $(".cat_heading").css("display","block");
            $(".cat_heading").html("<b class='mb-2 text-uppercase'>Lamb Meal Deal</b> ")
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        }
        else if(value == "desserts"){
            $(".cat_heading").css("display","block");
            $(".cat_heading").html("<b class='mb-2 text-uppercase'>INDIAN POPULAR MILK SWEETS</b><br><small>Hot/Cold</small>")
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        }
        else if(value == "beverages"){
            $(".cat_heading").css("display","block");
            $(".cat_heading").html("<b class='mb-2 text-uppercase'>Beverages</b><br><small>Hot/Cold</small>")
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        } else{
         
            $(".cat_heading").css("display","none");
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        }
        
    });


    $.each($('.notice'), function(index) {
        var pattern = /([-A-Z0-9]{4,})/g;
        var before = '<b style="font-size:14px">';
        var after = '</b>';
        $(this).html($(this).html().replace(pattern, before + "$1" + after));
    });
    $.each($('.descnew'), function(index) {
        var pattern = /([-A-Z0-9]{4,})/g;
        var before = '<b style="font-size:12px">';
        var after = '</b>';
        $(this).html($(this).html().replace(pattern, before + "$1" + after));
    });
  
    


});



    


