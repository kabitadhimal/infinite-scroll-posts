<div id="submitMarketing" class="card__member-modal modal">
  <div class="modal-content tab-container modal-xl">
    <a class="modal-close dead-link" href="#!">
      <small class="nowcfo-icon nowcfo-icon-close"></small>
    </a>
    <div class="row">
      <div class="col-3">
        <ul class="tabs default">
          <li class="tab-item default">
            <a href="#eventTemplates" class="tab-link active">
              <span>Event Templates</span>
            </a>
          </li>
          <li class="tab-item default">
            <a href="#socialPostTemplates" class="tab-link">
              <span>Social Post Templates</span>
            </a>
          </li>
          <li class="tab-item default">
            <a href="#marketingRequests" class="tab-link">
              <span>Marketing Requests</span>
            </a>
          </li>
          <li class="tab-item default">
            <a href="#speakWithMarketingTeam" class="tab-link">
              <span>Speak to The Marketing Team</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="col-9">
        <?php $title = get_field('popup_block_title') ;
        if($title): ?>
          <h3 class="article__title-marketingpage"><?=$title?></h3>
        <?php endif; ?>
        <div class="tab-contents tab-contents--marketing">
          <div class="tab-content active" id="eventTemplates">
            <?php $eventTemplate = get_field("event_template"); ?>
            <?php if($eventTemplate['title']): ?>
              <h4 class="article__title-marketing"><?=$eventTemplate['title']?></h4>
            <?php endif; ?>
            <?php if($eventTemplate['text']): ?>
              <p class="article__title-marketing-sub"><?=$eventTemplate['text']?></p>
            <?php endif; ?>
            <?php
              $postTypes = get_post_types();
              $args = [
                'post_type' => 'event_templates',
                'post_status'=> 'publish',
                'posts_per_page' => -1
              ];
              $eventQuery = new WP_Query($args);

            if($eventQuery->have_posts()): ?>
            <div class="articles four-columns aligncenter">
              <?php while ($eventQuery->have_posts()): $eventQuery->the_post(); ?>

              <article class="article">
                <?php if (has_post_thumbnail()) :
                  $imageUrl = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
                  $imageUrlThumbail = wp_get_attachment_image_src(get_post_thumbnail_id(),'location_team');
                ?>
                <figure class="article__img sm">
                  <img class="lightbox" data-lightbox="<?=$imageUrl[0]?>" src="<?=$imageUrlThumbail[0]?>" alt="<?php the_title(); ?>">
                </figure>
                <?php endif; ?>
                <h4 class="article__title pb-2"><?php the_title(); ?></h4>
              </article>
              <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php endif; ?>
            <?php if($eventTemplate['form']):
              echo do_shortcode('[contact-form-7 id="'.$eventTemplate['form'].'" title="Events Templates"]');
            endif; ?>
          </div>
          <div class="tab-content" id="socialPostTemplates">
            <?php $socialMediaTemplate = get_field("social_media_templates"); ?>
            <?php if($socialMediaTemplate['title']): ?>
              <h4 class="article__title-marketing"><?=$socialMediaTemplate['title']?></h4>
            <?php endif; ?>
            <?php if($socialMediaTemplate['text']): ?>
              <p class="article__title-marketing-sub"><?=$socialMediaTemplate['text']?></p>
            <?php endif; ?>
            <?php
              $argSocial = [
                'post_type' => 'social',
                'post_status'=> 'publish',
                'posts_per_page' => -1
              ];
              $socialQuery = new WP_Query($argSocial);
            if($socialQuery->have_posts()): ?>

            <div class="articles four-columns aligncenter">
              <?php while ($socialQuery->have_posts()): $socialQuery->the_post(); ?>
              <article class="article">
                <?php
                if (has_post_thumbnail()) :
                  $imageUrlThumbail = wp_get_attachment_image_src(get_post_thumbnail_id(),'location_team');
                  $imageUrl = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
                  ?>
                <figure class="article__img sm">
                  <img class="lightbox" data-lightbox="<?=$imageUrl[0]?>" src="<?=$imageUrlThumbail[0]?>"
                    alt="<?php the_title(); ?>">
                </figure>
                <?php endif; ?>
                <h4 class="article__title pb-2"><?php the_title(); ?></h4>
              </article>
              <?php
            endwhile;
            wp_reset_postdata();
            endif; ?>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="'.$socialMediaTemplate['form'].'" title="Social Media Templates"]'); ?>
          </div>

          <div class="tab-content" id="marketingRequests">
            <?php $marketingRequest = get_field("marketing_request"); ?>
            <?php if(isset($marketingRequest['title'])): ?>
            <h4 class="article__title-marketing"><?=$marketingRequest['title']?></h4>
            <?php endif; ?>
            <?php if($marketingRequest['text']): ?>
            <p class="article__title-marketing-sub"><?=$marketingRequest['text']?></p>
            <?php endif;
            if($marketingRequest['form']):
              echo do_shortcode('[contact-form-7 id="'.$marketingRequest['form'].'" title="Marketing Request"]');
            endif;
            ?>
          </div>

          <div class="tab-content" id="speakWithMarketingTeam">
            <?php $marketingTeam = get_field("marketing_team"); ?>
            <?php if(isset($marketingTeam['title'])): ?>
            <h4 class="article__title-marketing"><?=$marketingTeam['title']?></h4>
            <?php endif; ?>
            <?php if($marketingTeam['text']): ?>
            <p class="article__title-marketing-sub"><?=$marketingTeam['text']?></p>
            <?php endif;
            if($marketingTeam['form']):
              echo do_shortcode('[contact-form-7 id="'.$marketingTeam['form'].'" title="Marketing Team"]');
            endif;
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <a class="modal-drop dead-link" href="#!"></a>
</div>
