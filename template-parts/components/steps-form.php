<?php
/**
 * Steps Form Block
 * component
 * @package nowcfo
 */
?>
<section class="pt-5 pb-5">
  <div class="container">
    <article class="post-content">
      <div class="row">
        <div class="col-4">
          <ul class="tabs default">
            <li class="tab-item default">
              <a class="tab-link bg-primary d-flex active">
                <small class="tab-icon--default"><img src="<?php bloginfo('template_url'); ?>/assets/images/static/step-1.svg" alt="step-1"></small>
                <span><strong>Step 3</strong>Fill out the form below</span>
              </a>
            </li>
            <li class="tab-item default">
              <a class="tab-link bg-primary d-flex">
                <small class="tab-icon--default"><img src="<?php bloginfo('template_url'); ?>/assets/images/static/step-2.svg" alt="step-2"></small>
                <span><strong>Step 3</strong>Schedule your free consultation</span>
              </a>
            </li>
            <li class="tab-item default">
              <a class="tab-link bg-primary d-flex">
                <small class="tab-icon--default"><img src="<?php bloginfo('template_url'); ?>/assets/images/static/step-3.svg" alt="step-3"></small>
                <span><strong>Step 3</strong>Marketing Requests</span>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-8">
          <?php if ($title = $block['title']) : ?>
            <span class="text-primary hero-title"><?= $title; ?></span>
          <?php endif; ?>
          <?php if ($form_id = $block['select_form']) : ?>
            <?= do_shortcode("[contact-form-7 id='{$form_id}']")?>
          <?php endif; ?>
        </div>
      </div>
    </article>
  </div>
</section>

