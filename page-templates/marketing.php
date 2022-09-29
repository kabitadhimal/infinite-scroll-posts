<?php
/**
 * Template name: Marketing
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 */
get_header();
?>
<?php get_template_part('template-parts/flexible-blocks'); ?>
  <div class="container mb-4">
    <div class="row mt-2">
      <div class="sidebar-content">
        <div class="filters-wrap">
          <form name="download" method="post"  id="downloadForm">
            <div class="row">
              <div class="col-4 field-group">
                <label class="field-filter-label" for="filter-topic">Topic</label>
                <?php
                $topicTerms = get_terms([
                  'taxonomy' => 'topic',
                  'hide_empty' => true,
                  'orderby'  => 'name',
                  'order'    => 'ASC'
                ]);
                $topicTerms = sortCategories($topicTerms);
                ?>
                <select id="filter-topic"
                        class="field-item filter-select custom-filter"
                >
                  <option value="">Select...</option>
                  <?php foreach ($topicTerms as $term){?>
                    <option value="<?=$term->term_id?>"><?=$term->name?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="col-4 field-group">
                <?php
                $industryTerms = get_terms([
                  'taxonomy' => 'industry-type',
                  'hide_empty' => true,
                  'orderby'  => 'name',
                  'order'    => 'ASC'
                ]);
                $industryTerms = sortCategories($industryTerms);
                ?>
                <label class="field-filter-label" for="filter-industry">Industry</label>
                <select  id="filter-industry"
                         class="field-item filter-select custom-filter"
                >
                  <option value="">Select...</option>
                  <?php foreach ($industryTerms as $term){?>
                    <option value="<?=$term->term_id?>"><?=$term->name?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

          </form>

        </div>
          <!-- All the ajax articles are embeded here -->
          <div id="marketing-resources" class="articles three-columns aligncenter">
        </div>
        <div class="js-loader" >
          <div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>
        </div>
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
    </div>
  </div>

  <script>
    jQuery("#filter-topic").change(function () {
      resetFetchPages();
      jQuery("#downloadForm").submit();
    });

    jQuery("#filter-industry").change(function () {
      resetFetchPages();
      jQuery("#downloadForm").submit();
    });

    jQuery("#searchForm").on("submit", function(event){
      resetFetchPages();
      event.preventDefault();
      fetchPages();
    });

    jQuery("#downloadForm").on("submit", function(event){
      event.preventDefault();
      fetchPages();
    });

    let currentPage = 0;
    let isLoading = false;
    let maxNumPages = 1;

    const $newsContent = jQuery( "#marketing-resources" );
    const $newsLoader = jQuery( ".js-loader" );

    function resetFetchPages(){
      currentPage = 0;
      maxNumPages = 1;
      isLoading = false;
      $newsContent.html('');
    }

    function fetchPages() {
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
      var topic = jQuery("#filter-topic").val();
      var industry = jQuery("#filter-industry").val();
      var search = jQuery(".field-search").val();

      var ajaxUrl ="<?=admin_url( 'admin-ajax.php' )?>";
      var data = {
        'action': 'display_marketing_contents',
        'topic': topic,
        'industry': industry,
        'search': search,
        'page' : currentPage
      };

      jQuery.ajax({
        type : "get",
        url : ajaxUrl,
        data : data,
        success: function(response) {
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

    //When the page loads marketing contents are fetched from ajax

    fetchPages();
    // Check to see if scrolling near bottom of page; load more photos
    window.addEventListener('scroll', () => {
      if(isLoading){
        console.log('skip loading...');
        return;
      }
      $footerHeight = jQuery('#footer').height();

      let isEndOfPage = window.innerHeight + window.scrollY >=  document.body.offsetHeight - $footerHeight;
      if(isEndOfPage){
        fetchPages();
      }
    });

  </script>
<?php get_footer();
