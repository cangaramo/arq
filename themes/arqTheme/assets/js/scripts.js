$( document ).ready(function() {

    // Count up
    $('.counter').counterUp({
        delay: 10,
        time: 2000,
    });

    if( $('.arcs').length ) {

        var controller = new ScrollMagic.Controller();

        var tween = TweenMax.staggerFromTo(".arc_1", 2 , {top: 20, left: 0}, {top: 250, left: 200, ease: Linear.easeNone}, 0.15);

        var scene = new ScrollMagic.Scene({triggerElement: "#trigger-arcs", duration: 900, offset: -100 })
        .setTween(tween)
        .addTo(controller);

        var tween2 = TweenMax.staggerFromTo(".arc_2", 5 , {top: 300, right: 0}, {top: 500, right: 300, ease: Linear.easeNone}, 0.15);

        var scene2 = new ScrollMagic.Scene({triggerElement: "#trigger-arcs", duration: 700, offset: 100 })
        .setTween(tween2)
        .addTo(controller);
    }

    if( $('.products').length ) {

        var controller = new ScrollMagic.Controller();

        $(".product" ).each(function( index ) {
            img = $(".product-img").eq(index);
            trigger = "#product" + index;
            trigger_name = "trigger" + index;

            img.css( "top", "80px"); 
            
            new ScrollMagic.Scene({triggerElement: trigger, offset: -80})
            .setTween(img, 0.9, {opacity: 1, top:0})
            .addTo(controller)
            .reverse(false);  
        });
    }

    if( $('.shapeA').length ) {

        var controller = new ScrollMagic.Controller();

        var tween = TweenMax.staggerFromTo(".shapeA", 2 , {top: -80, left: -280}, {top: 350, left: -200, ease: Linear.easeNone}, 0.15);

        var scene = new ScrollMagic.Scene({triggerElement: "#trigger-shapeA", duration: 900, offset: -40 })
        .setTween(tween)
        .addTo(controller);
    }


    /* Search */

    $( "#query-search" ).on('change keydown paste input', function(){
        s = $(this).val();
        LoadPosts(s);
    });

    $( ".open-search" ).click(function() {
        $(".search-box").slideDown( "slow", function() {
            $(".search-box .container").fadeIn("fast");
            $(".search-box .close-window").fadeIn("fast");
            $("#query-search").focus();
        });
    });

    $( ".close-search" ).click(function() {
        $(".search-box .close-window").fadeOut("fast");
        $(".search-box .container").fadeOut( "fast", function() {
            $(".search-box").slideUp("slow");
        });
    });

});


function LoadPosts(keyword){

	var ajaxurl = $(".search-box").data("url");

    
    $.ajax({
        url: ajaxurl,
        type : 'post',
        data : {
            action : 'load_posts',
            keyword: keyword
        },
        beforeSend:function(xhr){

        },
        success:function(response){
			$('.results-container').html(response);
        }
    });
    return false;
}