<article class="article">
  <?php
  if (has_post_thumbnail()) :
    $imageUrl = wp_get_attachment_image_src(get_post_thumbnail_id(),'team_image');
    ?>
    <figure class="article__img sm">
      <img src="<?=$imageUrl[0]?>" alt="Presidents&apos; Day Social Post">
    </figure>
  <?php endif; ?>
  <div class="article__summary pb-4">
    <h4 class="article__title mb-3"><?php the_title(); ?></h4>
    <a href="<?php the_permalink(); ?>" class="article__link">GO TO DOWNLOADS >></a>
  </div>
  <div class="article__bottom">
    <time><?= get_the_date( 'F j, Y' )?></time>
  </div>
</article>
