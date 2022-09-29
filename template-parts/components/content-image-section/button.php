<?php
/**
 * Text image block button
 */

?>
<?php if ($block['add_button'] && ($text_button = get_button('button', false, $block)) && ($text_button_link = $text_button['link'])) :
  if (is_singular('location')) { ?>
    <div class="mt-5 <?= $block['add_stat_section'] ? 'aligncenter' : '' ?>">
      <a href="#nowcfo-contactform" role="button" class="btn btn-primary btn-scrollTO"><?= $text_button['link_text']; ?></a>
    </div>
  <?php }
  if (!is_singular('location')) { ?>
    <div class="mt-5 <?= $block['add_stat_section'] ? 'aligncenter' : '' ?>">
      <a href="<?= $text_button_link; ?>" <?= $text_button['target']; ?> role="button" class="btn btn-<?= $text_button['color'] ?>"><?= $text_button['link_text']; ?></a>
    </div>
  <?php }
endif;
?>
