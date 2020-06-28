<?php
$idDT = $_GET['idDT'];
$ct = $dt-> chiTietSP($idDT);
$rowCT = $ct->fetch_assoc(); 
?>
<style>
    h1.lead {color: #38a7bb; font-weight:900; text-transform:uppercase; font-size:26px}
p.goToDescription { margin-top:30px; text-align:left;}
#mainImage {margin-top:50px}
#mainImage img {height:250px; }
#productMain #thumbs img {height:80px}
#productMain #thumbs div {text-align:center}
#productMain #thumbs a {border:none;}

</style>
 <div class="container">

<div class="row">

    <!-- *** LEFT COLUMN ***
_________________________________________________________ -->

    <div class="col-md-9">

        <p class="lead"><?=$rowCT['MoTa']?>
        </p>
        <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Cuộn Để Xem Chi Tiết Sản Phẩm</a>
        </p>

        <div class="row" id="productMain">
            <div class="col-sm-6">
                <div id="mainImage">
                    <img src="upload/hinhchinh/<?=$rowCT['urlHinh']?>" alt="" class="img-responsive">
                </div>

           
                <!-- /.ribbon -->

            </div>
            <div class="col-sm-6">
                <div class="box">

                    <form>
                        

                        <p class="price"><?=number_format($rowCT['Gia'],0, ",",".");?> VND</p>

                        <p class="text-center">
                            <button type="submit" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
                            <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Add to wishlist"><i class="fa fa-heart-o"></i>
                            </button>
                        </p>

                    </form>
                </div>

                <div class="row" id="thumbs">
                <?php $lispHinh = $dt->layHinhSP($idDT,4);?>
                    <?php if ($lispHinh->num_rows>0) {?>
                    <?php while($rowH = $lispHinh ->fetch_assoc()) {?>
                        <div class="col-xs-3">
                        <a href="upload/hinhphu/<?=$rowH['urlHinh']?>" class="thumb">
                        <img src="upload/hinhphu/<?=$rowH['urlHinh']?>" class="img-responsive">
                        </a>
                        </div>
                    <?php } }?>

                </div>
            </div>

        </div>


        <div class="box" id="details">
            <h4>Giới thiệu</h4>
            <div id="gioithieu"><?=$rowCT['baiviet']?></div>      

        </div>

        <div class="box social" id="product-social">
            <h4>Show it to your friends</h4>
            <p>
                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
            </p>
        </div>

        

        

    </div>
    <!-- /.col-md-9 -->


    <!-- *** LEFT COLUMN END *** -->

    <!-- *** RIGHT COLUMN ***
_________________________________________________________ -->

    

        <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
        
        <!-- /.banner -->
    
    <!-- /.col-md-3 -->

    <!-- *** RIGHT COLUMN END *** -->

</div>
<!-- /.row -->

</div>