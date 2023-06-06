<?php

$api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP1.json';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data, true);

// All user data exists in 'data' object
$BP1 = $response_data;
	$wl1=$BP1["WL-01 Read (cm)"];
	$wl2=$BP1["WL-02 Read (cm)"];
	$wl3=$BP1["WL-03 Read (cm)"];
	$wl1temp=$BP1["WL-01 Temp"];	
    $wl2temp=$BP1["WL-02 Temp"];	
    $wl3temp=$BP1["WL-03 Temp"];
	$debit1=$BP1["Debit Air WL-01"];
    $debit2=$BP1["Debit Air WL-02"];
    $debit3=$BP1["Debit Air WL-03"];

include 'config.php';
date_default_timezone_set('Asia/Singapore'); 
$time = date('H:i');
$date = date('Y-m-d'); 
// Create connection
//  $conn = new mysqli($servername, $username, $password, $dbname); 
 // Check connection 
 if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 

    $sql = "INSERT INTO bp1 (wl1,wl2,wl3,wl1_temp,wl2_temp,wl3_temp,debit1,debit2,debit3,tanggal,jam) VALUES ('" . $wl1 . "','" . $wl2 . "','" . $wl3 . "','" . $wl1temp . "','" . $wl2temp . "','" . $wl3temp . "','" . $debit1 . "','" . $debit2 . "','" . $debit3 . "','" . $date . "','" . $time . "')"; 
    $conn->query($sql); $conn->close(); 

?>

<?php

$api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP2.json';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data, true);

// All user data exists in 'data' object
$BP2 = $response_data;
	$wl1=$BP2["WL-01 Read (cm)"];
	$wl2=$BP2["WL-02 Read (cm)"];
	$wl3=$BP2["WL-03 Read (cm)"];
	$wl1temp=$BP2["WL-01 Temp"];	
    $wl2temp=$BP2["WL-02 Temp"];	
    $wl3temp=$BP2["WL-03 Temp"];
	$debit1=$BP2["Debit Air WL-01"];
    $debit2=$BP2["Debit Air WL-02"];
    $debit3=$BP2["Debit Air WL-03"];

include 'config.php';
date_default_timezone_set('Asia/Singapore'); 
$time = date('H:i');
$date = date('Y-m-d'); 
// Create connection
//  $conn = new mysqli($servername, $username, $password, $dbname); 
 // Check connection 
 if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 

    $sql = "INSERT INTO bp2 (wl1,wl2,wl3,wl1_temp,wl2_temp,wl3_temp,debit1,debit2,debit3,tanggal,jam) VALUES ('" . $wl1 . "','" . $wl2 . "','" . $wl3 . "','" . $wl1temp . "','" . $wl2temp . "','" . $wl3temp . "','" . $debit1 . "','" . $debit2 . "','" . $debit3 . "','" . $date . "','" . $time . "')"; 
    $conn->query($sql); $conn->close(); 
 ?>

 <?php 
 $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP4.json';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data, true);

// All user data exists in 'data' object
$BP4 = $response_data;
    $wl1=$BP4["WL-01 Read (cm)"];
	$wl2=$BP4["WL-02 Read (cm)"];
	$wl3=$BP4["WL-03 Read (cm)"];
	$wl1temp=$BP4["WL-01 Temp"];	
    $wl2temp=$BP4["WL-02 Temp"];	
    $wl3temp=$BP4["WL-03 Temp"];
	$debit1=$BP4["Debit Air WL-01"];
    $debit2=$BP4["Debit Air WL-02"];
    $debit3=$BP4["Debit Air WL-03"];
//db variables 
include 'config.php';
date_default_timezone_set('Asia/Singapore'); 
$time = date('H:i');
$date = date('Y-m-d'); 
// Create connection
//  $conn = new mysqli($servername, $username, $password, $dbname); 
 // Check connection 
 if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 

    $sql = "INSERT INTO bp4 (wl1,wl2,wl3,wl1_temp,wl2_temp,wl3_temp,debit1,debit2,debit3,tanggal,jam) VALUES ('" . $wl1 . "','" . $wl2 . "','" . $wl3 . "','" . $wl1temp . "','" . $wl2temp . "','" . $wl3temp . "','" . $debit1 . "','" . $debit2 . "','" . $debit3 . "','" . $date . "','" . $time . "')"; 
    $conn->query($sql); $conn->close(); 
 ?>

 <?php 
 $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP5.json';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data, true);

// All user data exists in 'data' object
$BP5 = $response_data;
    $wl1=$BP5["WL-01 Read (cm)"];
	$wl2=$BP5["WL-02 Read (cm)"];
	$wl3=$BP5["WL-03 Read (cm)"];
	$wl1temp=$BP5["WL-01 Temp"];	
    $wl2temp=$BP5["WL-02 Temp"];	
    $wl3temp=$BP5["WL-03 Temp"];
	$debit1=$BP5["Debit Air WL-01"];
    $debit2=$BP5["Debit Air WL-02"];
    $debit3=$BP5["Debit Air WL-03"];
//db variables 
include 'config.php';
date_default_timezone_set('Asia/Singapore'); 
$time = date('H:i');
$date = date('Y-m-d'); 
// Create connection
//  $conn = new mysqli($servername, $username, $password, $dbname); 
 // Check connection 
 if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 

    $sql = "INSERT INTO bp5 (wl1,wl2,wl3,wl1_temp,wl2_temp,wl3_temp,debit1,debit2,debit3,tanggal,jam) VALUES ('" . $wl1 . "','" . $wl2 . "','" . $wl3 . "','" . $wl1temp . "','" . $wl2temp . "','" . $wl3temp . "','" . $debit1 . "','" . $debit2 . "','" . $debit3 . "','" . $date . "','" . $time . "')"; 
    $conn->query($sql); $conn->close(); 
 ?>

 <?php 
 $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP8.json';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data, true);

// All user data exists in 'data' object
$BP8 = $response_data;
    $wl1=$BP8["WL-01 Read (cm)"];
	$wl2=$BP8["WL-02 Read (cm)"];
	$wl3=$BP8["WL-03 Read (cm)"];
	$wl1temp=$BP8["WL-01 Temp"];	
    $wl2temp=$BP8["WL-02 Temp"];	
    $wl3temp=$BP8["WL-03 Temp"];
	$debit1=$BP8["Debit Air WL-01"];
    $debit2=$BP8["Debit Air WL-02"];
    $debit3=$BP8["Debit Air WL-03"];
//db variables 
include 'config.php';
date_default_timezone_set('Asia/Singapore'); 
$time = date('H:i');
$date = date('Y-m-d'); 
// Create connection
//  $conn = new mysqli($servername, $username, $password, $dbname); 
 // Check connection 
 if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 

    $sql = "INSERT INTO bp8 (wl1,wl2,wl3,wl1_temp,wl2_temp,wl3_temp,debit1,debit2,debit3,tanggal,jam) VALUES ('" . $wl1 . "','" . $wl2 . "','" . $wl3 . "','" . $wl1temp . "','" . $wl2temp . "','" . $wl3temp . "','" . $debit1 . "','" . $debit2 . "','" . $debit3 . "','" . $date . "','" . $time . "')"; 
    $conn->query($sql); $conn->close(); 
 ?>

 <?php 
 $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP13.json';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data, true);

// All user data exists in 'data' object
$BP13 = $response_data;
    $wl1=$BP13["WL-01 Read (cm)"];
	$wl2=$BP13["WL-02 Read (cm)"];
	$wl3=$BP13["WL-03 Read (cm)"];
	$wl1temp=$BP13["WL-01 Temp"];	
    $wl2temp=$BP13["WL-02 Temp"];	
    $wl3temp=$BP13["WL-03 Temp"];
	$debit1=$BP13["Debit Air WL-01"];
    $debit2=$BP13["Debit Air WL-02"];
    $debit3=$BP13["Debit Air WL-03"];
//db variables 
include 'config.php';
date_default_timezone_set('Asia/Singapore'); 
$time = date('H:i');
$date = date('Y-m-d'); 
// Create connection
//  $conn = new mysqli($servername, $username, $password, $dbname); 
 // Check connection 
 if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 

    $sql = "INSERT INTO bp13 (wl1,wl2,wl3,wl1_temp,wl2_temp,wl3_temp,debit1,debit2,debit3,tanggal,jam) VALUES ('" . $wl1 . "','" . $wl2 . "','" . $wl3 . "','" . $wl1temp . "','" . $wl2temp . "','" . $wl3temp . "','" . $debit1 . "','" . $debit2 . "','" . $debit3 . "','" . $date . "','" . $time . "')"; 
    $conn->query($sql); $conn->close(); 
 ?>

 <?php 
 $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP15.json';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data, true);

// All user data exists in 'data' object
$BP15 = $response_data;
    $wl1=$BP15["WL-01 Read (cm)"];
	$wl2=$BP15["WL-02 Read (cm)"];
	$wl3=$BP15["WL-03 Read (cm)"];
	$wl1temp=$BP15["WL-01 Temp"];	
    $wl2temp=$BP15["WL-02 Temp"];	
    $wl3temp=$BP15["WL-03 Temp"];
	$debit1=$BP15["Debit Air WL-01"];
    $debit2=$BP15["Debit Air WL-02"];
    $debit3=$BP15["Debit Air WL-03"];
//db variables 
include 'config.php';
date_default_timezone_set('Asia/Singapore'); 
$time = date('H:i');
$date = date('Y-m-d'); 
// Create connection
//  $conn = new mysqli($servername, $username, $password, $dbname); 
 // Check connection 
 if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 

    $sql = "INSERT INTO bp15 (wl1,wl2,wl3,wl1_temp,wl2_temp,wl3_temp,debit1,debit2,debit3,tanggal,jam) VALUES ('" . $wl1 . "','" . $wl2 . "','" . $wl3 . "','" . $wl1temp . "','" . $wl2temp . "','" . $wl3temp . "','" . $debit1 . "','" . $debit2 . "','" . $debit3 . "','" . $date . "','" . $time . "')"; 
    $conn->query($sql); $conn->close(); 
 ?>

<?php 
$api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP17.json';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data, true);

// All user data exists in 'data' object
$BP17 = $response_data;
    $wl1=$BP17["WL-01 Read (cm)"];
	$wl2=$BP17["WL-02 Read (cm)"];
	$wl3=$BP17["WL-03 Read (cm)"];
	$wl1temp=$BP17["WL-01 Temp"];	
    $wl2temp=$BP17["WL-02 Temp"];	
    $wl3temp=$BP17["WL-03 Temp"];
	$debit1=$BP17["Debit Air WL-01"];
    $debit2=$BP17["Debit Air WL-02"];
    $debit3=$BP17["Debit Air WL-03"];
//db variables 
include 'config.php';
date_default_timezone_set('Asia/Singapore'); 
$time = date('H:i');
$date = date('Y-m-d'); 
// Create connection
//  $conn = new mysqli($servername, $username, $password, $dbname); 
 // Check connection 
 if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 

    $sql = "INSERT INTO bp17 (wl1,wl2,wl3,wl1_temp,wl2_temp,wl3_temp,debit1,debit2,debit3,tanggal,jam) VALUES ('" . $wl1 . "','" . $wl2 . "','" . $wl3 . "','" . $wl1temp . "','" . $wl2temp . "','" . $wl3temp . "','" . $debit1 . "','" . $debit2 . "','" . $debit3 . "','" . $date . "','" . $time . "')"; 
    $conn->query($sql); $conn->close(); 
 ?>

 <?php 
 $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP19.json';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data, true);

// All user data exists in 'data' object
$BP19 = $response_data;
    $wl1=$BP19["WL-01 Read (cm)"];
	$wl2=$BP19["WL-02 Read (cm)"];
	$wl3=$BP19["WL-03 Read (cm)"];
	$wl1temp=$BP19["WL-01 Temp"];	
    $wl2temp=$BP19["WL-02 Temp"];	
    $wl3temp=$BP19["WL-03 Temp"];
	$debit1=$BP19["Debit Air WL-01"];
    $debit2=$BP19["Debit Air WL-02"];
    $debit3=$BP19["Debit Air WL-03"];
//db variables 
include 'config.php';
date_default_timezone_set('Asia/Singapore'); 
$time = date('H:i');
$date = date('Y-m-d'); 
// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname); 
 // Check connection 
 if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 

    $sql = "INSERT INTO bp19 (wl1,wl2,wl3,wl1_temp,wl2_temp,wl3_temp,debit1,debit2,debit3,tanggal,jam) VALUES ('" . $wl1 . "','" . $wl2 . "','" . $wl3 . "','" . $wl1temp . "','" . $wl2temp . "','" . $wl3temp . "','" . $debit1 . "','" . $debit2 . "','" . $debit3 . "','" . $date . "','" . $time . "')"; 
    $conn->query($sql); $conn->close(); 
 ?>

<?php

$api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP_CAKURA.json';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data, true);

// All user data exists in 'data' object
$BP_Cakura = $response_data;
    $wl1=$BP_Cakura["WL-01 Read (cm)"];
	$wl2=$BP_Cakura["WL-02 Read (cm)"];
	$wl3=$BP_Cakura["WL-03 Read (cm)"];
	$wl1temp=$BP_Cakura["WL-01 Temp"];	
    $wl2temp=$BP_Cakura["WL-02 Temp"];	
    $wl3temp=$BP_Cakura["WL-03 Temp"];
	$debit1=$BP_Cakura["Debit Air WL-01"];
    $debit2=$BP_Cakura["Debit Air WL-02"];
    $debit3=$BP_Cakura["Debit Air WL-03"];

include 'config.php';
date_default_timezone_set('Asia/Singapore'); 
$time = date('H:i');
$date = date('Y-m-d'); 
// Create connection
//  $conn = new mysqli($servername, $username, $password, $dbname); 
 // Check connection 
 if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 

    $sql = "INSERT INTO bp_cakura (wl1,wl2,wl3,wl1_temp,wl2_temp,wl3_temp,debit1,debit2,debit3,tanggal,jam) VALUES ('" . $wl1 . "','" . $wl2 . "','" . $wl3 . "','" . $wl1temp . "','" . $wl2temp . "','" . $wl3temp . "','" . $debit1 . "','" . $debit2 . "','" . $debit3 . "','" . $date . "','" . $time . "')"; 
    $conn->query($sql); $conn->close(); 
 ?>

<?php

$api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP_JENEMARUNG.json';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data, true);

// All user data exists in 'data' object
$BP_Jenemarung = $response_data;
    $wl1=$BP_Jenemarung["WL-01 Read (cm)"];
	$wl2=$BP_Jenemarung["WL-02 Read (cm)"];
	$wl3=$BP_Jenemarung["WL-03 Read (cm)"];
	$wl1temp=$BP_Jenemarung["WL-01 Temp"];	
    $wl2temp=$BP_Jenemarung["WL-02 Temp"];	
    $wl3temp=$BP_Jenemarung["WL-03 Temp"];
	$debit1=$BP_Jenemarung["Debit Air WL-01"];
    $debit2=$BP_Jenemarung["Debit Air WL-02"];
    $debit3=$BP_Jenemarung["Debit Air WL-03"];

include 'config.php';
date_default_timezone_set('Asia/Singapore'); 
$time = date('H:i');
$date = date('Y-m-d'); 
// Create connection
//  $conn = new mysqli($servername, $username, $password, $dbname); 
 // Check connection 
 if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 

    $sql = "INSERT INTO bp_jenemarung (wl1,wl2,wl3,wl1_temp,wl2_temp,wl3_temp,debit1,debit2,debit3,tanggal,jam) VALUES ('" . $wl1 . "','" . $wl2 . "','" . $wl3 . "','" . $wl1temp . "','" . $wl2temp . "','" . $wl3temp . "','" . $debit1 . "','" . $debit2 . "','" . $debit3 . "','" . $date . "','" . $time . "')"; 
    $conn->query($sql); $conn->close(); 
 ?>

<?php

$api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP_PAMUKKULU.json';

// Read JSON file
$json_data = file_get_contents($api_url);

// Decode JSON data into PHP array
$response_data = json_decode($json_data, true);

// All user data exists in 'data' object
$BP_Pamukkulu = $response_data;
    $wl1=$BP_Pamukkulu["WL-01 Read (cm)"];
	$wl2=$BP_Pamukkulu["WL-02 Read (cm)"];
	$wl3=$BP_Pamukkulu["WL-03 Read (cm)"];
	$wl1temp=$BP_Pamukkulu["WL-01 Temp"];	
    $wl2temp=$BP_Pamukkulu["WL-02 Temp"];	
    $wl3temp=$BP_Pamukkulu["WL-03 Temp"];
	$debit1=$BP_Pamukkulu["Debit Air WL-01"];
    $debit2=$BP_Pamukkulu["Debit Air WL-02"];
    $debit3=$BP_Pamukkulu["Debit Air WL-03"];
//db variables 
include 'config.php';
date_default_timezone_set('Asia/Singapore'); 
$time = date('H:i');
$date = date('Y-m-d'); 
// Create connection
//  $conn = new mysqli($servername, $username, $password, $dbname); 
 // Check connection 
 if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); } 

    $sql = "INSERT INTO bp_pamukkulu (wl1,wl2,wl3,wl1_temp,wl2_temp,wl3_temp,debit1,debit2,debit3,tanggal,jam) VALUES ('" . $wl1 . "','" . $wl2 . "','" . $wl3 . "','" . $wl1temp . "','" . $wl2temp . "','" . $wl3temp . "','" . $debit1 . "','" . $debit2 . "','" . $debit3 . "','" . $date . "','" . $time . "')"; 
    $conn->query($sql); $conn->close(); 
 ?>