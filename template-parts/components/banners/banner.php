<?php
/**
 * Site Banner
 * @package nowcfo
 */
$banner_type = $block['banner_type'];

if ($banner_type == 'home') {
  include(locate_template('/template-parts/components/banners/banner-home.php'));
}

if ($banner_type == 'inner') {
  include(locate_template('/template-parts/components/banners/banner-inner.php'));
}
