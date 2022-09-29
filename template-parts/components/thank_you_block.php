<section class="nowcfo__section">
  <div class="container sm aligncenter">
    <img src="<?php bloginfo('template_url'); ?>/assets/images/static/thank-you.png" width="300">
    <?php
     $blockTitle = $block['title'];
     $blockText = $block['text'];
     $blockUrl = $block['url'];
    ?>
     <?php if($blockTitle) ?><h2 class="hero-title bold hero-title-40 text-primary"><?=$blockTitle?></h2>
    <?php if($blockText) ?><p><?=$blockText?></p>
    <?php if($blockUrl) ?><a href="<?=$blockUrl['url']?>" role="button" class="btn btn-primary"><?=$blockUrl['title']?></a>
  </div>
</section>
