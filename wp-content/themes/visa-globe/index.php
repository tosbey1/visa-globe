<!DOCTYPE html>
<html lang="en-us">
  
  <head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php wp_head();?>    
    
  </head>
  
  <body <?php body_class(); ?>>
	<section id="turnglobe">
  
		<div id="worldmap"></div>
		  
	</section>
	<div id="star-box" class="star-box">
		<div class="star_container_2">
			<div class="star_container_1"></div>
		</div>
		</div>
<!--
		<div class="star_container_2">
			<div class="star_container_1"></div>
		</div>
-->
	</div>
	<button id="zoom_in" class="zoom-buttom">Zoom In button</button>
	<button id="zoom_out" class="zoom-out-buttom">Down button</button>
<!--
	<div class="star-container">
		<span class="star" tooltip="//title"></span>
	</div>
-->
	<div id="where-form" class="where-do-you-want-to-go-form"><a href="where-form" class="header-nav_open"><i class="fa fa-bars" aria-hidden="true"></i></a><!-- <?php gravity_form(1,false,false,false,false,true);?> --><span class="focus-border"></span></div>

  </body>
		
