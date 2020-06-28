<style>
    #footer .photostream div {width:24.95%;}
    </style>
<footer id="footer">
            <div class="container">
                <div class="col-md-3 col-sm-6">
                    <h4>Về Chúng Tôi </h4>

                    <p>Chuyên kinh doanh điện thoại di động, hàng công nghệ, linh kiện – phụ kiện điện thoại di động, sửa chữa điện thoại di động</p>

                    <hr>

                    <h4>Nhận Thông Tin Từ Chúng Tôi</h4>

                    <form>
                        <div class="input-group">

                            <input type="text" class="form-control">

                            <span class="input-group-btn">

                        <button class="btn btn-default" type="button"><i class="fa fa-send"></i></button>

                    </span>

                        </div>
                        <!-- /input-group -->
                    </form>

                    <hr class="hidden-md hidden-lg hidden-sm">

                </div>
                <!-- /.col-md-3 -->
                <!-- /.col-md-3 -->

                <div class="col-md-3 col-sm-6">

                    <h4>Liên Hệ</h4>

                    <p><strong>Shop Điện Thoại LTD.</strong>
                        <br>30/4/1/5 Cung Vàng
                        <br>Điện Ngọc Vàng
                        <br>Thành Phố Trăng Vàng
                        <br>Việt Nam
                        <br>
                        <strong>Mời Qúy Khách</strong>
                    </p>

                    <a href="<?=BASE_URL?>lien-he/" class="btn btn-small btn-template-main">Liên Hệ</a>

                    <hr class="hidden-md hidden-lg hidden-sm">

                </div>
                <!-- /.col-md-3 -->



                <div class="col-md-3 col-sm-6">

                <?php $lisyLoaiSP = $dt->ListLoaiSP() ; ?>
                <div class="photostream">
                    <?php while ($rowLoai = $lisyLoaiSP->fetch_assoc() ) { ?>
                <div>
                    <a href="dien-thoai/<?=trim($rowLoai['TenLoai'])?>/">
                    <img src="img/<?=$rowLoai['hinh']?>" class="img-responsive" alt="<?=$rowLoai['TenLoai']?>" title="<?=$rowLoai['TenLoai']?>">
                    </a>
                </div>					
                    <?php } ?>
                </div>

                </div>
                <!-- /.col-md-3 -->
            </div>
            <!-- /.container -->
        </footer>