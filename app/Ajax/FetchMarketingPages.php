<?php
namespace App\Ajax;

use App\WP_AJAX;

class FetchMarketingPages extends WP_AJAX
{
  public $action = 'display_marketing_contents';

  public function run()
  {
    $topic = filter_var($this->get('topic'), FILTER_VALIDATE_INT);
    $industry = filter_var($this->get('industry'), FILTER_VALIDATE_INT);
    $search =  filter_var($this->get('search'), FILTER_SANITIZE_STRING);
    $currentPage =  filter_var($this->get('page', 1), FILTER_VALIDATE_INT);

    if(!$topic) $topic = null;
    if(!$industry) $industry = null;
    if(!$currentPage) $currentPage = 1;

    $postsPerPage = 18;

    $args = [
      'post_type' => 'wpdmpro',
      'paged' => $currentPage,
      'post_status'=> 'publish',
      'posts_per_page' => $postsPerPage
    ];


    if($search) $args['s'] = $search;

    if($topic) {
      $args['tax_query'] = [
        [
          'taxonomy' => 'topic',
          'field' => 'term_id',
          'terms' => [$topic],
        ],
      ];
    }

    if($industry){
      $args['tax_query']= [
        [
          'taxonomy' => 'industry-type',
          'field'    => 'term_id',
          'terms'    => [$industry],
        ],
      ];
    }

    if($industry && $topic) {
      $args['tax_query']= [
        'relation' => 'OR',
        [
          'taxonomy' => 'industry-type',
          'field'    => 'term_id',
          'terms'    => [$industry],
        ],
        [
          'taxonomy' => 'topic',
          'field' => 'term_id',
          'terms' => [$topic],
        ]
      ];
    }

    $query = new \WP_Query( $args );
    ob_start();
    if ( $query->have_posts() ) {
      while ($query->have_posts()) {
        $query->the_post();
        echo get_template_part('template-parts/partials/marketing-content/download', 'excerpt');
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
  FetchMarketingPages::listen();
} catch (\Exception $e) {
}
