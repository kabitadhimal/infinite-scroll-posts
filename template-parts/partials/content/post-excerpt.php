<article class="article">
  <?php if (has_post_thumbnail()) :
    $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'article_small'); ?>
    <figure class="article__img">
      <?php if(!empty($image_url[0])) { ?>
        <img src="<?= $image_url[0]; ?>" alt="<?= the_title(); ?>">
      <?php } ?>
    </figure>
  <?php else : ?>
    <figure class="article__img">
      <img src="<?php bloginfo('template_url'); ?>/assets/images/static/article-1.png" alt="<?php the_title(); ?>">
    </figure>
  <?php endif; ?>
  <div class="article__summary">
    <a href="<?=get_permalink()?>"><h4 class="article__title"><?= get_the_title(); ?></h4></a>
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
