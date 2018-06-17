<?php
//====================================================
// All the theme functions are kept in the "includes/"
//====================================================

//Default Width, Title Tag, and Other Setup Functions
include_once('includes/theme_setup.php' );

//Enqueued Scripts and Styles
include_once('includes/enqueue.php' );

//Custom Menues
include_once('includes/custom_menus.php' );

//Update Customizer
include_once('includes/customizer.php' );

//Required Plugins
include_once('includes/require_plugins.php' );

//Admin Notices
include_once('includes/admin_notices.php' );

//WYSIWG Settings
include_once('includes/tinymce.php' );

// Stars Custom Post Type
include_once('includes/custom_field.php' );

?>