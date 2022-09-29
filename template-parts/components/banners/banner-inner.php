<?php
/**
 * Inner Pages Banner
 * @package nowcfo
 */

// TODO: Can me made more clean???
// Utility classes
$slug = get_post_field( 'post_name', get_post() );
$col = 'col-7';

// Banner text
$banner_text = $block['banner_text'] ? '<h2 class="title__hero">'.$block['banner_text'].'</h2>' : '';
$banner_title = $block['banner_title'] ? '<span class="title__hero-sub">'.$block['banner_title'].'</span>' : '';

// check if post type or pages are location(81), career(83), services(79) or about(132)
if(is_singular('location', 'career', 'servicecs') || is_page(array(81, 83, 132, 79))) {
  $col = 'aligncenter col-12';
}

if(is_page(array(81, 83, 79))) {
  $col .= ' nowcfo__hero-location';
}

// If page career or services
if($slug == 'careers' || $slug == 'services') {
  $banner_text = '<p class="title__hero-p">'.$block['banner_text'].'</p>';
}

$background_type = $block['background_type'];
$img_alignment = $block['image_alignment'] ?? 'right';

if ($background_type == 'video') :?>
<section class="nowcfo__hero">
  <?php if (($banner_video = $block['banner_video']) && ($background_type === 'video')) : ?>
  <div class="nowcfo__hero-media">
    <video playsinline autoplay muted loop>
      <source src="<?= $banner_video; ?>">
    </video>
  </div>
  <?php endif; ?>
  <div class="nowcfo__hero-overlay">
    <div class="container aligncenter">
      <?= $banner_title; ?>
      <?= $banner_text; ?>
      <?php include(locate_template('/template-parts/components/banners/banner-button.php')); ?>
    </div>
  </div>
</section>
<?php else : ?>
  <?php if ( is_page_template( 'page-templates/marketing.php' ) ):?>
      <div class="nowcfo__hero slider">
        <div class="nowcfo__hero-media">
          <img src="<?php bloginfo('template_url'); ?>/assets/images/static/marketing-banner.png" alt="Presidents&apos; Day Social Post">
        </div>
        <div class="nowcfo__hero-overlay">
          <div class="container flex-column">
            <?php if($block['banner_title']): ?>
                <h2 class="title__hero mb-2"><?=$block['banner_title']?></h2>
            <?php endif; ?>
            <?php if($block['banner_text']): ?>
                  <span class="title__hero-p"><?=$block['banner_text']?></span>
            <?php endif; ?>
            <?php include(locate_template('/template-parts/components/banners/banner-button.php')); ?>
          </div>
        </div>
      </div>
  <?php else:?>
    <?php
      $serviceBannerHasForm = $block['select_form'] ? 'nowcfo__hero-compact' : 'nowcfo__hero-global' ;
    ?>
    <section class="nowcfo__hero <?=$serviceBannerHasForm?>">
      <?php if ($inner_banner_img = $block['banner_image']) : ?>
      <div class="nowcfo__hero-media">
        <img src="<?= $inner_banner_img['sizes']['inner_banner']; ?>" alt="<?= $inner_banner_img['alt']; ?>">
      </div>
      <?php endif; ?>
      <?php
        $banner_text = $block['banner_text'] ? '<h2 class="hero-title bold hero-title-40">'.$block['banner_text'].'</h2>' : '';
        $banner_title = $block['banner_title'] ? '<span class="hero-title bold hero-title-24">'.$block['banner_title'].'</span>' : '';
      ?>
      <div class="nowcfo__hero-overlay">
        <div class="container">
          <div class="row align-center <?= ($img_alignment == 'left') ? ' row-reverse' : '';?>">
            <?php
              if(empty($block['overlay_image'])) {
                $col = 'col-12 aligncenter';
              }
            ?>
            <div class="<?=$col?>">
              <?=$banner_title?>
              <?=$banner_text?>
              <?php if ($small_text = $block['banner_small_text']) : ?>
              <p class="hero-title"><?= $small_text; ?></p>
              <?php endif; ?>
              <?php include(locate_template('/template-parts/components/banners/banner-form.php')); ?>
              <?php include(locate_template('/template-parts/components/banners/banner-button.php')); ?>
            </div>
            <?php if ($overlay_image = $block['overlay_image']) : ?>
            <div class="col-4 xs-hidden">
              <img src="<?= $overlay_image['url']; ?>" width="255" alt="<?= $overlay_image['alt']; ?>">
            </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>
<?php endif;
