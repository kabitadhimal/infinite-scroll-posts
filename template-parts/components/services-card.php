<?php
/**
 * Services Card Block
 */
$card_items = $block['card_items'] ?? null;
?>
<section class="nowcfo__section">
	<div class="container aligncenter">
		<header class="service__card--header">
      <?php if ($heading = $block['heading']) : ?>
			<h3 class="title__section">
				<span><?= $heading; ?></span>
			</h3>
      <?php endif; ?>
      <?php if ($description = $block['description']) : ?>
			<p><?= $description; ?></p>
      <?php endif; ?>
		</header>
    <?php if ($card_items) : ?>
		<div class="row">
      <?php foreach ($card_items as $card_item) : ?>
			<div class="col-4">
				<div class="service__card">
					<div class="flip">
						<div class="flip-front service__card--detail">
              <?php if ($card_icon = $card_item['icon']) : ?>
							<img src="<?= $card_icon['url']; ?>" width="80" alt="Interim or Fractional">
              <?php endif; ?>
              <?php if ($title = $card_item['title']) : ?>
							<h5 class="service__card--title"><?= $title; ?></h5>
              <?php endif; ?>
						</div>
            <?php if ($card_desc = $card_item['description']) : ?>
						<div class="flip-back service__card--rollover alignleft">
							<?= $card_desc; ?>
						</div>
            <?php endif; ?>
					</div>
				</div>
			</div>
      <?php endforeach; ?>
		</div>
    <?php endif; ?>
    <div class="mt-5">
    <?php
    $add_button = $block['add_button'] ?? false;
    if ($add_button && ($text_button = get_button('cta_button', false, $block)) && ($text_button_link = $text_button['link'])) : ?>
    <a href="<?= $text_button_link; ?>" <?= $text_button['target']; ?> role="button" class="btn btn-primary"><?= $text_button['link_text']; ?></a>
    <?php endif; ?>
    </div>
	</div>
</section>
