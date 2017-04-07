<?php

ini_set('max_execution_time', 3000000);

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

$templates = array("Birthday -1 week", "Birthday -3 weeks", "WIFI sign in 1 + 1 Day", "WIFI sign in 2 + 7 Days", "WIFI sign in 3 + 21 Days");
$brands = array("admiral_duncan", "beduin", "charles_street", "colors", "duke_of_wellington", "edwards", "finnegans_wake", "flares", "halfway_to_heaven", "kings_arms", "luna", "marys", "missoula", "pit_and_pendulum", "popworld", "queens_court", "reflex", "retro_bar", "rosies", "rupert_street", "slains_castle", "slug", "two_brewers", "via");

foreach($templates as $template){
  foreach($brands as $brand){
    $query = "SELECT `{$template}` FROM api_keys WHERE brand = '{$brand}';";
    $rows = databaseQuery($query);
    foreach($rows as $key => $row){
      $rows = $row;
      break;
    }

    $brand = str_replace('_', ' ', $brand);
    $brand = ucwords($brand);

    $api = $rows[0];

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://txd-scv-sg.zonalconnect.com/stonegate/api-v1/email/send",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{\r\n\t\"recipient\": \"txd.dev.2017@gmail.com\",\r\n\t\"key\": \"{$api}\",\r\n\t\"fname\": \"Jorden\",\r\n\t\"lname\": \"Powley\",\r\n\t\"dyn1\": \"{$brand}\",\r\n\t\"dyn2\": \"{$brand}\",\r\n\t\"dyn3\": \"mvg_b_flares\",\r\n\t\"dyn4\": \"01\\/01\\/2017\",\r\n\t\"dyn5\": \"30\\/09\\/2017\",\r\n\t\"dyn6\": \"0\",\r\n\t\"dyn7\": \"0\",\r\n\t\"dyn9\": \"123abc456edf\"\r\n}",
      CURLOPT_HTTPHEADER => array(
        "authorization: Basic dHhkOnR4ZHN1cHBvcnQ=",
        "cache-control: no-cache",
        "content-type: application/json",
        "debug: true",
        "postman-token: b64076c5-eae0-44bc-a4a7-76514345aeaa"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "<span style='color: red;'>cURL Error #: " . $err . '<br>' . "Brand: " . $brand . '<br>' . "Template: " . $template . '<br>' . "API Key: " . $api . '</span><br><br>';
    } else {
      echo "<span style='color: green;'>Success</span> Brand: " . $brand . " Template: " . $template . '<br><br>';
    }
    sleep(1);
  }
}
 ?>
