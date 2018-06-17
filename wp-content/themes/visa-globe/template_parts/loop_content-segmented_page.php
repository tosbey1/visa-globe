<?php
//Start Segments
if( get_field('content_display') == 'Segmented Page' && have_rows('segments') ): 
?>

<div class="loop_content-segmented_page">
  
  <?php
  //Repeater Count
  $count = 0;  
  
  //Start Segment Repeater
  while ( have_rows('segments') ) : the_row();
    
    //Add to Count
    $count++;
    
    //Set Segment Content Classes
    if(get_sub_field('segment_display') == 'One Column' || !get_sub_field('segment_display'))
      $content_class = 'one_column_segment';
    if(get_sub_field('segment_display') == 'Two Column')
      $content_class = 'two_column_segment';
  ?>
  
  <div class="segmented_page-segment" id="segment-<?php echo $count;?>">
    
    <?php
    get_template_part('segment', 'background');
    get_template_part('segment', 'one_column');
    get_template_part('segment', 'two_column');
    get_template_part('segment', 'aside');
    get_template_part('segment', 'callout');
    get_template_part('segment', 'masthead');
    get_template_part('segment', 'button');
    ?>
  
  </div>
  
  <?php
  //End Segment Repeater
  endwhile;
  ?>

</div>

<?php
//End Segments
endif;
?>      