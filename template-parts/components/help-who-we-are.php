<?php
/**
 * We are here to help block
 */
?>
<section class="nowcfo__section bg-secondary mt-8">
  <div class="container aligncenter">
    <?php if ($logo = $block['logo']) : ?>
    <figure class="nowcfo__logo-transparent mb-1">
      <img width="65" src="<?= $logo; ?>" alt="NOWCFO">
      <span class="hero-title bold mt-2"><?= $block['title']; ?></span>
    </figure>
    <?php endif; ?>
    <?php if ($heading = $block['heading']) : ?>
    <h3 class="hero-title bold hero-title-64">We are Here to Help</h3>
    <?php endif; ?>
    <?php if ($desc = $block['description']) : ?>
    <p class="hero-title"><?= $desc; ?></p>
    <?php endif; ?>
    <?php if (($button = get_button('button', false, $block)) && ($button_link = $button['link'])) : ?>
      <a href="<?= $button_link; ?>" <?= $button['target']; ?> role="button" class="btn btn btn-cta btn-hero"><?= $button['link_text']; ?></a>
    <?php endif; ?>
  </div>
</section>
