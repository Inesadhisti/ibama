<!DOCTYPE html>
<html>
<?php
include "configuration/config_etc.php";
include "configuration/config_include.php";
etc();encryption();session();connect();head();body();timing();
//alltotal();
pagination();

date_default_timezone_set("Asia/Jakarta");
$today=date('d-m-Y');
?>

<?php
if (!login_check()) {
?>
<meta http-equiv="refresh" content="0; url=logout" />
<?php
exit(0);
}
?>
        <div class="wrapper">
<?php
theader();
menu();
?>
            <div class="content-wrapper">
                <section class="content-header">
</section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
            <div class="col-lg-12">
                        <!-- ./col -->

<!-- SETTING START-->

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "configuration/config_chmod.php";
$halaman = "rekap"; // halaman
$dataapa = "Rekapitulasi"; // data
$tabeldatabase = "rekap"; // tabel database
$chmod = $chmenu7; // Hak akses Menu
$forward = mysqli_real_escape_string($conn, $tabeldatabase); // tabel database
$forwardpage = mysqli_real_escape_string($conn, $halaman); // halaman
$search = $_POST['search'];
$insert = $_POST['insert'];

 
?>


<!-- SETTING STOP -->


<!-- BREADCRUMB -->

<ol class="breadcrumb ">
<li><a href="<?php echo $_SESSION['']; ?>">Dashboard </a></li>

<?php

if ($search != null || $search != "") {
?>
 <li> <a href="<?php echo $halaman;?>">Data <?php echo $dataapa ?></a></li>
  <li class="active"><?php
    echo $search;
?></li>
  <?php
} else {
?>
 <li class="active">Data <?php echo $dataapa ?></li>
  <?php
}
?>
</ol>

<!-- BREADCRUMB -->

<!-- BOX INSERT BERHASIL -->

         <script>
 window.setTimeout(function() {
    $("#myAlert").fadeTo(500, 0).slideUp(1000, function(){
        $(this).remove();
    });
}, 5000);
</script>


       <!-- BOX INFORMASI -->
    <?php
if ($chmod >= 2 || $_SESSION['jabatan'] == 'admin') {
  ?>


  <!-- KONTEN BODY AWAL -->
                         <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Filter Rekap</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          


 <div class="card-body">

    <form action="rekap_cabang" method="post">
                <table class="table">
                  <thead>                  
                    <tr>
                      <th style="width: 50px">Kantor</th>
                      
                      <th style="width: 150px">Mulai</th>
                      <th style="width: 150px">Sampai</th>
                      <th style="width: 150px">Filter</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                          <select class="form-control select2" style="width: 100%;" name="cabang" required>
          <?php
    $sql=mysqli_query($conn,"select distinct(nama) from cabang");
    while ($row=mysqli_fetch_assoc($sql)){
      echo "<option value='".$row['nama']."'>".$row['nama']."</option>";
    }
  ?>
                 </select>


                      </td>
                      
                      <td>
                         <input type="text" class="form-control" id="datepicker" name="awal" >
                      </td>
                      <td>
                          <input type="text" class="form-control" id="datepicker2" name="akhir" >
                      </td>
                      <td><button type="submit" class="btn btn-info">Filter</button>
                      </td>
                    </tr>
                   
                  </tbody>
                </table>

            </form>
              </div>




        </div>

                                <!-- /.box-body -->
                            </div>


 
<?php if($_SERVER["REQUEST_METHOD"] == "POST"){

 $cabang = mysqli_real_escape_string($conn, $_POST["cabang"]);

$awal = mysqli_real_escape_string($conn, $_POST["awal"]);
$akhir = mysqli_real_escape_string($conn, $_POST["akhir"]);
?>
<?php
    error_reporting(E_ALL ^ E_DEPRECATED );
    $sql    = "select * from req inner join reqdata on req.nota=reqdata.nota where req.cabang like '%$cabang%' and (req.tglreq BETWEEN '$awal' and '$akhir') group by reqdata.kode";
    $result = mysqli_query($conn, $sql);
    $rpp    = 15;
    $reload = "$halaman"."?pagination=true";
    $page   = intval(isset($_GET["page"]) ? $_GET["page"] : 0);

    if ($page <= 0)
        $page = 1;
    $tcount  = mysqli_num_rows($result);
    $tpages  = ($tcount) ? ceil($tcount / $rpp) : 1;
    $count   = 0;
    $i       = ($page - 1) * $rpp;
    $no_urut = ($page - 1) * $rpp;
?>
<div class="box">
        <div class="box-header with-border">

          <?php 
          $awal1 = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$awal);
          $akhir1 = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$akhir);

          ?>
          <h3 class="box-title">Hasil Rekapitulasi <?php  echo $awal1;?> sampai <?php  echo $akhir1;?> </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
<div class="box-body table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th>Cabang</th>
                                                <th>Unit</th>
                                                <th>Nama</th>
                                                <th>Diminta</th>
                                                <th>Dikirim</th>
                                                <th>Stok Awal</th>
                                                <th>Stok Akhir</th>
                                                
                                            </tr>
                                        </thead>
                                         <?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
    $search = $_POST['search'];

    if ($search != null || $search != "") {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

                if(isset($_POST['search'])){
                $query1    = "select * from req inner join reqdata on req.nota=reqdata.nota where req.cabang like '%$cabang%' and (req.tglreq BETWEEN '$awal' and '$akhir') group by reqdata.kode";
                $hasil = mysqli_query($conn,$query1);
                $no = 1;
                while ($fill = mysqli_fetch_assoc($hasil)){
                    ?>
                     <tbody>
<tr>
                    <td><?php  echo mysqli_real_escape_string($conn, $fill['cabang']); ?></td>
            <td><?php  echo mysqli_real_escape_string($conn, $fill['unit']); ?></td>
            <td><?php  echo mysqli_real_escape_string($conn, $fill['tglreq']); ?></td>
            <td><?php  echo mysqli_real_escape_string($conn, $fill['nama']); ?></td>
            <td><?php  $kode = $fill['kode'];
            $sqlx2="SELECT SUM(reqdata.jumlah) AS data FROM req inner join reqdata on req.nota=reqdata.nota where reqdata.kode='$kode' and req.cabang like '%$cabang%' and req.unit like '%$unit%' and (req.tglreq BETWEEN '$awal' and '$akhir') ";
    $hasilx2=mysqli_query($conn,$sqlx2);
    $row=mysqli_fetch_assoc($hasilx2);
    echo mysqli_real_escape_string($conn, $row['data']); ?>

             </td>

             <td><?php  $kode = $fill['kode'];
            $sqlx2="SELECT SUM(reqdata.disetujui) AS data1 FROM req inner join reqdata on req.nota=reqdata.nota where reqdata.kode='$kode' and req.cabang like '%$cabang%' and req.unit like '%$unit%' and (req.tglreq BETWEEN '$awal' and '$akhir') ";
    $hasilx2=mysqli_query($conn,$sqlx2);
    $row=mysqli_fetch_assoc($hasilx2);
    echo mysqli_real_escape_string($conn, $row['data1']); ?>

             </td>

            <td><?php  $kode = $fill['kode'];
            $sqlx2="SELECT MIN(reqdata.stok) AS data FROM req inner join reqdata on req.nota=reqdata.nota where reqdata.kode='$kode' and req.cabang like '%$cabang%' and req.unit like '%$unit%' and (req.tglreq BETWEEN '$awal' and '$akhir') ";
    $hasilx2=mysqli_query($conn,$sqlx2);
    $row=mysqli_fetch_assoc($hasilx2);
    echo mysqli_real_escape_string($conn, $row['data']); ?>

             </td>

             <td><?php  $kode = $fill['kode'];
            $sqlx2="SELECT MAX(reqdata.stok) AS data FROM req inner join reqdata on req.nota=reqdata.nota where reqdata.kode='$kode' and req.cabang like '%$cabang%' and req.unit like '%$unit%' and (req.tglreq BETWEEN '$awal' and '$akhir') ";
    $hasilx2=mysqli_query($conn,$sqlx2);
    $row=mysqli_fetch_assoc($hasilx2);
    echo mysqli_real_escape_string($conn, $row['data']); ?>

             </td>
                      <td>
                      
                          </td></tr><?php
                    ;
                }

                ?>
                  </tbody></table>
 <div align="right"><?php if($tcount>=$rpp){ echo paginate_one($reload, $page, $tpages);}else{} ?></div>
         <?php
            }

        }

    } else {
        while(($count<$rpp) && ($i<$tcount)) {
            mysqli_data_seek($result,$i);
            $fill = mysqli_fetch_array($result);
            ?>
                      <tbody>
<tr>
                      
            <td><?php  echo mysqli_real_escape_string($conn, $fill['cabang']); ?></td>
            <td><?php  echo mysqli_real_escape_string($conn, $fill['unit']); ?></td>
            <td><?php  echo mysqli_real_escape_string($conn, $fill['nama']); ?></td>
            <td><?php  $kode = $fill['kode'];
            $sqlx2="SELECT SUM(reqdata.jumlah) AS data FROM req inner join reqdata on req.nota=reqdata.nota where reqdata.kode='$kode' and req.cabang like '%$cabang%' and req.unit like '%$unit%' and (req.tglreq BETWEEN '$awal' and '$akhir') ";
    $hasilx2=mysqli_query($conn,$sqlx2);
    $row=mysqli_fetch_assoc($hasilx2);
    echo mysqli_real_escape_string($conn, $row['data']); ?>

             </td>

             <td><?php  $kode = $fill['kode'];
            $sqlx2="SELECT SUM(reqdata.disetujui) AS data1 FROM req inner join reqdata on req.nota=reqdata.nota where reqdata.kode='$kode' and req.cabang like '%$cabang%' and req.unit like '%$unit%' and (req.tglreq BETWEEN '$awal' and '$akhir') ";
    $hasilx2=mysqli_query($conn,$sqlx2);
    $row=mysqli_fetch_assoc($hasilx2);
    $keluar = $row['data1'];
    echo mysqli_real_escape_string($conn, $row['data1']); ?>

             </td>

            <td><?php  $kode = $fill['kode'];
            $sqlx2="SELECT MIN(reqdata.stok) AS data2 FROM req inner join reqdata on req.nota=reqdata.nota where reqdata.kode='$kode' and req.cabang like '%$cabang%' and req.unit like '%$unit%' and (req.tglreq BETWEEN '$awal' and '$akhir') ";
    $hasilx2=mysqli_query($conn,$sqlx2);
    $row=mysqli_fetch_assoc($hasilx2);
    $base = $row['data2'];
    echo mysqli_real_escape_string($conn, $row['data2']); ?>

             </td>

             <td> <?php $selisih = $base - $keluar; 
                    echo mysqli_real_escape_string($conn, $selisih);             ?> 

             </td>
            <td>
                      

                     

             
                     </td></tr>
            <?php
            $i++;
            $count++;
        }

        ?>
                  </tbody></table>
                  <div align="right"><?php if($tcount>=$rpp){ echo paginate_one($reload, $page, $tpages);}else{} ?></div>
    <?php } ?>
<div align="right"  style="padding-right:15px"  class="no-print" id="no-print" >
             <div align="left" class="no-print" id="no-print"> 
               <a onclick="window.location.href='rekap_cabang_csv?cabang=<?php echo $cabang;?>&awal=<?php echo $awal;?>&akhir=<?php echo $akhir;?>'" class="btn btn-default btn-flat" value="export excel"><span class="glyphicon glyphicon-save-file"></span></a>
               </div> <br/>
             </div>
                               </div>
                                <!-- /.box-body -->
                            </div>

                            <?php } else {} ?>


        </div>

                                <!-- /.box-body -->
                            </div>



                        </div>

<?php
} else {
?>
   <div class="callout callout-danger">
    <h4>Info</h4>
    <b>Hanya user tertentu yang dapat mengakses halaman <?php echo $dataapa;?> ini .</b>
    </div>
    <?php
}
?>
                        <!-- ./col -->
                    </div>

                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <!-- /.Left col -->
                    </div>
                    <!-- /.row (main row) -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <?php  footer(); ?>
            <div class="control-sidebar-bg"></div>
        </div>
          <!-- ./wrapper -->

<!-- Script -->
    <script src='jquery-3.1.1.min.js' type='text/javascript'></script>

    <!-- jQuery UI -->
    <link href='jquery-ui.min.css' rel='stylesheet' type='text/css'>
    <script src='jquery-ui.min.js' type='text/javascript'></script>

<script src="dist/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>

        <script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
        <script src="dist/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="dist/plugins/morris/morris.min.js"></script>
        <script src="dist/plugins/sparkline/jquery.sparkline.min.js"></script>
        <script src="dist/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="dist/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="dist/plugins/knob/jquery.knob.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
        <script src="dist/plugins/daterangepicker/daterangepicker.js"></script>
        <script src="dist/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script src="dist/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
        <script src="dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="dist/plugins/fastclick/fastclick.js"></script>
        <script src="dist/js/app.min.js"></script>
        <script src="dist/js/demo.js"></script>
    <script src="dist/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="dist/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="dist/plugins/fastclick/fastclick.js"></script>
    <script src="dist/plugins/select2/select2.full.min.js"></script>
    <script src="dist/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="dist/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="dist/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <script src="dist/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="dist/plugins/iCheck/icheck.min.js"></script>

<!--fungsi AUTO Complete-->
<!-- Script -->
    <script type='text/javascript' >
    $( function() {
  
        $( "#barcode" ).autocomplete({
            source: function( request, response ) {
                
                $.ajax({
                    url: "server.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: request.term
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function (event, ui) {
                $('#nama').val(ui.item.label);
                $('#barcode').val(ui.item.value); // display the selected text
                $('#hargajual').val(ui.item.hjual);
                $('#stok').val(ui.item.sisa); // display the selected text
                $('#hargabeli').val(ui.item.hbeli);
                $('#jumlah').val(ui.item.jumlah);
                $('#kode').val(ui.item.kode); // save selected id to input
                return false;
                
            }
        });

        // Multiple select
        $( "#multi_autocomplete" ).autocomplete({
            source: function( request, response ) {
                
                var searchText = extractLast(request.term);
                $.ajax({
                    url: "server.php",
                    type: 'post',
                    dataType: "json",
                    data: {
                        search: searchText
                    },
                    success: function( data ) {
                        response( data );
                    }
                });
            },
            select: function( event, ui ) {
                var terms = split( $('#multi_autocomplete').val() );
                
                terms.pop();
                
                terms.push( ui.item.label );
                
                terms.push( "" );
                $('#multi_autocomplete').val(terms.join( ", " ));

                // Id
                var terms = split( $('#selectuser_ids').val() );
                
                terms.pop();
                
                terms.push( ui.item.value );
                
                terms.push( "" );
                $('#selectuser_ids').val(terms.join( ", " ));

                return false;
            }
           
        });
    });

    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }

    </script>

<!--AUTO Complete-->

<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy/mm/dd"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("yyyy-mm-dd", {"placeholder": "yyyy/mm/dd"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'YYYY/MM/DD h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Hari Ini': [moment(), moment()],
            'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Akhir 7 Hari': [moment().subtract(6, 'days'), moment()],
            'Akhir 30 Hari': [moment().subtract(29, 'days'), moment()],
            'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
            'Akhir Bulan': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

   //Date picker 
   $('#datepicker').datepicker('update', new Date());

    $('#datepicker').datepicker({
      autoclose: true
    });

   $('.datepicker').datepicker({
    dateFormat: 'dd-mm-yyyy'
 });

   //Date picker 2
   $('#datepicker2').datepicker('update', new Date());

    $('#datepicker2').datepicker({
      autoclose: true
    });

   $('.datepicker2').datepicker({
    dateFormat: 'yyyy-mm-dd'
 });


    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script>
</body>
</html>
