<?php
/**
 * Finance and Accounting block used in FINANCE & ACCOUNTING OUTSOURCED SERVICES
 */
$table          = $block['table'] ?? null;
$number_section = $block['number_section'] ?? null;
$add_button     = $block['add_button'] ?? false;
?>
<div class="services__financeAccounting">
  <?php if ($title = $block['title']) : ?>
  <h3 class="services__financeAccounting-heading"><?= $title; ?></h3>
  <?php endif; ?>
  <div class="container">
    <?php if ($sub_title = $block['sub_title']) : ?>
    <span class="services__financeAccounting-info"><?= $sub_title; ?></span>
    <?php endif; ?>
    <div class="row">
      <div class="col-9">
        <?php if ($table) {
          echo '<table class="table-primary" border="0" cellpadding="0" cellspacing="0" width="100%">';
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
      </div>
      <?php if ($number_section) : ?>
      <div class="col-3">
        <div class="card__item card__single">
          <div class="card__item-info">
            <span><?= $number_section['number']; ?></span>
            <cite class="cite"><?= $number_section['short_intro']; ?></cite>
          </div>
        </div>
      </div>
      <?php endif; ?>
    </div>
    <?= $block['description']; ?>
  </div>
</div>
