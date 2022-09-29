<?php
/**
 * FAQ Block
 */
$faqs = $block['faqs'] ?? null;
?>
<?php if ($faqs) : ?>
<section class="nowcfo__section bg-faded-blue">
  <div class="container sm">
    <?php foreach ($faqs as $faq) : ?>
    <details class="services__accordion">
      <?php if ($faq_title = $faq['question']) : ?>
      <summary class="services__accordion-summary">
        <span class="services__accordion-title"><?= $faq_title; ?></span>
        <small class="services__accordion-arrow"></small>
      </summary>
      <?php endif;
      $answer_type = $faq['answer_type'];
      ?>
      <div class="services__accordion-content">
        <?php if ($answer_type == 'table') :
          $table = $faq['table'] ?? null;
          if ($table) {
            echo '<table border="0">';
              if (! empty($table['caption'])) {
                echo '<caption>' . $table['caption'] . '</caption>';
              }
              if (! empty($table['header'])) {
                echo '<thead>';
                  echo '<tr>';
                    foreach ( $table['header'] as $th ) {
                      echo '<th>';
                        echo $th['c'];
                      echo '</th>';
                    }
                  echo '</tr>';
                echo '</thead>';
              }
              echo '<tbody>';
              foreach ($table['body'] as $tr) {
                echo '<tr>';
                  foreach ( $tr as $td ) {
                    echo '<td>';
                        echo $td['c'];
                    echo '</td>';
                  }
                echo '</tr>';
                  }
              echo '</tbody>';
            echo '</table>';
          }
        ?>
        <?php else :
          echo $faq['content'];
        endif; ?>
      </div>
    </details>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>
