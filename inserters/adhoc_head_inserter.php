<?php
ini_set('max_execution_time', 3000);
include 'common.php';

$saveToFile = $_POST['saveStatus'];

$sql = null;
foreach (glob("../pre_made/*/adhoc.html") as $filename) {
  $temp = file_get_contents($filename);
  $brand = preg_replace('/.*?\/.*?\/(.*?)\/.*/', '$1', $filename);

  //Remove comment tags
  $temp = preg_replace('/\{.*?\}/ms', '', $temp);
  // $temp = preg_replace('/\<!--.*?\-->/ms', '', $temp);
  $temp = preg_replace('/<!-- VenueStart -->/ms', '', $temp);
  $temp = preg_replace('/<!-- VenueEnd -->/ms', '', $temp);
  $temp = preg_replace('/<!-- BrandedStart -->/ms', '', $temp);
  $temp = preg_replace('/<!-- BrandedEnd -->/ms', '', $temp);
  // $temp = preg_replace('/\'/ms', '\\\'', $temp);

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
  $accounts = null;
  foreach($rows as $key => $row){
    $accountID = $row[2];
    $profileID = $row[3];
    $brandID = $row[4];
    $venueID = $row[5];
    $veID = $row[6];
    $accounts = $row[7];
  }

  //Naming variables
  $type = 'Adhoc Template';
  $name = $upperCaseName . ' ' . $type;

  //Build SQL statements
  if(($accounts === 'venue') || ($accounts === 'ind')){
    $sql .= "INSERT INTO `tbl_template_editor_templates` (`template_account_id`, `template_name`, `template_subject`, `template_html`, `template_text`, `template_created_datetime`, `template_type`, `template_image`, `template_status`, `template_associated_account_ids`) VALUES
            ('1222', '" . $name . "', NULL, '" . $temp . "',
            NULL, '" . date("Y-m-d H:i:s") . "', 'VENUE: " . $type . "', NULL, '1', '," . $veID . ",');\n";
  } else if($accounts === 'both'){
    $sql .= "INSERT INTO `tbl_template_editor_templates` (`template_account_id`, `template_name`, `template_subject`, `template_html`, `template_text`, `template_created_datetime`, `template_type`, `template_image`, `template_status`, `template_associated_account_ids`) VALUES
            ('1222', '" . $name . "', NULL, '" . $temp . "',
            NULL, '" . date("Y-m-d H:i:s") . "', 'BRAND: " . $type . "', NULL, '1', '," . $veID . ",');\n";
    $sql .= "INSERT INTO `tbl_template_editor_templates` (`template_account_id`, `template_name`, `template_subject`, `template_html`, `template_text`, `template_created_datetime`, `template_type`, `template_image`, `template_status`, `template_associated_account_ids`) VALUES
            ('1222', '" . $name . "', NULL, '" . $temp . "',
            NULL, '" . date("Y-m-d H:i:s") . "', 'VENUE: " . $type . "', NULL, '1', '," . $veID . ",');\n";
  }
}

$append = "adhoc_insert_head";
$path = "inserts";
$save = $saveToFile;

sendToFile($sql,$path, $append, $brand, '.sql', $save);

// print_r($sql);

echo $sql;
 ?>
