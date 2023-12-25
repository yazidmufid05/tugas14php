<?php 
    include_once 'header.php';
    include_once 'sidebar.php';
?>
<?php 
    require_once 'models/dbkoneksi.php';
    include_once 'd_barang.php';
     //tangkap request menu di url (index.php?hal=.....)
     $hal = $_REQUEST['hal'];
     //jika ada request dari menu di url tampilkan hal sesuai request
     if(!empty($hal)){
         include_once $hal.'.php';
     }
     else{//jika tidak ada request dari menu di url tampilkan hal home.php
         include_once 'home.php';
     }
?>
<?php 
    include_once 'footer.php';
?>