<?php
/**
 * Content with list block
 */
?>
<div class="nowcfo__section<?= $block['show_background_color'] ? ' bg-faded-blue' : ''; ?>">
  <div class="container aligncenter">
    <article class="post-content post-content-ul">      
        <?php if ($heading = $block['heading']) : ?>
        <h3 class="title__section has__symbol">
          <span><?= $heading; ?></span>
          <small></small>
        </h3>
        <?php endif; ?>
        <?= $block['description']; ?>
        <?php include(locate_template('/template-parts/components/content-image-section/button.php')); ?>
    </article>
  </div>
</div>
