(function( $ , api){

    // Customizer about page redirect
    api.section( 'fashe_fof_options_section' , function( section ){

        section.expanded.bind( function( isExpanded ){

            if( isExpanded ){
                api.previewer.previewUrl.set( api.settings.url.home+'/maybe404page' );
            }else{
                api.previewer.previewUrl.set( api.settings.url.home );
            }
            
        } )

    } );

    // Customizer blog page redirect
    api.section( 'fashe_blog_options_section' , function( section ){

        section.expanded.bind( function( isExpanded ){

            if( isExpanded ){
                api.previewer.previewUrl.set( moahCustomizerdata.blog_page );
            }else{
                api.previewer.previewUrl.set( api.settings.url.home );
            }
            


        } )

    } );

    // Customizer shop page redirect
    api.section( 'fashe_woocommerce_options_section' , function( section ){

        section.expanded.bind( function( isExpanded ){

            if( isExpanded ){
                api.previewer.previewUrl.set( api.settings.url.home+'/shop' );
            }else{
                api.previewer.previewUrl.set( api.settings.url.home );
            }
            


        } )

    } );


    /**
     * Woocommerce section
     *
     */ 

    api.section( 'fashe_woocommerce_options_section' , function( section ){

        section.expanded.bind( function( isExpanded ){
         
            var $related_toggle  = $('#fashe-woo-related-product-settings'),
                $related_opt    = $( '#customize-control-fashe_related_product_number' );


            // Default

            if( $related_toggle.is( ':checked' ) ){

                $related_opt.show('slow');

            }else{

                $related_opt.hide('slow');

            }

            // on click
            $related_toggle.on( 'click',  function(){

                console.log( 'Say hello' );

                var $this =  $( this );

                if( $this.is(':checked') ){

                    $related_opt.show('slow');

                }else{

                    $related_opt.hide('slow');

                }


            } ); 

        } )

    } );


})( jQuery, wp.customize );