<?php
/**
 * Two column block, left small right large section.
 * @package nowcfo
 */
?>
<div class="nowcfo__section">
  <?php if ($heading = $block['heading']) : ?>
    <h3 class="title__section has__symbol">
      <span><?= $heading; ?></span>
      <small></small>
    </h3>
  <?php endif; ?>
  <?php if ($items = $block['items']) : ?>
  <div class="container">
    <?php foreach ($items as $item) : ?>
    <div class="card__self-row">
      <div class="card__self card__self-left">
        <span><?= $item['title']; ?></span>
      </div>
      <div class="card__self">
        <?= $item['description']; ?>
      </div>
    </div>
    <?php endforeach; ?>
    <?php if (($text_button = get_button('button', false, $block)) && ($text_button_link = $text_button['link'])) : ?>
    <div class="mt-5 aligncenter">
      <a href="<?= $text_button_link; ?>" <?= $text_button['target']; ?> role="button" class="btn btn-primary"><?= $text_button['link_text']; ?></a>
    </div>
    <?php endif; ?>
  </div>
  <?php endif; ?>
</div>
