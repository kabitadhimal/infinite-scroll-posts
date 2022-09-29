<?php
/**
 * Youtube Video Block
 */
?>
<section class="nowcfo__section<?= $block['show_background_color'] ? ' bg-faded-blue' : ''; ?>">
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
          <?php if (! $block['add_stat_section']) {
            include(locate_template('/template-parts/components/content-image-section/button.php'));
          } ?>
        </div>
        <div class="col-4">
        <?php if ($video) : ?>
          <iframe width="374" height="285" src="<?= $video; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <?php endif; ?>
        </div>
      </div>
    </article>
    <?php if ($block['add_stat_section']) :
      include(locate_template('/template-parts/partials/stats.php'));
      include(locate_template('/template-parts/components/content-image-section/button.php'));
    endif; ?>
  </div>
</section>
