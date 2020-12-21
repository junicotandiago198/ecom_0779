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
                  <h4>Menu Pembayaran</h4>
                  <div class="card-header-action">
                    <a href="main.php" class="btn btn-danger">Kembali Ke Data Pembayaran <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body">

                <?php 
                include "../../lib/koneksi.php";
                $id = $_GET['id'];
                $QueryPembayaran = mysqli_query($koneksi,"SELECT * FROM tb_pembayaran WHERE id_pembayaran='$id'");
                while($p=mysqli_fetch_array($QueryPembayaran)){
                ?>

                <form action="edit.php" method="POST">
                    <div class="form-group">
                      <label>Metode Pembayaran</label>
                      <input type="hidden" name="id" value="<?= $p['id_pembayaran']; ?>">
                      <input type="text" class="form-control" name="metode_pembayaran" value="<?= $p['metode_pembayaran']; ?>">
                    </div>    
                    <div class="form-group">
                      <label>Kode Pembayaran</label>
                      <input type="text" class="form-control" name="kode_pembayaran" value="<?= $p['kode_pembayaran'];?>">
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