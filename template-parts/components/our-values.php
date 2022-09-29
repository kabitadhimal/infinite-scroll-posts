<?php
/**
 * Our values block career page
 */
?>
<div class="nowcfo__section">
  <div class="container aligncenter over-values">
    <h3 class="title__section has__symbol">
      <span><?= $block['heading']; ?></span>
      <small></small>
    </h3>
    <span class="title__info"><?= $block['description']; ?></span>
    <?php if ($values = $block['values']) : ?>
    <div class="row mt-5">
      <?php foreach ($values as $value) :
        $icon = $value['icon'] ?? null;
        ?>
      <div class="col-4">
        <h4 class="title__medium"><?= $value['title']; ?></h4>
        <?php if ($icon) : ?>
        <figure class="over-values-icon">
          <img src="<?= $icon; ?>" alt="<?= $value['title']; ?>">
        </figure>
        <?php endif; ?>
        <span class="title__info has-underline<?= $value['bold_tagline'] ? ' title-bolder' : ''; ?>"><?= $value['tagline']; ?></span>
        <p><?= $value['values']; ?></p>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</div>
