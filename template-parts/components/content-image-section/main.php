<?php
/**
 * Who is nowcfo (Content and Image block)
 * component
 * @package nowcfo
 */

 /** TODO: Can me made more clean??? */

// Default variables
$img_alignment = '';
$img_option = 'image';
$text_img = [];

// ACF Group data for image and text
if ($img_content = $block['image_content']) {
  $img_alignment = $img_content['image_alignment'];
  $img_option    = $img_content['image_option'];
  $text_img      = $img_content['image'];
  $list_content  = $img_content['list_content'];
  $video         = $img_content['video_url'];
}

if ($img_option == 'text') {
  include(locate_template('/template-parts/components/content-image-section/text-content.php'));
}
if ($img_option == 'image') {
  include(locate_template('/template-parts/components/content-image-section/text-image.php'));
}
if ($img_option == 'list') {
  include(locate_template('/template-parts/components/content-image-section/text-list.php'));
}

if ($img_option == 'video') {
  include(locate_template('/template-parts/components/content-image-section/video.php'));
}

if ($img_option == 'none') {
  include(locate_template('/template-parts/components/content-image-section/text-single.php'));
}
