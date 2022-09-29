<?php
/**
 * Home Page Banner
 * @package nowcfo
 */
$background_type = $block['background_type'];
?>

<section class="nowcfo__hero">
  <?php if (($banner_image = $block['banner_image']) && ($background_type === 'image')) : ?>
  <div class="nowcfo__hero-media">
    <img src="<?= $banner_image['sizes']['home_banner']; ?>" alt="<?= $banner_image['alt']; ?>">
  </div>
  <?php endif; ?>
  <?php if (($banner_video = $block['banner_video']) && ($background_type === 'video')) : ?>
  <div class="nowcfo__hero-media">
    <video playsinline autoplay muted loop>
      <source src="<?= $banner_video; ?>">
    </video>
  </div>
  <?php endif; ?>
  <div class="nowcfo__hero-overlay">
    <div class="container aligncenter">
      <?php if ($banner_text = strip_tags($block['banner_text'], '<strong><br>')) : ?>
      <h2 class="title__hero"><?= $banner_text; ?></h2>
      <?php endif; ?>
      <?php include(locate_template('/template-parts/components/banners/banner-button.php')); ?>
    </div>
  </div>
</section>
