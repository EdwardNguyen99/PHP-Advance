<?php
if (isset($_POST['delivery'])) 
   $_SESSION['DonHang']['delivery']=$_POST['delivery'];
//print_r($_SESSION);
?>

<div class="container">

                <div class="row">

                    <div class="col-md-9 clearfix" id="checkout">

                        <div class="box">
                            <form method="post" action="thanh-toan-4/">
                                

                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="box payment-method">

                                                <h4>CHUYỂN KHOẢN</h4>

                                                <p>QUÝ KHÁCH THANH TOÁN BẰNG CHUYỂN KHOẢN.</p>

                                                <div class="box-footer text-center">

                                                    <input type="radio" name="payment" value="chuyenkhoan">Chuyển vào tài khoản 012 345 678(Vietcombank)
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="box payment-method">

                                                <h4>Thanh Toán Khi Giao Hàng</h4>

                                                <p>QÚY KHÁCH TRẢ TIỀN KHI NHẬN THANH TOÁN TẠI NHÀ.</p>

                                                <div class="box-footer text-center">

                                                    <input type="radio" name="payment" value="khigiaohang">An Toàn Nhất
                                                </div>
                                            </div>
                                        </div>

                                       
                                    </div>
                                    <!-- /.row -->

                                </div>
                                <!-- /.content -->

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="thanh-toan-2" class="btn btn-default"><i class="fa fa-chevron-left"></i>Trở Lại</a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-template-main">Qua Bước Kế<i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.box -->


                    </div>
                    <!-- /.col-md-9 -->

                    <!-- <div class="col-md-3">

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

                    </div> -->
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>