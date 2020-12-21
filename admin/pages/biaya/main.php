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
                  <h4>Menu Biaya Kirim</h4>
                  <div class="card-header-action">
                    <a href="form_tambah.php" class="btn btn-danger">Tambah Biaya <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">

                  <?php 
                  $no = 1;
                  $sql = "SELECT * FROM tb_biaya_kirim tbk INNER JOIN tb_kota k on tbk.id_kota = k.id_kota INNER JOIN tb_jasa tj on tbk.id_jasa = tj.id_jasa";
                  $q = mysqli_query ($koneksi, $sql);
                  ?> 
                    <table class="table table-striped">
                      <tr>
                        <th>ID Biaya</th>
                        <th>Kota</th>
                        <th>Biaya</th>
                        <th>Jasa</th>
                        <th>Action</th>
                      </tr>

                      <?php 
                      while($data=mysqli_fetch_array($q)) {
                      ?>

                      <tr>
                        <td><?= $no++; ?></td>
                        <td class="font-weight-600"><?= $data['nama_kota']; ?></td>
                        <td class="font-weight-600">Rp.<?= number_format($data['biaya']); ?></td>
                        <td class="font-weight-600"><?= $data['nama_jasa']; ?></td>
                        <td>
                          <a href="form_edit.php?id=<?= $data['id_biaya_kirim']; ?>"class="btn btn-primary">Edit</a>
                          <a href="hapus.php?id=<?= $data['id_biaya_kirim']; ?>"onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"
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