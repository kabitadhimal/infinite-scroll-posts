<?php
/**
 * Map Block
 */
// fetch all locations to be displayed in the map
if ($all_locations = get_posts(
  [
    'post_type'              => 'location',
    'posts_per_page'         => -1,
    'post_status'            => 'publish',
    'cache_results'          => false,
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
    'fields'                 => 'ids',
  ]
)) {
  foreach ($all_locations as $loc) {
    $state = get_field('state', $loc);
    $state_label = $state['label'];
    $state_value = $state['value'];
    $title = get_the_title($loc);
    $address = $title . ', ' . $state_label; ?>
    <span class="office-location" title="<?= $title; ?>" data-address="<?= $address; ?>" data-state="<?= $state_label; ?>" data-longitude="<?= get_field('long', $loc); ?>" data-latitude="<?= get_field('lat', $loc); ?>" data-link="<?= get_the_permalink($loc); ?>">
    </span>
  <?php }
}
if ($block['select_page'] == 'homepage') {
  include(locate_template('/template-parts/components/locations/home-map.php'));
}

if ($block['select_page'] == 'location') {
  include(locate_template('/template-parts/components/locations/location-map.php'));
}
