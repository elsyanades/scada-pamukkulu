<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bendung Cakura</title>
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
  </style>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
  <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script> 
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"></script>
  
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
          <p>Bendung Cakura</p>
        </header>

           <div class="container"> 
            <div class="row">  
                <div class="col-md-3 col-sm-3">  
                     <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" data-date-format="dd-mm-yyyy"/>
                </div>  
                <div class="col-md-3 col-sm-3">  
                     <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />  
                </div>  
                <div class="col-md-3 col-sm-3">  
                     <input type="button" name="filter" id="filter" value="Filter" class="btn btn-info" /> 
                </div>
                <div class="col-md-3 col-sm-3">
                  <div class="dropdown">
                      <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Download
                      </a>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" onclick="ExportToExcel('xlsx')" href="#" >Excel</a>
                        <a class="dropdown-item" id="exportTableCSV" href="#">CSV</a>
                        <a class="dropdown-item" onclick="pdf()" href="#">PDF</a>
                        <a class="dropdown-item" onclick="preview()" href="#">Print</a>
                      </div>
                      </div> 
                </div>
            </div><br><br>   
            <div class="row">
               <canvas id="myChart"></canvas><canvas id="myChart1"></canvas>
            </div>
                <div style="clear:both"></div>                 
                <br /> 
                <div id="order_table">  
                     <table class="table table-bordered text-center">  
                          <tr>  
                               <th rowspan="2" style="vertical-align: middle;">Tanggal</th>  
                               <th rowspan="2" style="vertical-align: middle;">Jam</th> 
                               <th colspan="2">Sungai</th>
                               <th colspan="2">Intake Kanal Primer</th>  
                          </tr>   
                          <tr>  
                               <th>TMA (cm)</th>  
                               <th>Debit (lt/det)</th> 
                               <th>TMA (cm)</th>  
                               <th>Debit (lt/det)</th> 
                          </tr>    
                            <?php
                            $url = 'http://localhost:8080/scada/conn_bp_cakura.php';
                            $data = file_get_contents($url); // put the contents of the file into a variable
                            $opendata = json_decode($data);
                            rsort($opendata);
                            foreach ($opendata as $key => $value) {
                            $wl1 = $value->wl1;
                            $s_wl1 = ($wl1 >= 32767) ? 0 : $wl1/10;
                            $wl2 = $value->wl2;
                            $s_wl2 = ($wl2 >= 32767) ? 0 : $wl2/10;
                            $debit1 = $value->debit1;
                            $debit2 = $value->debit2;
                              echo '<tr>
                                  <td>'.date('d M Y', strtotime($value->tanggal)).'</td>
                                  <td>'.date('H:i', strtotime($value->jam)).'</td>
                                  <td>'.$s_wl1.'</td>
                                  <td>'.$debit1.'</td>
                                  <td>'.$s_wl2.'</td>
                                  <td>'.$debit2.'</td>
                                  </tr>';

                            }
                            ?>
                     </table>  
                </div>   
        </div>
      </div> 
        

    </section><!-- End Services Section -->
    </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
  <script src="http://cdn.datatables.net/plug-ins/1.10.19/sorting/datetime-moment.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
 <script>  
      $(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd',
                closeText: "Close",
                changeMonth: true,
                changeYear: true,
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker();  
           });  
           $('#filter').click(function(){  
                var from_date = $('#from_date').val();  
                var to_date = $('#to_date').val();  
                if(from_date != '' && to_date != '')  
                {  
                     $.ajax({  
                          url:"filter_bp_cakura.php",  
                          method:"POST",  
                          data:{from_date:from_date, to_date:to_date},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data); 
                               $('#myChart').hide();
                               $('#myChart1').show();
                               getDatas();
                          }  
                     });  
                }  
                else  
                {  
                     alert("Please Select Date");  
                }  
           });
      });  
 </script>
<script>  
function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('order_table');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || ('tma_bp_cakura.' + (type || 'xlsx')));
    } 
 </script>  
 <script>
    function preview() {
        var sTable = document.getElementById('order_table').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>DATA PEMANTAUAN KANAL IRIGASI PAMUKKULU</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>
<script>
document.getElementById("exportTableCSV").addEventListener("click", function(e){
 
    e.preventDefault()
 
    var _tbl_rows = document.querySelectorAll('#order_table tr')
    var csv ="";
    var rows = []
    _tbl_rows.forEach(el => {
        var row = []
        el.querySelectorAll('th, td').forEach(ele => {
            var ele_clone = ele.cloneNode(true)
            ele_clone.innerText = (ele_clone.innerText).replace(/\"/gi, '\"\"')
            ele_clone.innerText = ('"' + ele_clone.innerText + '"')
            row.push(ele_clone.innerText)
        })
        rows.push(row.join(","));
    })
    csv += rows.join(`\r\n`)
    var file = new Blob([csv], {type:'text/csv'});
    var dl_anchor = document.createElement('a')
    dl_anchor.style.display = this.nonce;
    dl_anchor.download = "tma_bp_cakura.csv";
    dl_anchor.href = window.URL.createObjectURL(file);
 
    document.body.appendChild(dl_anchor)
    dl_anchor.click()
})
</script>
<script>
  function pdf() {
            html2canvas(document.getElementById('order_table'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("tma_bp_cakura.pdf");
                }
            });
        }
</script>
<script>
getData();
$('#myChart1').hide()
  
        async function getData() {
            const response = await fetch('http://localhost:8080/scada/conn_bp_cakura.php');
            // console.log(response);
            const data = await response.json();
            data.sort();
            // console.log(data);
            length = data.length;
            // console.log(length);
  
            labels = [];
            labels2 = [];
            wl1 = [];
            wl2 = [];
            debit1 = [];
            debit2 = [];
            for (i = 0; i < length; i++) {
                labels.push(data[i].jam);
                labels2.push(data[i].tanggal);
                debit1.push(data[i].debit1);
                debit2.push(data[i].debit2);
                if (data[i].wl1 >= 32767) {
                    wl1.push(0);
                    } else {
                    wl1.push(data[i].wl1/10);
                    };
                if (data[i].wl2 >= 32767) {
                    wl2.push(0);
                    } else {
                    wl2.push(data[i].wl2/10);
                    };
            }
  
  
            new Chart(document.getElementById("myChart"), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            yAxisID: 'A',
                            label: 'Sungai',
                            data: wl1,
                            borderColor : 'red',
                            backgroundColor: 'red',
                            borderWidth: 2
                        },
                        {
                            yAxisID: 'A',
                            label: 'Intake Kanal Sekunder',
                            data: wl2,
                            borderColor : 'blue',
                            backgroundColor: 'blue',
                            borderWidth: 2
                        },
                        {
                            yAxisID: 'B',
                            label: 'Sungai',
                            data: debit1,
                            borderColor : 'green',
                            backgroundColor: 'green',
                            borderWidth: 2
                        },
                        {
                            yAxisID: 'B',
                            label: 'Intake Kanal Sekunder',
                            data: debit2,
                            borderColor : 'grey',
                            backgroundColor: 'grey',
                            borderWidth: 2
                        },

                    ]
                },
                options: {
                    responsive: true,
                    legend: { display: false },
                    plugins: {
                    title: {
                        display: true,
                        text: ['Tinggi Muka Air                                                         Debit']
                    },
                    subtitle: {
                        display: true,
                        text: labels2[0],
                        position: 'bottom',
                        font: {weight: 'bold'},
                        fullSize: true,
                        padding : 10,
                        
                    }
                    }, 
                    scales: {
                    x: {
                        display: true,
                    },
                    A: {
                        type: 'linear',
                        position: 'left',
                        grid: { display: false },
                        title: {
                        display: true,
                        text: 'Tinggi Muka Air (cm)'
                        },
                    },
                    B: {
                        type: 'linear',
                        position: 'right',
                        grid: { display: false },
                        title: {
                        display: true,
                        text: 'Debit (lt/det)'
                        },
                    },
                 },
                 
            }
            });
  
        }
  
</script>
<script>
    //  getDatas();
        async function getDatas() {
            const response = await fetch('http://localhost:8080/scada/data_bp_cakura.json');
            // console.log(response);
            const data = await response.json();
            data.reverse();
            // console.log(data);
            length = data.length;
            // console.log(length);
  
            labels = [];
            labels2 = [];
            wl1 = [];
            wl2 = [];
            debit1 = [];
            debit2 = [];
            for (i = 0; i < length; i++) {
                labels.push(data[i].jam);
                labels2.push(data[i].tanggal);
                debit1.push(data[i].debit1);
                debit2.push(data[i].debit2);
                if (data[i].wl1 >= 32767) {
                    wl1.push(0);
                    } else {
                    wl1.push(data[i].wl1/10);
                    };
                if (data[i].wl2 >= 32767) {
                    wl2.push(0);
                    } else {
                    wl2.push(data[i].wl2/10);
                    };
            }
            
            // const subLabels = {
            //     id: 'subLabels',
            //     afterDatasetsDraw(chart, args, pluginOptions){
            //         console.log(chart)
            //     }
            // }
            new Chart(document.getElementById("myChart1"), {
                type: 'line',
                data: {
                    labels: labels2,
                    datasets: [
                        {
                            yAxisID: 'A',
                            label: 'Sungai',
                            data: wl1,
                            borderColor : 'red',
                            backgroundColor: 'red',
                            borderWidth: 2
                        },
                        {
                            yAxisID: 'A',
                            label: 'Intake Kanal Primer',
                            data: wl2,
                            borderColor : 'blue',
                            backgroundColor: 'blue',
                            borderWidth: 2
                        },
                        {
                            yAxisID: 'B',
                            label: 'Sungai',
                            data: debit1,
                            borderColor : 'green',
                            backgroundColor: 'green',
                            borderWidth: 2
                        },
                        {
                            yAxisID: 'B',
                            label: 'Intake Kanal Primer',
                            data: debit2,
                            borderColor : 'grey',
                            backgroundColor: 'grey',
                            borderWidth: 2
                        },

                    ]
                },
                options: {
                    responsive: true,
                    legend: { display: false },
                    plugins: {
                    title: {
                        display: true,
                        text: ['Tinggi Muka Air                                                         Debit']
                    },
                    },
                    scales: {
                     x: {
                        
                        ticks: {
                        callback: function(value, index) {
                            return index % 24 === 0 ? this.getLabelForValue(value) : labels[value];
                        },
                        }
                    },
                    A: {
                        type: 'linear',
                        position: 'left',
                        grid: { display: false },
                        title: {
                        display: true,
                        text: 'Tinggi Muka Air (cm)'
                        },
                    },
                    B: {
                        type: 'linear',
                        position: 'right',
                        grid: { display: false },
                        title: {
                        display: true,
                        text: 'Debit (lt/det)'
                        },
                    },
                 },
                 
            }
            });
  
        }
</script>

</body>

</html>