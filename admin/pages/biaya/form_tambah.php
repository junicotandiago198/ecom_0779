<?php 
include "../../header.php";
?>

 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
        
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Menu Pelanggan</h4>
                  <div class="card-header-action">
                    <a href="main.php" class="btn btn-danger">Kembali Ke Data Produk <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body">

                <form action="simpan_biaya.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                      <label>List Jasa</label>
                      <select class="form-control" name="jasa">
                      <option value="">Pilih Jasa</option>
                      <?php
                      include "../../lib/koneksi.php";
                      $QueryJasa = mysqli_query($koneksi, "SELECT * FROM tb_jasa");
                      while ($jasa = mysqli_fetch_array($QueryJasa)) {
                        ?>
                        <option value="<?= $jasa['id_jasa']; ?>"><?= $jasa['nama_jasa']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>List Kota</label>
                      <select class="form-control" name="kota">
                      <option value="">Pilih Kota</option>
                      <?php
                      include "../../lib/koneksi.php";
                      $QueryKota = mysqli_query($koneksi, "SELECT * FROM tb_kota");
                      while ($kota = mysqli_fetch_array($QueryKota)) {
                        ?>
                        <option value="<?= $kota['id_kota']; ?>"><?= $kota['nama_kota']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Biaya</label>
                      <input type="text" class="form-control" name="biaya" value="0">
                    </div>    
                    
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                  </form>
              </div>
            </div>
          
          </div>
        </section>
      </div>

<?php 
include "../../footer.php"
?>