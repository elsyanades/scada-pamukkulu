
<?php include 'config.php';?>


  
<main id="main">
    <section id="services" class="services">

      <div class="container" data-aos="fade-up">
        <header class="section-header">
            <br><br>
          <p>PEMANTAUAN KANAL IRIGASI DI PAMUKKULU</p>
        </header>
        <div class="content" id="map">
          </div>
        <!-- <div class="row gx-0">

          <div class="col-lg-12 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="content" id="map">
          </div>
          </div>

        </div> -->
      </div>

    </section><!-- End About Section -->

      <!-- ======= Features Section ======= -->
  <section id="lokasi" class="features">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <p>DATA PEMANTAUAN KANAL IRIGASI PAMUKKULU</p>
      </header>
 
      <div class="content table-responsive table-sm">
            <!-- Table -->
                <table class="table table-bordered text-center">
                <thead class="table-light text-center">
                <tr>
                    <th rowspan="2" style="vertical-align: middle; width:5%">No</th>
                    <th rowspan="2" style="vertical-align: middle; width:20%">Lokasi</th>
                    <th rowspan="2" style="vertical-align: middle; width:20%">Waktu</th>
                    <th colspan="4">Sungai</th>
                    <th colspan="5">Intake Kanal Irigasi</th>
                    <th rowspan="2" style="vertical-align: middle;">Lengkung Debit</th>
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
                            
                            $numwl = array(&$c_wl1, &$c_wl2);

                            foreach ($numwl as &$numwls) {
                                $numwls = number_format($numwls, 1, ',', '');
                            }
                            
                            $numdeb = array(&$debit1, &$debit2, &$debit3);

                            foreach ($numdeb as &$numdebs) {
                                $numdebs = number_format($numdebs, 0, '.', '.');
                            }
                            $numtemp = array(&$wl1temp, &$wl2temp, &$wl3temp);

                            foreach ($numtemp as &$numtemps) {
                                $numtemps = number_format($numtemps, 1, ',', '');
                            }
                            $zeros = array(&$wl1temp, &$wl2temp, &$wl3temp, &$c_wl1, &$c_wl2);

                            foreach ($zeros as &$zero) {
                                if ($zero === "0,0") {
                                    $zero = "0";
                                }
                            }
                            foreach ($zeros as &$zero) {$zero = str_replace(",0", "", $zero);}
                        echo "<tr>
                            <td>1</td>
                            <td><a href='index.php?page=bendung-pamukkulu' target='_blank'>Bendung <br> Pamukkulu</a></td>
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
                            $numwl = array(&$c_wl1, &$c_wl2);

                            foreach ($numwl as &$numwls) {
                                $numwls = number_format($numwls, 1, ',', '');
                            }
                            
                            $numdeb = array(&$debit1, &$debit2, &$debit3);

                            foreach ($numdeb as &$numdebs) {
                                $numdebs = number_format($numdebs, 0, '.', '.');
                            }
                            $numtemp = array(&$wl1temp, &$wl2temp, &$wl3temp);

                            foreach ($numtemp as &$numtemps) {
                                $numtemps = number_format($numtemps, 1, ',', '');
                            }
                            $zeros = array(&$wl1temp, &$wl2temp, &$wl3temp, &$c_wl1, &$c_wl2);

                            foreach ($zeros as &$zero) {
                                if ($zero === "0,0") {
                                    $zero = "0";
                                }
                            }
                            foreach ($zeros as &$zero) {$zero = str_replace(",0", "", $zero);}
                        echo "<tr>
                            <td>2</td>
                            <td><a href='index.php?page=bendung-cakura' target='_blank'>Bendung <br> Cakura</a></td>
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
                            $numwl = array(&$c_wl1, &$c_wl2, &$c_wl3);

                            foreach ($numwl as &$numwls) {
                                $numwls = number_format($numwls, 1, ',', '');
                            }
                            
                            $numdeb = array(&$debit1, &$debit2, &$debit3);

                            foreach ($numdeb as &$numdebs) {
                                $numdebs = number_format($numdebs, 0, '.', '.');
                            }
                            $numtemp = array(&$wl1temp, &$wl2temp, &$wl3temp);

                            foreach ($numtemp as &$numtemps) {
                                $numtemps = number_format($numtemps, 1, ',', '');
                            }
                            $zeros = array(&$wl1temp, &$wl2temp, &$wl3temp, &$c_wl1, &$c_wl2, &$c_wl3);

                            foreach ($zeros as &$zero) {
                                if ($zero === "0,0") {
                                    $zero = "0";
                                }
                            }
                            foreach ($zeros as &$zero) {$zero = str_replace(",0", "", $zero);}
                        echo "<tr>
                            <td>3</td>
                            <td><a href='index.php?page=bendung-jenemarung' target='_blank'>Bendung <br> Jenemarung</a></td>
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
                            <td></td>
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
                    <th rowspan="2" style="vertical-align: middle;width:15%">Lengkung Debit</th>
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
                            $numwl = array(&$s_wl1, &$s_wl2);

                            foreach ($numwl as &$numwls) {
                                $numwls = number_format($numwls, 1, ',', '');
                            }
                            $numdeb = array(&$debit1, &$debit2);

                            foreach ($numdeb as &$numdebs) {
                                $numdebs = number_format($numdebs, 0, '.', '.');
                            }
                            $numtemp = array(&$wl1temp, &$wl2temp);

                            foreach ($numtemp as &$numtemps) {
                                $numtemps = number_format($numtemps, 1, ',', '');
                            }
                            $zeros = array(&$wl1temp, &$wl2temp, &$s_wl1, &$s_wl2);

                            foreach ($zeros as &$zero) {
                                if ($zero === "0,0") {
                                    $zero = "0";
                                }
                            }
                            foreach ($zeros as &$zero) {$zero = str_replace(",0", "", $zero);}
            
                        echo "<tr>
                            <td>1</td>
                            <td><a href='index.php?page=bp-1' target='_blank'>B.P.1</a></td>
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
                            <td><a href='https://drive.google.com/file/d/1r8Jnd1pg5a2AdWUDPRFgqcr2JVl52fl3/view?usp=sharing' target='_blank'>B.P.1 (PRIMER)</a><br/><a href='https://drive.google.com/file/d/1Gb-YJyUioexzmjikENkbQZv3_ChHB7wJ/view?usp=sharing' target='_blank'>B.P.1 (SEKUNDER)</a><br/><a href='https://drive.google.com/file/d/1Jy3to5l9iTZKvuCPPVgjEQCa_SreOoEV/view?usp=sharing' target='_blank'>B.P.1a (INTAKE)</a><br/></td>
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
                            $numwl = array(&$s_wl1, &$s_wl2);

                            foreach ($numwl as &$numwls) {
                                $numwls = number_format($numwls, 1, ',', '');
                            }
                            $numdeb = array(&$debit1, &$debit2);

                            foreach ($numdeb as &$numdebs) {
                                $numdebs = number_format($numdebs, 0, '.', '.');
                            }
                            $numtemp = array(&$wl1temp, &$wl2temp);

                            foreach ($numtemp as &$numtemps) {
                                $numtemps = number_format($numtemps, 1, ',', '');
                            }
                            $zeros = array(&$wl1temp, &$wl2temp, &$s_wl1, &$s_wl2);

                            foreach ($zeros as &$zero) {
                                if ($zero === "0,0") {
                                    $zero = "0";
                                }
                            }
                            foreach ($zeros as &$zero) {$zero = str_replace(",0", "", $zero);}
                        echo "<tr>
                            <td>2</td>
                            <td><a href='index.php?page=bp-2' target='_blank'>B.P.2</a></td>
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
                            <td><a href='https://drive.google.com/file/d/1GWBkTakTBG3KIxy_4_rrf6UudjPD91Wc/view?usp=sharing' target='_blank'>B.P.2 (PRIMER)</a><br/><a href='https://drive.google.com/file/d/1itVQxkMh4CMXLGIPnjxo67n_6ZKPDlYd/view?usp=sharing' target='_blank'>B.P.2 (SEKUNDER)</a></td>
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
                            $numwl = array(&$s_wl1, &$s_wl2);

                            foreach ($numwl as &$numwls) {
                                $numwls = number_format($numwls, 1, ',', '');
                            }
                            $numdeb = array(&$debit1, &$debit2 , &$debit3);

                            foreach ($numdeb as &$numdebs) {
                                $numdebs = number_format($numdebs, 0, '.', '.');
                            }
                            $numtemp = array(&$wl1temp, &$wl2temp , &$wl3temp);

                            foreach ($numtemp as &$numtemps) {
                                $numtemps = number_format($numtemps, 1, ',', '');
                            }
                            $zeros = array(&$wl1temp, &$wl2temp, &$wl3temp, &$s_wl1, &$s_wl2);

                            foreach ($zeros as &$zero) {
                                if ($zero === "0,0") {
                                    $zero = "0";
                                }
                            }
                            foreach ($zeros as &$zero) {$zero = str_replace(",0", "", $zero);}
                        echo "<tr>
                            <td>3</td>
                            <td><a href='index.php?page=bp-4' target='_blank'>B.P.4</a></td>
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
                            <td><a href='https://drive.google.com/file/d/1mrGyBZG5j_vOcOB9klOl8rC0LEQLP-DV/view?usp=sharing' target='_blank'>B.P.4 (PRIMER)</a><br/><a href='https://drive.google.com/file/d/1THFr30HzCVMB4h2HrxjBLj3a0F7M_n1o/view?usp=sharing' target='_blank'>B.P.4 (SEKUNDER)</a></td>
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
                            $numwl = array(&$s_wl1, &$s_wl2);

                            foreach ($numwl as &$numwls) {
                                $numwls = number_format($numwls, 1, ',', '');
                            }
                            $numdeb = array(&$debit1, &$debit2);

                            foreach ($numdeb as &$numdebs) {
                                $numdebs = number_format($numdebs, 0, '.', '.');
                            }
                            $numtemp = array(&$wl1temp, &$wl2temp);

                            foreach ($numtemp as &$numtemps) {
                                $numtemps = number_format($numtemps, 1, ',', '');
                            }
                            $zeros = array(&$wl1temp, &$wl2temp, &$s_wl1, &$s_wl2);

                            foreach ($zeros as &$zero) {
                                if ($zero === "0,0") {
                                    $zero = "0";
                                }
                            }
                            foreach ($zeros as &$zero) {$zero = str_replace(",0", "", $zero);}
                        echo "<tr>
                            <td>4</td>
                            <td><a href='index.php?page=bp-5' target='_blank'>B.P.5</a></td>
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
                            <td><a href='https://drive.google.com/file/d/1nMIW3BKALx4HZ8I8KhujviKvUC6aIXlS/view?usp=sharing' target='_blank'>B.P.5 (PRIMER)</a><br/><a href='https://drive.google.com/file/d/1fNa2Siavqedu08vXXCPoEnqaoGnkmnps/view?usp=sharing' target='_blank'>B.P.5 (SEKUNDER)</a></td>
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
                            $numwl = array(&$s_wl1, &$s_wl2);

                            foreach ($numwl as &$numwls) {
                                $numwls = number_format($numwls, 1, ',', '');
                            }
                            $numdeb = array(&$debit1, &$debit2);

                            foreach ($numdeb as &$numdebs) {
                                $numdebs = number_format($numdebs, 0, '.', '.');
                            }
                            $numtemp = array(&$wl1temp, &$wl2temp);

                            foreach ($numtemp as &$numtemps) {
                                $numtemps = number_format($numtemps, 1, ',', '');
                            }
                            $zeros = array(&$wl1temp, &$wl2temp, &$s_wl1, &$s_wl2);

                            foreach ($zeros as &$zero) {
                                if ($zero === "0,0") {
                                    $zero = "0";
                                }
                            }
                            foreach ($zeros as &$zero) {$zero = str_replace(",0", "", $zero);}
                        echo "<tr>
                            <td>5</td>
                            <td><a href='index.php?page=bp-8' target='_blank'>B.P.8</a></td>
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
                            <td><a href='https://drive.google.com/file/d/1yrcUZYF7Mom8wLM0HdRhf8csfDyFu-JO/view?usp=sharing' target='_blank'>B.P.8 (PRIMER)</a><br/><a href='https://drive.google.com/file/d/1zfFyJ4mn7nR6qtE3v2lU3naNcQNNoPoS/view?usp=sharing' target='_blank'>B.P.8 (SEKUNDER)</a></td>
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
                            $numwl = array(&$s_wl1, &$s_wl2);

                            foreach ($numwl as &$numwls) {
                                $numwls = number_format($numwls, 1, ',', '');
                            }
                            $numdeb = array(&$debit1, &$debit2);

                            foreach ($numdeb as &$numdebs) {
                                $numdebs = number_format($numdebs, 0, '.', '.');
                            }
                            $numtemp = array(&$wl1temp, &$wl2temp);

                            foreach ($numtemp as &$numtemps) {
                                $numtemps = number_format($numtemps, 1, ',', '');
                            }
                            $zeros = array(&$wl1temp, &$wl2temp, &$s_wl1, &$s_wl2);

                            foreach ($zeros as &$zero) {
                                if ($zero === "0,0") {
                                    $zero = "0";
                                }
                            }
                            foreach ($zeros as &$zero) {$zero = str_replace(",0", "", $zero);}

                        echo "<tr>
                            <td>6</td>
                            <td><a href='index.php?page=bp-13' target='_blank'>B.P.13</a></td>
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
                            $numwl = array(&$s_wl1, &$s_wl2);

                            foreach ($numwl as &$numwls) {
                                $numwls = number_format($numwls, 1, ',', '');
                            }
                            $numdeb = array(&$debit1, &$debit2);

                            foreach ($numdeb as &$numdebs) {
                                $numdebs = number_format($numdebs, 0, '.', '.');
                            }
                            $numtemp = array(&$wl1temp, &$wl2temp);

                            foreach ($numtemp as &$numtemps) {
                                $numtemps = number_format($numtemps, 1, ',', '');
                            }
                            $zeros = array(&$wl1temp, &$wl2temp, &$s_wl1, &$s_wl2);

                            foreach ($zeros as &$zero) {
                                if ($zero === "0,0") {
                                    $zero = "0";
                                }
                            }
                            foreach ($zeros as &$zero) {$zero = str_replace(",0", "", $zero);}
                        echo "<tr>
                            <td>7</td>
                            <td><a href='index.php?page=bp-15' target='_blank'>B.P.15</a></td>
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
                            $numwl = array(&$s_wl1, &$s_wl2);

                            foreach ($numwl as &$numwls) {
                                $numwls = number_format($numwls, 1, ',', '');
                            }
                            $numdeb = array(&$debit1, &$debit2);

                            foreach ($numdeb as &$numdebs) {
                                $numdebs = number_format($numdebs, 0, '.', '.');
                            }
                            $numtemp = array(&$wl1temp, &$wl2temp);

                            foreach ($numtemp as &$numtemps) {
                                $numtemps = number_format($numtemps, 1, ',', '');
                            }
                            $zeros = array(&$wl1temp, &$wl2temp, &$s_wl1, &$s_wl2);

                            foreach ($zeros as &$zero) {
                                if ($zero === "0,0") {
                                    $zero = "0";
                                }
                            }
                            foreach ($zeros as &$zero) {$zero = str_replace(",0", "", $zero);}
                        echo "<tr>
                            <td>8</td>
                            <td><a href='index.php?page=bp-17' target='_blank'>B.P.17</a></td>
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
                            $numwl = array(&$s_wl1, &$s_wl2);

                            foreach ($numwl as &$numwls) {
                                $numwls = number_format($numwls, 1, ',', '');
                            }
                            $numdeb = array(&$debit1, &$debit2);

                            foreach ($numdeb as &$numdebs) {
                                $numdebs = number_format($numdebs, 0, '.', '.');
                            }
                            $numtemp = array(&$wl1temp, &$wl2temp);

                            foreach ($numtemp as &$numtemps) {
                                $numtemps = number_format($numtemps, 1, ',', '');
                            }
                            $zeros = array(&$wl1temp, &$wl2temp, &$s_wl1, &$s_wl2);

                            foreach ($zeros as &$zero) {
                                if ($zero === "0,0") {
                                    $zero = "0";
                                }
                            }
                            foreach ($zeros as &$zero) {$zero = str_replace(",0", "", $zero);}
                        echo "<tr>
                            <td>9</td>
                            <td><a href='index.php?page=bp-19' target='_blank'>B.P.19</a></td>
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
                            <td></td>
                        </tr>";
                    ?>
                </tbody>      
            </table>
      </div>

      <?php
      // $apiKey = "39fc11f3011ec1351f6a8c4f867c10a6";
      // $lat = "-5.137320";
      // $lon = "119.428240";
      // $googleApiUrl = "https://api.openweathermap.org/data/2.5/weather?lat=" . $lat . "&lon=" . $lon . "&lang=en&units=metric&APPID=" . $apiKey;
      $googleApiUrl = "http://api.weatherapi.com/v1/current.json?key=8d94c126cd204b4b93373803231601&q=Makassar&aqi=no";

      $ch = curl_init();

      curl_setopt($ch, CURLOPT_HEADER, 0);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
      curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($ch, CURLOPT_VERBOSE, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $response = curl_exec($ch);

      curl_close($ch);
      $data = json_decode($response);
      $currentTime = time();
      // echo "<pre";
      // print_r($data);
      // die;
      ?>

    <div class="card">
      <div class="card-header text-center">
        Weather Status Makassar, Sulawesi Selatan
      </div>
    
      <div class="card-body text-center">
       <div class="time">
            <div><?php echo $data->location->localtime; ?></div>
            <div><?php echo $data->current->condition->text; ?></div>
        </div>
        <div class="weather-forecast">
            <img src=<?php echo $data->current->condition->icon; ?>
                class="weather-icon" /> <?php echo $data->current->temp_c; ?>°C <span
                class="min-temperature"><?php echo $data->current->temp_f; ?>°F</span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $data->current->humidity; ?> %</div>
            <div>Wind: <?php echo $data->current->wind_kph; ?> kph</div>
        </div>
      </div>
    
      <div class="card-footer text-center">
        Last Updated : <?php echo $data->current->last_updated; ?>
      </div>


  </section><!-- End Features Section -->

    <!-- ======= Services Section ======= -->
    <!-- <section id="data" class="services">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>DATA</h2>
          <p>Veritatis et dolores facere numquam et praesentium</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-box blue">
              <i class="ri-discuss-line icon"></i>
              <h3>Nesciunt Mete</h3>
              <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis tempore et consequatur.</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-box orange">
              <i class="ri-discuss-line icon"></i>
              <h3>Eosle Commodi</h3>
              <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-box green">
              <i class="ri-discuss-line icon"></i>
              <h3>Ledo Markt</h3>
              <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
              <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>

        </div>

      </div>

    </section>End Services Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Dokumentasi</h2>
          <p>Dokumentasi Kegiatan Pemasangan SCADA</p>
        </header>

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="assets/img/clients/1.jpeg" class="img-fluid imgslider" style="width:100%" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/2.jpeg" class="img-fluid imgslider" style="width:100%" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/3.jpeg" class="img-fluid imgslider" style="width:100%" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/4.jpeg" class="img-fluid imgslider" style="width:100%" alt=""></div>
            <div class="swiper-slide"><img src="assets/img/clients/5.jpeg" class="img-fluid imgslider" style="width:100%" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>

    </section><!-- End Clients Section -->

<?php include 'contact.php';?>

  </main><!-- End #main -->
