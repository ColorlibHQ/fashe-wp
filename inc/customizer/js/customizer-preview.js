(function( $ ){


    // Update back to top in real time...
    wp.customize( 'fashe-gototop-toggle-settings', function( value ) {
        value.bind( function( toggle ) {

            

            if( true == toggle ){

                $( '.btn-back-to-top' ).show();

            }else{

                $( '.btn-back-to-top' ).hide();

            }
            

        } );
    } );

    // Update cart icon in real time...
    wp.customize( 'fashe-cart-toggle-settings', function( value ) {
        value.bind( function( newval ) {

            if( newval == true ){

                $( '.header-wrapicon2' ).show();

            }else{

                $( '.header-wrapicon2' ).hide();

            }
            
        } );
    } );



})( jQuery );