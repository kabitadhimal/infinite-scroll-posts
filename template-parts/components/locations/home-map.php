<?php
/**
 * Homepage map block
 */
?>
<div class="nowcfo-location-map p-0">
  <?php if ($heading = $block['title']) : ?>
  <h3 class="title__section has__symbol">
    <span><?= $heading; ?></span>
    <small></small>
  </h3>
  <?php endif; ?>
  <span class="title__info"><?= $block['text']; ?></span>
  <div id="nowcfo-map">
    <div class="loading"><span></span><span></span><span></span><span></span></div>
  </div>
  <?php
  $locations = new WP_Query(
    [
      'post_type'              => 'location',
      'post_status'            => 'publish',
      'cache_results'          => 'false',
      'update_post_meta_cache' => false,
      'update_post_term_cache' => false,
      'fields'                 => 'ids',
    ]
  );
  if ($locations->have_posts()) : ?>
    <?php while ($locations->have_posts()) :
      $locations->the_post();
      // Location variables
      $state = get_field('state');
      $state_label = $state['label'];
      $state_value = $state['value'];
      $title = get_the_title();
      $address = $title . ', ' . $state_label; ?>
    <span class="office-address" title="<?= $title; ?>" data-address="<?= $address; ?>" data-state="<?= $state_label; ?>" data-longitude="<?= get_field('long'); ?>" data-latitude="<?= get_field('lat'); ?>" data-link="<?= the_permalink(); ?>">
    </span>
    <?php endwhile;
  endif; ?>
  <div class="mt-5">
    <?php if (($text_button = get_button('button', false, $block)) && ($text_button_link = $text_button['link'])) : ?>
    <a href="<?= $text_button_link; ?>" <?= $text_button['target']; ?> role="button" class="btn btn-primary"><?= $text_button['link_text']; ?></a>
    <?php endif; ?>
  </div>
</div>
