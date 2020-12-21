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
                <?php
                include "../../lib/koneksi.php";
                $id = $_GET['id'];
                $QueryProduk = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id_produk ='$id'");
                while($p=mysqli_fetch_array($QueryProduk)){
                ?>

                <form action="edit.php" method="POST">
                <div class="form-group">
                      <label>Kategori</label>
                      <select class="form-control" name="kategori">
                      <option value="">Pilih Kategori</option>
                      <?php
                      include "../../lib/koneksi.php";
                      $QueryKategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
                      while ($kategori = mysqli_fetch_array($QueryKategori)) {
                        ?>
                        <option value="<?= $kategori['id_kategori']; ?>"><?= $kategori['nama_kategori']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Nama Produk</label>
                      <input type="hidden" name="id" value="<?php echo $p['id_produk']; ?>">
                      <input type="text" class="form-control" name="nama_produk" value="<?= $p['nama_produk']; ?>">
                    </div>    
                    <div class="form-group">
                      <label>Deskripsi</label>
                      <input type="text" class="form-control" name="deskripsi" value="<?= $p['deskripsi']; ?>">
                    </div>          
                    <div class="form-group">
                      <label>Harga</label>
                      <input type="text" class="form-control" name="harga" value="<?= $p['harga']; ?>">
                    </div>   
                    <div class="form-group">
                      <label>Gambar</label>
                      <input type="text" class="form-control" name="gambar" value="<?= $p['gambar']; ?>">
                    </div>    
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
include "../../footer.php"
?>