<?php 
if (!$_POST) die('');
$sosp = count( $_SESSION['daySoLuong'] );
if (isset($_POST['payment'])) 
   $_SESSION['DonHang']['payment'] = $_POST['payment'];
//print_r($_SESSION);
?>
<div class="container">

                <div class="row">

                    <div class="col-md-9 clearfix" id="checkout">

                        <div class="box">
                            <form method="post" action="dat-hang">
                                <div class="content">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">Tên</th>
                                                    <th>Số Lượng</th>
                                                    <th>Gía</th>
                                                    <th>Giảm</th>
                                                    <th>Tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php reset( $_SESSION['daySoLuong'] );  
                                                reset( $_SESSION['dayDonGia'] );
                                                reset( $_SESSION['dayTenDT'] );    
                                                $tongtien = $tongsoluong = 0;			
                                                for ($i = 0; $i<$sosp ; $i++) {
                                                    $idDT = key( $_SESSION['daySoLuong'] );
                                                    $tendt = current( $_SESSION['dayTenDT'] );
                                                    $soluong = current( $_SESSION['daySoLuong'] );
                                                    $dongia = current( $_SESSION['dayDonGia'] );
                                                    $tien = $dongia*$soluong;  
                                                    $tongtien+= $tien; 
                                                    $tongsoluong+= $soluong;	
                                            ?>

                                                <tr>
                                                    <td>
                                                        <a href="#">
                                                            <img src="img/detailsquare.jpg" alt="White Blouse Armani">
                                                        </a>
                                                    </td>
                                                    <td><a href="#">White Blouse Armani</a>
                                                    </td>
                                                    <td><?=$soluong?></td>
                                                    <td><?=number_format($dongia,0, ",",".");?> VND</td>
                                                    <td>$0.00</td>
                                                    <td><?=number_format($tien,0,",",".");?> VND</td>
                                                </tr>
                                                <?php 
                                                next( $_SESSION['daySoLuong'] );  
                                                next( $_SESSION['dayDonGia'] );
                                                next( $_SESSION['dayTenDT'] );
                                                ?>
                                                <?php } //for ?>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="5">Tổng tiền</th>
                                                    <th><?=number_format($tongtien,0, ",",".");?> VND</th>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.content -->

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="thanh-toan-3" class="btn btn-default"><i class="fa fa-chevron-left"></i>Trở Lại</a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-template-main">Đặt Hàng<i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->


                    </div>
                    <!-- /.col-md-9 -->

                    <div class="col-md-3">

                        <div class="box" id="order-summary">
                            <div class="box-header">
                                <h3>Order summary</h3>
                            </div>
                            <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Order subtotal</td>
                                            <th>$446.00</th>
                                        </tr>
                                        <tr>
                                            <td>Shipping and handling</td>
                                            <th>$10.00</th>
                                        </tr>
                                        <tr>
                                            <td>Tax</td>
                                            <th>$0.00</th>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                            <th>$456.00</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>