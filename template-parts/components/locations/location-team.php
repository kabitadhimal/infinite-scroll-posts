<?php
/**
 * Location Team
 */
?>
<div class="nowcfo__section bg-faded-blue">
  <div class="container post-contents">
    <?php if ($heading = $block['title']) : ?>
    <h3 class="title__section has__symbol">
      <span><?= $heading; ?></span>
      <small></small>
    </h3>
    <?php endif; ?>
    <?php if ($teams = $block['team_members']) :
      foreach ($teams as $team) : ?>
    <article class="post-content location-teams">
      <div class="row align-center">
        <?php if ($team_img = $team['image']) : ?>
        <div class="col-4">
          <div class="location-team">
            <figure>
              <img src="<?= $team_img['sizes']['location_team']; ?>" alt="<?= $team_img['alt']; ?>">
            </figure>
            <?php if ($name = $team['name']) : ?>
            <h4 class="location-team-name"><?= $name; ?></h4>
            <?php endif; ?>
            <?php if ($designation = $team['designation']) : ?>
            <span class="location-team-type"><?= $designation; ?></span>
            <?php endif; ?>
          </div>
        </div>
        <?php endif; ?>
        <div class="col-8">
          <?= $team['description']; ?>
        </div>
      </div>
    </article>
        <?php
      endforeach;
    endif; ?>
  </div>
</div>
