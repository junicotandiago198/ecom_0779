<?php 
include "../../header.php";
?>

 <!-- Main Content -->
 <div class="main-content">
        <section class="section">
        
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4>Menu Pelanggan</h4>
                  <div class="card-header-action">
                    <a href="form_tambah.php" class="btn btn-danger">Tambah Admin <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">

                  <?php 
                  $no = 1;
                  $sql = "SELECT * FROM tb_user";
                  $q = mysqli_query ($koneksi, $sql);
                  ?> 
                    <table class="table table-striped">
                      <tr>
                        <th>ID User</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>

                      <?php 
                      while($data=mysqli_fetch_array($q)) {
                      ?>

                      <tr>
                        <td><?= $no++; ?></td>
                        <td class="font-weight-600"><?= $data['nama']; ?></td>
                        <td class="font-weight-600"><?= $data['email']; ?></td>
                        <td class="font-weight-600"><?= $data['password']; ?></td>
                        <td>
                      <?php
                      $status = $data['status'];
                      if ($status == "1") { ?>
                        <label class="badge badge-info">Admin</label>
                      <?php } else if ($status == "2") { ?>
                        <label class="badge badge-warning">Pegawai</label>
                      <?php } else if ($status == "3") { ?>
                        <label class="badge badge-danger">Pelanggan</label>
                      <?php } ?>
                      
                    </td>
                        <td>
                          <a href="form_edit.php?id=<?= $data['id_user']; ?>"class="btn btn-primary">Edit</a>
                          <a href="hapus.php?id=<?= $data['id_user']; ?>"onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"
                          class="btn btn-danger">Hapus</a>
                        </td>
                      </tr>

                      <?php } ?>
                    
                    </table>
                  </div>
                </div>
              </div>
            </div>
          
          </div>
        </section>
      </div>
<?php 
include "../../footer.php"
?>