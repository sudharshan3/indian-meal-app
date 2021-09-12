
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
            $(".cat_heading").css("display","none");
            $('.filter').show('1000');
        } else if(value == "brunch"){
            $(".cat_heading").css("display","block");
            $(".cat_heading").text("South Indian & Sri Lankan-cuisines")
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        } else if(value == "wraps"){
            $(".cat_heading").css("display","block");
            $(".cat_heading").text("DELHI DELI WRAPS - Wrap containing a filling enfolded in an Indian flatbread")
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        } else if(value == "chaat"){
            $(".cat_heading").css("display","block");
            $(".cat_heading").text("MUMBAI FAMOUS CHAAT - Set of snacks something sweet, sour, tangy, spicy and crunchy")
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        } else if(value == "wok-meal"){
            $(".cat_heading").css("display","block");
            $(".cat_heading").text("KOLKATA STYLE WOK MEAL - A popular pasta, fried rice and noodles")
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        } 
        else if(value == "desserts"){
            $(".cat_heading").css("display","block");
            $(".cat_heading").text("Hot or cold Indian popular sweets")
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        }
        else if(value == "beverages"){
            $(".cat_heading").css("display","block");
            $(".cat_heading").text("Hot or cold drinks")
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
        }
        else
        {
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



    


