<?php
/**
 * Home Page Banner
 * @package nowcfo
 */
?>

<section class="nowcfo__services">
  <div class="container">
    <?php if ($service_heading = $block['service_heading']) : ?>
      <h3 class="title__section has__symbol">
        <span><?= $service_heading; ?></span>
        <small></small>
      </h3>
    <?php endif; ?>
    <?php if ($services_type = $block['select_services_type']) : ?>
      <div class="services">
        <?php
        sort($services_type);
        $i = 1;
        foreach ($services_type as $service_type) : ?>
          <div data-target="service-<?= $i; ?>" class="service">
            <?php if ($service_type_icon = get_field('service_icon', 'services-type_' . $service_type)) : ?>
              <span class="service__img">
                <img src="<?= $service_type_icon['url']; ?>" alt="<?= $service_type_icon['alt']; ?>">
                <?php
                  if ($service_icon_hover = get_field('service_icon_hover', 'services-type_' . $service_type)) :
                    echo '<img class="service__img-rollover" src="'. $service_icon_hover['url'] .'" alt="'.$service_icon_hover['alt'].'">';
                  endif;
                ?>
              </span>
            <?php endif; ?>
            <?php
            $primary_heading = get_field('primary_service_title', 'services-type_' . $service_type);
            $secondary_heading = get_field('secondary_service_title', 'services-type_' . $service_type);
            if ($primary_heading || $secondary_heading) : ?>
              <h5 class="service__heading"><?= $primary_heading; ?><span><?= $secondary_heading; ?></span></h5>
            <?php endif; ?>
          </div>
          <div id="service-<?= $i; ?>" class="service__rollover">
            <?php
            $tax_query[] = [
              'taxonomy' => 'services-type',
              'field' => 'term_id',
              'terms' => $service_type,
              ];

            /** @var array $services_posts Post ID's */
            if ($services_posts = get_custom_posts('services', $tax_query)) :
              ?>
            <ul>
              <?php foreach ($services_posts as $service_post) : ?>
              <li class="services-<?= $service_post; ?>"><a href="<?= get_the_permalink($service_post); ?>"><?= get_the_title($service_post); ?></a></li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>
          </div>
        <?php
          $i++;
          $tax_query = [];
        endforeach; ?>
      </div>
    <?php endif; ?>
  </div>
</section>
