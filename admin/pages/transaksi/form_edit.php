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
                  <h4>Form Edit Status Transaksi</h4>
                  <div class="card-header-action">
                    <a href="main.php" class="btn btn-danger">Kembali Ke Data Transaksi <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body">

                <?php 
                include "../../lib/koneksi.php";
                $invoice = $_GET['id'];
                $QueryEdit = mysqli_query($koneksi, "SELECT do.invoice as invoice, o.status_order as status FROM tb_detail_order do 
                INNER JOIN tb_order o ON do.id_order = o.id_order WHERE do.invoice = '$invoice'");
                $rowEdit = mysqli_fetch_array($QueryEdit);
                if ($rowEdit['status'] == 'P') {
                  $status = 'Dalam Proses';
              } elseif ($rowEdit['status'] == 'K') {
                  $status = 'Dalam Pengiriman';
              } elseif ($rowEdit['status'] == 'S') {
                  $status = 'Selesai';
              }
                $inv = $rowEdit['invoice'];
               
                ?>

                <form action="edit.php" method="POST">
                <div class="form-group">
                      <label>Invoice</label>
                      <input type="text" class="form-control" name="invoice" value="<?= $inv; ?>" disabled>
                    </div>        
                
                    <div class="form-group">
                      <input type="hidden" name="id" value="<?= $p['id_transaksi']; ?>">
                      <div class="form-group">
                           <label for="status_pembayaran">Status Pemesanan</label>
                           <select class="form-control" name="status" id="status">
                          <option value="<?= $rowEdit['status_order']; ?>"><?= $status; ?></option>
                          <option value="K">Dalam Kirim</option>
                          <option value="S">Selesai</option>
                           </select>
                        </div>        
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