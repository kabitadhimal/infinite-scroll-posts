<?php
/**
 * Three Columns List
 */
?>
<div class="nowcfo__section">
  <div class="container">
    <article class="post-content">
      <?php if ($heading = $block['primary_heading']) : ?>
      <h3 class="title__section has__symbol">
        <span><?= $heading; ?></span>
        <small></small>
      </h3>
      <?php endif; ?>
      <?php if ($description = $block['description']) : ?>
      <p><?= $description; ?></p>
      <?php endif; ?>
      <div class="row flex-stretch">
        <div class="col-4">
          <?php if ($first_column_heading = $block['first_column_heading']) :  ?>
          <div class="card__self card__self-title">
            <span><?= $first_column_heading; ?></span>
          </div>
          <?php endif; ?>
          <div class="card__self">
            <?php if ($first_column_list = $block['first_column_list']) : ?>
            <ul class="post__list-ul">
              <?php foreach ($first_column_list as $list) : ?>
              <li><?= $list['title']; ?></li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>
          </div>
        </div>
        <div class="col-4">
          <?php if ($second_column_heading = $block['second_column_heading']) :  ?>
          <div class="card__self card__self-title">
            <span><?= $second_column_heading; ?></span>
          </div>
          <?php endif; ?>
          <div class="card__self">
          <?php if ($second_column_list = $block['second_column_list']) : ?>
            <ul class="post__list-ul">
            <?php foreach ($second_column_list as $list) : ?>
              <li><?= $list['title']; ?></li>
            <?php endforeach; ?>
            </ul>
          <?php endif; ?>
          </div>
        </div>
        <div class="col-4">
          <?php if ($third_column_heading = $block['third_column_heading']) :  ?>
          <div class="card__self card__self-title">
            <span><?= $third_column_heading; ?></span>
          </div>
          <?php endif; ?>
          <div class="card__self">
          <?php if ($third_column_list = $block['third_column_list']) : ?>
            <ul class="post__list-ul">
            <?php foreach ($third_column_list as $list) : ?>
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
