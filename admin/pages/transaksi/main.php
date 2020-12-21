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
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">

                  <?php 
                  $no = 1;
                  $sql = "SELECT DISTINCT invoice, total, email, tanggal FROM tb_detail_order do INNER JOIN tb_order o ON do.id_order = o.id_order
                   INNER JOIN tb_jasa k ON do.id_jasa = k.id_jasa";
                  $q = mysqli_query ($koneksi, $sql);
                  ?> 
                    <table class="table table-striped">
                      <tr>
                        <th>Invoice</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                      </tr>

                      <?php 
                      while($data=mysqli_fetch_array($q)) {
                      ?>

                      <tr>
                        <td class="font-weight-600">INV-<?=$data['invoice']; ?></td>
                        <td class="font-weight-600"><?= number_format($data['total']); ?></td>
                        <td class="font-weight-600">
                        <?php
                        $invoice = $data['invoice'];
                        $QueryItems = mysqli_query($koneksi, "SELECT DISTINCT status_order FROM tb_detail_order do INNER JOIN tb_order o ON do.id_order = o.id_order INNER JOIN tb_produk p ON o.id_produk = p.id_produk WHERE do.invoice = '$invoice'");
                        $rowItems = mysqli_fetch_array($QueryItems);
                        if ($rowItems['status_order'] == 'P') {
                        $status = 'Proses';
                        } elseif ($rowItems['status_order'] == 'K') {
                        $status = 'Kirim';
                        } elseif ($rowItems['status_order'] == 'S') {
                        $status = 'Selesai';
                        }
                                                
                        echo $status; 
                        ?>
                        </td>
                        <td class="font-weight-600"><?= $data['email']; ?></td>
                        <td class="font-weight-600"><?= $data['tanggal']; ?></td>
                       
                        <td>
                          <a href="form_edit.php?id=<?= $data['invoice']; ?>"class="btn btn-primary"><i class="far fa-file-alt"></i></a>
                          <a href="hapus.php?id=<?= $data['invoice']; ?>"onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"
                          class="btn btn-danger"><i class="fas fa-trash"></i></a>
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