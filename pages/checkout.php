   <!-- Breadcrumb Section Begin -->
   <section class="breadcrumb-section set-bg" data-setbg="assets/img/breadcrumb.jpg">
       <div class="container">
           <div class="row">
               <div class="col-lg-12 text-center">
                   <div class="breadcrumb__text">
                       <h2>Checkout</h2>
                       <div class="breadcrumb__option">
                           <a href="./index.html">Home</a>
                           <span>Checkout</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Breadcrumb Section End -->

   <!-- Checkout Section Begin -->
   <section class="checkout spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <h6><span class="icon_tag_alt"></span> Belum Punya Akun? <a href="#">Klick Disini</a> Untuk Register
                   </h6>
               </div>
           </div>
           <div class="checkout__form">
               <h4>Checkout Details</h4>
               <?php
                $email = $_SESSION['email'];
                $QueryProfile = mysqli_query($koneksi, "SELECT * FROM tb_member tm INNER JOIN tb_kota tk ON tm.id_kota = tk.id_kota WHERE tm.email = '$email'");
                $row = mysqli_fetch_assoc($QueryProfile);
                ?>
               <form method="POST" action="<?= $baseUrl2; ?>pages/aksi/shipping.php">
                   <div class="row">
                       <div class="col-lg-8 col-md-6">
                           <div class="row">

                           </div>
                           <div class="checkout__input">
                               <p>Nama<span>*</span></p>
                               <input type="text" class="form-control" name="nama" value="<?= $row['nama']; ?>">
                           </div>
                           <div class="checkout__input">
                               <p>Alamat Lengkap<span>*</span></p>
                               <input type="text" placeholder="Street Address" name="alamat" class="checkout__input__add" value="<?= $row['alamat']; ?>">

                           </div>
                           <div class="checkout__input">
                               <p>Kota<span>*</span></p>
                               <?php
                                include "admin/lib/koneksi.php";
                                $qKota = mysqli_query($koneksi, "SELECT * FROM tb_kota");
                                $kota = mysqli_fetch_array($qKota);
                                ?>
                               <input type="text" class="form-control" name="kota" value="<?= $kota['nama_kota']; ?>">
                           </div>
                           <div class="row">
                               <div class="col-lg-6">
                                   <div class="checkout__input">
                                       <p>Phone<span>*</span></p>
                                       <input type="text" name="no_hp" value="<?= $row['no_hp']; ?>">
                                   </div>
                               </div>
                               <div class="col-lg-6">
                                   <div class="checkout__input">
                                       <p>Email<span>*</span></p>
                                       <input type="text" name="email" value="<?= $row['email']; ?>">
                                   </div>
                               </div>

                               <div class="col-lg-12">
                                   <p>Kurir<span>*</span></p>
                                   <div class="checkout__input">
                                       <select name="kurir">
                                           <option value="">-- Pilih Kurir Pengiriman</option>
                                           <?php
                                            include 'admin/lib/koneksi.php';
                                            $qKurir = mysqli_query($koneksi, "SELECT * FROM tb_jasa");
                                            while ($k = mysqli_fetch_array($qKurir)) {
                                            ?>
                                               <option value="<?= $k['id_jasa'] ?>"><?= $k['nama_jasa'] ?></option>
                                           <?php } ?>
                                       </select>

                                   </div>
                               </div>
                           </div>
                           <br>

                           <button type="submit" class="site-btn">Pilih Kurir</button>
                       </div>
                       </form>
                       <?php
                        $id_session = $_SESSION['card'];

                        include "admin/lib/koneksi.php";

                        $QueryCheckout = mysqli_query($koneksi, "SELECT * FROM tb_order tbo INNER JOIN tb_produk tp ON tbo.id_produk = tp.id_produk
                                WHERE tbo.id_session = '$id_session' AND tbo.jumlah > 0 AND tbo.status_order = 'C'");

                        ?>
                       <div class="col-lg-4 col-md-6">
                           <div class="checkout__order">
                               <h4>Your Order</h4>
                               <div class="checkout__order__products">Products <span>Total</span></div>
                               <ul>
                                   <?php
                                    while ($Checkout = mysqli_fetch_array($QueryCheckout)) {
                                    ?>
                                       <li><?= $Checkout['nama_produk']; ?><span><?= number_format($Checkout['harga'] * $Checkout['jumlah']); ?></span></li>
                                   <?php } ?>
                               </ul>

                               <?php
                                include "admin/lib/koneksi.php";
                                $id_session = $_SESSION['card'];

                                $QueryCart = mysqli_query($koneksi, "SELECT * FROM tb_order tbo INNER JOIN tb_produk tp ON tbo.id_produk = tp.id_produk
                      WHERE tbo.id_session = '$id_session'");
                                $total = 0;
                                while ($Cart = mysqli_fetch_array($QueryCart)) {
                                    $subtotal = $Cart['harga'] * $Cart['jumlah'];
                                    $total = $total + $subtotal;
                                }
                                ?>
                               <div class="checkout__order__subtotal">Subtotal <span><?= number_format($subtotal); ?></span></div>

                               <?php

                                $id_session = $_SESSION['card'];

                                include "admin/lib/koneksi.php";
                                if (!empty($_SESSION['tempKurir'])) {
                                    $idkurir = $_SESSION['tempKurir'];
                                } else {
                                    $idkurir = 0;
                                }

                                $QueryProfile = mysqli_query($koneksi, "SELECT * FROM tb_member WHERE email = '$email'");
                                $rowUser = mysqli_fetch_assoc($QueryProfile);
                                $kota = $rowUser['id_kota'];

                                $QueryOngkir =  mysqli_query($koneksi, "SELECT * FROM tb_biaya_kirim tbo INNER JOIN tb_jasa tbk
                ON tbo.id_jasa = tbk.id_jasa INNER JOIN tb_kota tbkota ON tbo.id_kota = tbkota.id_kota
                WHERE tbo.id_jasa = '$idkurir' AND tbo.id_kota = '$kota'");
                                $rowOngkir = mysqli_fetch_array($QueryOngkir);

                                $QueryOrder = mysqli_query($koneksi, "SELECT SUM(jumlah*harga) as subtotal FROM tb_order WHERE id_session = '$id_session' AND status_order = 'C'");
                                $rowOrder = mysqli_fetch_assoc($QueryOrder);

                                $subtotal = $rowOrder['subtotal'];
                                $total = $rowOrder['subtotal'] + $rowOngkir['biaya'];
                                ?>
                               <div class="checkout__order__subtotal">Ongkir <span><?php if (!empty($_SESSION['tempKurir'])) { ?>
                                           <td>Rp <?= number_format($rowOngkir['biaya']) ?></td>
                                       <?php } else { ?>
                                           <td>Rp 0</td>
                                       <?php } ?></span></div>
                               <div class="checkout__order__total" name="total">Total <span><?= number_format($total); ?></span></div>
                               <?php
                                include "admin/lib/koneksi.php";
                                $pembayaran = mysqli_query($koneksi, "SELECT * FROM tb_pembayaran");
                                while ($p = mysqli_fetch_array($pembayaran)) {
                                ?>
                                   <div class="bank">
                                       <div class="bank-item pb-3">
                                           <div class="description">
                                               <h5>Berkah Laundry</h5>
                                               <p>
                                                   <?= $p['kode_pembayaran']; ?>
                                                   <br>
                                                   <?= $p['metode_pembayaran']; ?>
                                               </p>
                                           </div>
                                       <?php } ?>
                                       </div>

                                       <form method="POST" action="<?= $baseUrl2; ?>pages/aksi/checkout.php">
                                           <input type="hidden" name="total" value="<?= $total ?>">
                                           <input type="hidden" name="id_jasa" value="<?= $_SESSION['tempKurir'] ?>">
                                           <p>Untuk Melanjutkan Silahkan, Membayarnya Kemudian Menekan Button Dibawah Ini</p>
                                           <button type="submit" class="site-btn">Selesai ORDER</button>
                                           <br>
                                           <br>
                                       </form>
                                   </div>

                           </div>
               <!-- </form> -->
           </div>
       </div>
   </section>
   <!-- Checkout Section End -->