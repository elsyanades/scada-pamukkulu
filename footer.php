 <!-- ======= Footer ======= -->
 <footer id="footer" class="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Ras Otomasi Indonesia</span></strong>. All Rights Reserved
      </div>
      <!-- <div class="credits"> -->
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      <!-- </div> -->
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    const scriptURL = 'https://script.google.com/macros/s/AKfycbwBGRz4NLEOSBw-Dl5_AC5VHwX9DsA6IrpXyamhprDI4WIdsg1lzQCPPG3QnPPX9ayq7g/exec'
    const form = document.forms['contact-form'];
    const btnSubmit = document.querySelector('.btn-submit');
    const btnLoad = document.querySelector('.btn-load');
    const myAlert = document.querySelector('.my-alert');


    form.addEventListener('submit', e => {
      e.preventDefault()
      //ketika tombol submit diklik loading muncul submit hilang
      btnLoad.classList.toggle('d-none');
      btnSubmit.classList.toggle('d-none');
      fetch(scriptURL, { method: 'POST', body: new FormData(form)})
        .then(response => {
          // hilangkan load tampilkan submit munculkan alert dan reset form
          btnLoad.classList.toggle('d-none');
          btnSubmit.classList.toggle('d-none');
          myAlert.classList.toggle('d-none');
          form.reset();
          console.log('Success!', response)
        })
        .catch(error => console.error('Error!', error.message))
    })
  </script>

      <script>
      let slideIndex = 0;
      let timeoutId = null;
      const slides = document.getElementsByClassName("mySlides");
      const dots = document.getElementsByClassName("dot");
      
      showSlides();
      function currentSlide(index) {
           slideIndex = index;
           showSlides();
      }
     function plusSlides(step) {
        
        if(step < 0) {
            slideIndex -= 2;
            
            if(slideIndex < 0) {
              slideIndex = slides.length - 1;
            }
        }
        
        showSlides();
     }
      function showSlides() {
        for(let i = 0; i < slides.length; i++) {
          slides[i].style.display = 'none';
          dots[i].classList.remove('actives');
        }
        slideIndex++;
        if(slideIndex > slides.length) {
          slideIndex = 1
        }
        slides[slideIndex - 1].style.display = 'block';
        dots[slideIndex - 1].classList.add('actives');
         if(timeoutId) {
            clearTimeout(timeoutId);
         }
        timeoutId = setTimeout(showSlides, 10000); // Change image every 5 seconds
      }
    </script>

  <script>
    var map = L.map('map').setView([-5.42974, 119.52792], 13);

     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

 function bp1() {
      <?php
           $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP1.json';

                    // Read JSON file
                    $json_data = file_get_contents($api_url);

                    // Decode JSON data into PHP array
                    $response_data = json_decode($json_data, true);

                    // All user data exists in 'data' object
                    $BP1 = $response_data;
                        $wl1_1=$BP1["WL-01 Read (cm)"];
                        $s_wl1_1 = ($wl1_1 >= 32767) ? 0 : $wl1_1/10;
                      $wl2_1=$BP1["WL-02 Read (cm)"];
                      $s_wl2_1 = ($wl2_1 >= 32767) ? 0 : $wl2_1/10;
                      $wl1temp_1=$BP1["WL-01 Temp"]/10;	
                            $wl2temp_1=$BP1["WL-02 Temp"]/10;	
                          $debit1_1=$BP1["Debit Air WL-01"];
                            $debit2_1=$BP1["Debit Air WL-02"];
                            $ts_1=$BP1["TS"];
                            $mov1_1=$BP1["MOV-01 Feedback Position in Centimeter"];
                            $mov2_1=$BP1["MOV-02 Feedback Position in Centimeter"];
                            $mov3_1=$BP1["MOV-03 Feedback Position in Centimeter"];
                            $mov4_1=$BP1["MOV-04 Position in Centimeter"];
                            $on = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP1["MOV-01 Status Remote Selected"];
                            $ss1_mov1 = ($s_mov1 == 0) ? $off : $on;
                            $s_mov2=$BP1["MOV-02 Status Remote Selected"];
                            $ss1_mov2 = ($s_mov2 == 0) ? $off : $on;
                            $s_mov3=$BP1["MOV-03 Status Remote Selected"];
                            $ss1_mov3 = ($s_mov3 == 0) ? $off : $on;
                            $s_mov4=$BP1["MOV-04 Status Remote Selected"];
                            $ss1_mov4 = ($s_mov4 == 0) ? $off : $on;

      ?>  
 }

 function BP2() {
      <?php
           $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP2.json';

                    // Read JSON file
                    $json_data = file_get_contents($api_url);

                    // Decode JSON data into PHP array
                    $response_data = json_decode($json_data, true);

                    // All user data exists in 'data' object
                    $BP2 = $response_data;
                        $wl1_2=$BP2["WL-01 Read (cm)"];
                        $s_wl1_2 = ($wl1_2 >= 32767) ? 0 : $wl1_2/10;
                      $wl2_2=$BP2["WL-02 Read (cm)"];
                      $s_wl2_2 = ($wl2_2 >= 32767) ? 0 : $wl2_2/10;
                      $wl1temp_2=$BP2["WL-01 Temp"]/10;	
                            $wl2temp_2=$BP2["WL-02 Temp"]/10;	
                          $debit1_2=$BP2["Debit Air WL-01"];
                            $debit2_2=$BP2["Debit Air WL-02"];
                            $ts_2=$BP2["TS"];
                            $mov1_2=$BP2["MOV-01 Feedback Position in Centimeter"];
                            $mov2_2=$BP2["MOV-02 Feedback Position in Centimeter"];
                            $mov3_2=$BP2["MOV-03 Feedback Position in Centimeter"];
                            $on_2 = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off_2 = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP2["MOV-01 Status Remote Selected"];
                            $ss2_mov1 = ($s_mov1 == 0) ? $off_2 : $on_2;
                            $s_mov2=$BP2["MOV-02 Status Remote Selected"];
                            $ss2_mov2 = ($s_mov2 == 0) ? $off_2 : $on_2;
                            $s_mov3=$BP2["MOV-03 Status Remote Selected"];
                            $ss2_mov3 = ($s_mov3 == 0) ? $off_2 : $on_2;

      ?>  
 }

function bp4() {
      <?php
           $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP4.json';

                    // Read JSON file
                    $json_data = file_get_contents($api_url);

                    // Decode JSON data into PHP array
                    $response_data = json_decode($json_data, true);

                    // All user data exists in 'data' object
                    $BP4 = $response_data;
                        $wl1_4=$BP4["WL-01 Read (cm)"];
                         $s_wl1_4 = ($wl1_4 >= 32767) ? 0 : $wl1_4/10;
                      $wl2_4=$BP4["WL-02 Read (cm)"];
                       $s_wl2_4 = ($wl2_4 >= 32767) ? 0 : $wl2_4/10;
                      $wl1temp_4=$BP4["WL-01 Temp"]/10;	
                            $wl2temp_4=$BP4["WL-02 Temp"]/10;	
                          $debit1_4=$BP4["Debit Air WL-01"];
                            $debit2_4=$BP4["Debit Air WL-02"];
                            $ts_4=$BP4["TS"];
                            $mov1_4=$BP4["MOV-01 Feedback Position in Centimeter"];
                            $mov2_4=$BP4["MOV-02 Feedback Position in Centimeter"];
                            $mov3_4=$BP4["MOV-03 Feedback Position in Centimeter"];
                            $mov4_4=$BP4["MOV-04 Position in Centimeter"];
                            $on_4 = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off_4 = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP4["MOV-01 Status Remote Selected"];
                            $ss4_mov1 = ($s_mov1 == 0) ? $off_4 : $on_4;
                            $s_mov2=$BP4["MOV-02 Status Remote Selected"];
                            $ss4_mov2 = ($s_mov2 == 0) ? $off_4 : $on_4;
                            $s_mov3=$BP4["MOV-03 Status Remote Selected"];
                            $ss4_mov3 = ($s_mov3 == 0) ? $off_4 : $on_4;
                            $s_mov4=$BP4["MOV-04 Status Remote Selected"];
                            $ss4_mov4 = ($s_mov4 == 0) ? $off_4 : $on_4;

      ?>  
 } 

function bp5() {
      <?php
           $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP5.json';

                    // Read JSON file
                    $json_data = file_get_contents($api_url);

                    // Decode JSON data into PHP array
                    $response_data = json_decode($json_data, true);

                    // All user data exists in 'data' object
                    $BP5 = $response_data;
                        $wl1_5=$BP5["WL-01 Read (cm)"];
                         $s_wl1_5 = ($wl1_5 >= 32767) ? 0 : $wl1_5/10;
                      $wl2_5=$BP5["WL-02 Read (cm)"];
                      $s_wl2_5 = ($wl2_5 >= 32767) ? 0 : $wl2_5/10;
                      $wl1temp_5=$BP5["WL-01 Temp"]/10;	
                            $wl2temp_5=$BP5["WL-02 Temp"]/10;	
                          $debit1_5=$BP5["Debit Air WL-01"];
                            $debit2_5=$BP5["Debit Air WL-02"];
                            $ts_5=$BP5["TS"];
                            $mov1_5=$BP5["MOV-01 Feedback Position in Centimeter"];
                            $mov2_5=$BP5["MOV-02 Feedback Position in Centimeter"];
                            $mov3_5=$BP5["MOV-03 Feedback Position in Centimeter"];
                            $on_5 = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off_5 = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP5["MOV-01 Status Remote Selected"];
                            $ss5_mov1 = ($s_mov1 == 0) ? $off_5 : $on_5;
                            $s_mov2=$BP5["MOV-02 Status Remote Selected"];
                            $ss5_mov2 = ($s_mov2 == 0) ? $off_5 : $on_5;
                            $s_mov3=$BP5["MOV-03 Status Remote Selected"];
                            $ss5_mov3 = ($s_mov3 == 0) ? $off_5 : $on_5;

      ?>  
 } 

function bp8() {
      <?php
           $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP8.json';

                    // Read JSON file
                    $json_data = file_get_contents($api_url);

                    // Decode JSON data into PHP array
                    $response_data = json_decode($json_data, true);

                    // All user data exists in 'data' object
                    $BP8 = $response_data;
                        $wl1_8=$BP8["WL-01 Read (cm)"];
                         $s_wl1_8 = ($wl1_8 >= 32767) ? 0 : $wl1_8/10;
                      $wl2_8=$BP8["WL-02 Read (cm)"];
                       $s_wl2_8 = ($wl2_8 >= 32767) ? 0 : $wl2_8/10;
                      $wl1temp_8=$BP8["WL-01 Temp"]/10;	
                            $wl2temp_8=$BP8["WL-02 Temp"]/10;	
                          $debit1_8=$BP8["Debit Air WL-01"];
                            $debit2_8=$BP8["Debit Air WL-02"];
                            $ts_8=$BP8["TS"];
                            $mov1_8=$BP8["MOV-01 Feedback Position in Centimeter"];
                            $mov2_8=$BP8["MOV-02 Feedback Position in Centimeter"];
                            $mov3_8=$BP8["MOV-03 Feedback Position in Centimeter"];
                            $mov4_8=$BP8["MOV-04 Position in Centimeter"];
                            $on_8 = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off_8 = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP8["MOV-01 Status Remote Selected"];
                            $ss8_mov1 = ($s_mov1 == 0) ? $off_8 : $on_8;
                            $s_mov2=$BP8["MOV-02 Status Remote Selected"];
                            $ss8_mov2 = ($s_mov2 == 0) ? $off_8 : $on_8;
                            $s_mov3=$BP8["MOV-03 Status Remote Selected"];
                            $ss8_mov3 = ($s_mov3 == 0) ? $off_8 : $on_8;
                            $s_mov4=$BP8["MOV-04 Status Remote Selected"];
                            $ss8_mov4 = ($s_mov4 == 0) ? $off_8 : $on_8;

      ?>  
 } 

function bp13() {
      <?php
           $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP13.json';

                    // Read JSON file
                    $json_data = file_get_contents($api_url);

                    // Decode JSON data into PHP array
                    $response_data = json_decode($json_data, true);

                    // All user data exists in 'data' object
                    $BP13 = $response_data;
                        $wl1_13=$BP13["WL-01 Read (cm)"];
                         $s_wl1_13 = ($wl1_13 >= 32767) ? 0 : $wl1_13/10;
                      $wl2_13=$BP13["WL-02 Read (cm)"];
                       $s_wl2_13 = ($wl2_13 >= 32767) ? 0 : $wl2_13/10;
                      $wl1temp_13=$BP13["WL-01 Temp"]/10;	
                            $wl2temp_13=$BP13["WL-02 Temp"]/10;	
                          $debit1_13=$BP13["Debit Air WL-01"];
                            $debit2_13=$BP13["Debit Air WL-02"];
                            $ts_13=$BP13["TS"];
                            $mov1_13=$BP13["MOV-01 Feedback Position in Centimeter"];
                            $mov2_13=$BP13["MOV-02 Feedback Position in Centimeter"];
                            $mov3_13=$BP13["MOV-03 Feedback Position in Centimeter"];
                            $on_13 = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off_13 = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP13["MOV-01 Status Remote Selected"];
                            $ss13_mov1 = ($s_mov1 == 0) ? $off_13 : $on_13;
                            $s_mov2=$BP13["MOV-02 Status Remote Selected"];
                            $ss13_mov2 = ($s_mov2 == 0) ? $off_13 : $on_13;
                            $s_mov3=$BP13["MOV-03 Status Remote Selected"];
                            $ss13_mov3 = ($s_mov3 == 0) ? $off_13 : $on_13;

      ?>  
 } 


function bp15() {
      <?php
           $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP15.json';

                    // Read JSON file
                    $json_data = file_get_contents($api_url);

                    // Decode JSON data into PHP array
                    $response_data = json_decode($json_data, true);

                    // All user data exists in 'data' object
                    $BP15 = $response_data;
                        $wl1_15=$BP15["WL-01 Read (cm)"];
                        $s_wl1_15 = ($wl1_15 >= 32767) ? 0 : $wl1_15/10;
                      $wl2_15=$BP15["WL-02 Read (cm)"];
                      $s_wl2_15 = ($wl2_15 >= 32767) ? 0 : $wl2_15/10;
                      $wl1temp_15=$BP15["WL-01 Temp"]/10;	
                            $wl2temp_15=$BP15["WL-02 Temp"]/10;	
                          $debit1_15=$BP15["Debit Air WL-01"];
                            $debit2_15=$BP15["Debit Air WL-02"];
                            $ts_15=$BP15["TS"];
                            $mov1_15=$BP15["MOV-01 Feedback Position in Centimeter"];
                            $mov2_15=$BP15["MOV-02 Feedback Position in Centimeter"];
                            $mov3_15=$BP15["MOV-03 Feedback Position in Centimeter"];
                            $on_15 = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off_15 = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP15["MOV-01 Status Remote Selected"];
                            $ss15_mov1 = ($s_mov1 == 0) ? $off_15 : $on_15;
                            $s_mov2=$BP15["MOV-02 Status Remote Selected"];
                            $ss15_mov2 = ($s_mov2 == 0) ? $off_15 : $on_15;
                            $s_mov3=$BP15["MOV-03 Status Remote Selected"];
                            $ss15_mov3 = ($s_mov3 == 0) ? $off_15 : $on_15;

      ?>  
 } 

 function bp17() {
      <?php
           $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP17.json';

                    // Read JSON file
                    $json_data = file_get_contents($api_url);

                    // Decode JSON data into PHP array
                    $response_data = json_decode($json_data, true);

                    // All user data exists in 'data' object
                    $BP17 = $response_data;
                        $wl1_17=$BP17["WL-01 Read (cm)"];
                        $s_wl1_17 = ($wl1_17 >= 32767) ? 0 : $wl1_17/10;
                      $wl2_17=$BP17["WL-02 Read (cm)"];
                      $s_wl2_17 = ($wl2_17 >= 32767) ? 0 : $wl2_17/10;
                      $wl1temp_17=$BP17["WL-01 Temp"]/10;	
                            $wl2temp_17=$BP17["WL-02 Temp"]/10;	
                          $debit1_17=$BP17["Debit Air WL-01"];
                            $debit2_17=$BP17["Debit Air WL-02"];
                            $ts_17=$BP17["TS"];
                            $mov1_17=$BP17["MOV-01 Feedback Position in Centimeter"];
                            $mov2_17=$BP17["MOV-02 Feedback Position in Centimeter"];
                            $on_17 = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off_17 = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP17["MOV-01 Status Remote Selected"];
                            $ss17_mov1 = ($s_mov1 == 0) ? $off_17 : $on_17;
                            $s_mov2=$BP17["MOV-02 Status Remote Selected"];
                            $ss17_mov2 = ($s_mov2 == 0) ? $off_17 : $on_17;

      ?>  
 } 

 function bp19() {
      <?php
           $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP19.json';

                    // Read JSON file
                    $json_data = file_get_contents($api_url);

                    // Decode JSON data into PHP array
                    $response_data = json_decode($json_data, true);

                    // All user data exists in 'data' object
                    $BP19 = $response_data;
                        $wl1_19=$BP19["WL-01 Read (cm)"];
                        $s_wl1_19 = ($wl1_19 >= 32767) ? 0 : $wl1_19/10;
                      $wl2_19=$BP19["WL-02 Read (cm)"];
                      $s_wl2_19 = ($wl2_19 >= 32767) ? 0 : $wl2_19/10;
                      $wl1temp_19=$BP19["WL-01 Temp"]/10;	
                            $wl2temp_19=$BP19["WL-02 Temp"]/10;	
                          $debit1_19=$BP19["Debit Air WL-01"];
                            $debit2_19=$BP19["Debit Air WL-02"];
                            $ts_19=$BP19["TS"];
                            $mov1_19=$BP19["MOV-01 Feedback Position in Centimeter"];
                            $on_19 = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off_19 = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP19["MOV-01 Status Remote Selected"];
                            $ss19_mov1 = ($s_mov1 == 0) ? $off_19 : $on_19;
                            

      ?>  
 }  
   function bpacakura() {
      <?php
           $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP_CAKURA.json';

                    // Read JSON file
                    $json_data = file_get_contents($api_url);

                    // Decode JSON data into PHP array
                    $response_data = json_decode($json_data, true);

                    // All user data exists in 'data' object
                    $BP_Cakura = $response_data;
                        $wl1_c=$BP_Cakura["WL-01 Read (cm)"];
                        $s_wl1_c = ($wl1_c >= 32767) ? 0 : $wl1_c/10;
                      $wl2_c=$BP_Cakura["WL-02 Read (cm)"];
                      $s_wl2_c = ($wl2_c >= 32767) ? 0 : $wl2_c/10;
                      $wl1temp_c=$BP_Cakura["WL-01 Temp"]/10;	
                            $wl2temp_c=$BP_Cakura["WL-02 Temp"]/10;	
                          $debit1_c=$BP_Cakura["Debit Air WL-01"];
                            $debit2_c=$BP_Cakura["Debit Air WL-02"];
                            $ts_c=$BP_Cakura["TS"];
                            $mov1_c=$BP_Cakura["MOV-01 Feedback Position in Centimeter"];
                            $mov2_c=$BP_Cakura["MOV-02 Feedback Position in Centimeter"];
                            $on_c = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off_c = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP_Cakura["MOV-01 Status Remote Selected"];
                            $ssc_mov1 = ($s_mov1 == 0) ? $off_c : $on_c;
                            $s_mov2=$BP_Cakura["MOV-02 Status Remote Selected"];
                            $ssc_mov2 = ($s_mov2 == 0) ? $off_c : $on_c;

      ?>  
 } 

  function bpjenemarung() {
      <?php
           $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP_JENEMARUNG.json';

                    // Read JSON file
                    $json_data = file_get_contents($api_url);

                    // Decode JSON data into PHP array
                    $response_data = json_decode($json_data, true);

                    // All user data exists in 'data' object
                    $BP_Jenemarung = $response_data;
                        $wl1_j=$BP_Jenemarung["WL-01 Read (cm)"];
                         $s_wl1_j = ($wl1_j >= 32767) ? 0 : $wl1_j/10;
                      $wl2_j=$BP_Jenemarung["WL-02 Read (cm)"];
                       $s_wl2_j = ($wl2_j >= 32767) ? 0 : $wl2_j/10;
                      $wl3_j=$BP_Jenemarung["WL-03 Read (cm)"];
                       $s_wl3_j = ($wl3_j >= 32767) ? 0 : $wl3_j/10;
                      $wl1temp_j=$BP_Jenemarung["WL-01 Temp"]/10;	
                            $wl2temp_j=$BP_Jenemarung["WL-02 Temp"]/10;	
                            $wl3temp_j=$BP_Jenemarung["WL-03 Temp"]/10;
                          $debit1_j=$BP_Jenemarung["Debit Air WL-01"];
                            $debit2_j=$BP_Jenemarung["Debit Air WL-02"];
                            $debit3_j=$BP_Jenemarung["Debit Air WL-03"];
                            $ts_j=$BP_Jenemarung["TS"];
                            $mov1_j=$BP_Jenemarung["MOV-01 Feedback Position in Centimeter"];
                            $mov2_j=$BP_Jenemarung["MOV-02 Feedback Position in Centimeter"];
                            $mov3_j=$BP_Jenemarung["MOV-03 Feedback Position in Centimeter"];
                            $on_j = '<img src="assets/img/on.png" width="35" height="25"/>';
                            $off_j = '<img src="assets/img/off.png" width="35" height="25"/>';
                            $s_mov1=$BP_Jenemarung["MOV-01 Status Remote Selected"];
                            $ssj_mov1 = ($s_mov1 == 0) ? $off_j : $on_j;
                            $s_mov2=$BP_Jenemarung["MOV-02 Status Remote Selected"];
                            $ssj_mov2 = ($s_mov2 == 0) ? $off_j : $on_j;
                            $s_mov3=$BP_Jenemarung["MOV-03 Status Remote Selected"];
                            $ssj_mov3 = ($s_mov3 == 0) ? $off_j : $on_j;

      ?>  
 } 
    
 function bppamukkulu() {
      <?php
           $api_url = 'https://irigasi-takalar-default-rtdb.asia-southeast1.firebasedatabase.app/BP_PAMUKKULU.json';

                    // Read JSON file
                    $json_data = file_get_contents($api_url);

                    // Decode JSON data into PHP array
                    $response_data = json_decode($json_data, true);

                    // All user data exists in 'data' object
                    $BP_Pamukkulu = $response_data;
                        $wl1_p=$BP_Pamukkulu["WL-01 Read (cm)"];
                        $s_wl1_p = ($wl1_p >= 32767) ? 0 : $wl1_p;
                      $wl2_p=$BP_Pamukkulu["WL-02 Read (cm)"];
                      $s_wl2_p = ($wl2_p >= 32767) ? 0 : $wl2_p;
                      $wl1temp_p=$BP_Pamukkulu["WL-01 Temp"]/10;	
                            $wl2temp_p=$BP_Pamukkulu["WL-02 Temp"]/10;	
                          $debit1_p=$BP_Pamukkulu["Debit Air WL-01"];
                            $debit2_p=$BP_Pamukkulu["Debit Air WL-02"];
                            $ts_p=$BP_Pamukkulu["TS"];
                            

      ?>  
 }  
   
   var customPopupBPPamukkulu = '<div class="slideshow-container"><div class="mySlides fade"><div class="numbertext">1 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bppamukkulu.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bppamukkulu.jpg?alt=media" style="width:100%"></a></div><div class="mySlides fade"><div class="numbertext">2 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bppamukkulu.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bppamukkulu.jpg?alt=media" style="width:100%"></a></div><a class="prev" onclick="plusSlides(-1)">&#10094;</a><a class="next" onclick="plusSlides(1)">&#10095;</a></div><br><div style="text-align:center"><span class="dot" onclick="currentSlide(0)"></span><span class="dot" onclick="currentSlide(1)"></span></div><br /><center>Lokasi : <b>Bendung Pamukkulu</b> </br> Waktu Kirim : <?=$ts_p?> </center> <br /> <div> <table> <tr> <td> Sungai Pamukkulu, </td> <td> Muka Air : <?=$s_wl1_p?> cm &nbsp; </td> <td> Debit : <?=$debit1_p?> lt/det &nbsp; </td> <td> Suhu : <?=$wl1temp_p?> °C &nbsp;</td> </tr> <tr> <td> Intake Irigasi,  </td> <td> Muka Air : <?=$s_wl2_p?> cm  &nbsp; </td> <td> Debit : <?=$debit2_p?> lt/det  &nbsp; </td> <td> Suhu : <?=$wl2temp_p?> °C &nbsp;</td> </tr>'
   var customPopupBPJenemarung = '<div class="slideshow-container"><div class="mySlides fade"><div class="numbertext">1 / 3</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bpjenemarung.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bpjenemarung.jpg?alt=media" style="width:100%"></a></div><div class="mySlides fade"><div class="numbertext">2 / 3</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bpjenemarung.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bpjenemarung.jpg?alt=media" style="width:100%"></a></div><div class="mySlides fade"><div class="numbertext">3 / 3</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv3_bpjenemarung.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv3_bpjenemarung.jpg?alt=media" style="width:100%"></a></div><a class="prev" onclick="plusSlides(-1)">&#10094;</a><a class="next" onclick="plusSlides(1)">&#10095;</a></div><br><div style="text-align:center"><span class="dot" onclick="currentSlide(0)"></span><span class="dot" onclick="currentSlide(1)"></span><span class="dot" onclick="currentSlide(2)"></span></div><br /><center>Lokasi : <b>Bendung Jenemarung</b> </br> Waktu Kirim : <?=$ts_j?> </center> <br /> <div> <table> <tr> <td> Sungai Jenemarung, </td> <td> Muka Air : <?=$s_wl1_j?> cm &nbsp; </td> <td> Debit : <?=$debit1_j?> lt/det &nbsp; </td> <td> Suhu : <?=$wl1temp_j?> °C &nbsp;</td> </tr> <tr> <td> Sek. Jenemarung Kanan, </td> <td> Muka Air : <?=$s_wl2_j?> cm &nbsp; </td> <td> Debit : <?=$debit2_j?> lt/det &nbsp; </td> <td> Suhu : <?=$wl2temp_j?> °C &nbsp;</td> </tr> <tr> <td> Sek. Jenemarung Kiri, </td> <td> Muka Air : <?=$s_wl3_j?> cm &nbsp; </td> <td> Debit : <?=$debit3_j?> lt/det &nbsp; </td> <td> Suhu : <?=$wl3temp_j?> °C &nbsp;</td> </tr> <tr><td> Sungai Jenemarung, </td> <td> Pintu-1 : <?=$mov1_j?> cm </td><td><?=$ssj_mov1?></td> </tr> <tr> <td> Sek. Jenemarung Kanan, </td> <td> Pintu-1 : <?=$mov2_j?> cm </td><td><?=$ssj_mov2?></td></tr> <tr><td>Sek. Jenemarung Kiri, </td> <td> Pintu-1 : <?=$mov3_j?> cm </td><td><?=$ssj_mov3?></td> </tr> </table> </div>'
   var customPopupBPCakura = '<div class="slideshow-container"><div class="mySlides fade"><div class="numbertext">1 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bpcakura.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bpcakura.jpg?alt=media" style="width:100%"></a></div><div class="mySlides fade"><div class="numbertext">2 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bpcakura.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bpcakura.jpg?alt=media" style="width:100%"></a></div><a class="prev" onclick="plusSlides(-1)">&#10094;</a><a class="next" onclick="plusSlides(1)">&#10095;</a></div><br><div style="text-align:center"><span class="dot" onclick="currentSlide(0)"></span><span class="dot" onclick="currentSlide(1)"></span></div><br /><center>Lokasi : <b>Bendung Cakura</b> </br> Waktu Kirim : <?=$ts_c?> </center> <br /> <div> <table> <tr> <td> Sungai Cakura, </td> <td> Muka Air : <?=$s_wl1_c?> cm &nbsp; </td> <td> Debit : <?=$debit1_c?> lt/det &nbsp; </td> <td> Suhu : <?=$wl1temp_c?> °C &nbsp;</td>  </tr> <tr> <td> Sek. Cakura, </td> <td> Muka Air : <?=$s_wl2_c?> cm &nbsp; </td> <td> Debit : <?=$debit2_c?> lt/det &nbsp; </td> <td> Suhu : <?=$wl2temp_c?> °C &nbsp;</td> </tr>  <tr> <td> Sungai Cakura, </td> <td> Pintu-1 : <?=$mov1_c?> cm </td> <td> <?=$ssc_mov1?></td> </tr> <tr> <td> Sek. Cakura, </td> <td> Pintu-1 : <?=$mov2_c?> cm </td> <td> <?=$ssc_mov2?></td></tr> </table> </div>'
   var customPopupBP1 = '<div class="slideshow-container"><div class="mySlides fade"><div class="numbertext">1 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bp1.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bp1.jpg?alt=media" style="width:100%"></a></div><div class="mySlides fade"><div class="numbertext">2 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bp1.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bp1.jpg?alt=media" style="width:100%"></a></div><a class="prev" onclick="plusSlides(-1)">&#10094;</a><a class="next" onclick="plusSlides(1)">&#10095;</a></div><br><div style="text-align:center"><span class="dot" onclick="currentSlide(0)"></span><span class="dot" onclick="currentSlide(1)"></span></div><br /><center>Lokasi : <b>B.P.1</b> </br> Waktu Kirim : <?=$ts_1?> </center> <br /> <div> <table> <tr> <td> Primer Pamukkulu, </td> <td> Muka Air : <?=$s_wl1_1?> cm &nbsp; </td> <td> Debit : <?=$debit1_1?> lt/det &nbsp; </td> <td> Suhu : <?=$wl1temp_1?> °C &nbsp;</td> </tr> <tr> <td> Sek. Kulat Obengisi, </td> <td> Muka Air : <?=$s_wl2_1?> cm &nbsp; </td> <td> Debit : <?=$debit2_1?> lt/det &nbsp; </td> <td> Suhu : <?=$wl2temp_1?> °C &nbsp;</td> </tr> <tr> <td> Primer Pamukkulu, </td> <td> Pintu-1 : <?=$mov1_1?> cm </td> <td> <?=$ss1_mov1?></td> &nbsp; <td> Pintu-2 : <?=$mov2_1?> cm </td> <td> <?=$ss1_mov2?></td> </tr> <tr> <td> Sek. Kulat Obengisi, </td> <td> Pintu-1 : <?=$mov3_1?> cm </td> <td> <?=$ss1_mov3?></td> &nbsp; <td> Pintu-2 : <?=$mov4_1?> cm </td> <td> <?=$ss1_mov4?></td> </tr> </table> </div>'
   var customPopupBP2= '<div class="slideshow-container"><div class="mySlides fade"><div class="numbertext">1 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bp2.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bp2.jpg?alt=media" style="width:100%"></a></div><div class="mySlides fade"><div class="numbertext">2 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bp2.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bp2.jpg?alt=media" style="width:100%"></a></div><a class="prev" onclick="plusSlides(-1)">&#10094;</a><a class="next" onclick="plusSlides(1)">&#10095;</a></div><br><div style="text-align:center"><span class="dot" onclick="currentSlide(0)"></span><span class="dot" onclick="currentSlide(1)"></span></div><br /><center>Lokasi : <b>B.P.2</b> </br> Waktu Kirim : <?=$ts_2?> </center> <br /> <div> <table> <tr> <td> Primer Pamukkulu, </td> <td> Muka Air : <?=$s_wl1_2?> cm &nbsp; </td> &nbsp; <td> Debit : <?=$debit1_2?> lt/det &nbsp; </td> <td> Suhu : <?=$wl1temp_2?> °C </td> </tr> <br /> <tr> <td> Sek. Jenematalassa, </td> <td>  Muka Air : <?=$s_wl2_2?> cm &nbsp;</td> <td> Debit : <?=$debit2_2?> lt/det &nbsp;</td> <td> Suhu : <?=$wl2temp_2?> °C &nbsp;</td>  </tr> <tr> <td> Primer Pamukkulu, </td> <td> Pintu-1 : <?=$mov1_2?> cm </td> <td> <?=$ss2_mov1?></td> &nbsp; <td> Pintu-2 : <?=$mov2_2?> cm </td> <td> <?=$ss2_mov2?></td> </tr> <tr> <td> Sek. Jenematalassa, </td> <td> Pintu-1 : <?=$mov3_2?> cm </td> <td> <?=$ss2_mov3?></td> </tr> </table> </div>'
   var customPopupBP4 = '<div class="slideshow-container"><div class="mySlides fade"><div class="numbertext">1 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bp4.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bp4.jpg?alt=media" style="width:100%"></a></div><div class="mySlides fade"><div class="numbertext">2 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bp4.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bp4.jpg?alt=media" style="width:100%"></a></div><a class="prev" onclick="plusSlides(-1)">&#10094;</a><a class="next" onclick="plusSlides(1)">&#10095;</a></div><br><div style="text-align:center"><span class="dot" onclick="currentSlide(0)"></span><span class="dot" onclick="currentSlide(1)"></span></div><br /><center>Lokasi : <b>B.P.4</b> </br> Waktu Kirim : <?=$ts_4?> </center> <br /> <div> <table> <tr> <td> Primer Pamukkulu, </td> <td> Muka Air : <?=$s_wl1_4?> cm &nbsp; </td> <td> Debit : <?=$debit1_4?> lt/det &nbsp; </td> <td> Suhu : <?=$wl1temp_4?> °C &nbsp;</td> </tr> <br /> <tr> <td> Sek. Bontoloe, </td> <td>  Muka Air : <?=$s_wl2_4?> cm &nbsp;</td> <td> Debit : <?=$debit2_4?> lt/det &nbsp;</td> <td> Suhu : <?=$wl2temp_4?> °C &nbsp;</td> </tr>  <tr> <td> Primer Pamukkulu, </td> <td> Pintu-1 : <?=$mov1_4?> cm </td> <td> <?=$ss4_mov1?></td> &nbsp; <td> Pintu-2 : <?=$mov2_4?> cm </td> <td> <?=$ss4_mov2?></td> </tr> <tr> <td></td> <td> Pintu-3 : <?=$mov3_4?> cm </td> <td> <?=$ss4_mov3?></td> </tr> <tr><td> Sek. Bontoloe, </td> <td> Pintu-1 :  <?=$mov4_4?> cm </td> <td> <?=$ss4_mov4?></td> </tr> </table> </div>'
   var customPopupBP5 = '<div class="slideshow-container"><div class="mySlides fade"><div class="numbertext">1 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bp5.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bp5.jpg?alt=media" style="width:100%"></a></div><div class="mySlides fade"><div class="numbertext">2 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bp5.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bp5.jpg?alt=media" style="width:100%"></a></div><a class="prev" onclick="plusSlides(-1)">&#10094;</a><a class="next" onclick="plusSlides(1)">&#10095;</a></div><br><div style="text-align:center"><span class="dot" onclick="currentSlide(0)"></span><span class="dot" onclick="currentSlide(1)"></span></div><br /><center>Lokasi : <b>B.P.5</b> </br> Waktu Kirim : <?=$ts_5?> </center> <br /> <div> <table> <tr> <td> Primer Pamukkulu, </td> <td> Muka Air : <?=$s_wl1_5?> cm &nbsp; </td> <td> Debit : <?=$debit1_5?> lt/det &nbsp; </td> <td> Suhu : <?=$wl1temp_5?> °C &nbsp;</td> </tr> <br /> <tr> <td> Sek. Lantang, </td> <td>  Muka Air : <?=$s_wl2_5?> cm &nbsp;</td> <td> Debit : <?=$debit2_5?> lt/det &nbsp;</td> <td> Suhu : <?=$wl2temp_5?> °C &nbsp;</td> </tr>  <tr> <td> Primer Pamukkulu, </td> <td> Pintu-1 : <?=$mov1_5?> cm </td> <td> <?=$ss5_mov1?></td> &nbsp; <td> Pintu-2 : <?=$mov2_5?> cm </td> <td> <?=$ss4_mov2?></td> </tr> <tr> <td> Sek. Lantang, </td> <td> Pintu-1 : <?=$mov3_5?> cm </td> <td> <?=$ss5_mov3?></td> </tr> </table> </div>'
   var customPopupBP8 = '<div class="slideshow-container"><div class="mySlides fade"><div class="numbertext">1 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bp8.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bp8.jpg?alt=media" style="width:100%"></a></div><div class="mySlides fade"><div class="numbertext">2 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bp8.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bp8.jpg?alt=media" style="width:100%"></a></div><a class="prev" onclick="plusSlides(-1)">&#10094;</a><a class="next" onclick="plusSlides(1)">&#10095;</a></div><br><div style="text-align:center"><span class="dot" onclick="currentSlide(0)"></span><span class="dot" onclick="currentSlide(1)"></span></div><br /><center>Lokasi : <b>B.P.8</b> </br> Waktu Kirim : <?=$ts_8?> </center> <br /> <div> <table> <tr> <td> Primer Pamukkulu, </td> <td> Muka Air : <?=$s_wl1_8?> cm &nbsp; </td> <td> Debit : <?=$debit1_8?> lt/det &nbsp; </td> <td> Suhu : <?=$wl1temp_8?> °C &nbsp;</td> </tr> <br /> <tr> <td> Sek. Cakura, </td> <td>  Muka Air : <?=$s_wl2_8?> cm &nbsp;</td> <td> Debit : <?=$debit2_8?> lt/det &nbsp;</td> <td> Suhu : <?=$wl2temp_8?> °C &nbsp;</td> </tr>  <tr> <td> Primer Pamukkulu, </td> <td> Pintu-1 : <?=$mov1_8?> cm </td> <td> <?=$ss8_mov1?></td> &nbsp; <td> Pintu-2 : <?=$mov2_8?> cm </td> <td> <?=$ss8_mov2?></td> </tr> <tr> <td> Sek. Cakura, </td> <td> Pintu-1 : <?=$mov3_8?> cm </td> <td> <?=$ss8_mov3?></td> &nbsp; <td> Pintu-2 : <?=$mov4_8?> cm </td> <td> <?=$ss8_mov4?></td> </tr> </table> </div>'
   var customPopupBP13 = '<div class="slideshow-container"><div class="mySlides fade"><div class="numbertext">1 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bp13.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bp13.jpg?alt=media" style="width:100%"></a></div><div class="mySlides fade"><div class="numbertext">2 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bp13.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bp13.jpg?alt=media" style="width:100%"></a></div><a class="prev" onclick="plusSlides(-1)">&#10094;</a><a class="next" onclick="plusSlides(1)">&#10095;</a></div><br><div style="text-align:center"><span class="dot" onclick="currentSlide(0)"></span><span class="dot" onclick="currentSlide(1)"></span></div><br /><center>Lokasi : <b>B.P.13</b> </br> Waktu Kirim : <?=$ts_13?> </center> <br /> <div> <table> <tr> <td> Primer Pamukkulu, </td> <td> Muka Air : <?=$s_wl1_13?> cm &nbsp; </td> <td> Debit : <?=$debit1_13?> lt/det &nbsp; </td> <td> Suhu : <?=$wl1temp_13?> °C &nbsp;</td> </tr> <tr> <td> Sek. Surulangi, </td> <td>  Muka Air : <?=$s_wl2_13?> cm &nbsp; </td> <td> Debit : <?=$debit2_13?> lt/det &nbsp;</td> <td> Suhu : <?=$wl2temp_13?> °C &nbsp;</td> </tr>  <tr> <td> Primer Pamukkulu, </td> <td> Pintu-1 : <?=$mov1_13?> cm </td> <td> <?=$ss13_mov1?></td> <td> Pintu-2 : <?=$mov2_13?> cm </td> <td> <?=$ss13_mov2?></td> </tr> <tr> <td> Sek. Surulangi, </td> <td> Pintu-1 : <?=$mov3_13?> cm </td> <td> <?=$ss13_mov3?></td></tr> </table> </div>'
   var customPopupBP15 = '<div class="slideshow-container"><div class="mySlides fade"><div class="numbertext">1 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bp15.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bp15.jpg?alt=media" style="width:100%"></a></div><div class="mySlides fade"><div class="numbertext">2 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bp15.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bp15.jpg?alt=media" style="width:100%"></a></div><a class="prev" onclick="plusSlides(-1)">&#10094;</a><a class="next" onclick="plusSlides(1)">&#10095;</a></div><br><div style="text-align:center"><span class="dot" onclick="currentSlide(0)"></span><span class="dot" onclick="currentSlide(1)"></span></div><br /><center>Lokasi : <b>B.P.15</b> </br> Waktu Kirim : <?=$ts_15?> </center> <br /> <div> <table> <tr> <td> Primer Pamukkulu, </td> <td> Muka Air : <?=$s_wl1_15?> cm &nbsp; </td> <td> Debit : <?=$debit1_15?> lt/det &nbsp; </td> <td> Suhu : <?=$wl1temp_15?> °C &nbsp;</td> </tr> <tr> <td> Sek. Pabundukang, </td> <td>  Muka Air : <?=$s_wl2_15?> cm &nbsp; </td> <td> Debit : <?=$debit2_15?> lt/det &nbsp;</td> <td> Suhu : <?=$wl2temp_15?> °C &nbsp;</td> </tr>  <tr> <td> Primer Pamukkulu, </td> <td> Pintu-1 : <?=$mov1_15?> cm </td> <td> <?=$ss15_mov1?></td> <td> Pintu-2 : <?=$mov2_15?> cm </td> <td> <?=$ss15_mov2?></td> </tr> <tr> <td> Sek. Pabundukang, </td> <td> Pintu-1 :  <?=$mov3_15?> cm </td> <td><?=$ss15_mov3?></td></tr> </table> </div>'
   var customPopupBP17 = '<div class="slideshow-container"><div class="mySlides fade"><div class="numbertext">1 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bp17.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bp17.jpg?alt=media" style="width:100%"></a></div><div class="mySlides fade"><div class="numbertext">2 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bp17.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bp17.jpg?alt=media" style="width:100%"></a></div><a class="prev" onclick="plusSlides(-1)">&#10094;</a><a class="next" onclick="plusSlides(1)">&#10095;</a></div><br><div style="text-align:center"><span class="dot" onclick="currentSlide(0)"></span><span class="dot" onclick="currentSlide(1)"></span></div><br /><center>Lokasi : <b>B.P.17</b> </br> Waktu Kirim : <?=$ts_17?> </center> <br /> <div> <table> <tr> <td> Primer Pamukkulu, </td> <td> Muka Air : <?=$s_wl1_17?> cm &nbsp; </td> <td> Debit : <?=$debit1_17?> lt/det &nbsp; </td> <td> Suhu : <?=$wl1temp_17?> °C &nbsp;</td> </tr> <tr> <td> Sek. Pangkala, </td> <td> Muka Air : <?=$s_wl2_17?> cm </td> &nbsp; <td> Debit : <?=$debit2_17?> lt/det &nbsp;</td> <td> Suhu : <?=$wl2temp_17?> °C &nbsp;</td> </tr> <tr> <td> Primer Pamukkulu, </td> <td> Pintu-1 : <?=$mov1_17?> cm </td> <td> <?=$ss17_mov1?> </td> </tr> <tr> <td> Sek. Pangkala, </td> <td> Pintu-1 : <?=$mov2_17?> cm </td> <td><?=$ss17_mov2?></td> </tr> </table> </div>'
   var customPopupBP19 = '<div class="slideshow-container"><div class="mySlides fade"><div class="numbertext">1 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bp19.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv1_bp19.jpg?alt=media" style="width:100%"></a></div><div class="mySlides fade"><div class="numbertext">2 / 2</div><a href="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bp19.jpg?alt=media" target="_blank"><img src="https://firebasestorage.googleapis.com/v0/b/irigasi-takalar.appspot.com/o/cctv2_bp19.jpg?alt=media" style="width:100%"></a></div><a class="prev" onclick="plusSlides(-1)">&#10094;</a><a class="next" onclick="plusSlides(1)">&#10095;</a></div><br><div style="text-align:center"><span class="dot" onclick="currentSlide(0)"></span><span class="dot" onclick="currentSlide(1)"></span></div><br /><center>Lokasi : <b>B.P.19</b> </br> Waktu Kirim : <?=$ts_19?> </center> <br /> <div> <table> <tr> <td> Primer Pamukkulu, </td> <td> Muka Air : <?=$s_wl1_19?> cm &nbsp; </td> <td> Debit : <?=$debit1_19?> lt/det &nbsp; </td> <td> Suhu : <?=$wl1temp_19?> °C &nbsp;</td> </tr> <tr> <td> Sek. Jenemarung Kanan, </td> <td> Muka Air : <?=$s_wl2_19?> cm </td> <td> Debit : <?=$debit2_19?> lt/det &nbsp;</td> <td> Suhu : <?=$wl2temp_19?> °C &nbsp;</td> </tr> <tr> <td> Sek.Jenemarung Kanan, </td> <td> Pintu-1 : <?=$mov1_19?> cm </td> <td><?=$ss19_mov1?></td> </tr> </table> </div>'
   
    var customOptions =
        {
        'maxWidth': '500',
        }
   
   var markerbp1 = L.marker([-5.39807, 119.55149],
   {
    title: 'B.P.1',
    alt: 'B.P.1',
   }).addTo(map).bindPopup(customPopupBP1,customOptions)
  var markerbppamukkulu = L.marker([-5.40267, 119.55603],
  {
  title: 'Bendung Pamukkulu',
    alt: 'Bendung Pamukkulu',
  }).addTo(map).bindPopup(customPopupBPPamukkulu,customOptions)
  var markerbp2 = L.marker([-5.40592, 119.54251],
   {
  title: 'B.P.2',
    alt: 'B.P.2',
  }).addTo(map).bindPopup(customPopupBP2,customOptions)
   var markerbp4 = L.marker([-5.41636, 119.53659],
   {
  title: 'B.P.4',
    alt: 'B.P.4',
  }).addTo(map).bindPopup(customPopupBP4,customOptions)
   var markerbp5 = L.marker([-5.42243, 119.53138],
   {
  title: 'B.P.5',
    alt: 'B.P.5',
  }).addTo(map).bindPopup(customPopupBP5,customOptions)
   var markerbp8 = L.marker([-5.42974, 119.52792],
   {
  title: 'B.P.8',
    alt: 'B.P.8',
  }).addTo(map).bindPopup(customPopupBP8,customOptions)
   var markerbp13 = L.marker([-5.44664, 119.48875],
   {
  title: 'B.P.13',
    alt: 'B.P.13',
  }).addTo(map).bindPopup(customPopupBP13,customOptions)
   var markerbp15 = L.marker([-5.45282, 119.48113],
   {
  title: 'B.P.15',
    alt: 'B.P.15',
  }).addTo(map).bindPopup(customPopupBP15,customOptions)
   var markerbp17 = L.marker([-5.46354, 119.47749],
   {
  title: 'B.P.17',
    alt: 'B.P.17',
  }).addTo(map).bindPopup(customPopupBP17,customOptions)
  var markerbp19 =  L.marker([-5.47416, 119.48486],
  {
  title: 'B.P.19',
    alt: 'B.P.19',
  }).addTo(map).bindPopup(customPopupBP19,customOptions)
   var markerbpjenemarung = L.marker([-5.47247, 119.48696],
   {
  title: 'Bendung Jenemarung',
    alt: 'Bendung Jenemarung',
  }).addTo(map).bindPopup(customPopupBPJenemarung,customOptions)
   var markerbpcakura = L.marker([-5.43138, 119.53068],
  {
  title: 'Bendung Cakura',
    alt: 'Bendung Cakura',
  }).addTo(map).bindPopup(customPopupBPCakura,customOptions)
    </script>   
  
</body>

</html>
