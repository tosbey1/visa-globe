<?php
//Begin Callout
if(get_sub_field('segment_display') == 'Callout' ):
?>

<div class="segment-callout">    

    <?php
    //Text Fields
    $title = get_sub_field('title');
    $body = get_sub_field('body');
    $icon = get_sub_field('callout_icon')['sizes']['small'];

    //Segment Icon
    if($icon)
      echo '<img class="callout-icon" src="'.$icon.'"/>';

    //Segment Title
    if($title)
      echo '<div class="callout-title">'.$title.'</div>';
      
    //Segment Body
    if($body)
      echo '<div class="callout-body">'.$body.'</div>';

    ?>
    
</div>

<?php
//End Callout Segment
endif;
?>