<?php
   
//Header
get_header();

//Layouts
?>
	<section id="turnglobe">
  
		<div id="worldmap"></div>
		  
	</section>
<div id="where-form" class="where-do-you-want-to-go-form"><a href="where-form" class="header-nav_open"><i class="fa fa-bars" aria-hidden="true"></i></a><?php gravity_form(1,false,false,false,false,true);?><span class="focus-border"></span></div>
<?php
		$args = array(
		'post_type' => array('star'),
		'posts_per_page' => -1,
	);

// The Query
$the_query = new WP_Query( $args );

// The Loop
if ( $the_query->have_posts() ) {
	
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		?>
		<div class="star-container">
			<?php echo '<span class="star" tooltip="' . get_the_title() . '"></span>'; ?>
		</div>
		<?php 
	}
	/* Restore original Post Data */
	wp_reset_postdata();
} else {
	// no posts found
}	
// get_template_part('template_parts\layout', 'globe');
?>
<?php
//Footer
get_footer();

?>