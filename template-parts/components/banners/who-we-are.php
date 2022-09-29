<?php
/**
 * Who we are banner block
 */
?>
<section class="nowcfo__hero nowcfo__hero-basic bg-pattern">
  <div class="nowcfo__hero-overlay">
    <div class="container">
      <div class="row align-center row-reverse">
        <div class="col-7">
          <h2 class="hero-title bold hero-title-64"><?= $block['banner_heading']; ?></h2>
          <span class="hero-title bold hero-title-24"><?= $block['banner_text']; ?></span>
        </div>
        <div class="col-4 xs-hidden pt-5">
          <img width="320" src="<?= $block['banner_image']; ?>" alt="Who We Are">
        </div>
      </div>
    </div>
  </div>
</section>
