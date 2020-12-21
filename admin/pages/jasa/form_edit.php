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
                  <h4>Menu Jasa</h4>
                  <div class="card-header-action">
                    <a href="main.php" class="btn btn-danger">Kembali Ke Data Jasa <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body">

                <?php
                include '../../lib/koneksi.php';
                $id = $_GET['id'];
                $data = mysqli_query($koneksi,"select * from tb_jasa where id_jasa='$id'");
                while($q=mysqli_fetch_array($data)){
              ?>

                <form action="edit.php" method="POST">
                    <div class="form-group">
                      <label>Nama Kategori</label>
                      <input type="hidden" name="id" value="<?php echo $q['id_jasa']; ?>">
                      <input type="text" class="form-control" name="nama_jasa" value="<?= $q['nama_jasa']; ?>">
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