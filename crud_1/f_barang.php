<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Barang</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <!-- /.row -->
        <!-- Main row -->
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Barang</h3>
                <br>
                <a class="btn mt-2" style="background-color:#17a2b8; color:#ffffff" href="index.php"><i class="fa fa-arrow-left nav-icon mr-2"></i>Back</a>
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
                
                ?>
                <form method="POST" action="controllers/BarangController.php">
                    <div class="form-group row">
                        <label for="kode" class="col-4 col-form-label">Kode</label> 
                        <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-american-sign-language-interpreting"></i>
                            </div>
                            </div> 
                            <input id="kode" name="kode" type="text" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-4 col-form-label">Nama Barang</label> 
                        <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-archive"></i>
                            </div>
                            </div> 
                            <input id="nama" name="nama" type="text" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-4">Kondisi</label> 
                        <div class="col-8">
                        <?php 
                            $no = 0;
                            foreach($ar_kondisi as $kondisi){
                        ?>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input name="kondisi" id="kondisi_<?= $no ?>" type="radio" class="custom-control-input" value="<?= $kondisi ?>" required="required"> 
                                <label for="kondisi_<?= $no ?>" class="custom-control-label"><?= $kondisi ?></label>
                            </div>
                        <?php 
                            $no++;
                            }
                        ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="harga" class="col-4 col-form-label">Harga</label> 
                        <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-money"></i>
                            </div>
                            </div> 
                            <input id="harga" name="harga" type="text" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-4 col-form-label">Stok</label> 
                        <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-bars"></i>
                            </div>
                            </div> 
                            <input id="stok" name="stok" type="text" class="form-control">
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis" class="col-4 col-form-label">Jenis Barang</label> 
                        <div class="col-8">
                        <select id="jenis" name="jenis" class="custom-select">
                        <option value="">-- Pilih Jenis --</option>
                            <?php 
                            foreach($rs as $j){
                            ?>
                            <option value="<?= $j->id; ?>"><?= $j->nama; ?></option>
                            <?php } ?>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto" class="col-4 col-form-label">Foto</label> 
                        <div class="col-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fa fa-image"></i>
                            </div>
                            </div> 
                            <input id="foto" name="foto" type="text" class="form-control">
                        </div>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <div class="offset-4 col-8">
                        <button name="submit" type="submit" value="simpan" class="btn btn-primary">Submit</button>
                        <input type="hidden" name="idx" value="<?= $id ?>" />
                        </div>
                    </div>
                </form>             
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->