<?php
/**
 * Text content block
 */
$center_content = $block['center_content'] ?? false;
$style =$block['select_style'] ?? 'one';
if ($style == 'two') :
?>
<section class="nowcfo__section bg-primary">
  <div class="container">
    <?php if ($heading = $block['heading']) : ?>
    <h3 class="title__section text-white has__symbol">
      <span><?= $heading; ?></span>
      <small></small>
    </h3>
    <?php endif; ?>
    <blockquote class="service__quote text-white service__quote-primary">
    <?= $block['text_content']; ?>
    </blockquote>
  </div>
</section>
<?php else : ?>
<section class="nowcfo__section<?= $block['has_background'] ? ' has-background' : ''; ?>">
  <div class="container">
    <article class="post-content">
      <div class="row">
        <div class="col-12">
          <?php if ($heading = $block['heading']) : ?>
          <h3 class="title__section has__symbol alignleft">
            <span><?= $heading; ?></span>
            <small></small>
          </h3>
          <?php endif; ?>
          <div class="post-content_common <?= $center_content ? 'aligncenter container ' : ''?>">
            <?= $block['text_content']; ?>
          </div>
        </div>
      </div>
    </article>
      </div>
</section>
<?php endif; ?>
