<?php
/**
 * Process block
 */
?>
<div class="nowcfo__section">
  <div class="container">
    <?php if ($heading = $block['heading']) : ?>
    <h3 class="title__section has__symbol">
      <span><?= $heading; ?></span>
      <small></small>
    </h3>
    <?php endif; ?>
    <?php if ($process_items = $block['process_items']) : ?>
    <div class="card__column card__column-full">
      <?php foreach ($process_items as $process_item) : ?>
      <div class="card__light">
        <div class="card__light-content">
          <?php if ($title = $process_item['title']) : ?>
          <span class="card-title"><?= $title; ?></span>
          <?php endif; ?>
          <?= $process_item['description']; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</div>
