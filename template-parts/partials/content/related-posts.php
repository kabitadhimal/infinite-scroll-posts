<?php
/**
 * Related articles single post
 */

/** @var array $related_posts Related Post ID's */
if ($related_posts = new WP_Query([
    'post_type'              => 'post',
    'posts_per_page'         => 3,
    'post_status'            => 'publish',
    'cache_results'          => 'false',
    'update_post_meta_cache' => false,
    'update_post_term_cache' => false,
    'fields'                 => 'ids',
    'post__not_in'           => array($post->ID),
    'category__in'           => $categories[0]->cat_ID,
  ])) : ?>

  <div class="article-related">
    <h3 class="article-related_heading">A CONTINUING EDUCATION</h3>
    <div class="articles three-columns">
      <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
      <article class="article">
        <?php if (has_post_thumbnail()) :
          $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'article_small'); ?>
        <figure class="article__img">
          <img src="<?= $image_url[0] ?? null; ?>" alt="<?= the_title(); ?>">
        </figure>
        <?php else : ?>
        <figure class="article__img">
          <img src="<?php bloginfo('template_url'); ?>/assets/images/static/article-1.png" alt="Building a Business Foundation">
        </figure>
        <?php endif; ?>
        <div class="article__summary">
          <h4 class="article__title"><?= get_the_title(); ?></h4>
          <?php
          if(get_the_content() !== null):
            $text = get_sentence_from_the_content( get_the_content(), 2 );
            echo '<p>'.$text.'</p>';
          endif;
          ?>
          <a href="<?= get_the_permalink(); ?>" class="article__link">READ MORE »</a>
        </div>
        <div class="article__bottom">
          <time><?= get_the_date('F j, Y')?></time>
        </div>
      </article>
      <?php endwhile; ?>
    </div>
  </div>
  <?php else : ?>
    <div class="d-flex alert alert-warning mt-2">
      <span>No related posts found!!!</span>
    </div>
  <?php endif; ?>
