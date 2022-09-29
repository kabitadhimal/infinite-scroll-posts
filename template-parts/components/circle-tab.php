<?php
/**
 * Circle tab used in main service page
 */
$circle_tab_content = $block['tab_content'] ?? null;
?>
<section class="nowcfo__section bg-faded-blue">
	<div class="container tab-container">
		<div class="aligncenter">
      <?php if ($heading = $block['heading']) : ?>
			<h3 class="title__section"><strong><?= $heading; ?></strong></h3>
      <?php endif; ?>
      <?php if ($title = $block['title']) : ?>
			<span class="title__faded"><?= $title; ?></span>
      <?php endif; ?>
		</div>
		<div class="row">
      <?php if ($circle_tab_content) : ?>
			<div class="col-7 tab-contents">
        <?php
        $i = 1;
        foreach ($circle_tab_content as $ct) : ?>
				<div class="tab-content <?= ($i == '4') ? 'active' : ''; ?>" id="<?= 'char-' . $i; ?>">
					<div class="d-flex mb-2">
            <?php if ($ct_icon = $ct['icon']) : ?>
						<img src="<?= $ct_icon; ?>" alt="<?= $ct['title']; ?>">
            <?php endif; ?>
            <?php if ($ct_title = $ct['title']) : ?>
						<h4 class="tab-content--title"><?= $ct_title; ?></h4>
            <?php endif; ?>
					</div>
					<?= $ct['content']; ?>
				</div>
          <?php $i++;
        endforeach; ?>
			</div>
      <?php endif; ?>
      <?php if ($circle_tab_content) : ?>
			<div class="col-5">
				<div class="tabs-circle">
					<ul class="tab-lists-circle">
            <?php
            $j = 1;
            foreach ($circle_tab_content as $ctc) : ?>
						<li class="tab-item-circle">
							<a href="#<?= 'char-' . $j;?>" class="tab-link tab-link-circle <?= ($j == '4') ? 'active' : ''; ?>">
								<span class="tab-icon">
                <?php if ($ctc_icon_hover = $ctc['on_hover_icon']) : ?>
								  <img class="icon-hover" src="<?= $ctc_icon_hover; ?>" alt="<?= $ctc['title']; ?>">
                <?php endif; ?>
                <?php if ($ctc_icon = $ctc['icon']) : ?>
								  <img src="<?= $ctc_icon; ?>" alt="<?= $ctc['title']; ?>">
                <?php endif; ?>
								</span>
								<span class="tab-title"><?= $ctc['title']; ?></span>
							</a>
						</li>
              <?php $j++;
            endforeach; ?>
					</ul>
					<div class="tab-circular-logo">
						<img src="<?php bloginfo('template_url'); ?>/assets/images/logo.svg" alt="nowcfo">
					</div>
				</div>
			</div>
      <?php endif; ?>
		</div>
	</div>
</section>
