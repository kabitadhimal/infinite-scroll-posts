<?php
/**
 * Company We Keep
 * @package nowcfo
 */
?>
<section class="nowcfo__whychooseus<?= $block['show_background_color'] ? ' bg-faded-blue' : ''; ?>">
  <div class="container">
    <?php if ($company_title = get_field('company_title', 'option')) :  ?>
    <span class="title__faded"><?= $company_title; ?></span>
    <?php endif; ?>
    <?php if ($companies = get_field('companies', 'option')) :  ?>
    <div id="partners-slider" class="logos__external">
      <?php foreach ($companies as $company) : ?>
      <div class="logo-item">
        <?php if ($company_img = $company['image']) : ?>
        <img src="<?= $company_img['url']; ?>" alt="<?= $company_img['alt']; ?>">
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
