<?php
//Begin Optional Button
if (get_sub_field('add_button'))
  
  //The Button
  echo '<div class="'.$content_class.'-button"><a class="button-link" href="'.get_sub_field('button_url').'" >'.get_sub_field('button_text').'</a></div>';    

?>