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
                    <a href="main.php" class="btn btn-danger">Kembali Ke Data Pelanggan <i class="fas fa-chevron-right"></i></a>
                  </div>
                </div>
                <div class="card-body">

                <form action="simpan_pelanggan.php" method="POST">
                    <div class="form-group">
                      <label>Nama</label>
                      <input type="text" class="form-control" name="nama">
                    </div>    
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control" name="email">
                    </div>          
                    <div class="form-group">
                      <label>Password</label>
                      <input type="text" class="form-control" name="password">
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