<?php
//Enqueue scripts and styles.
function theme_scripts_and_styles() {
  
  //Styles
	wp_enqueue_style( 'theme-style', get_stylesheet_uri() );	
	wp_enqueue_style( 'tipr-style', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.min.css' );
	wp_enqueue_style( 'tipr-css', get_template_directory_uri() . '/scripts/tipr/tipr.css', array('jquery'));	
	
	//Scripts
	//wp_enqueue_script( 'theme-function', get_template_directory_uri().'/scripts/themeFunction.js',  array('jquery'));
	wp_enqueue_script( 'Velocity', get_template_directory_uri() . '/scripts/MCF/Javascript/Velocity.js',  array('jquery'));
	wp_enqueue_script( 'popper', 'https://unpkg.com/popper.js/dist/umd/popper.min.js', array('jquery'));
	wp_enqueue_script( 'tooltip', 'https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js', array('jquery'));
	wp_enqueue_script( 'tipr-js', get_template_directory_uri() . '/scripts/tipr/tipr.min.js',  array('jquery'));
	wp_enqueue_script( 'd3', 'https://d3js.org/d3.v3.min.js',  array('jquery'));
	wp_enqueue_script( 'd3v4', 'https://cdnjs.cloudflare.com/ajax/libs/d3/4.2.6/d3.js',  array('jquery'));
	wp_enqueue_script( 'd3-zoom', 'https://d3js.org/d3-zoom.v1.min.js',  array('jquery'));
	wp_enqueue_script( 'tippy', 'https://unpkg.com/tippy.js@2.5.2/dist/tippy.all.min.js',  array('jquery'));
	wp_enqueue_script( 'd3-topo', 'https://d3js.org/topojson.v1.min.js',  array('jquery'));
	wp_enqueue_script( 'theme-function', get_template_directory_uri().'/functions.js',  array('jquery'));
	wp_localize_script( 'theme-function', 'my_restapi_details', array(
    'rest_url' => esc_url_raw( rest_url() ),
    'nonce' => wp_create_nonce( 'wp_rest' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts_and_styles' );
?>