<?php
include "configuration/config_connect.php";
include "configuration/config_chmod.php";
$nouser= $_SESSION['nouser'];
$user= "SELECT * FROM user WHERE no='$nouser' ";
$query = mysqli_query($conn, $user);
$row  = mysqli_fetch_assoc($query);
$nama = $row['nama'];
$jabatan = $row['jabatan'];
$avatar = $row['avatar'];
?>
 <aside class="main-sidebar">

                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php  echo $avatar; ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php  echo $nama; ?></p>
                            
                            
                        </div>
                    </div>
<br>
                             <ul class="sidebar-menu">
                       <!-- <li class="header">MENU UTAMA</li> -->
                        <li class="treeview">
                            <a href="index"> <i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>

                        </li>



<?php

if($chmenu4 >= 1 || $_SESSION['jabatan'] == 'admin'){ ?>

                        <li class="treeview">
                            <a href="#"> <i class="glyphicon glyphicon-th-list"></i> <span>Barang</span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i> </span> </a>
               <ul class="treeview-menu">
                                <li>
                                    <a href="barang"><i class="fa fa-circle-o"></i>Data Barang</a>
                                </li>
                      <?php           if($chmenu4 >= 2 || $_SESSION['jabatan'] == 'admin'){ ?>
                                      <li>
                                    <a href="add_barang"><i class="fa fa-circle-o"></i>Tambah Barang</a>
                                                  </li>
                                       <?php } ?>

                            </ul>
                        </li>



<?php }else{}

if($chmenu5 >= 1 || $_SESSION['jabatan'] == 'admin'){ ?>

                        <li class="treeview">
                            
               <ul class="treeview-menu">
 <!--                               <li>
                                    <a href="add_req"><i class="fa fa-circle-o"></i>Tambah Request</a>
                                </li>
  -->
                                    

                                                   </ul>
                        </li>

    <?php }else{}

if($chmenu6 >= 1 && $_SESSION['jabatan'] != 'admin'){ ?>

                        <li class="treeview">
                            <a href="#"> <i class="glyphicon glyphicon-th-list"></i> <span>Request</span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i> </span> </a>
               <ul class="treeview-menu">

                

                                   <li>
                                    <a href="add_minta"><i class="fa fa-circle-o"></i>Tambah</a>
                                                  </li>
                                                
                                        <li>
                                    <a href="user_request"><i class="fa fa-circle-o"></i>Data Request</a>
                                                  </li>

                            </ul>
                        </li>

    <?php }else{}

if($chmenu7 >= 1 || $_SESSION['jabatan'] == 'admin'){ ?>

                        <li class="treeview">
                            <a href="#"> <i class=" glyphicon glyphicon-stats"></i> <span>Data</span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i> </span> </a>
               <ul class="treeview-menu">
   <!--             
                                <li>
                                    <a href="rekap"><i class="fa fa-circle-o"></i>Rekap by Unit</a>
                                </li>

-->
                                  
                                  <li>
                                    <a href="request"><i class="fa fa-circle-o"></i>Request</a>
                                </li>
                                <li>
                                    <a href="rekap_cabang"><i class="fa fa-circle-o"></i>Rekap</a>
                                </li>


                            </ul>
                        </li>


<?php }else{}
              if($chmenu8 >= 1 || $_SESSION['jabatan'] == 'admin'){ ?>

    <li class="treeview">
          <a href="#"> <i class="glyphicon glyphicon-inbox"></i> <span>Stok Barang</span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i> </span> </a>
            <ul class="treeview-menu">
                <li>
                    <a href="stok_barang"><i class="fa fa-circle-o"></i>Data Stok</a>
                  </li>
                  
                  <li>
                      <a href="stok_masuk"><i class="fa fa-circle-o"></i>Stok Masuk</a>
                    </li>
                 
                    
                     <li>
                        <a href="stok_menipis"><i class="fa fa-circle-o"></i>Stok Menipis</a>
                      </li>

                </ul>
              </li>






<?php }else{}
if($chmenu2 >= 1 || $_SESSION['jabatan'] == 'admin'){ ?>

                        <li class="treeview">
                            <a href="#"> <i class="glyphicon glyphicon-folder-close"></i> <span>Unit&Cabang</span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i> </span> </a>
               <ul class="treeview-menu">
                                <li>
                                    <a href="cabang"><i class="fa fa-circle-o"></i>Data Cabang</a>
                                </li>

                                 <li>
                                    <a href="unit_kerja"><i class="fa fa-circle-o"></i>Data Unit</a>
                                </li>

                            </ul>
                        </li>
<?php }else{}



if($chmenu3 >= 1 || $_SESSION['jabatan'] == 'admin'){ ?>

                        <li class="treeview">
                            <a href="#"> <i class="glyphicon glyphicon-tag"></i> <span>Kategori Barang</span> <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i> </span> </a>
               <ul class="treeview-menu">
                                <li>
                                    <a href="kategori"><i class="fa fa-circle-o"></i>Data Kategori</a>
                                </li>
                      <?php           if($chmenu3 >= 2 || $_SESSION['jabatan'] == 'admin'){ ?>
                                  <li>
                                    <a href="add_kategori"><i class="fa fa-circle-o"></i>Tambah Kategori</a>
                                 </li>

                               <?php } ?>

                                 
                            </ul>
                        </li>


  <?php }else{}

  

if($chmenu10 >= 1 || $_SESSION['jabatan'] == 'admin'){ ?>


              <li class="treeview">
                            <a href=""> <i class="glyphicon glyphicon-cog"></i> <span>Tema</span> <span class="pull-right-container"> </span> </a>
                               <ul class="treeview-menu">

      <!--                          
                                <li>
                                    <a href="set_general"><i class="fa fa-circle-o"></i>General Setting</a>
                                </li>

       -->                         
                <li>
                <a href="set_themes"><i class="fa fa-circle-o"></i>Pengaturan Tema</a>
                               </li>

                                
                                                 
                            </ul>
                        </li>
<?php }else{} 

if($chmenu1 >= 1 || $_SESSION['jabatan'] == 'admin'){ ?>


              <li class="treeview">
                            <a href=""> <i class="glyphicon glyphicon-cog"></i> <span>User</span> <span class="pull-right-container"> </span> </a>
                               <ul class="treeview-menu">
                                <li>
                                    <a href="admin"><i class="fa fa-circle-o"></i>Pengaturan User</a>
                                </li>
<!--

                <li>
                <a href="add_jabatan"><i class="fa fa-circle-o"></i>Jabatan User</a>
                               </li>

                                                <li>
                <a href="set_chmod"><i class="fa fa-circle-o"></i>Hak Akses</a>
                                                  </li>
                                                  <li>
                <a href="license"><i class="fa fa-circle-o"></i>LISENSI</a>
                                                  </li>

-->


                            </ul>
                        </li>
<?php }else{} ?>


                    </ul>

                </section>
                <!-- /.sidebar -->
            </aside>
