
<?php
// Location variables
$state = get_field('state');
$state_label = $state['label'];
$state_value = $state['value'];
$title = get_the_title();
$address = $title . ', ' . $state_value; ?>
<article class="article location office-address" title="<?= $title; ?>" data-address="<?= $address; ?>" data-state="<?= $state_label; ?>" data-longitude="<?= get_field('long'); ?>" data-latitude="<?= get_field('lat'); ?>" data-link="<?= the_permalink(); ?>">
  <figure class="article__img sm">
    <?php if ($location_img = get_field('image')) : ?>
      <img src="<?= $location_img['sizes']['location']; ?>" alt="<?= $location_img['alt']; ?>">
    <?php else :
      echo '<small title="'.$state_label.'"></small>';
    endif; ?>
  </figure>
  <div class="article__summary pb-2">
    <h4 class="article__title text-uppercase text-primary"><strong><?= $address; ?></strong></h4>
  </div>
  <div class="article__bottom">
    <a href="<?= the_permalink(); ?>" class="article__link text-success">VISIT MARKET PAGE »</a>
  </div>
</article>
