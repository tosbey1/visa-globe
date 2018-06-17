<?php

//Add theme menu
function register_theme_menu() {
  register_nav_menu('header_navigation',__( 'Header Naivgation' ));
}
add_action( 'init', 'register_theme_menu' );
  
?>