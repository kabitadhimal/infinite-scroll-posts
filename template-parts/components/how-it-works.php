<?php
/**
 * How it works
 * @package nowcfo
 */
?>

<section class="nowcfo__section aligncenter">
  <div class="container">
    <?php if ($heading = $block['heading']) : ?>
    <h3 class="title__section has__symbol">
      <span><?= $heading; ?></span>
      <small></small>
    </h3>
    <?php endif; ?>
    <?php if ($steps = $block['steps']) : ?>
    <div class="card__column justify-center">
      <?php foreach ($steps as $step) : ?>
      <div class="card__light">
        <span class="card-title"><?= $step['title']; ?></span>
        <?= $step['description']; ?>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <?php if (($text_button = get_button('button', false, $block)) && ($text_button_link = $text_button['link'])) : ?>
    <a href="<?= $text_button_link; ?>" <?= $text_button['target']; ?> role="button" class="btn btn-primary"><?= $text_button['link_text']; ?></a>
    <?php endif; ?>
  </div>
</section>
