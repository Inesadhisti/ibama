<?php
    
    // membuat koneksi
    include "configuration/config_connect.php";
    
    // melakukan pengecekan koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    } 

    if($_POST['rowid']) {
        $id = $_POST['rowid'];
        // mengambil data berdasarkan id
        // dan menampilkan data ke dalam form modal bootstrap
$sqla="SELECT * FROM reqdata where no ='$id'";
$hasila=mysqli_query($conn,$sqla);
$rowax=mysqli_fetch_assoc($hasila);
$barang=$rowax['kode'];

        
        $sqla="SELECT sisa,terjual FROM barang where kode='$barang'";
$hasila=mysqli_query($conn,$sqla);
$rowax=mysqli_fetch_assoc($hasila);
$sisa=$rowax['sisa'];
$terjual=$rowax['terjual'];


        $sql = "SELECT * FROM reqdata WHERE no = $id";
        $result = $conn->query($sql);
        

        foreach ($result as $baris) { ?>


        <form action="disetujui.php" method="post">
            <input type="hidden" name="no" value="<?php echo $baris['no']; ?>">
            <input type="hidden" name="nota" value="<?php echo $baris['nota']; ?>">
            <input type="hidden" name="kode" value="<?php echo $barang; ?>">
            <input type="hidden" name="terjual" value="<?php echo $terjual; ?>">

            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" class="form-control" name="nama_barang" value="<?php echo $baris['nama']; ?>" readonly>
            </div>
<?php 
           
?>

<?php
$decimal ="0";
$a_decimal =",";
$thousand =".";
?>
             <div class="form-group">
                <label>Stok dipusat</label>
                 <input type="hidden" class="form-control" name="stok" value="<?php  echo $sisa; ?>" readonly>

                <input type="text" class="form-control" name="stok1" value="<?php  echo number_format(($sisa), $decimal, $a_decimal, $thousand).''; ?>" readonly>
            </div>
           <div class="form-group">
                <label>Jumlah Request</label>
                <input type="hidden" class="form-control" name="jumlah" value="<?php echo $baris['jumlah']; ?>" readonly>
                <input type="text" class="form-control" name="jumlah1" value="<?php  echo number_format(($baris['jumlah']), $decimal, $a_decimal, $thousand).''; ?>" readonly>
            </div>

            <div class="form-group">
                <label>Jumlah Disetujui</label>
                <input type="text" class="form-control" name="disetujui" value="<?php echo $baris['disetujui']; ?>">
            </div>
              <button class="btn btn-primary" type="submit">Update</button>
        </form>
        
        <?php } }
    $conn->close();
?>