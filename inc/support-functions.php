<?php 
/**
 * @Packge     : Fashe
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit( 'Direct script access denied.' );
    }


// Post Category
function fashe_post_cats(){
	
	$cats = get_the_category();
	$categories = '';
    if( $cats ){

        $categories .= '<div class="posts--cat m--30-0-0">';
        $categories .= '<ul class="nav"><li><span><i class="fa fm fa-th-list"></i>'.esc_html( 'Catagory :', 'fashe' ).'</span></li>';
        
        foreach( $cats as $cat ){
           $categories .= '<li><a href="'.esc_url( get_category_link( $cat->term_id ) ).'" class="category-link">'.esc_html( $cat->name ).'</a></li>';
        }
        
        $categories .= '</ul>';
        $categories .= '</div>';
    }
	
	return $categories;
	
}

// Post Tags
function fashe_post_tags(){
	
	$tags = get_the_tags();
	
	$getTags = '';
	
	if( $tags ){

		foreach( $tags as $tag ){
			$getTags .= '<a href="'.esc_url( get_tag_link( $tag->term_id ) ).'" class="tag-item">'.esc_html( $tag->name ).'</a>';
		}
	
	}
	
	return $getTags;
	
	
}

// fashe comment template callback
function fashe_comment_callback( $comment, $args, $depth ) {
    
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo esc_attr( $tag ); ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment--item">
    <?php endif; ?>
        <div class="comment--meta-info">
    		<div class="comment--meta-img comment__avatar">
    			<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    		</div>
            <div class="comment__info">
                <cite><?php printf( __( '<span class="comment-author-name">%s</span> ', 'fashe' ), get_comment_author_link() ); ?></cite>
                <div class="comment__meta">
                    <time class="comment__time"> <?php printf( __('%1$s at %2$s', 'fashe'), get_comment_date(),  get_comment_time() ); ?><?php edit_comment_link( esc_html__( '(Edit)', 'fashe' ), '  ', '' ); ?></time> 
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                     <em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'fashe' ); ?></em>
                      <br />
                    <?php endif; ?>
                    
                    <?php comment_reply_link(array_merge( $args, array( 'add_below' => $add_below, 'depth' => 1, 'max_depth' => 5, 'reply_text' => 'Reply' ) ) ); ?>
                </div>
            </div>
        </div>
		<div class="comment__content">

			<div class="comment__text">
				<?php comment_text(); ?>
				
			</div> 
		</div>
			
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php  
}
// add class comment reply link
add_filter('comment_reply_link', 'fashe_replace_reply_link_class');
function fashe_replace_reply_link_class( $class ){

    $class = str_replace( "class='comment-reply-link", "class='reply", $class );

    return $class;
}


// header cart count
function fashe_cart_count( $class= '' ){
	if( fashe_is_wc_activated() ):
	?>
	<div class="header-wrapicon2 <?php echo esc_attr( $class ); ?>">
		<img src="<?php echo esc_url( FASHE_DIR_ASSETS_URI ); ?>img/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="<?php esc_html_e( 'ICON', 'fashe' ); ?>">
		<span class="header-icons-noti"><?php echo sprintf('%d', WC()->cart->cart_contents_count); ?></span>
		<div class="header-cart header-dropdown">
			<?php the_widget( 'WC_Widget_Cart', 'title=' ); ?>
		</div>
	</div>
	<?php
    endif;
}


?>