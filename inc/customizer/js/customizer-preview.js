(function( $ ){


    // Update back to top in real time...
    wp.customize( 'fashe-gototop-toggle-settings', function( value ) {
        value.bind( function( toggle ) {

            var $backToTop = $( '.btn-back-to-top' );

            if( true == toggle ) {

                $backToTop.show();

            } else {

                $backToTop.hide();

            }
            

        } );
    } );

    // Update cart icon in real time...
    wp.customize( 'fashe-cart-toggle-settings', function( value ) {
        value.bind( function( newval ) {

            var $header = $( '.header-wrapicon2' );

            if( newval == true ) {

                $header.show();

            } else {

                $header.hide();

            }
            

        } );
    } );

    // Update shop title real time...
    wp.customize( 'fashe-woo-shoppage-title-settings', function( value ) {
        value.bind( function( newval ) {

            var $pageTitle = $( '.page-title' );

            if( newval == true ) {

                $pageTitle.show();

            } else {

                $pageTitle.hide();

            }
            
        } );

    } );

    // Update widget real time...
    wp.customize( 'fashe-widget-toggle-settings', function( value ) {
        value.bind( function( newval ) {

            var $widgets = $( 'footer .flex-w.p-b-40' );

            if( newval == true ) {

                $widgets.show();

            } else {

                $widgets.hide();

            }
            
        } );

    } );

    // Update related product section real time...
    wp.customize( 'fashe-woo-related-product-settings', function( value ) {
        value.bind( function( newval ) {

            var $widgets = $( '.relateproduct' );

            if( newval == true ) {

                $widgets.show();

            } else {

                $widgets.hide();

            }
            
        } );

    } );



})( jQuery );