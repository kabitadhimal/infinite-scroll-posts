<?php
/**
 * Location List Block
 */
?>
<div class="container mt-10">
  <h3 class="title__section has__symbol">
    <span><?= $block['title']; ?></span>
    <small></small>
  </h3>
  <?php
  /** empty states array */
  $states = [];

  // If we have locations get all locations.
  if ($all_locations = get_posts([
    'post_type'              => 'location',
    'posts_per_page'         => -1,
    'post_status'            => 'publish',
    'orderby'                => 'title',
    'order'                  => 'ASC',
    'cache_results'          => false,
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
    'fields'                 => 'ids',
  ])) {
    foreach ($all_locations as $loc) {
      $state = get_field('state', $loc);
      if (!in_array($state, $states)) {
        $states[] = $state;
        asort($states);
      }
    }
  }

  // if we have states
  if (!empty($states)) : ?>
  <select id="filter-location" class="field-item filter-select custom-filter" data-target="nowcfo-locations" data-action="locations_filter" data-limit="12" data-nonce="<?= wp_create_nonce('locations-filter-nonce'); ?>">
    <option value="all">States</option>
    <?php foreach ($states as $value) : ?>
    <option value="<?= $value['value']; ?>"><?= $value['label']; ?></option>
    <?php endforeach; ?>
  </select>
  <?php endif; ?>
  <?php
  $locations = new WP_Query(
    [
      'post_type'              => 'location',
      'posts_per_page'         => 12,
      'post_status'            => 'publish',
      'orderby'                => 'title',
      'order'                  => 'ASC',
      'cache_results'          => false,
      'update_post_meta_cache' => false,
      'update_post_term_cache' => false,
      'fields'                 => 'ids',
    ]
  );
  if ($locations->have_posts()) : ?>
  <div id="nowcfo-locations" class="articles four-columns locations-ajax-content">
    <?php while ($locations->have_posts()) :
      $locations->the_post();
      include(locate_template('/template-parts/components/locations/location-item.php'));
    endwhile; ?>
  </div>
  <?php endif;

  /* Restore original Post Data */
  wp_reset_postdata(); ?>
  <div class="aligncenter btn-group">
    <button class="btn btn-outline-primary btn-loadmore" data-posts-loaded="12" data-state ="all" data-limit="12" data-paged="1" data-nonce="<?= wp_create_nonce('load-more-nonce'); ?>">Load More</button>
  </div>
</div>
