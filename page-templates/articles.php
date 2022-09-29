<?php
/**
 * Template name: Articles
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 */
get_header();
$recentArticles = new WP_Query([
  'post_type'              => 'post',
  'posts_per_page'         => 3,
  'post_status'            => 'publish']);

if($recentArticles->have_posts()):
  echo '<div id="hero-slider" class="app__hero slider mb-10">';
  while($recentArticles->have_posts()): $recentArticles->the_post();
  ?>
    <div class="hero-slide">
      <?php
      if (has_post_thumbnail()) :
          $imageUrl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'home_banner');
          //$imageUrl = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
    ?>
          <div class="app__hero-media">
            <img src="<?=$imageUrl[0]?>" alt="<?php the_title(); ?>">
          </div>
      <?php endif; ?>
      <div class="app__hero-overlay">
        <div class="container flex-column">
          <h2 class="title__hero mb-2"><?php the_title(); ?></h2>
          <span class="title__hero-p">
            <?php
            if(get_the_content() !== null):
                $text = get_sentence_from_the_content( get_the_content(), 2 );
                echo $text;
              endif;
            ?>
          </span>
          <div class="banner-button">
            <a href="<?=get_permalink()?>" target="_blank" role="button" class="btn btn-cta btn-hero">Read More</a>
          </div>
        </div>
      </div>
    </div>
  <?php
  endwhile;
  echo '</div>'; ?>
<?php endif;
wp_reset_postdata(); ?>


<div class="container">
    <!-- All the ajax articles are embeded here -->
  <div class="articles three-columns" id="articles">
  </div>

  <div class="js-loader" >
    <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
  </div>
<?php //CSS for loader ?>
  <style>
    .lds-ellipsis {
      display: inline-block;
      position: relative;
      width: 80px;
      height: 80px;
    }
    .lds-ellipsis div {
      position: absolute;
      top: 33px;
      width: 13px;
      height: 13px;
      border-radius: 50%;
      background: #6d8093;
      animation-timing-function: cubic-bezier(0, 1, 1, 0);
    }
    .lds-ellipsis div:nth-child(1) {
      left: 8px;
      animation: lds-ellipsis1 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(2) {
      left: 8px;
      animation: lds-ellipsis2 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(3) {
      left: 32px;
      animation: lds-ellipsis2 0.6s infinite;
    }
    .lds-ellipsis div:nth-child(4) {
      left: 56px;
      animation: lds-ellipsis3 0.6s infinite;
    }
    @keyframes lds-ellipsis1 {
      0% {
        transform: scale(0);
      }
      100% {
        transform: scale(1);
      }
    }
    @keyframes lds-ellipsis3 {
      0% {
        transform: scale(1);
      }
      100% {
        transform: scale(0);
      }
    }
    @keyframes lds-ellipsis2 {
      0% {
        transform: translate(0, 0);
      }
      100% {
        transform: translate(24px, 0);
      }
    }
  </style>
</div>
<?php
/* Restore original Post Data */
wp_reset_postdata(); ?>
<script>

  const $newsContent = jQuery( "#articles" );
  const $newsLoader = jQuery( ".js-loader" );

  let currentPage = 0;
  let isLoading = false;
  let maxNumPages = 1;

  function fetchArticles() {
    if(isLoading) return;
    console.log(currentPage , maxNumPages)
  /*
   * Initially current page and MaxNumber of pages are 0
   * Once the ajax loads the first content Max number of pages are sent in ajax
   */
    if(currentPage >= maxNumPages){
      return;
    }
    $newsLoader.show();
    isLoading = true;
    /*
     * In the first ajax call initially set currentpage is incremented
     * and the contents from page 1 is displayed
     */
    currentPage++;

    var ajaxUrl ="<?=admin_url( 'admin-ajax.php' )?>";
    var data = {
      'action': 'display_articles',
      'page' : currentPage
    };

    jQuery.ajax({
      type : "get",
      url : ajaxUrl,
      data : data,
      success: function(response) {
          // Initially MaxNumPages is 0. Get the MaxNumPages from Ajax
        maxNumPages = response.maxNumPages;
        //let newContent = $newsContent.html() + response.content;
        $newsContent.append(response.content);
        isLoading = false;
        $newsLoader.hide();
      },
      error: function (xhr, ajaxOptions, thrownError) {
        isLoading = false;
        $newsLoader.hide();
      }
    });

  }
 //When the page loads articles are fetched from ajax
  fetchArticles();

  // Check to see if scrolling near bottom of page; load more photos
  window.addEventListener('scroll', () => {
    if(isLoading){
      console.log('skip loading...');
      return;
    }
    $contactFormHeight = jQuery('#app-contactform').height();
    $footerHeight = jQuery('#footer').height();

    //Calculate footer contact form and footer height
    let totalHeight = $contactFormHeight + $footerHeight ;
    let isEndOfPage = window.innerHeight + window.scrollY >=  document.body.offsetHeight - totalHeight;
    if(isEndOfPage){
      fetchArticles();
    }
  });

</script>
<?php
get_footer();
