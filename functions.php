<?php
function wp_scripts_styles() {
	global $wp_styles;
	if ( !is_admin() ) {
        wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', false, '1.11.1' );
		wp_register_script( 'like', get_template_directory_uri() . '/js/simple-likes-public.js', array( 'jquery' ), '0.5' );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'like' );
		wp_localize_script( 'like', 'simpleLikes', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'like' => __( 'Like', 'brave' ),
			'unlike' => __( 'Unlike', 'brave' )
		) ); 
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );
}  

add_action( 'init', 'wp_scripts_styles' );
require( get_template_directory() . '/includes/post-like.php');

?>
