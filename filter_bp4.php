<?php  
 //filter.php  
 if(isset($_POST["from_date"], $_POST["to_date"]))  
 {  
     $connect = mysqli_connect("localhost", "root", "", "scada");
      $output = '';  
      $query = "  
           SELECT * FROM bp4  
           WHERE tanggal BETWEEN '".$_POST["from_date"]."' AND '".$_POST["to_date"]."' ORDER by id DESC
      ";  
      $result = mysqli_query($connect, $query); 
      $output .= '  
           <table class="table table-bordered text-center">  
                         <tr>  
                               <th rowspan="2" style="vertical-align: middle;">Tanggal</th>  
                               <th rowspan="2" style="vertical-align: middle;">Jam</th> 
                               <th colspan="2">Kanal Primer</th>
                               <th colspan="2">Kanal Sekunder</th>  
                          </tr>   
                          <tr>  
                               <th>TMA (cm)</th>  
                               <th>Debit (lt/det)</th> 
                               <th>TMA (cm)</th>  
                               <th>Debit (lt/det)</th> 
                          </tr>    
      ';
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_assoc($result))  
           {  
               $techarray[] = $row;
               $wl1 = $row["wl1"];
               $s_wl1 = ($wl1 >= 32767) ? 0 : $wl1/10;
               $wl2 = $row["wl2"];
               $s_wl2 = ($wl2 >= 32767) ? 0 : $wl2/10;
               $debit1 = $row["debit1"];
               $debit2 = $row["debit2"];
               $output .= '  
                     <tr>  
                          <td>'. date('d M Y', strtotime($row["tanggal"])) .'</td>  
                          <td>'. date('H:i', strtotime($row["jam"])) .'</td>  
                          <td>'. $s_wl1 .'</td>  
                          <td>'. $debit1 .'</td>
                          <td>'. $s_wl2 .'</td> 
                          <td>'. $debit2 .'</td> 
                     </tr>  
                ';  
           }  
      }  
      else  
      {  
           $output .= '  
                <tr>  
                     <td colspan="5">No Data Found</td>  
                </tr>  
           ';  
      }  
      $output .= '</table>';  
      echo $output;

      $json = json_encode($techarray);
      file_put_contents("data_bp4.json", $json);
     }  

 ?>

