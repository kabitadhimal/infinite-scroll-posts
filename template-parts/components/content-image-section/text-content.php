<?php
/**
 * Text Content
 */
?>
<div class="nowcfo__section<?= $block['show_background_color'] ? ' bg-faded-blue' : ''; ?>">
  <div class="container">
    <article class="post-content">
      <div class="row d-center<?= ($img_alignment == 'left') ? ' row-reverse' : '';?>">
        <div class="col-7 col-xs-12">
        <?php if ($heading = $block['heading']) : ?>
        <h3 class="title__section has__symbol alignleft">
          <span><?= $heading; ?></span>
          <small></small>
        </h3>
        <?php endif; ?>
        <?= $block['description']; ?>
        <?php if (! $block['add_stat_section']) {
          include(locate_template('/template-parts/components/content-image-section/button.php'));
        } ?>
        </div>
        <div class="col-5 col-xs-12">
          <div class="card__item card__single">
            <div class="card__item-info">
              <span><?= $img_content['text']; ?></span>
              <cite class="cite"><?= $img_content['secondary_text']; ?></cite>
              <cite class="cite"><?= $img_content['bottom_text']; ?></cite>
            </div>
          </div>
        </div>
      </div>
    </article>
    <?php if ($block['add_stat_section']) :
      include(locate_template('/template-parts/partials/stats.php'));
      include(locate_template('/template-parts/components/content-image-section/button.php'));
     endif; ?>
  </div>
</div>
