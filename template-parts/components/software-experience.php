<?php
/**
 * Software Experience
 * @package nowcfo
 */
?>

<section class="nowcfo__software-experience nowcfo__section bg-faded-blue">
  <div class="container">
    <?php if ($heading = $block['heading']) : ?>
    <h3 class="title__section has__symbol">
      <span><?= $heading; ?></span>
      <small></small>
    </h3>
    <?php endif; ?>
    <?php if ($softwares = get_field('software_logos', 'option')) : ?>
    <div class="logos__external size-medium">
      <?php foreach ($softwares as $software) : ?>
      <div class="logo-item">
        <?php if ($logo = $software['logo']) : ?>
        <img src="<?= $logo['url']; ?>" alt="<?= $logo['alt']; ?>">
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <div class="mt-5 aligncenter">
      <a href="<?= get_site_url() ?>/services/systems-and-software-implementation/"><b>And More</b></a>
    </div>
  </div>
</section>
