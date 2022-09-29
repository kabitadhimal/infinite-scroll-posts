<?php
/**
 * Two Columns List
 */
$column_heading_style = $block['column_heading_style'];
?>
<div class="nowcfo__section">
  <div class="container">
    <article class="post-content">
      <?php if ($heading = $block['heading']) : ?>
      <h3 class="title__section has__symbol">
        <span><?= $heading; ?></span>
        <small></small>
      </h3>
      <?php endif; ?>
      <?php if ($description = $block['description']) : ?>
      <p><?= $description; ?></p>
      <?php endif; ?>
      <div class="row flex-stretch">
        <div class="col-6">
          <?php if (($column_heading_style == 'style1') && $left_column_heading = $block['first_column_heading']) :  ?>
          <div class="card__self card__self-title">
            <span><?= $left_column_heading; ?></span>
          </div>
          <?php endif; ?>
          <?php if (($column_heading_style == 'style2') && $left_column_heading = $block['first_column_heading']) :  ?>
            <h4 class="post-title-md aligncenter"><?= $left_column_heading; ?></h4>
          <?php endif; ?>
          <div class="card__self h-100">
            <?php if ($left_column_list = $block['left_column_list']) : ?>
            <ul class="post__list-ul">
              <?php foreach ($left_column_list as $list) : ?>
              <li><?= $list['title']; ?></li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-6">
          <?php if (($column_heading_style == 'style1') && $right_column_heading = $block['second_column_heading']) :  ?>
          <div class="card__self card__self-title">
            <span><?= $right_column_heading; ?></span>
          </div>
          <?php endif; ?>
          <?php if (($column_heading_style == 'style2') && $right_column_heading = $block['second_column_heading']) :  ?>
            <h4 class="post-title-md aligncenter"><?= $right_column_heading; ?></h4>
          <?php endif; ?>
          <div class="card__self h-100">
          <?php if ($right_column_list = $block['right_column_list']) : ?>
            <ul class="post__list-ul">
            <?php foreach ($right_column_list as $list) : ?>
              <li><?= $list['title']; ?></li>
            <?php endforeach; ?>
            </ul>
          <?php endif; ?>
          </div>
        </div>
      </div>
    </article>
  </div>
</div>
