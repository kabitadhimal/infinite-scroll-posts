<?php
/**
 * Function includes
 *
 * The $function_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 */

$function_includes = [
  'app/acf.php', // ACF
  'app/WP_AJAX.php', // WP AJAX
  'app/Ajax/autoload.php', // AJAX autoload classes
];

foreach ($function_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);
