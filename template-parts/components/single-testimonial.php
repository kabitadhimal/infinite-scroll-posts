<?php
/**
 * Single Testiomial Block
 */
$style = $block['select_image_style'] ?? 'default';
?>
<section class="bg-faded-blue<?= $style == 'default' ? ' bg-white-shadow' : ''; ?>">
  <div class="container">
    <blockquote class="service__quote service__quote-<?= $style == 'circular' ? 'circular' : 'default'; ?>">
      <?php if ($image = $block['image']) : ?>
      <figure class="service__quote-img <?= $style == 'circular' ? 'circle' : ''; ?>">
          <img src="<?= $image; ?>" alt="<?= $block['name']; ?>">
      </figure>
      <?php endif; ?>
      <div class="service__quote-quote<?= $style == 'default' ? ' pb-3' : ''; ?>">
        <?= $block['content']; ?>
        <p>
          <cite><strong><?= $block['name']; ?></strong></cite>
          <cite><?= $block['designation']; ?></cite>
        </p>
      </div>
    </blockquote>
  </div>
</section>
