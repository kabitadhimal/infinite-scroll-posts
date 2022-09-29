<?php
/**
 * Home Page Banner
 * @package nowcfo
 */
?>

<section class="nowcfo__testimonial nowcfo__section aligncenter">
  
    <?php if ($heading = $block['heading']) : ?>
    <h3 class="title__section has__symbol">
      <span><?= $heading; ?></span>
      <small></small>
    </h3>
    <?php endif; ?>
    <?php if ($short_text = $block['short_text']) : ?>
    <span class="title__info"><?= $short_text; ?></span>
    <?php endif; ?>
    <?php if ($testimonials = get_field('testimonials', 'option')) : ?>
    <div id="nowcfo-testimonials" class="testimonials">
      <?php
      foreach ($testimonials as $testimonial) {
        include(locate_template('template-parts/partials/testimonial.php'));
      }
      ?>
    </div>
    <?php endif; ?>
</section>
