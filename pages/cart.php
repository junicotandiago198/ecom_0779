
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="assets/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $id_session = $_SESSION['card'];
                                
                                include "admin/lib/koneksi.php";

                                $QueryCart = mysqli_query($koneksi, "SELECT * FROM tb_order tbo INNER JOIN tb_produk tp ON tbo.id_produk = tp.id_produk
                                WHERE tbo.id_session = '$id_session' AND tbo.jumlah > 0 AND tbo.status_order = 'C'");
                                while ($Cart = mysqli_fetch_array($QueryCart)) {
                               
                                ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="<?= $baseUrl2; ?>admin/assets/img/kategori/<?= $Cart['gambar']; ?>" width="150">
                                        <h5><?= $Cart['nama_produk']; ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                       Rp.<?= number_format($Cart['harga']); ?>
                                    </td>
                                   
                                    <td class="shoping__cart__total">
                                        <?= $Cart['jumlah']; ?>
                                    </td>

                                    <td class="shoping__cart__total">
                                        Rp.<?= number_format($Cart['harga'] * $Cart['jumlah']); ?>
                                    </td>
                
                                </tr>
                                <tr>
                                </tr>
                            </tbody>
                            <?php }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="<?= $baseUrl2; ?>index.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
            
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        
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
                        <ul>
                            <li>Subtotal <span>Rp.<?= number_format($subtotal); ?></span></li>
                            <li>Total <span>Rp.<?= number_format($total); ?></span></li>
                    
                        </ul>
                        <a href="checkout.php" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>       
                 </div>
        </div>
    </div>            
    </section>