<?php
ini_set('max_execution_time', 3000);
include 'common.php';

$saveToFile = $_POST['saveStatus'];

$sql = null;
foreach (glob("../pre_made/*/birthday_3_weeks.html") as $filename) {
  $temp = file_get_contents($filename);
  $brand = preg_replace('/.*?\/.*?\/(.*?)\/.*/', '$1', $filename);

  //Remove comment tags
  $temp = preg_replace('/\{.*?\}/ms', '', $temp);
  // $temp = preg_replace('/\<!--.*?\-->/ms', '', $temp);
  $temp = preg_replace('/\'/ms', '\\\'', $temp);
  $temp = removeWhiteSpace($temp);

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

  $voucher = 1;

  //Naming variables
  $type = "Birthday -3 Weeks";
  $name = $upperCaseName . ' - T:20170324 - ' . $type;

  //Build SQL statements
  $sql .= "UPDATE `tbl_email_templates` SET `template_html` = '" . $temp . "', `template_has_voucher` = '" . $voucher . "'
          WHERE `template_account_id` = '1222' AND `template_title` = '" . $name . "';\n";
}

$append = "birthday_3_update";
$path = "updates";
$save = $saveToFile;

sendToFile($sql,$path, $append, $brand, '.sql', $save);

// print_r($sql);

echo $sql;

 ?>
