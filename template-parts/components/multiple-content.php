<?php
/**
 * Multiple content Block
 */
?>
<div class="nowcfo__section">
  <div class="container post-contents">
    <?php if ($heading = $block['heading']) : ?>
    <h3 class="title__section has__symbol alignleft">
      <span><?= $heading; ?></span>
      <small></small>
    </h3>
    <?php endif; ?>
    <?php if ($description = $block['description']) : ?>
      <article class="post-content">
        <p><?= $description; ?></p>
      </article>
    <?php endif; ?>
    <?php if ($articles = $block['content']) :
      foreach ($articles as $article) : ?>
    <article class="post-content">
      <div class="row align-center">
        <div class="col-8">
          <?php if ($title = $article['heading']) : ?>
          <h4 class="post-title-md"><?= $title; ?></h4>
          <?php endif; ?>
          <?= $article['content']; ?>
        </div>
        <?php if ($img = $article['image']) : ?>
        <div class="column-4">
          <figure>
            <img src="<?= $img['url']; ?>" alt="<?= $img['alt']; ?>">
          </figure>
        </div>
        <?php endif; ?>
      </div>
    </article>
        <?php
      endforeach;
    endif; ?>
  </div>
</div>
