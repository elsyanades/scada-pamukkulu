
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Data Level Air SCADA - Pamukkulu</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.icon" rel="icon">
  <link href="assets/img/favicon.icon" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <style>
    #map {
      height:100vh;
    }
      .mySlides {
        display: none
      }
      img {
        vertical-align: middle;
      }
      .slideshow-container {
        max-width: 1000px;
        position: relative;
        margin: auto;
      }
      /* Next & previous buttons */
      .prev,
      .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
      }
      /* Position the "next button" to the right */
      .next {
        right: 0;
        border-radius: 3px 0 0 3px;
      }
      /* On hover, add a black background color with a little bit see-through */
      .prev:hover,
      .next:hover {
        background-color: rgba(0, 0, 0, 0.8);
      }
      /* Caption text */
      .text {
        color: #ffffff;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
      }
      /* Number text (1/3 etc) */
      .numbertext {
        color: #ffffff;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
      }
      /* The dots/bullets/indicators */
      .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #999999;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 10s ease;
      }
      .actives,
      .dot:hover {
        background-color: #111111;
      }
      /* Fading animation */
      .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 10s;
        animation-name: fade;
        animation-duration: 10s;
      }
      @-webkit-keyframes fade {
        from {
          opacity: .4
        }
        to {
          opacity: 1
        }
      }
      @keyframes fade {
        from {
          opacity: .4
        }
        to {
          opacity: 1
        }
      }
      /* On smaller screens, decrease text size */
      @media only screen and (max-width: 300px) {
        .prev,
        .next,
        .text {
          font-size: 11px
        }
      }

    </style>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
  <link rel="stylesheet" type="text/css" href="assets/jquery-ui.min.css">
  <script src="assets/jquery-3.4.1.min.js"></script>

  <!-- =======================================================
  * Template Name: FlexStart - v1.11.1
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

<?php include 'menu.php';?>

<main id="main">

    <!-- ======= Services Section ======= -->
    <section id="data" class="services">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
            <br><br>
          <p>DATA PEMANTAUAN KANAL IRIGASI PAMUKKULU</p>
        </header>

        <div class="col-lg-12 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content" id="map">
            </div>
            <br>
            <div class="content table-responsive">
            <!-- Table -->
                <table class="table table-bordered text-center">
                <thead class="table-light text-center">
                <tr>
                    <th rowspan="2" style="vertical-align: middle; width:5%">No</th>
                    <th rowspan="2" style="vertical-align: middle; width:20%">Lokasi</th>
                    <th rowspan="2" style="vertical-align: middle; width:20%">Waktu</th>
                    <th colspan="4">Sungai</th>
                    <th colspan="5">Intake Kanal Irigasi</th>
                </tr>
                <tr>
                    <th>TMA (cm)</th>
                    <th>Debit (lt/dt)</th>
                    <th>Suhu (°C)</th>
                    <th>PA-1 (cm)</th>
                    <th>TMA (cm)</th>
                    <th>Debit (lt/dt)</th>
                    <th>Suhu (°C)</th>
                    <th>PA-1 (cm)</th>
                    <th>PA-2 (cm)</th>
                </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                        $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP_PAMUKKULU.json';

                          // Read JSON file
                          $json_data = file_get_contents($api_url);

                          // Decode JSON data into PHP array
                          $response_data = json_decode($json_data, true);

                          // All user data exists in 'data' object
                          $BP_Pamukkulu = $response_data;
                            $wl1=$BP_Pamukkulu["WL-01 Read (cm)"];
                            $c_wl1 = ($wl1 >= 32767) ? 0 : $wl1;
                            $wl2=$BP_Pamukkulu["WL-02 Read (cm)"];
                            $c_wl2 = ($wl2 >= 32767) ? 0 : $wl2;
                            $wl1temp=$BP_Pamukkulu["WL-01 Temp"]/10;	
                              $wl2temp=$BP_Pamukkulu["WL-02 Temp"]/10;	
                              $wl3temp=$BP_Pamukkulu["WL-03 Temp"]/10;
                            $debit1=$BP_Pamukkulu["Debit Air WL-01"];
                              $debit2=$BP_Pamukkulu["Debit Air WL-02"];
                              $debit3=$BP_Pamukkulu["Debit Air WL-03"];
                              $ts=$BP_Pamukkulu["TS"];
                            $mov1=$BP_Pamukkulu["MOV-01 Feedback Position in Centimeter"];
                            $mov2=$BP_Pamukkulu["MOV-02 Feedback Position in Centimeter"];
                            $mov3=$BP_Pamukkulu["MOV-03 Feedback Position in Centimeter"];
                            $mov4=$BP_Pamukkulu["MOV-04 Position in Centimeter"];
                            $on = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP_Pamukkulu["MOV-01 Status Remote Selected"];
                            $ss_mov1 = ($s_mov1 == 0) ? $off : $on;
                            $s_mov2=$BP_Pamukkulu["MOV-02 Status Remote Selected"];
                            $ss_mov2 = ($s_mov2 == 0) ? $off : $on;
                            $s_mov3=$BP_Pamukkulu["MOV-03 Status Remote Selected"];
                            $ss_mov3 = ($s_mov3 == 0) ? $off : $on;
                            $s_mov4=$BP_Pamukkulu["MOV-04 Status Remote Selected"];
                            $ss_mov4 = ($s_mov4 == 0) ? $off : $on;
                        echo "<tr>
                            <td>1</td>
                            <td><a href=index.php?page=bendung-pamukkulu>Bendung <br> Pamukkulu</a></td>
                            <td>$ts</td>
                            <td>$c_wl1</td>
                            <td>$debit1</td>
                            <td>$wl1temp</td>
                            <td></td>
                            <td>$c_wl2</td>
                            <td>$debit2</td>
                            <td>$wl2temp</td>
                            <td></td>
                            <td></td>
                        </tr>";
          
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
                        $c_wl1 = ($wl1 >= 32767) ? 0 : $wl1/10;
                        $wl2=$BP_Cakura["WL-02 Read (cm)"];
                        $c_wl2 = ($wl2 >= 32767) ? 0 : $wl2/10;
                      $wl1temp=$BP_Cakura["WL-01 Temp"]/10;	
                            $wl2temp=$BP_Cakura["WL-02 Temp"]/10;	
                            $wl3temp=$BP_Cakura["WL-03 Temp"]/10;
                          $debit1=$BP_Cakura["Debit Air WL-01"];
                            $debit2=$BP_Cakura["Debit Air WL-02"];
                            $debit3=$BP_Cakura["Debit Air WL-03"];
                            $ts=$BP_Cakura["TS"];
                            $mov1=$BP_Cakura["MOV-01 Feedback Position in Centimeter"];
                            $mov2=$BP_Cakura["MOV-02 Feedback Position in Centimeter"];
                            $mov3=$BP_Cakura["MOV-03 Feedback Position in Centimeter"];
                            $mov4=$BP_Cakura["MOV-04 Position in Centimeter"];
                            $on = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP_Cakura["MOV-01 Status Remote Selected"];
                            $ss_mov1 = ($s_mov1 == 0) ? $off : $on;
                            $s_mov2=$BP_Cakura["MOV-02 Status Remote Selected"];
                            $ss_mov2 = ($s_mov2 == 0) ? $off : $on;
                            $s_mov3=$BP_Cakura["MOV-03 Status Remote Selected"];
                            $ss_mov3 = ($s_mov3 == 0) ? $off : $on;
                            $s_mov4=$BP_Cakura["MOV-04 Status Remote Selected"];
                            $ss_mov4 = ($s_mov4 == 0) ? $off : $on;
                        echo "<tr>
                            <td>2</td>
                            <td><a href=index.php?page=bendung-cakura>Bendung <br> Cakura</a></td>
                            <td>$ts</td>
                            <td>$c_wl1</td>
                            <td>$debit1</td>
                            <td>$wl1temp</td>
                            <td>$mov1 <br> $ss_mov1</td>
                            <td>$c_wl2</td>
                            <td>$debit2</td>
                            <td>$wl2temp</td>
                            <td>$mov2 <br> $ss_mov2</td>
                            <td></td>
                        </tr>";
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
                            $c_wl1 = ($wl1 >= 32767) ? 0 : $wl1/10;
                          $wl2=$BP_Jenemarung["WL-02 Read (cm)"];
                            $c_wl2 = ($wl2 >= 32767) ? 0 : $wl2/10;
                          $wl3=$BP_Jenemarung["WL-03 Read (cm)"];
                            $c_wl3 = ($wl3 >= 32767) ? 0 : $wl3/10;
                          $wl1temp=$BP_Jenemarung["WL-01 Temp"]/10;	
                            $wl2temp=$BP_Jenemarung["WL-02 Temp"]/10;	
                            $wl3temp=$BP_Jenemarung["WL-03 Temp"]/10;
                          $debit1=$BP_Jenemarung["Debit Air WL-01"];
                            $debit2=$BP_Jenemarung["Debit Air WL-02"];
                            $debit3=$BP_Jenemarung["Debit Air WL-03"];
                            $ts=$BP_Jenemarung["TS"];
                            $mov1=$BP_Jenemarung["MOV-01 Feedback Position in Centimeter"];
                            $mov2=$BP_Jenemarung["MOV-02 Feedback Position in Centimeter"];
                            $mov3=$BP_Jenemarung["MOV-03 Feedback Position in Centimeter"];
                            $mov4=$BP_Jenemarung["MOV-04 Position in Centimeter"];
                            $on = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP_Jenemarung["MOV-01 Status Remote Selected"];
                            $ss_mov1 = ($s_mov1 == 0) ? $off : $on;
                            $s_mov2=$BP_Jenemarung["MOV-02 Status Remote Selected"];
                            $ss_mov2 = ($s_mov2 == 0) ? $off : $on;
                            $s_mov3=$BP_Jenemarung["MOV-03 Status Remote Selected"];
                            $ss_mov3 = ($s_mov3 == 0) ? $off : $on;
                            $s_mov4=$BP_Jenemarung["MOV-04 Status Remote Selected"];
                            $ss_mov4 = ($s_mov4 == 0) ? $off : $on;
                        echo "<tr>
                            <td>3</td>
                            <td><a href=index.php?page=bendung-jenemarung>Bendung <br> Jenemarung</a></td>
                            <td>$ts</td>
                            <td>$c_wl1</td>
                            <td>$debit1</td>
                            <td>$wl1temp</td>
                            <td>$mov1 <br> $ss_mov1</td>
                            <td>
                              <table>
                                <tr>
                                    <td>Ka</td>
                                    <td>$c_wl2</td>
                                </tr>
                                <tr>
                                    <td>Ki</td>
                                    <td>$c_wl3</td>
                                </tr>
                              </table>
                            </td>
                            <td>$debit2 <br> $debit3</td>
                            <td>$wl2temp <br> $wl3temp</td>
                            <td>$mov2 <br> $ss_mov2</td>
                            <td>$mov3 <br> $ss_mov3</td>
                        </tr>";
                    ?>
                </tbody>      
            </table>
                <table class="table table-bordered text-center">
                <thead class="table-light text-center">
                <tr>
                    <th rowspan="2" style="vertical-align: middle; width:5%">No</th>
                    <th rowspan="2" style="vertical-align: middle; width:10%">Lokasi</th>
                    <th rowspan="2" style="vertical-align: middle;">Waktu</th>
                    <th colspan="6">Kanal Primer</th>
                    <th colspan="5">Kanal Sekunder</th>
                </tr>
                <tr>
                    <th>TMA (cm)</th>
                    <th>Debit (lt/dt)</th>
                    <th>Suhu (°C)</th>
                    <th>PA-1 (cm)</th>
                    <th>PA-2 (cm)</th>
                    <th>PA-3 (cm)</th>
                    <th>TMA (cm)</th>
                    <th>Debit (lt/dt)</th>
                    <th>Suhu (°C)</th>
                    <th>PA-1 (cm)</th>
                    <th>PA-2 (cm)</th>
                </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                        $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP1.json';

                    // Read JSON file
                    $json_data = file_get_contents($api_url);

                    // Decode JSON data into PHP array
                    $response_data = json_decode($json_data, true);

                    // All user data exists in 'data' object
                    $BP1 = $response_data;
                        $wl1=$BP1["WL-01 Read (cm)"];
                        $s_wl1 = ($wl1 >= 32767) ? 0 : $wl1/10;
                      $wl2=$BP1["WL-02 Read (cm)"];
                      $s_wl2 = ($wl2 >= 32767) ? 0 : $wl2/10;
                      $wl1temp=$BP1["WL-01 Temp"]/10;	
                            $wl2temp=$BP1["WL-02 Temp"]/10;	
                          $debit1=$BP1["Debit Air WL-01"];
                            $debit2=$BP1["Debit Air WL-02"];
                            $ts=$BP1["TS"];
                            $mov1=$BP1["MOV-01 Feedback Position in Centimeter"];
                            $mov2=$BP1["MOV-02 Feedback Position in Centimeter"];
                            $mov3=$BP1["MOV-03 Feedback Position in Centimeter"];
                            $mov4=$BP1["MOV-04 Position in Centimeter"];
                            $on = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP1["MOV-01 Status Remote Selected"];
                            $ss_mov1 = ($s_mov1 == 0) ? $off : $on;
                            $s_mov2=$BP1["MOV-02 Status Remote Selected"];
                            $ss_mov2 = ($s_mov2 == 0) ? $off : $on;
                            $s_mov3=$BP1["MOV-03 Status Remote Selected"];
                            $ss_mov3 = ($s_mov3 == 0) ? $off : $on;
                            $s_mov4=$BP1["MOV-04 Status Remote Selected"];
                            $ss_mov4 = ($s_mov4 == 0) ? $off : $on;
                        echo "<tr>
                            <td>1</td>
                            <td><a href=bp1.php>B.P.1</a></td>
                            <td>$ts</td>
                            <td>$s_wl1</td>
                            <td>$debit1</td>
                            <td>$wl1temp</td>
                            <td>$mov1 <br> $ss_mov1</td>
                            <td>$mov2 <br> $ss_mov2</td>
                            <td></td>
                            <td>$s_wl2</td>
                            <td>$debit2</td>
                            <td>$wl2temp</td>
                            <td>$mov3 <br> $ss_mov3</td>
                            <td>$mov4 <br> $ss_mov4</td>

                        </tr>";
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
                        $s_wl1 = ($wl1 >= 32767) ? 0 : $wl1/10;
                      $wl2=$BP2["WL-02 Read (cm)"];
                      $s_wl2 = ($wl2 >= 32767) ? 0 : $wl2/10;
                      $wl1temp=$BP2["WL-01 Temp"]/10;	
                            $wl2temp=$BP2["WL-02 Temp"]/10;	
                          $debit1=$BP2["Debit Air WL-01"];
                            $debit2=$BP2["Debit Air WL-02"];
                            $ts=$BP2["TS"];
                            $mov1=$BP2["MOV-01 Feedback Position in Centimeter"];
                            $mov2=$BP2["MOV-02 Feedback Position in Centimeter"];
                            $mov3=$BP2["MOV-03 Feedback Position in Centimeter"];
                            $mov4=$BP2["MOV-04 Position in Centimeter"];
                            $on = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP2["MOV-01 Status Remote Selected"];
                            $ss_mov1 = ($s_mov1 == 0) ? $off : $on;
                            $s_mov2=$BP2["MOV-02 Status Remote Selected"];
                            $ss_mov2 = ($s_mov2 == 0) ? $off : $on;
                            $s_mov3=$BP2["MOV-03 Status Remote Selected"];
                            $ss_mov3 = ($s_mov3 == 0) ? $off : $on;
                            $s_mov4=$BP2["MOV-04 Status Remote Selected"];
                            $ss_mov4 = ($s_mov4 == 0) ? $off : $on;
                        echo "<tr>
                            <td>2</td>
                            <td><a href=bp2.php>B.P.2</a></td>
                            <td>$ts</td>
                            <td>$s_wl1</td>
                            <td>$debit1</td>
                            <td>$wl1temp</td>
                            <td>$mov1 <br> $ss_mov1</td>
                            <td>$mov2 <br> $ss_mov2</td>
                            <td></td>
                            <td>$s_wl2</td>
                            <td>$debit2</td>
                            <td>$wl2temp</td>
                            <td>$mov3 <br> $ss_mov3</td>
                            <td></td>
                        </tr>";
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
                        $s_wl1 = ($wl1 >= 32767) ? 0 : $wl1/10;
                      $wl2=$BP4["WL-02 Read (cm)"];
                      $s_wl2 = ($wl2 >= 32767) ? 0 : $wl2/10;
                      $wl1temp=$BP4["WL-01 Temp"]/10;	
                            $wl2temp=$BP4["WL-02 Temp"]/10;	
                            $wl3temp=$BP4["WL-03 Temp"]/10;
                          $debit1=$BP4["Debit Air WL-01"];
                            $debit2=$BP4["Debit Air WL-02"];
                            $debit3=$BP4["Debit Air WL-03"];
                            $ts=$BP4["TS"];
                            $mov1=$BP4["MOV-01 Feedback Position in Centimeter"];
                            $mov2=$BP4["MOV-02 Feedback Position in Centimeter"];
                            $mov3=$BP4["MOV-03 Feedback Position in Centimeter"];
                            $mov4=$BP4["MOV-04 Position in Centimeter"];
                            $on = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP4["MOV-01 Status Remote Selected"];
                            $ss_mov1 = ($s_mov1 == 0) ? $off : $on;
                            $s_mov2=$BP4["MOV-02 Status Remote Selected"];
                            $ss_mov2 = ($s_mov2 == 0) ? $off : $on;
                            $s_mov3=$BP4["MOV-03 Status Remote Selected"];
                            $ss_mov3 = ($s_mov3 == 0) ? $off : $on;
                            $s_mov4=$BP4["MOV-04 Status Remote Selected"];
                            $ss_mov4 = ($s_mov4 == 0) ? $off : $on;
                        echo "<tr>
                            <td>3</td>
                            <td><a href=bp4.php>B.P.4</a></td>
                            <td>$ts</td>
                            <td>$s_wl1</td>
                            <td>$debit1</td>
                            <td>$wl1temp</td>
                            <td>$mov1 <br> $ss_mov1</td>
                            <td>$mov2 <br> $ss_mov2</td>
                            <td>$mov3 <br> $ss_mov3</td>
                            <td>$s_wl2</td>
                            <td>$debit2</td>
                            <td>$wl2temp</td>
                            <td>$mov4 <br> $ss_mov4</td>
                            <td></td>
                        </tr>";
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
                        $s_wl1 = ($wl1 >= 32767) ? 0 : $wl1/10;
                      $wl2=$BP5["WL-02 Read (cm)"];
                      $s_wl2 = ($wl2 >= 32767) ? 0 : $wl2/10;
                      $wl1temp=$BP5["WL-01 Temp"]/10;	
                            $wl2temp=$BP5["WL-02 Temp"]/10;	
                          $debit1=$BP5["Debit Air WL-01"];
                            $debit2=$BP5["Debit Air WL-02"];
                            $ts=$BP5["TS"];
                            $mov1=$BP5["MOV-01 Feedback Position in Centimeter"];
                            $mov2=$BP5["MOV-02 Feedback Position in Centimeter"];
                            $mov3=$BP5["MOV-03 Feedback Position in Centimeter"];
                            $mov4=$BP5["MOV-04 Position in Centimeter"];
                            $on = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP5["MOV-01 Status Remote Selected"];
                            $ss_mov1 = ($s_mov1 == 0) ? $off : $on;
                            $s_mov2=$BP5["MOV-02 Status Remote Selected"];
                            $ss_mov2 = ($s_mov2 == 0) ? $off : $on;
                            $s_mov3=$BP5["MOV-03 Status Remote Selected"];
                            $ss_mov3 = ($s_mov3 == 0) ? $off : $on;
                            $s_mov4=$BP5["MOV-04 Status Remote Selected"];
                            $ss_mov4 = ($s_mov4 == 0) ? $off : $on;
                        echo "<tr>
                            <td>4</td>
                            <td><a href=bp5.php>B.P.5</a></td>
                            <td>$ts</td>
                            <td>$s_wl1</td>
                            <td>$debit1</td>
                            <td>$wl1temp</td>
                            <td>$mov1 <br> $ss_mov1</td>
                            <td>$mov2 <br> $ss_mov2</td>
                            <td></td>
                            <td>$s_wl2</td>
                            <td>$debit2</td>
                            <td>$wl2temp</td>
                            <td>$mov3 <br> $ss_mov3</td>
                            <td></td>
                        </tr>";
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
                        $s_wl1 = ($wl1 >= 32767) ? 0 : $wl1/10;
                      $wl2=$BP8["WL-02 Read (cm)"];
                      $s_wl2 = ($wl2 >= 32767) ? 0 : $wl2/10;
                      $wl1temp=$BP8["WL-01 Temp"]/10;	
                            $wl2temp=$BP8["WL-02 Temp"]/10;	
                          $debit1=$BP8["Debit Air WL-01"];
                            $debit2=$BP8["Debit Air WL-02"];
                            $ts=$BP8["TS"];
                            $mov1=$BP8["MOV-01 Feedback Position in Centimeter"];
                            $mov2=$BP8["MOV-02 Feedback Position in Centimeter"];
                            $mov3=$BP8["MOV-03 Feedback Position in Centimeter"];
                            $mov4=$BP8["MOV-04 Position in Centimeter"];
                            $on = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP8["MOV-01 Status Remote Selected"];
                            $ss_mov1 = ($s_mov1 == 0) ? $off : $on;
                            $s_mov2=$BP8["MOV-02 Status Remote Selected"];
                            $ss_mov2 = ($s_mov2 == 0) ? $off : $on;
                            $s_mov3=$BP8["MOV-03 Status Remote Selected"];
                            $ss_mov3 = ($s_mov3 == 0) ? $off : $on;
                            $s_mov4=$BP8["MOV-04 Status Remote Selected"];
                            $ss_mov4 = ($s_mov4 == 0) ? $off : $on;
                        echo "<tr>
                            <td>5</td>
                            <td><a href=bp8.php>B.P.8</a></td>
                            <td>$ts</td>
                            <td>$s_wl1</td>
                            <td>$debit1</td>
                            <td>$wl1temp</td>
                            <td>$mov1 <br> $ss_mov1</td>
                            <td>$mov2 <br> $ss_mov2</td>
                            <td></td>
                            <td>$s_wl2</td>
                            <td>$debit2</td>
                            <td>$wl2temp</td>
                            <td>$mov3 <br> $ss_mov3</td>
                            <td>$mov4 <br> $ss_mov4</td>
                        </tr>";
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
                        $s_wl1 = ($wl1 >= 32767) ? 0 : $wl1/10;
                      $wl2=$BP13["WL-02 Read (cm)"];
                      $s_wl2 = ($wl2 >= 32767) ? 0 : $wl2/10;
                      $wl1temp=$BP13["WL-01 Temp"]/10;	
                            $wl2temp=$BP13["WL-02 Temp"]/10;	
                          $debit1=$BP13["Debit Air WL-01"];
                            $debit2=$BP13["Debit Air WL-02"];
                            $ts=$BP13["TS"];
                             $mov1=$BP13["MOV-01 Feedback Position in Centimeter"];
                            $mov2=$BP13["MOV-02 Feedback Position in Centimeter"];
                            $mov3=$BP13["MOV-03 Feedback Position in Centimeter"];
                            $mov4=$BP13["MOV-04 Position in Centimeter"];
                            $on = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP13["MOV-01 Status Remote Selected"];
                            $ss_mov1 = ($s_mov1 == 0) ? $off : $on;
                            $s_mov2=$BP13["MOV-02 Status Remote Selected"];
                            $ss_mov2 = ($s_mov2 == 0) ? $off : $on;
                            $s_mov3=$BP13["MOV-03 Status Remote Selected"];
                            $ss_mov3 = ($s_mov3 == 0) ? $off : $on;
                            $s_mov4=$BP13["MOV-04 Status Remote Selected"];
                            $ss_mov4 = ($s_mov4 == 0) ? $off : $on;

                        echo "<tr>
                            <td>6</td>
                            <td><a href=bp13.php>B.P.13</a></td>
                            <td>$ts</td>
                            <td>$s_wl1</td>
                            <td>$debit1</td>
                            <td>$wl1temp</td>
                            <td>$mov1 <br> $ss_mov1</td>
                            <td>$mov2 <br> $ss_mov2</td>
                            <td></td>
                            <td>$s_wl2</td>
                            <td>$wl2temp</td>
                            <td>$debit2</td>
                            <td>$mov3 <br> $ss_mov3</td>
                            <td></td>
                        </tr>";
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
                        $s_wl1 = ($wl1 >= 32767) ? 0 : $wl1/10;
                      $wl2=$BP15["WL-02 Read (cm)"];
                      $s_wl2 = ($wl2 >= 32767) ? 0 : $wl2/10;
                      $wl1temp=$BP15["WL-01 Temp"]/10;	
                            $wl2temp=$BP15["WL-02 Temp"]/10;	
                          $debit1=$BP15["Debit Air WL-01"];
                            $debit2=$BP15["Debit Air WL-02"];
                            $ts=$BP15["TS"];
                           $mov1=$BP15["MOV-01 Feedback Position in Centimeter"];
                            $mov2=$BP15["MOV-02 Feedback Position in Centimeter"];
                            $mov3=$BP15["MOV-03 Feedback Position in Centimeter"];
                            $mov4=$BP15["MOV-04 Position in Centimeter"];
                            $on = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP15["MOV-01 Status Remote Selected"];
                            $ss_mov1 = ($s_mov1 == 0) ? $off : $on;
                            $s_mov2=$BP15["MOV-02 Status Remote Selected"];
                            $ss_mov2 = ($s_mov2 == 0) ? $off : $on;
                            $s_mov3=$BP15["MOV-03 Status Remote Selected"];
                            $ss_mov3 = ($s_mov3 == 0) ? $off : $on;
                            $s_mov4=$BP15["MOV-04 Status Remote Selected"];
                            $ss_mov4 = ($s_mov4 == 0) ? $off : $on;
                        echo "<tr>
                            <td>7</td>
                            <td><a href=bp15.php>B.P.15</a></td>
                            <td>$ts</td>
                            <td>$s_wl1</td>
                            <td>$debit1</td>
                            <td>$wl1temp</td>
                            <td>$mov1 <br> $ss_mov1</td>
                            <td>$mov2 <br> $ss_mov2</td>
                            <td></td>
                            <td>$s_wl2</td>
                            <td>$debit2</td>
                            <td>$wl2temp</td>
                            <td>$mov3 <br> $ss_mov3</td>
                            <td></td>
                        </tr>";
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
                        $s_wl1 = ($wl1 >= 32767) ? 0 : $wl1/10;
                      $wl2=$BP17["WL-02 Read (cm)"];
                      $s_wl2 = ($wl2 >= 32767) ? 0 : $wl2/10;
                      $wl1temp=$BP17["WL-01 Temp"]/10;	
                            $wl2temp=$BP17["WL-02 Temp"]/10;	
                          $debit1=$BP17["Debit Air WL-01"];
                            $debit2=$BP17["Debit Air WL-02"];
                            $ts=$BP17["TS"];
                            $mov1=$BP17["MOV-01 Feedback Position in Centimeter"];
                            $mov2=$BP17["MOV-02 Feedback Position in Centimeter"];
                            $mov3=$BP17["MOV-03 Feedback Position in Centimeter"];
                            $mov4=$BP17["MOV-04 Position in Centimeter"];
                            $on = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP17["MOV-01 Status Remote Selected"];
                            $ss_mov1 = ($s_mov1 == 0) ? $off : $on;
                            $s_mov2=$BP17["MOV-02 Status Remote Selected"];
                            $ss_mov2 = ($s_mov2 == 0) ? $off : $on;
                            $s_mov3=$BP17["MOV-03 Status Remote Selected"];
                            $ss_mov3 = ($s_mov3 == 0) ? $off : $on;
                            $s_mov4=$BP17["MOV-04 Status Remote Selected"];
                            $ss_mov4 = ($s_mov4 == 0) ? $off : $on;
                        echo "<tr>
                            <td>8</td>
                            <td><a href=bp17.php>B.P.17</a></td>
                            <td>$ts</td>
                            <td>$s_wl1</td>
                            <td>$debit1</td>
                            <td>$wl1temp</td>
                            <td>$mov1 <br> $ss_mov1</td>
                            <td></td>
                            <td></td>
                            <td>$s_wl2</td>
                            <td>$debit2</td>
                            <td>$wl2temp</td>
                            <td>$mov2 <br> $ss_mov2</td>
                            <td></td>
                        </tr>";
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
                        $s_wl1 = ($wl1 >= 32767) ? 0 : $wl1/10;
                      $wl2=$BP19["WL-02 Read (cm)"];
                      $s_wl2 = ($wl2 >= 32767) ? 0 : $wl2/10;
                      $wl1temp=$BP19["WL-01 Temp"]/10;	
                            $wl2temp=$BP19["WL-02 Temp"]/10;	
                          $debit1=$BP19["Debit Air WL-01"];
                            $debit2=$BP19["Debit Air WL-02"];
                            $ts=$BP19["TS"];
                            $mov1=$BP19["MOV-01 Feedback Position in Centimeter"];
                            $mov2=$BP19["MOV-02 Feedback Position in Centimeter"];
                            $mov3=$BP19["MOV-03 Feedback Position in Centimeter"];
                            $mov4=$BP19["MOV-04 Position in Centimeter"];
                            $on = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP19["MOV-01 Status Remote Selected"];
                            $ss_mov1 = ($s_mov1 == 0) ? $off : $on;
                            $s_mov2=$BP19["MOV-02 Status Remote Selected"];
                            $ss_mov2 = ($s_mov2 == 0) ? $off : $on;
                            $s_mov3=$BP19["MOV-03 Status Remote Selected"];
                            $ss_mov3 = ($s_mov3 == 0) ? $off : $on;
                            $s_mov4=$BP19["MOV-04 Status Remote Selected"];
                            $ss_mov4 = ($s_mov4 == 0) ? $off : $on;
                        echo "<tr>
                            <td>9</td>
                            <td><a href=bp19.php>B.P.19</a></td>
                            <td>$ts</td>
                            <td>$s_wl1</td>
                            <td>$debit1</td>
                            <td>$wl1temp</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>$s_wl2</td>
                            <td>$debit2</td>
                            <td>$wl2temp</td>
                            <td>$mov1 <br> $ss_mov1</td>
                            <td></td>
                        </tr>";
                    ?>
                </tbody>      
            </table>
            </div>
          </div>

      </div>

    </section><!-- End Services Section -->
    </main><!-- End #main -->
 