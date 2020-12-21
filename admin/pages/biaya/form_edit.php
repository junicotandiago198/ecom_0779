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
                  <h4>Menu Kota</h4>
                  <div class="card-header-action">
                    <a href="main.php" class="btn btn-danger">Kembali Ke Data Biaya <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body">

                <?php
                include '../../lib/koneksi.php';
                $id = $_GET['id'];
                $data = mysqli_query($koneksi,"SELECT  * FROM tb_biaya_kirim WHERE id_biaya_kirim='$id'");
               while ($q=mysqli_fetch_array($data)) {
               ?>

                <form action="edit.php" method="POST">
                <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $q['id_biaya_kirim']; ?>">
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
                      <label>Biaya</label>
                      <input type="text" class="form-control" name="biaya" value="<?= $q['biaya'];?>">
                    </div>    
                    
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                  </form>
                  <?php } ?>
              </div>
            </div>
          
          </div>
        </section>
      </div>

<?php 
include "../../footer.php";
?>