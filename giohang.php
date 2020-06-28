<div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <p class="text-muted lead">Giỏ Hàng Hiện Có XXX Sản Phẩm</p>
                    </div>


                    <div class="col-md-9 clearfix" id="basket">

                        <div class="box">

                            <form method="post" action="capnhatGH.php?action=update">

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Tên Sản Phẩm</th>
                                                <th>Số lượng</th>
                                                <th>Gía</th>
                                                <th>Gỉam</th>
                                                <th colspan="2">Tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            reset( $_SESSION['daySoLuong'] );
                                            reset( $_SESSION['dayDonGia'] );
                                            reset( $_SESSION['dayTenDT'] );
                                            $tongtien = $tongsoluong = 0;	
                                            ?>
                                            <?php for ($i = 0; $i< count( $_SESSION['daySoLuong']) ; $i++) { ?>
                                            <?php
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
                                                <td><a href="#"><?=$tendt?></a>
                                                </td>
                                                <td>
                                                    <input type="number" value="<?=$soluong?>" class="form-control" name="soluong_arr[]">
                                                    <input type ="hidden" value="<?=$idDT?>" name="iddt_arr[]">
                                                </td>
                                                <td><?=number_format($dongia,0, ",",".");?> VND</td>
                                                <td>$0.00 VND</td>
                                                <td><?=number_format($tien,0, ",",".");?> VND   </td>
                                                <td><a href="capnhatGH.php?action=remove&idDT=<?=$idDT?>"><i class="fa fa-trash-o"></i></a>
                                                </td>
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
                                                <th colspan="5">Tổng Tiền</th>
                                                <th colspan="2"><?=number_format($tongtien,0, ",",".");?> VND</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                                <!-- /.table-responsive -->

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="shop-category.html" class="btn btn-default"><i class="fa fa-chevron-left"></i> <?=BASE_URL?>dien-thoai/</a>
                                    </div>
                                    <div class="pull-right">
                                        <button class="btn btn-default"><i class="fa fa-refresh"></i>Cập nhật giỏ hàng</button>
                                        <a class="btn btn-template-main" href="<?=BASE_URL?>thanh-toan-1/">Thanh toán <i class="fa fa-chevron-right"></i></a>
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
                                <h3>Đơn Hàng</h3>
                            </div>
                            <p class="text-muted">Thông Tin Đơn Hàng Hiện Tại Của Bạn</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Tiền Mua Hàng</td>
                                            <th>$446.00</th>
                                        </tr>
                                        <tr>
                                            <td>Phí Chuyển Hàng</td>
                                            <th>$10.00</th>
                                        </tr>
                                        <tr>
                                            <td>Thuế</td>
                                            <th>$0.00</th>
                                        </tr>
                                        <tr class="total">
                                            <td>Tổng Tiền</td>
                                            <th>$456.00</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>


                        <div class="box">
                            <div class="box-header">
                                <h4>Coupon code</h4>
                            </div>
                            <p class="text-muted">If you have a coupon code, please enter it in the box below.</p>
                            <form>
                                <div class="input-group">

                                    <input type="text" class="form-control">

                                    <span class="input-group-btn">

					    <button class="btn btn-template-main" type="button"><i class="fa fa-gift"></i></button>

					</span>
                                </div>
                                <!-- /input-group -->
                            </form>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                </div>

            </div>  