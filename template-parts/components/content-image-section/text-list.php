<?php
/**
 * Content with list block
 */
?>
<div class="nowcfo__section<?= $block['show_background_color'] ? ' bg-faded-blue' : ''; ?>">
  <div class="container">
    <article class="post-content">
      <div class="row<?= ($img_alignment == 'left') ? ' row-reverse' : '';?>">
        <div class="col-8">
          <?php if ($heading = $block['heading']) : ?>
          <h3 class="title__section has__symbol alignleft">
            <span><?= $heading; ?></span>
            <small></small>
          </h3>
          <?php endif; ?>
          <?= $block['description']; ?>
          <?php include(locate_template('/template-parts/components/content-image-section/button.php')); ?>
        </div>
        <?php if ($list_content) : ?>
        <div class="col-4">
          <div class="card__self">
          <?= $list_content; ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </article>
  </div>
</div>
