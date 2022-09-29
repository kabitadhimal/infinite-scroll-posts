<?php
/**
 * text image
 * component
 * @package nowcfo
 */
?>
<section class="nowcfo__section<?= $block['show_background_color'] ? ' bg-faded-blue' : ''; ?>">
  <div class="container">
    <article class="post-content">
      <div class="row<?= ($img_alignment == 'left') ? ' row-reverse' : '';?>">
        <div class="col-8">
          <?php if ($sub_title = $block['sub_title']) : ?>
          <span class="hero-title hero-title-20 text-uppercase text-gray mediumbold mb-1"><?= $sub_title; ?></span>
          <?php endif; ?>
          <?php if ($heading = $block['heading']) : ?>
          <h3 class="title__section has__symbol alignleft">
            <span><?= $heading; ?></span>
            <small></small>
          </h3>
          <?php endif; ?>
          <?= $block['description']; ?>
          <?php if (! $block['add_stat_section']) {
            include(locate_template('/template-parts/components/content-image-section/button.php'));
          } ?>
        </div>
        <div class="col-4">
          <?php if (($img_option == 'image') && $text_img) : ?>
          <figure>
            <img src="<?= $text_img['url']; ?>" alt="<?= $text_img['alt']; ?>">
          </figure>
          <?php endif; ?>
        </div>
      </div>
    </article>
    <?php if ($block['add_stat_section']) :
      include(locate_template('/template-parts/partials/stats.php'));
      include(locate_template('/template-parts/components/content-image-section/button.php'));
    endif; ?>
  </div>
</section>
