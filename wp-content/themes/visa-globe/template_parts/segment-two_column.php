<?php
//Two Column Segment
if(get_sub_field('segment_display') == 'Two Column'):
?>

<div class="segment-two_column">
  
  <?php
  //Text Fields
  $title = get_sub_field('title');
  $body = get_sub_field('body');

  //Text Position
  if(get_field('text_position') == "Left of Media"){
    $text_class = 'left_text';
  }else{
    $text_class = 'right_text';
  }

  //Start Segment Text
  if( get_sub_field('segment_type') == 'Text' || get_sub_field('segment_type') == 'Text and Media' ):
  ?>

  <div class="content-<?php echo $text_class;?>">
  
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
    
  <div class="content-media">
      
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
//Two Column Segment
endif;
?>