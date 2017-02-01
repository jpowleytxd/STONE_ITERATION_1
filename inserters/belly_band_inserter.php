<?php
ini_set('max_execution_time', 3000);
include 'common.php';

$sql = null;
foreach (glob("../pre_made/*/belly_band.html") as $filename) {
  $temp = file_get_contents($filename);
  $brand = preg_replace('/.*?\/.*?\/(.*?)\/.*/', '$1', $filename);

  //Remove comment tags
  $temp = preg_replace('/\{.*?\}/ms', '', $temp);
  $temp = preg_replace('/\<!--.*?\-->/ms', '', $temp);

  //Base 64 encode template
  $temp = base64_encode($temp);

  //Brand to uppercase
  $upperCaseName = str_replace('_', ' ', $brand);
  $upperCaseName = ucwords($upperCaseName);

  //Get account data
  $initialQuery = 'SELECT * FROM account_data WHERE brand = "' . $brand . '"';
  $rows = databaseQuery($initialQuery);
  $accountID = null;
  $profileID = null;
  $brandID = null;
  $venueID = null;
  $veID = null;
  foreach($rows as $key => $row){
    $accountID = $row[2];
    $profileID = $row[3];
    $brandID = $row[4];
    $venueID = $row[5];
    $veID = $row[6];
  }

  //Naming variables
  $type = 'Belly Band Template';
  $name = $upperCaseName . ' ' . $type;

  //Build SQL statements
  $sql .= "INSERT INTO `tbl_template_editor_templates` (`template_account_id`, `template_name`, `template_subject`, `template_html`, `template_text`, `template_created_datetime`, `template_type`, `template_image`, `template_status`) VALUES
          ('" . $veID . "', '" . $name . "', NULL, '" . $temp . "', NULL, NULL, '" . $type . "', NULL, '1');\n";
}

$append = "belly_band_insert_ind";
$path = "inserts";
$save = false;

sendToFile($sql,$path, $append, $brand, '.html', $save);

print_r($sql);

 ?>