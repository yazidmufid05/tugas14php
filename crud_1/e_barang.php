<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Editproduk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Data Barang PT. Sejahtera</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php 
                    require_once 'controllers/class_produk.php';
                    // ciptakan object dari class Produk
                    $ar_kondisi = ['Baru','Second'];
                    $obj = new Produk($dbh);
                    // panggil method tampilkan data produk
                    $rs = $obj->getAllJenis();
                    // tangkap request id, di url
                    $id = $_REQUEST['id'];
                    $data_edit = $obj->getProduk($id);
                ?>
                <form class="container form mt-3" action="controllers/BarangController.php" method="POST">
                        <div class="form-group row">
                            <label for="kode"  class="col-3 col-form-label">Kode</label> 
                            <div class="col-8">
                            <input id="kode" name="kode" value="<?= $data_edit->kode; ?>" type="text" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-3 col-form-label">Nama Produk</label> 
                            <div class="col-8">
                            <input id="nama" name="nama" value="<?= $data_edit->nama; ?>" type="text" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">Kondisi</label> 
                            <div class="col-8">
                            <?php 
                                $no = 0;
                                foreach($ar_kondisi as $kondisi){
                                // edit kondisi
                                $cek = ($data_edit->kondisi == $kondisi) ? "checked" : "";
                             ?>
                                <div class="custom-control custom-radio custom-control-inline">
                                <input name="kondisi" id="kondisi_<?= $no ?>" type="radio" class="custom-control-input" value="<?= $kondisi ?>" <?= $cek ?> required="required"> 
                            <label for="kondisi_<?= $no ?>" class="custom-control-label"><?= $kondisi ?></label>
                                </div>
                            <?php 
                                $no++;
                                }
                            ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga" class="col-3 col-form-label">Harga</label> 
                            <div class="col-8">
                            <input id="harga" name="harga" value="<?= $data_edit->harga; ?>" type="text" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="stok" class="col-3 col-form-label">Stok</label> 
                            <div class="col-8">
                            <input id="stok" name="stok" value="<?= $data_edit->stok; ?>" type="text" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis" class="col-3 col-form-label">Jenis Produk</label> 
                            <div class="col-8">
                            <select id="jenis" name="jenis" class="custom-select" required="required">
                                <option value="">-- Pilih Jenis --</option>
                                <?php 
                                    foreach($rs as $j){
                                    // edit jenis
                                    $sel = ($data_edit->idjenis == $j->id) ? "selected" : "";
                                ?> 
                                <option value="<?= $j->id ?>" <?= $sel ?> ><?= $j->nama ?></option>
                                <?php } ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-3 col-form-label">Foto</label> 
                            <div class="col-8">
                            <input id="foto" name="foto" value="<?= $data_edit->foto; ?>" type="text" class="form-control">
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="offset-3 col-8">
                            <button name="submit" type="submit" value="ubah" class="btn btn-primary">Update</button>
                            <input type="hidden" name="idx" value="<?= $id ?>" />
                        </div>
                        </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- 834 - 1746 -->