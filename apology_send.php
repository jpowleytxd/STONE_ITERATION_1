<?php

ini_set('max_execution_time', 300000);

/*........................*/
/*Query Database Returns array*/
/*........................*/
function databaseQuery($query){
  //Define Connection
  static $connection;

  //Attempt to connect to the database, if connection is yet to be established.
  if(!isset($connection)){
    //Load congig file
    $config = parse_ini_file('config.ini');
    $connection = mysqli_connect('localhost', $config['username'], $config['password'], $config['dbname']);
  }

  //Arrays to store all retrieved records
  $rows = array();
  $result = null;

  //Connection error handle
  if($connection === false){
    print('Connection Error');
    return false;
  } else{
    //Query the database
    $result = mysqli_query($connection, $query);

    //IF query failed, return 'false'
    if($result === false){
      print('Query Failed');
      return false;
    }

    //Fetch all the rows in the Array
    while($row = mysqli_fetch_row($result)){
      $rows[] = $row;
    }
    return $rows;
  }
}

function sendEmail($email, $api, $firstName, $dynamic1, $dynamic2){
  // $email = 'jorden.powley@txdlimited.co.uk';
  $dynamic3 = 'mvg_b_' . strtolower($dynamic1);
  $dynamic4 = '12/04/2017';
  $dynamic5 = '06/05/2017';

  // echo '<span style="color: green;">';
  // echo 'Email Sent To: ' . $email . ';<br>';
  // echo 'Brand: ' . $dynamic1 . ';<br>';
  // echo 'Email: ' . $api . ';<br>';
  // echo 'Response: ' . '{Campaign Reposnse Here}' . ';<br><br>';
  // echo '</span>';

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://campaigns-plus.izone-app.com/api-v1/index.cfm",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"Request\"\r\n\r\n{\"request\": {\"username\": \"txduser\",\"password\": \"txdpassword\",\"method\": \"triggeredComm\"},\"details\": {\"commType\": \"Email\",\"key\": \"{$api}\",\"recipients\": [{\"recipient\": \"{$email}\",\"fname\": \"{$firstName}\",\"dyn1\": \"{$dynamic1}\",\"dyn2\": \"{$dynamic2}\",\"dyn3\": \"{$dynamic3}\",\"dyn4\": \"{$dynamic4}\",\"dyn5\": \"{$dynamic5}\",\"dyn6\": \"0\",\"dyn7\": \"0\",\"dyn8\": \"\",\"dyn9\": \"\",\"dyn10\": \"\"}]}}\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
    CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache",
      "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
      "postman-token: fa46b272-ae19-6a8a-2cb3-3752e03dd156"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo '<span style="color: red;">';
    echo 'Email Fail To: ' . $email . ';<br>';
    echo 'Brand: ' . $dynamic1 . ';<br>';
    echo 'Email: ' . $api . ';<br>';
    echo "cURL Error #:" . $err;
    echo '</span>';
  } else {
    echo '<span style="color: green;">';
    echo 'Email Sent To: ' . $email . ';<br>';
    echo 'Brand: ' . $dynamic1 . ';<br>';
    echo 'Email: ' . $api . ';<br>';
    echo 'Response: ' . $response . ';<br><br>';
    echo '</span>';
  }

}

//Birthday API keys
$popworldBirthdayAPI = '99DA0DBD-5056-A620-BEF0B6308AFCD455';
$reflexBirthdayAPI = '99DA0DBD-5056-A620-BEF0B6308AFCD455';
$lunaBirthdayAPI = '99EC1393-5056-A620-BE5BA959D84363C6';
$flaresBirthdayAPI = '99F065BE-5056-A620-BEC98344CF5B7EC6';

//WIFI API keys
$edwardsWifiAPI = '99F65CEC-5056-A620-BEDDEE195DB6E2F2';
$missoulaWifiAPI = '99FAFF15-5056-A620-BE5A508A581FCA3B';
$popworldWifiAPI = '9A00818B-5056-A620-BE492948FE306835';
$reflexWifiAPI = '9A06683C-5056-A620-BE46B254A7EFCD74';


//Get contacts from apology table
$contactRows = null;
// $initialQuery = "SELECT * FROM `apologies` WHERE `email_address` = 'txdlimited@litmustest.com';";
$initialQuery = "SELECT * FROM `apologies`;";
$contactRows = databaseQuery($initialQuery);

$userCount = 0;
$sendCount = 0;

foreach($contactRows as $key => $row){
  $userCount++;

  $emailAddress = trim($row[1]);
  $type = trim($row[2]);
  $emailType = trim($row[3]);
  $brand = trim($row[4]);

  if($emailType === 'birthday21'){

    //Get name from name_table
    $nameRows = null;
    $nameQuery = "SELECT fld_firstname FROM `name_table` WHERE fld_email_address = '{$emailAddress}';";
    $nameRows = databaseQuery($nameQuery);
    $firstname = trim($nameRows[0][0]);


    if($brand === 'Popworld'){
      $sendCount++;
      $api = $popworldBirthdayAPI;
      $dynamic1 = 'Popworld';
      $dynamic2 = 'Popworld';
      sendEmail($emailAddress, $api, $firstname, $dynamic1, $dynamic2);
    } else if($brand === 'Reflex'){
      $sendCount++;
      $api = $reflexBirthdayAPI;
      $dynamic1 = 'Reflex';
      $dynamic2 = 'Reflex';
      sendEmail($emailAddress, $api, $firstname, $dynamic1, $dynamic2);
    } else if($brand === 'Luna'){
      $sendCount++;
      $api = $lunaBirthdayAPI;
      $dynamic1 = 'Luna';
      $dynamic2 = 'Luna';
      sendEmail($emailAddress, $api, $firstname, $dynamic1, $dynamic2);
    } else if($brand === 'Flares'){
      $sendCount++;
      $api = $flaresBirthdayAPI;
      $dynamic1 = 'Flares';
      $dynamic2 = 'Flares';
      sendEmail($emailAddress, $api, $firstname, $dynamic1, $dynamic2);
    }
  } else if($emailType === 'wifi1'){

    //Get name from name_table
    $nameRows = null;
    $nameQuery = "SELECT fld_firstname FROM `name_table` WHERE fld_email_address = '{$emailAddress}';";
    $nameRows = databaseQuery($nameQuery);
    $firstname = trim($nameRows[0][0]);

    if($brand === 'Edwards'){
      $sendCount++;
      $api = $edwardsWifiAPI;
      $dynamic1 = 'Edwards';
      $dynamic2 = 'Edwards';
      sendEmail($emailAddress, $api, $firstname, $dynamic1, $dynamic2);
    } else if($brand === 'Missoula'){
      $sendCount++;
      $api = $missoulaWifiAPI;
      $dynamic1 = 'Missoula';
      $dynamic2 = 'Missoula';
      sendEmail($emailAddress, $api, $firstname, $dynamic1, $dynamic2);
    } else if($brand === 'Popworld'){
      $sendCount++;
      $api = $popworldWifiAPI;
      $dynamic1 = 'Popworld';
      $dynamic2 = 'Popworld';
      sendEmail($emailAddress, $api, $firstname, $dynamic1, $dynamic2);
    } else if($brand === 'Reflex'){
      $sendCount++;
      $api = $reflexWifiAPI;
      $dynamic1 = 'Reflex';
      $dynamic2 = 'Reflex';
      sendEmail($emailAddress, $api, $firstname, $dynamic1, $dynamic2);
    }
  }

  sleep(1);
}

echo 'User Count: ' . $userCount . '<br>';
echo 'Send Count: ' . $sendCount . '<br>';

?>
