(function( $ ){


    // Update back to top in real time...
    wp.customize( 'fashe-gototop-toggle-settings', function( value ) {
        value.bind( function( toggle ) {

            $( '.btn-back-to-top' ).toggle();     

        } );

    } );

    // Update cart icon in real time...
    wp.customize( 'fashe-cart-toggle-settings', function( value ) {
        value.bind( function( newval ) {

            $( '.header-wrapicon2' ).toggle();
            
        } );
    } );

})( jQuery );