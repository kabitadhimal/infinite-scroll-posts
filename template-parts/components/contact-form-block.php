<?php
/**
 * Contact form
 * @package nowcfo
 */

/** Display default form in single posts and articles page */
wp_reset_postdata();
if ((is_single() || ('post' == get_post_type()) || is_page('articles'))) :
?>
<div class="container contactform">
  <div id="nowcfo-contactform" class="form__contact">
    <h3 class="title__section has__symbol mb-2">
      <span>Contact Us</span>
      <small></small>
    </h3>
    <?php
      // Contact Form
      include(locate_template('template-parts/partials/contact-form.php'));
    ?>
  </div>
</div>
<?php else:
/** Display form in other pages via flexible content */ ?>
<div class="container contactform">
  <div id="nowcfo-contactform" class="form__contact">
    <h3 class="title__section has__symbol mb-2">
      <span><?= $block['heading']; ?></span>
      <small></small>
    </h3>
    <?php if ($call_text = $block['call_text']) : ?>
    <p class="form__contact-call aligncenter pb-2"><?= $call_text; ?></p>
    <?php endif; ?>
    <?php if ($desc = $block['description']) : ?>
    <p class="form__contact-desc aligncenter pb-5"><?= $desc; ?></p>
    <?php endif; ?>
    <?php
      // Contact Form
      include(locate_template('template-parts/partials/contact-form.php'));
    ?>
    <?php if ($bottom_text = $block['bottom_text']) : ?>
    <p class="contactform-text aligncenter mt-4"><?= $bottom_text; ?></p>
    <?php endif; ?>
  </div>
</div>
<?php endif; ?>
