<?php
/**
 * Open postions career block
 */
?>
<section class="nowcfo__section bg-faded-blue">
  <div class="container">
    <h3 class="career-heading"><?= $block['title']; ?></h3>
    <?php if ($positions = $block['positions']) : ?>
    <ul class="career">
      <?php foreach ($positions as $position) : ?>
      <li class="career-summary flex-between">
        <div>
          <span class="career-title"><?= $position['position']; ?></span>
          <address class="career-location"> <?= $position['location']; ?> </address>
        </div>
        <?php if (($p_link = $position['link']) && ($p_text = $position['link_text'])) : ?>
        <a href="<?= $p_link; ?>" target="_blank" role="button" class="btn btn-primary has-arrow"><?= $p_text; ?></a>
        <?php endif; ?>
      </li>
      <?php endforeach; ?>
    </ul>
    <?php endif; ?>
    <?php if (($button_text = $block['button_text']) && ($button_link = $block['button_link'])) : ?>
    <div class="d-flex justify-center">
      <a href="<?= $button_link; ?>" target="_blank" role="button" class="btn btn-outline-primary has-arrow"><?= $button_text; ?></a>
    </div>
    <?php endif; ?>
  </div>
</section>
