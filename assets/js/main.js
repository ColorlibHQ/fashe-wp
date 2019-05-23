
(function ($) {
    "use strict";
    
    /*[ Load page ]
    ===========================================================*/
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div data-loader="ball-scale"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'html',
        transition: function(url){ window.location.href = url; }
    });

    $('.quantity > button').on( 'click', function(){
        $('.actions button').removeAttr('disabled');
    } );
    
    /*[ Back to top ]
    ===========================================================*/
    var windowH = $(window).height()/2;

    $(window).on('scroll',function(){
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display','flex');
        } else {
            $("#myBtn").css('display','none');
        }
    });

    $('#myBtn').on("click", function(){
        $('html, body').animate({scrollTop: 0}, 300);
    });


    /*[ Show header dropdown ]
    ===========================================================*/
    $('.js-show-header-dropdown').on('click', function(){
        $(this).parent().find('.header-dropdown')
    });

    var menu = $('.js-show-header-dropdown');
    var sub_menu_is_showed = -1;

    for(var i=0; i<menu.length; i++){
        $(menu[i]).on('click', function(){ 
            
                if(jQuery.inArray( this, menu ) == sub_menu_is_showed){
                    $(this).parent().find('.header-dropdown').toggleClass('show-header-dropdown');
                    sub_menu_is_showed = -1;
                }
                else {
                    for (var i = 0; i < menu.length; i++) {
                        $(menu[i]).parent().find('.header-dropdown').removeClass("show-header-dropdown");
                    }

                    $(this).parent().find('.header-dropdown').toggleClass('show-header-dropdown');
                    sub_menu_is_showed = jQuery.inArray( this, menu );
                }
        });
    }

    $(".js-show-header-dropdown, .header-dropdown").click(function(event){
        event.stopPropagation();
    });

    $(window).on("click", function(){
        for (var i = 0; i < menu.length; i++) {
            $(menu[i]).parent().find('.header-dropdown').removeClass("show-header-dropdown");
        }
        sub_menu_is_showed = -1;
    });


     /*[ Fixed Header ]
    ===========================================================*/
    var posWrapHeader = $('.topbar').height();
    var header = $('.container-menu-header');

    $(window).on('scroll',function(){

        if($(this).scrollTop() >= posWrapHeader) {
            $('.header1').addClass('fixed-header');
            $(header).css('top',-posWrapHeader); 

        }  
        else {
            var x = - $(this).scrollTop(); 
            $(header).css('top',x); 
            $('.header1').removeClass('fixed-header');
        } 

        if($(this).scrollTop() >= 200 && $(window).width() > 992) {
            $('.fixed-header2').addClass('show-fixed-header2');
            $('.header2').css('visibility','hidden'); 
            $('.header2').find('.header-dropdown').removeClass("show-header-dropdown");
            
        }  
        else {
            $('.fixed-header2').removeClass('show-fixed-header2');
            $('.header2').css('visibility','visible'); 
            $('.fixed-header2').find('.header-dropdown').removeClass("show-header-dropdown");
        } 

    });
    
    /*[ Show menu mobile ]
    ===========================================================*/
    $('.btn-show-menu-mobile').on('click', function(){
        $(this).toggleClass('is-active');
        $('.wrap-side-menu').slideToggle();
    });

    var arrowMainMenu = $('.arrow-main-menu');

    for(var i=0; i<arrowMainMenu.length; i++){
        $(arrowMainMenu[i]).on('click', function(){
            $(this).parent().find('.sub-menu').slideToggle();
            $(this).toggleClass('turn-arrow');
        })
    }

    $(window).resize(function(){
        if($(window).width() >= 992){
            if($('.wrap-side-menu').css('display') == 'block'){
                $('.wrap-side-menu').css('display','none');
                $('.btn-show-menu-mobile').toggleClass('is-active');
            }
            if($('.sub-menu').css('display') == 'block'){
                $('.sub-menu').css('display','none');
                $('.arrow-main-menu').removeClass('turn-arrow');
            }
        }
    });


    /*[ remove top noti ]
    ===========================================================*/
    $('.btn-romove-top-noti').on('click', function(){
        $(this).parent().fadeOut();
    })



    /*[ Block2 button wishlist ]
    ===========================================================*/
    $('.block2-btn-addwishlist').on('click', function(e){
        e.preventDefault();
        $(this).addClass('block2-btn-towishlist');
        $(this).removeClass('block2-btn-addwishlist');
        $(this).off('click');
    });

    /*[ +/- num product ]
    ===========================================================*/
    $('.btn-num-product-down').on('click', function(e){
        e.preventDefault();
        var numProduct = Number($(this).next().val());
        if(numProduct > 1) $(this).next().val(numProduct - 1);
    });

    $('.btn-num-product-up').on('click', function(e){
        e.preventDefault();
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1);
    });


    /*[ Show content Product detail ]
    ===========================================================*/
    $('.active-dropdown-content .js-toggle-dropdown-content').toggleClass('show-dropdown-content');
    $('.active-dropdown-content .dropdown-content').slideToggle('fast');

    $('.js-toggle-dropdown-content').on('click', function(){
        $(this).toggleClass('show-dropdown-content');
        $(this).parent().find('.dropdown-content').slideToggle('fast');
    });


    /*[ Play video 01]
    ===========================================================*/
    var $wrpselector = $('.video-mo-01'),
        $children    = $wrpselector.children('.videoframe'),
        $srcOld      = $children.data('videourl');

    $('[data-target="#modal-video-01"]').on('click',function(){
 
        $wrpselector.html( '<iframe src="'+$srcOld+'?autoplay=1"></iframe>' );

        setTimeout(function(){
            $wrpselector.css('opacity','1');
        },300);      
    });

    $('[data-dismiss="modal"]').on('click',function(){

        $wrpselector.html( '<iframe src="'+$srcOld+'"></iframe>' );
        $wrpselector.css('opacity','0');
    });
	
	
	/*[ Play video 01]
    ===========================================================*/
	$(".selection-1").select2({
		minimumResultsForSearch: 20,
	});

	$(".selection-2").select2({
		minimumResultsForSearch: 20,
		
	});
	
        /*[ Slick3 ]
    ===========================================================*/

    var slick3 = $('.slick3');

    if( slick3.length ){

        slick3.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            fade: true,
            dots: true,
            appendDots: $('.wrap-slick3-dots'),
            dotsClass:'slick3-dots',
            infinite: true,
            autoplay: false,
            autoplaySpeed: 6000,
            arrows: false,
            customPaging: function(slick, index) {
                var portrait = $(slick.$slides[index]).data('thumb');
                return '<img src=" ' + portrait + ' "/><div class="slick3-dot-overlay"></div>';
            },  
        });
        
    }

    /*[ Slick2 ]
    ===========================================================*/
    if( $('.relateproduct').length ){

        $('.slick2').slick({
            slidesToShow: 4,
            slidesToScroll: 4,
            infinite: true,
            autoplay: false,
            autoplaySpeed: 6000,
            arrows: true,
            appendArrows: $('.wrap-slick2'),
            prevArrow:'<button class="arrow-slick2 prev-slick2"><i class="fa  fa-angle-left" aria-hidden="true"></i></button>',
            nextArrow:'<button class="arrow-slick2 next-slick2"><i class="fa  fa-angle-right" aria-hidden="true"></i></button>',  
            responsive: [
                {
                  breakpoint: 1200,
                  settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                  }
                },
                {
                  breakpoint: 992,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                  }
                },
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 576,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
            ]    
        });

    }


})(jQuery);