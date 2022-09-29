<?php
/**
 * Banner Button
 */
?>
<?php if (($banner_button = get_button('banner_button', false, $block)) && ($button_link = $banner_button['link']) && $banner_button['link_text']) : ?>
  <div class="banner-button">
    <a href="<?= $button_link; ?>" <?= $banner_button['target']; ?> role="button" class="btn btn-cta btn-hero"><?= $banner_button['link_text']; ?></a>
  </div>
<?php endif; ?>

<?php if ($block['add_secondary_button'] && ($secondary_button = get_button('secondary_button', false, $block)) && ($button_link = $secondary_button['link'])) : ?>
  <div class="banner-button mt-3">
    <a href="<?= $button_link; ?>" <?= $secondary_button['target']; ?> role="button" class="btn btn-cta btn-hero"><?= $secondary_button['link_text']; ?></a>
  </div>
<?php endif; ?>
