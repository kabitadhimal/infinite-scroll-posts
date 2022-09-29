<?php
/**
 * Services tab block
 */
$heading     = $block['heading'] ?? '';
$tab_content = $block['tab_content'] ?? null;
?>
<section class="nowcfo__services pt-0 mb-10" style="padding-bottom: 128px;">
	<div class="container">
    <?php if ($heading) : ?>
		<h3 class="title__section aligncenter">
			<span><?= $heading; ?></span>
		</h3>
    <?php endif; ?>
    <?php if ($tab_content) : ?>
		<div class="services services-noicon">
      <?php
      $i = '1';
      $j = '101';
      foreach ($tab_content as $tc) : ?>
			<div data-target="service-<?= $i; ?>" class="service <?= ($i == '1') ? 'active' : ''; ?>">
      <?php if ($tc_title = $tc['title']) : ?>
				<h5 class="service__heading"><?= $tc_title; ?></h5>
      <?php endif; ?>
			</div>
      <?php $items = $tc['items'] ?? null;
       if ($items): ?>
			<div id="service-<?= $i; ?>" class="service__rollover <?= ($j == '101') ? 'active' : ''; ?>">
				<ul>
          <?php foreach ($items as $item): ?>
					<li class="services-<?= $j; ?>"><a href="<?= get_the_permalink($item['title']); ?>"><?= get_the_title($item['title']); ?></a></li>
          <?php $j++; endforeach; ?>
				</ul>
			</div>
      <?php endif; ?>
      <?php $i++; endforeach; ?>
		</div>
    <?php endif; ?>
	</div>
</section>
