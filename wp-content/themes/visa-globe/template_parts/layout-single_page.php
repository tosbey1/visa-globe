<?php
//Begin Single Page Layout
if(is_page() || is_single() || is_singular()):
?>

<div class="layout-single_page">
  
	<?php
	//Start Loop
  if ( have_posts() ) : while ( have_posts() ) : the_post();  
  ?>
  
  <div class="single_page-loop_content">
        
    <?php
    //Standard Page		
  	get_template_part('template_parts/loop_content', 'standard_page');
  	
    //Segmented Page		
  	get_template_part('template_parts/loop_content', 'segmented_page');
  	?>
  	
  </div>

  <?php
  //End Loop
  endwhile; endif;
  ?>
  
</div>

<?php
//End Single Page Layout
endif;
?>