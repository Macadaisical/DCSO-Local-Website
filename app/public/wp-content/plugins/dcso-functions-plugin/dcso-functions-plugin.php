<?php
/*
Plugin Name: DCSO Specific Functions
Description: Site specific code changes for Site Plugin for sheriff.douglas.ga.us
*/
/* Start Adding Functions Below this Line */



/*remove thumbnails from PDFs */

function wpb_disable_pdf_previews() { 
$fallbacksizes = array(); 
return $fallbacksizes; 
} 
add_filter('fallback_intermediate_image_sizes', 'wpb_disable_pdf_previews');

/*end remove thumbnails*/


/*add new image size for featured images */
add_theme_support( 'post-thumbnails' );

add_image_size( 'feat-img-lg', 1200, 630 );



/* Stop Adding Functions Below this Line */
?>