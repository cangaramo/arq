var current_page_documents = 1;
var current_page_updates = 1;
var current_page_news = 1;
var current_doc_year = -1;
var num_news = 3;

$( document ).ready(function() {

    // Count up
    $('.counter').counterUp({
        delay: 10,
        time: 2000,
    });


    /* SLIDERS */

    //Load sliders
    $('.board-members').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        arrows: true,
        dots: true,
        draggable: false,
        responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
        ]
    });

    $('.management-team').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        arrows: true,
        dots: true,
        draggable: false,
        responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
        ]
    });

    //Hide management
    $('#board-slider').hide();

    //Change slider
    $( ".open-slider" ).click(function() {

        slider = $(this).data("slider");

        if (slider == "board") {
            $('#management-slider').hide();
            $('.board-members').slick("slickGoTo", 0);
            $('.board-members').slick('refresh');
            $('#board-slider').show();
            
            $('.open-slider').removeClass("active");
            $(this).addClass("active");
        }
        else if (slider == "management") {
            $('#board-slider').hide();
            $('.management-team').slick("slickGoTo", 0);
            $('.management-team').slick('refresh');
            $('#management-slider').show();

            $('.open-slider').removeClass("active");
            $(this).addClass("active");        
        }
       
    });


    /* Animations */

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


    if( $('.shapeArq').length ) {

        var controller = new ScrollMagic.Controller();

        var tween = TweenMax.staggerFromTo(".shapeArq", 2 , {top: 0, left: -50}, {top: 1500, left: 20, ease: Linear.easeNone}, 0.15);

        var scene = new ScrollMagic.Scene({triggerElement: "#trigger-shapeArq", duration: 2000, offset: 0 })
        .setTween(tween)
        .addTo(controller);
    }

    if( $('.video-box').length ) { 

        $(".video-box" ).each(function( index ) {

            var controller = new ScrollMagic.Controller();

            id = $(this).attr('id');            
            text = $(".video-box .text").eq(index);
            trigger = "#" + id;
                
            new ScrollMagic.Scene({triggerElement: trigger, offset: 80})
            .setTween(text, 0.9, {opacity: 1, left:0})
            .addTo(controller)
            .reverse(false);  
        });
    }

    if( $('.copy-image').length ) { 

        $(".copy-image" ).each(function( index ) {

            var controller = new ScrollMagic.Controller();

            id = $(this).attr('id');            
            text = $(".copy-image .text").eq(index);
            trigger = "#" + id;
                
            new ScrollMagic.Scene({triggerElement: trigger, offset: -320})
            .setTween(text, 1.1, {opacity: 1, top:0})
            .addTo(controller)
            .reverse(false);
        });
    }

    if( $('.publication').length ) { 

        var controller = new ScrollMagic.Controller();

        trigger = "#trigger-move-img";
        img = $("#move-img");
        img.css( "top", "70px"); 
        img.css( "opacity", 0); 

        new ScrollMagic.Scene({triggerElement: trigger, offset: -80})
        .setTween(img, 1.1, {opacity: 1, top:0})
        .addTo(controller)
        .reverse(false);  
    }


    if( $('.numbers').length ) { 
        
        var controller = new ScrollMagic.Controller();

        trigger = "#numbers-trigger";
        numbers = $(".numbers");
        numbers.css( "top", "100px"); 
        numbers.css( "opacity", 0); 

        new ScrollMagic.Scene({triggerElement: trigger, offset: -40})
        .setTween(numbers, 1, {opacity: 1, top:0})
        .addTo(controller)
        .reverse(false);  
    }

    if( $('.banner').length ) { 
        
        var controller = new ScrollMagic.Controller();

        trigger = ".banner";
        title = $(".banner h1");
        title.css( "left", "-50px"); 
        title.css( "opacity", 0); 

        new ScrollMagic.Scene({triggerElement: trigger, offset: 0})
        .setTween(title, 0.9, {opacity: 1, left:0})
        .addTo(controller)
        .reverse(false);  
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


    /* Load documents */
    if( $('#documents-response').length ) {
        LoadDocuments();
    }

    // Pagination documents 
    $('body').on('click', '#documents-response .next-btn', function(){
        current_page_documents = parseInt(current_page_documents) + 1;
        LoadDocuments();
	});

	$('body').on('click', '#documents-response .prev-btn', function(){
        current_page_documents = parseInt(current_page_documents) - 1;
        LoadDocuments();
	});
    
	$('body').on('click', '#documents-response .changePage', function(){
        new_page = $(this).val();
        current_page_documents = new_page;
        LoadDocuments();
    }); 

    $('select').on('change', function() {
        current_doc_year = this.value;
        LoadDocuments();
    });


    /* Load updates */
     if( $('#updates-response').length ) {
        LoadUpdates();
    }

    // Pagination updates 
    $('body').on('click', '#updates-response .next-btn', function(){
        current_page_updates = parseInt(current_page_updates) + 1;
        LoadUpdates();
	});

	$('body').on('click', '#updates-response .prev-btn', function(){
        current_page_updates = parseInt(current_page_updates) - 1;
        LoadUpdates();
	});
    
	$('body').on('click', '#updates-response .changePage', function(){
        new_page = $(this).val();
        current_page_updates = new_page;
        LoadUpdates();
    }); 


    /* Load news */
    if( $('#news-response').length ) {
        LoadNews();
    }

    $('body').on('click', '#more-news', function(){
        current_page_news = parseInt(current_page_news) + 1;
        LoadNews();

        num_news = parseInt(num_news) + 4;
        total = $('#news-response').data("total");
     
        if (num_news >= total) {
            $('#more-news').hide();
        }

    }); 


    /* Vacancy */
    $('.vacancy .open').click(function(){
        
        text = $(this).text();

        if (text == "View"){
            $(this).text("Close");
        }
        else {
            $(this).text("View");
        }

    });

    /* Open modal person */
    $('body').on('click', '.open-person', function(){
       
        bio = $(this).data("bio");
        image = $(this).data("image");
        title = $(this).data("title");
        role = $(this).data("role");

        $('#modalPerson .bio').html(bio);
        $('#modalPerson .image').attr("src", image);
        $('#modalPerson .role').text(role);
        $('#modalPerson .title').text(title);
        $('#modalPerson').modal('show');
    });

    /* Play audio */
    $('body').on('click', '.play-audio', function(){

        audio = $(this).data("audio");
        $('#audio-player source').attr("src", audio);
        document.getElementById('audio-player').load();

        $('#audio-player-cont').fadeIn("fast", function(){
           
            document.getElementById('audio-player').play();
        });
        
    });

    /* Close audio */
    $('body').on('click', '.close-audio', function(){

        document.getElementById('audio-player').pause();
        $('#audio-player-cont').fadeOut("fast");
    });


    /* Mobile menu */
    $('body').on('click', '.navbar-toggler', function(){
        
        if ( $(this).hasClass("collapsed") ){

            $(this).removeClass("collapsed");
            $( "#red" ).css("border-radius", "0 0 0 50%");
            $( "#red" ).css("width", "50px");
        
            $( "#red" ).animate(
                {
                    height: "100vh",
                    width: "180%"
                }, 
                {
                    duration: 700,
                    easing: "swing",
                    complete: function() {
                        $('header').css("height", "100vh");
                        $('.navbar-collapse').collapse("show");
                        $( ".navbar-nav" ).delay(30).animate({
                            opacity: 1,
                            }, 600
                        );
                    }
                }
            );
        }

        else {
            $(this).addClass("collapsed");
            $( "#red" ).css("border-radius", "0");

            $( ".navbar-nav" ).animate({
                opacity: 0,
                }, 
                {
                    duration: 300,
                    complete: function(){
                        $('.navbar-collapse').collapse("hide");
                        $('header').css("height", "auto");
                        $( "#red" ).delay(10).animate(
                            {
                                height: "50px",
                                width: "100%"
                            }, 
                            {
                                duration: 600,
                                easing: "swing",
                            }
                        );
                    }
                }
            );
        }
    
    });


    //change order gravity form
    if (window.innerWidth < 640) { 
        field = $("#field_1_3")
        $("#gform_fields_1").append(field);
    }


    //Activity
    $('body').on('click', '.activity', function(){
        post = $(this).data("post");
        SetActivity(post);
    });


    /* Redirect open modal */
    $(window).on('hashchange', function(e){

        url = window.location.href;
        if ( url.includes("management-team") ) {
            refreshSlider("management");
        }
        else if ( url.includes("board-directors") ) {
            refreshSlider("board");
        }
    });

    if (window.location.hash) {

        url = window.location.href;
        if ( url.includes("management-team") ) {
            refreshSlider("management");
        }
        else if ( url.includes("board-directors") ) {
            refreshSlider("board");
        }
    }


    $('.dropdown .fas').click(function(){ 
        index = $('.dropdown .fas').index(this);
        console.log(index);
        $('.dropdown').eq(index).find("div").toggle();
    }); 

    if( $('#documents-response').length ) {

        var accepted = getCookie("accepted");
		if (accepted != 1) {
            $('#disclaimerModal').modal({
                backdrop: 'static',
                keyboard: false
            });		
        }
    }

    $('#disclaimerModal .accept-btn').click(function(){ 
        setCookie("accepted", 1, 60);
    });
});

//Cookies
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
  
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}


function refreshSlider(slider) {

    if (slider == "board") {
        $('#management-slider').hide();
        $('.board-members').slick("slickGoTo", 0);
        $('.board-members').slick('refresh');
        $('#board-slider').show();
        
        $('.open-slider').removeClass("active");
        $('.open-slider').eq(1).addClass("active");
    }
    else if (slider == "management") {
        $('#board-slider').hide();
        $('.management-team').slick("slickGoTo", 0);
        $('.management-team').slick('refresh');
        $('#management-slider').show();

        $('.open-slider').removeClass("active");
        $('.open-slider').eq(0).addClass("active");        
    }
}


function SetActivity(post){

    protocol = window.location.protocol
    host = window.location.host;
    home_url = protocol + "//" + host;
    
    ajax_url = home_url + "/wp-admin/admin-ajax.php";

    console.log(ajax_url);

    $.ajax({
        url: ajax_url,
        type : 'post',
        data : {
            action : 'set_activity',
            post: post,
        },
        beforeSend:function(xhr){

        },
        success:function(response){
			console.log(response);
        }
    });

    return false; 
}

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


function LoadDocuments(val){

    protocol = window.location.protocol
    host = window.location.host;
    home_url = protocol + "//" + host;
    
    ajax_url = home_url + "/wp-admin/admin-ajax.php";

    posts_per_page = 6;

    $.ajax({
        url: ajax_url,
        type : 'post',
        data : {
            action : 'load_documents',
            current_page: current_page_documents,
            posts_per_page: posts_per_page,
            year: current_doc_year
        },
        beforeSend:function(xhr){

        },
        success:function(response){
			$('#documents-response').html(response);
        }
    });

    return false;
}


function LoadUpdates(){

    protocol = window.location.protocol
    host = window.location.host;
    home_url = protocol + "//" + host;
    
    ajax_url = home_url + "/wp-admin/admin-ajax.php";

    posts_per_page = 3;

    $.ajax({
        url: ajax_url,
        type : 'post',
        data : {
            action : 'load_updates',
            current_page: current_page_updates,
            posts_per_page: posts_per_page,
        },
        beforeSend:function(xhr){

        },
        success:function(response){
			$('#updates-response').html(response);
        }
    });

    return false;
}


function LoadNews(){

    protocol = window.location.protocol
    host = window.location.host;
    home_url = protocol + "//" + host;
    
    ajax_url = home_url + "/wp-admin/admin-ajax.php";

    $.ajax({
        url: ajax_url,
        type : 'post',
        data : {
            action : 'load_news',
            current_page: current_page_news,
        },
        beforeSend:function(xhr){

        },
        success:function(response){
			$('#news-response').append(response);
        }
    });

    return false;
}


function redirectTo(url, tab) {

    if (tab) {
        window.open(url, '_blank');
    }
    else {
        window.location.href = url;
    }
   
}



