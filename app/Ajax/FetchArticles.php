<?php
namespace App\Ajax;

use App\WP_AJAX;

class FetchArticles extends WP_AJAX
{
  public $action = 'display_articles';

  public function run()
  {

    $currentPage =  filter_var($this->get('page', 1), FILTER_VALIDATE_INT);
    if(!$currentPage) $currentPage = 1;

    $postsPerPage = 18;

    $args = [
      'post_type' => 'post',
      'paged' => $currentPage,
      'post_status'=> 'publish',
      'posts_per_page' => $postsPerPage
    ];

   //Since the first three articles are already displayed in the banner
  // It is excluded from the page number 1
    if($currentPage==1) $args['offset'] = 3;

    $query = new \WP_Query( $args );
    ob_start();
    if ( $query->have_posts() ) {
      while ($query->have_posts()) {
        $query->the_post();
        echo get_template_part('template-parts/partials/content/post', 'excerpt');
      }
    }else{
      echo "No content found!";
    }

    /*
     * Max num pages is sent to the ajax response to compare it with the current page.
     */
    $content = ob_get_clean();
    wp_send_json([
      'content' => $content,
      'maxNumPages' => $query->max_num_pages
    ]);
  }
}

try {
  FetchArticles::listen();
} catch (\Exception $e) {
}
