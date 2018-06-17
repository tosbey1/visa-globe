<?php
//Segment Background 
$background = get_sub_field('background');
if($background):
?>

<div class="segment-background">
  
  <?php
  //Background Variables
  if(!$background || $background == 'White')
    $background_class = 'white';
  if($background == 'Transparent')
    $background_class = 'transparent';
  if($background == 'Light Gray')
    $background_class = 'light_gray';
  if($background == 'Other'){ 
    $background_class = 'other';
    $background_image = get_field('background_image')['sizes']['large']; 
  }
  ?>
  
  <div class="background-<?php echo $background_class;?>" <?php if($background == 'Other') echo 'style="background-image:url('.$background_image.');"'?>></div>
</div>

<?php
//End Segment Background
endif;
?>