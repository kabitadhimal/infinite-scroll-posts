<?php
/**
 * Now CFO By The Numbers
 * @package nowcfo
 */
?>
<section class="card-stats-section container pt-0 pb-5">
  <?php if ($heading = $block['heading']) : ?>
  <h3 class="title__section has__symbol">
    <span><?= $heading; ?></span>
    <small></small>
  </h3>
  <?php endif; ?>
  <?php if ($numbers = $block['numbers']) : ?>
  <div class="card__column card-stats">
    <?php foreach ($numbers as $number) : ?>
    <div class="card__item card__item-lighter">
      <?php if ($icon = $number['icon']) : ?>
      <figure class="card-stats-icon">
        <img src="<?= $icon; ?>" alt="NOWCFO">
      </figure>
      <?php endif; ?>
      <h5 class="card__item-info">
        <span class="animate__number">
          <strong><?= $number['number'] ?></strong>
        </span>
        <?= $number['title']; ?>
    </div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>
</section>
