<?php
/**
 * Box Content Block
 * Used in crypto page
 */
?>
<div class="container">
  <article class="post-content bg-white-border">
  <div class="row">
    <div class="col-12">
      <div class="post-content_common aligncenter">
        <?php if ($normal_content = $block['normal_title']) : ?>
          <p><strong><?= $normal_content; ?></strong></p>
          <?php endif; ?>
          <?php if ($colored_title = $block['colored_title']) : ?>
          <p style="color: #71A040"><?= $colored_title; ?></p>
          <?php endif; ?>
         <?= $block['description']; ?>
      </div>
    </div>
  </div>
  </article>
</div>
