<?php
/**
 * Location Map
 */
?>
<div class="nowcfo-location-map">
  <?php if ($heading = $block['title']) : ?>
  <h3 class="title__section has__symbol">
    <span><?= $heading; ?></span>
    <small></small>
  </h3>
  <?php endif; ?>
  <span class="title__info"><?= $block['text']; ?></span>
  <div id="nowcfo-map">
    <div class="loading"><span></span><span></span><span></span><span></span></div>
  </div>
  <p class="link"><?= $block['bottom_text']; ?></p>
  <?php if (($text_button = get_button('button', false, $block)) && ($text_button_link = $text_button['link'])) : ?>
  <div class="mt-5">
    <a href="<?= $text_button_link; ?>" <?= $text_button['target']; ?> role="button" class="btn btn-primary"><?= $text_button['link_text']; ?></a>
  </div>
  <?php endif; ?>
</div>
