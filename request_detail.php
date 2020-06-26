<!DOCTYPE html>
<html>
<?php
include "configuration/config_etc.php";
include "configuration/config_include.php";
etc();encryption();session();connect();head();body();timing();
//alltotal();
pagination();
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
                <section class="content">
                    <div class="row">
                      <div class="col-lg-12">
<!-- SETTING START-->

<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "configuration/config_chmod.php";
$halaman = "proses_request"; // halaman
$dataapa = "Request"; // data
$nota = $_GET['nota'];
$chmod = 5; // Hak akses Menu


$forward = mysqli_real_escape_string($conn, $tabeldatabase); // tabel database
$forwardpage = mysqli_real_escape_string($conn, $halaman); // halaman

?>

<?php
if(isset($_POST["simpan"])){
$nota = mysqli_real_escape_string($conn, $_POST["nota"]);
$status = mysqli_real_escape_string($conn, $_POST["status"]);

$sqly= "UPDATE req set status='$status' where nota='$nota' ";
if (mysqli_query($conn,$sqly)){

  echo "<script type='text/javascript'>  alert('Berhasil, Request telah disetujui!'); </script>";
               echo "<script type='text/javascript'>window.location = 'request';</script>";
} else{

   echo "<script type='text/javascript'>  alert('Gagal, Pastikan input anda sudah benar!'); </script>";
               echo "<script type='text/javascript'>window.location = 'proses_request?nota=$nota';</script>";
}
} else if(isset($_POST["tolak"])){
$nota = mysqli_real_escape_string($conn, $_POST["nota"]);
$status = mysqli_real_escape_string($conn, $_POST["status"]);

$sqly= "UPDATE req set status='$status' where nota='$nota' ";
$updt = mysqli_query($conn, $sqly);
 echo "<script type='text/javascript'>  alert('Request telah ditolak!'); </script>";
               echo "<script type='text/javascript'>window.location = 'request';</script>";
}
?>

<!-- SETTING STOP -->


<!-- BREADCRUMB -->

<ol class="breadcrumb ">
<li><a href="index.php">Dashboard </a></li>
<li><a href="request">Request</a></li>
<?php

if ($nota != null || $nota != "") {
?>
  <li class="active"><?php
    echo $nota;
?></li>
  <?php
} else {
?>
  <?php
}
?>
</ol>

<!-- BREADCRUMB -->

<!-- BOX HAPUS BERHASIL -->

         <script>
 window.setTimeout(function() {
    $("#myAlert").fadeTo(500, 0).slideUp(1000, function(){
        $(this).remove();
    });
}, 5000);
</script>

                            <?php
$hapusberhasil = $_GET['hapusberhasil'];

if ($hapusberhasil == 1) {
?>
    <div id="myAlert"  class="alert alert-success alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> Jumlah disetujui telah berhasil diupdate dari Data <?php echo $dataapa;?>.
</div>

<!-- BOX HAPUS BERHASIL -->
<?php
} elseif ($hapusberhasil == 2) {
?>
           <div id="myAlert" class="alert alert-danger alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal!</strong> jumlah disetujui gagal diupdate, periksa kembali input anda .
</div>
<?php
} elseif ($hapusberhasil == 3) {
?>
           <div id="myAlert" class="alert alert-danger alert-dismissible fade in" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Gagal!</strong> Hanya user tertentu yang dapat mengupdate Data <?php echo $dataapa;?> .
</div>
<?php
}

?>
       <!-- BOX INFORMASI -->
    <?php
if ($chmod == '1' || $chmod == '2' || $chmod == '3' || $chmod == '4' || $chmod == '5' || $_SESSION['jabatan'] == 'admin') {
} else {
?>
   <div class="callout callout-danger">
    <h4>Info</h4>
    <b>Hanya user tertentu yang dapat mengakses halaman <?php echo $dataapa;?> ini .</b>
    </div>
    <?php
}
?>

<?php
if ($chmod >= 1 || $_SESSION['jabatan'] == 'admin') {
?>

<?php

       $sqlx2= "SELECT COUNT(kode) as data FROM reqdata where nota= '$note' ";
                $hasilx2=mysqli_query($conn,$sqlx2);
                  $row=mysqli_fetch_assoc($hasilx2);
                  $datax1=$row['data'];

    $sqla="SELECT * FROM req where nota='$nota'";
$hasila=mysqli_query($conn,$sqla);
$rowa=mysqli_fetch_assoc($hasila);
$tanggal=$rowa['tglreq'];
$user=$rowa['user'];
$cabang=$rowa['cabang'];
$unit=$rowa['unit'];
$keterangan=$rowa['keterangan'];
$status=$rowa['status'];


$sqla="SELECT * FROM user where userna_me='$user'";
$hasila=mysqli_query($conn,$sqla);
$rowax=mysqli_fetch_assoc($hasila);
$namakasir=$rowax['nama'];
?>
                           <div class="box">
            <div class="box-header">
            <h3 class="box-title">Data <?php echo $forward ?>  <span class="label label-default"><?php echo $nota; ?></span> <span class="label label-warning"><?php echo $cabang; ?></span> <span class="label label-success"><?php echo $unit; ?></span>
              <span class="label label-info"><?php echo $namakasir; ?></span>
                    </h3>



            </div>

                                <!-- /.box-header -->
                                  <!-- /.Paginasi -->
                                 <?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    if($nota != null || $nota != ""){
    $sql    = "select * from req where nota='$nota' order by no ";
  }else{
    error_reporting(0);
  }
    $result = mysqli_query($conn, $sql);
    $rpp    = 100;
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
                            <div class="box-body table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                              <th>No Req</th>
                                              <th>tanggal</th>
                                              <th>Nama User</th>
                                              <th>Jumlah</th>
                                              <th>Keterangan</th>
                                                <?php   if (($chmod >= 3 || $_SESSION['jabatan'] == 'admin')) { ?>
                                                <th>Status</th>
                                                <th>Approval</th>
                                                <?php }else{} ?>
                                            </tr>
                                        </thead>
                                          <?php
    error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
   
        while(($count<$rpp) && ($i<$tcount)) {
            mysqli_data_seek($result,$i);
            $fill = mysqli_fetch_array($result);
            ?>
                      <tbody>
<tr>
  
  <td><?php  echo mysqli_real_escape_string($conn, $fill['nota']); ?></td>
  <td><?php 
          $awal1 = preg_replace("/(\d+)\D+(\d+)\D+(\d+)/","$3-$2-$1",$fill['tglreq']);
          
          ?>
    <?php  echo mysqli_real_escape_string($conn, $awal1); ?></td>
  <td><?php  echo mysqli_real_escape_string($conn, $fill['user']); ?></td>
  <td>
              <?php $note=$fill['nota'];
              $sqlx2= "SELECT COUNT(kode) as data FROM reqdata where nota= '$note' ";
                $hasilx2=mysqli_query($conn,$sqlx2);
                  $row=mysqli_fetch_assoc($hasilx2);
                  $datax1=$row['data'];
                    ?>
                  <?php  echo mysqli_real_escape_string($conn, $datax1); ?>

            </td>
  <td><?php  echo mysqli_real_escape_string($conn, $fill['keterangan']); ?></td>
  
  <?php if($id!='1'){ ?>
  <td>

                     <?php  if ($chmod >= 1 || $_SESSION['jabatan'] == 'admin') { ?>
             <?php  echo mysqli_real_escape_string($conn, $fill['status']); ?>
             <td><?php  echo mysqli_real_escape_string($conn, $fill['approve']); ?></td>
                     <?php } else {}?>

             
                     </td>
<?php }else{} ?>
         </tr>
            <?php
            $i++;
            $count++;
        }

        ?>
                  </tbody></table>
                  <div align="right"><?php if($tcount>=$rpp){ echo paginate_one($reload, $page, $tpages);}else{} ?></div>


                               </div>
                                <!-- /.box-body -->
                            </div>

                            <?php } else {} ?>
                        </div>
                        <!-- ./col -->
                    </div>

                    <div class="row">
            <div class="col-lg-12">
              <div class="box">
       <div class="box-header">
       <h3 class="box-title">Daftar Request Barang No: <?php echo '#'.$_GET['nota'];?>
       <span class="label label-danger"><?php echo $status; ?></span>
       </h3>
       </div>
         <div class="box-body table-responsive">

                   <!-- /.Paginasi -->
                                 <?php
    error_reporting(E_ALL ^ E_DEPRECATED);
   
    $sql    = "select * from reqdata where nota='$nota' order by no ";
      $result = mysqli_query($conn, $sql);
    $rpp    = 100;
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
                            <div class="box-body table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                              <th>No</th>
                                              <th>Kode Barang</th>
                                              <th>Nama</th>
                                              <th>Jumlah Req</th>
                                              <th>Disetujui</th>
                                              
                        <?php if (($chmod >= 3 || $_SESSION['jabatan'] == 'admin')) { ?>
                                                
                        <?php }else{} ?>
                                            </tr>
                                        </thead>
                                          <?php
    
    while(($count<$rpp) && ($i<$tcount)) {
      mysqli_data_seek($result,$i);
      $fill = mysqli_fetch_array($result);
      ?>
                      <tbody>
<tr>
  <td><?php echo ++$no_urut;?></td>
  <td><?php  echo mysqli_real_escape_string($conn, $fill['kode']); ?></td>
  <td><?php  echo mysqli_real_escape_string($conn, $fill['nama']); ?></td>
  <td><?php  echo mysqli_real_escape_string($conn, $fill['jumlah']); ?></td>
  <td><?php  echo mysqli_real_escape_string($conn, $fill['disetujui']); ?></td>

  
  
  <?php if($nota!="" || $nota != null){ ?>
  <td>

           <?php  if ($chmod >= 4 || $_SESSION['jabatan'] == 'admin') { ?>
             
             <?php } else {}?>

             
           </td>
<?php }else{} ?>
         </tr>
      <?php
      $i++;
      $count++;
    }

    ?>
                  </tbody></table>
          <div align="right"><?php if($tcount>=$rpp){ echo paginate_one($reload, $page, $tpages);}else{} ?></div>



         </div>
     </div>


            </div>

          </div>
                    

         
        <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                    </div>
                    <!-- /.row (main row) -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
           <?php footer();?>
            <div class="control-sidebar-bg"></div>
        </div>

  <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Jumlah Barang Disetujui</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                </div>
            </div>
        </div>
    </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'fetch.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script>

        <!-- ./wrapper -->
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
        <script src="dist/js/pages/dashboard.js"></script>
        <script src="dist/js/demo.js"></script>
        <script src="dist/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="dist/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="dist/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="dist/plugins/fastclick/fastclick.js"></script>

    </body>
</html>
