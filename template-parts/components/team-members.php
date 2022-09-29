<?php
/**
 * Team Members
 * @package nowcfo
 */
?>

<section class="nowcfo__section nowcfo__teams">
  <div class="container">
    <?php if ($title = $block['title']) : ?>
    <h3 class="title__section has__symbol">
      <span><?= $title; ?></span>
      <small></small>
    </h3>
    <?php endif; ?>
    <?php if ($team_members = $block['select_team_members']) : ?>
    <div class="card__column card__members justify-center">
      <?php
      $i = 1;
      foreach ($team_members as $member) : ?>
      <div class="card__member alignleft">
        <figure class="card__member-avatar">
          <?php if ($team_img = get_field('image', $member)) : ?>
          <img src="<?= $team_img['sizes']['team_image']; ?>" alt="<?= $team_img['alt']; ?>">
          <?php endif; ?>
          <figcaption class="card__member-name"><span><?= get_the_title($member); ?></span><cite><?= get_field('designation', $member); ?></cite></figcaption>
          <a href="#member-<?=$i?>" class="card__member-trigger dead-link"></a>
        </figure>
        <div id="member-<?=$i?>" class="card__member-modal modal">
          <div class="modal-content modal-lg">
            <a class="modal-close dead-link" href="#!">
            <small class="nowcfo-icon nowcfo-icon-close"></small>
            </a>
            <div class="row">
              <div class="col-4">
                <?php if ($team_img = get_field('image', $member)) : ?>
                <img src="<?= $team_img['sizes']['team_image']; ?>" alt="<?= $team_img['alt']; ?>">
                <?php else: ?>
                  <span class="image-placeholder">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/logo-symbol.svg" width="50" alt="<?= get_the_title($member)?>">
                  </span>
                <?php endif; ?>
              </div>
              <div class="col-8">
                <figcaption class="card__member-name md">
                  <span><?= get_the_title($member); ?></span>
                  <div class="d-flex">
                    <cite><?= get_field('designation', $member); ?></cite>
                    <?php if ($linkedin = get_field('linkedin_url', $member)) : ?>
                    <a class="card__member-social" href="<?= $linkedin; ?>" target="_blank" rel="noopener">
                      <img src="<?php bloginfo('template_url'); ?>/assets/images/linkedin.svg" width="12" alt="LinkedIn">
                    </a>
                    <?php endif; ?>
                  </div>
                </figcaption>
                <div class="card__member-summary">
                  <?= get_field('description', $member); ?>
                </div>
              </div>
            </div>
          </div>
          <a class="modal-drop dead-link" href="#!"></a>
        </div>
      </div>
        <?php $i++;
      endforeach; ?>
    </div>
    <?php else : ?>
    <div class="d-flex alert alert-placeholder mt-2">
      <span>No team member has been added.</span>
    </div>
    <?php endif; ?>
  </div>
</section>
