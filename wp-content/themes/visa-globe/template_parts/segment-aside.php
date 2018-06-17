<?php
//Aside Segment
if(get_sub_field('segment_display') == 'Aside' ):
?>

<div class="segment-aside">    

    <?php
    //Text Fields
    $title = get_sub_field('title');
    $body = get_sub_field('body');

    //Segment Title
    if($title)
      echo '<div class="aside-title">'.$title.'</div>';
      
    //Segment Body
    if($body)
      echo '<div class="aside-body">'.$body.'</div>';

    ?>
    
</div>

<?php
//End Aside
endif;
?>