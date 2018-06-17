<?php
//One Column Segment
if(get_sub_field('segment_display') == 'One Column' || !get_sub_field('segment_display')):
?>

<div class="segment-one_column">
  
  <?php
  //Text Fields
  $title = get_sub_field('title');
  $body = get_sub_field('body');
  
  //Set Text Extentions By Body Character Count
  $body_characters = strlen(strip_tags($body));
  $body_paragraphs = substr_count($body, '<p');
  if($body_characters < 300)
    $text_class = 'brief_text';
  if( ($body_characters > 300) && ($body_characters < 800) && ($body_paragraphs < 2) )
    $text_class = 'regular_text';
  if( ($body_characters > 300) && ($body_characters < 800) && ($body_paragraphs > 1) )
    $text_class = 'regular_text_with_paragraphs';
  if($body_characters > 800)
    $text_class = 'long_text';
      
  //Start Segment Text
  if( get_sub_field('segment_type') == 'Text' || get_sub_field('segment_type') == 'Text and Media' ):
  ?>

  <div class="one_column-<?php echo $text_class;?>">
  
    <?php
    //Segment Title
    if($title)
      echo '<div class="'.$text_class.'-title">'.$title.'</div>';
      
    //Segment Body
    if($body)
      echo '<div class="'.$text_class.'-body">'.$body.'</div>';
    ?>   
     
  </div>
  
  <?php
  //End Segment Text
  endif;

  //Start Segment Media
  if(get_sub_field('segment_type') == 'Only Media' || get_sub_field('segment_type') == 'Text and Media' ):
  ?>
    
  <div class="one_column-media">
      
    <?php  
    //Media Blocks, Slideshow, and Circles
    get_template_part('template_parts/media', 'slideshow');
        
    //Mosaic
    get_template_part('template_parts/media', 'blocks');
    ?>
    
  </div>
  
  <?php
  //End Segment Media
  endif;
  ?>
    
</div>

<?php
//End One Column Segment
endif;
?>