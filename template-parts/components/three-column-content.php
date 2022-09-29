<?php
/**
 * Three Columns Content Block
 */
$content_type = $block['content_style_column'] ?? null;
$columns_content = $block['columns_content_'] ?? null;

$class = 'image';

if ($content_type == 'counter') {
  $class = 'counter';
} else if ($content_type == 'normal') {
  $class = 'normal';
}

?>
<div class="nowcfo__section">
  <div class="container">
    <article class="post-content">
      <?php if ($heading = $block['heading']) : ?>
      <h3 class="title__section has__symbol">
        <span><?= $heading; ?></span>
        <small></small>
      </h3>
      <div class="aligncenter mb-4">
        <?= $block['description']; ?>
      </div>
      <?php endif; ?>
      <?php if ($columns_content) : ?>
      <div class="row flex-stretch">
        <?php foreach ($columns_content as $column_content) : ?>
        <div class="col-4 aligncenter">
          <div class="card__self card__self-<?=$class?>">
            <p class="title-odd"><?= $column_content['column_title'] ?? ''; ?></p>
            <?php if ($content_img = $column_content['column_image'] ?? null) : ?>
              <figure class="card__self-figure">
                <img src="<?= $content_img['sizes']['content_img']; ?>" alt="<?= $content_img['title']; ?>">
              </figure>
            <?php endif; ?>
            <?= $column_content['column_content'] ?? ''; ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </article>
  </div>
</div>
