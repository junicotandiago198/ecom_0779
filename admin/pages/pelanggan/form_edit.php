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
                    <a href="main.php" class="btn btn-danger">Kembali Ke Data Admin <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body">

                <?php
                include '../../lib/koneksi.php';
                $id = $_GET['id'];
                $data = mysqli_query($koneksi,"select * from tb_user where id_user='$id'");
                while($d=mysqli_fetch_array($data)){
                    ?>

                <form action="edit.php" method="POST">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="hidden" name="id" value="<?php echo $d['id_user']; ?>">
                      <input type="text" class="form-control" name="nama" value="<?= $d['nama']; ?>">
                    </div>    
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" name="email" value="<?= $d['email']; ?>">
                    </div>          
                    <div class="form-group">
                      <label>Password</label>
                      <input type="text" class="form-control" name="password" value="<?= $d['password']; ?>">
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