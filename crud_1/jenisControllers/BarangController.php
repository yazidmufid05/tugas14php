<?php
    require_once '../models/dbkoneksi.php';
    require_once 'class_produk.php';

    // tangkap request element form
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $kondisi = $_POST['kondisi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $idjenis = $_POST['jenis'];
    $foto = $_POST['foto'];
    $tombol = $_POST['submit'];

    // Menyimpan data diatas ke sebuah array
    $data = [
        $kode,      // ? 1
        $nama,      // ? 2
        $kondisi,   // ? 3
        $harga,     // ? 4
        $stok,      // ? 5
        $idjenis,   // ? 6
        $foto       // ? 7
    ];

    // // proses
    // $obj = new Produk($dbh);
    // $obj->simpan($data);

    // proses
    $obj = new JenisProduk($dbh);
    // $obj->simpan($data);
    //proses edit & hapus
    switch ($tombol) {
        case 'simpan';
            $obj->simpan($data);
            break;
        case 'ubah';
            $data[] = $_POST['idx']; //tangkap hidden field u/ ? ke-8
            $obj->ubah($data);
            break;
        case 'hapus';
        $id[] = $_POST['idx']; //tangkap ke-1 where id=?
        $obj->hapus($id);
        break;  
        default://tombol batal
        header('Location:http://localhost/Latihan_PHP/crud_1/jenis_index.php?hal=DataBarang');
            break;
    }

    // Landing Page
    header('Location://localhost/Latihan_PHP/p13/crud_1/jenis_index.php');

?>