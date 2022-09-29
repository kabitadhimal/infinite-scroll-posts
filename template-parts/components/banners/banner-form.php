<?php
/**
 * Banner Form
 */
if ($form_id = $block['select_form']) :
?>
<div class="nowcfo__hero-form">
  <?php echo do_shortcode("[contact-form-7 id='{$form_id}']"); ?>
</div>
<?php endif; ?>
