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

                <form action="simpan_pembayaran.php" method="POST">
                    <div class="form-group">
                      <label>Metode Pembayaran</label>
                      <input type="text" class="form-control" name="metode_pembayaran">
                    </div>    
                    <div class="form-group">
                      <label>Kode Pembayaran</label>
                      <input type="text" class="form-control" name="kode_pembayaran">
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