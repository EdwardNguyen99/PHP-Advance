<div class="container" id="contact">

                <section>
                    <div class="row">
                        <div class="col-md-8">

                            <div class="heading">
                                <h2>Chúng tôi ở đây để giúp bạn</h2>
                            </div>

                            <p class="lead">Bạn có điều gì chưa rõ không? Bạn có cần tư vấn về cách sử dụng điện thoại không? Bạn có cần tìm hiểu một vài tính năng mới không? Bạn có đang cần mua một điện thoại mới? Mọi vấn đề về điện thoại mà bạn muốn biết… xin hãy đến với chúng tôi.</p>

                            <div class="heading">
                                <h3>Contact form</h3>
                            </div>
                            <?php 
                                if (isset($_POST['name']) ==true){
                                $ht=htmlentities(trim(strip_tags($_POST['name'])),ENT_QUOTES,'utf-8');
                                $m=htmlentities(trim(strip_tags($_POST['email'])),ENT_QUOTES,'utf-8');
                                $td=htmlentities(trim(strip_tags($_POST['subject'])),ENT_QUOTES,'utf-8');
                                $nd=htmlentities(trim(strip_tags($_POST['message'])),ENT_QUOTES,'utf-8');
                                $nd= nl2br($nd);
                                $loi="";
                                if ($ht=="") $loi.="Bạn chưa nhập họ tên<br>";
                                if ($m=="") $loi.="Bạn chưa nhập email<br>";
                                if ($nd=="") $loi.="Bạn chưa nhập nội dung liên hệ<br>";
                                else if (strlen($nd)<=10) $loi.="Nội dung liên hệ quá ngắn<br>";
                                if ($loi==""){
                                $to ="<Địa chỉ mail của người admin nhận mail>"; 
                                $from="<Địa chỉ mail bạn dùng để gửi mail>";
                                $pass="<Pass của mail bạn dùng để gửi mail>";
                                $topText="Họ tên: {$ht}<br>Email: {$m}<br>Tiêu đề: {$td}" ;
                                $nd = $topText."<br>Nội dung:<hr>".$nd;		
                                $error="";
                                $t->GuiMail($to, $from,$fromName="BQT",$td,$nd,$from,$pass,$error);
                                if ($error!="") $loi=$error;
                                else {
                                    $_SESSION['camon'] ="Cảm ơn bạn. Ý kiến đã được ghi nhận";
                                    echo "<script>document.location='/news/lien-he/';</script>";
                                    exit();
                                }
                                }
                                }
                            ?>
                            <div id="thongbaoLH" style="background:#ccc;color:red; padding:20px; text-align:center;line-height:150%; margin-top:10px">
                            <?php 
                                // if ($loi!="") echo $loi;
                                echo "Moi ban nhap thong tin";
                                if (isset($_SESSION['camon'])==true) {
                                    echo $_SESSION['camon'] ; unset($_SESSION['camon']); }
                                ?>
                            </div>
                            <?php if (isset($_SESSION['camon'])==false) {?>

                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Firstname</label>
                                            <input type="text" class="form-control" id="firstname">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastname">Lastname</label>
                                            <input type="text" class="form-control" id="lastname">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="email">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <input type="text" class="form-control" id="subject">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea id="message" class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 text-center">
                                        <button type="submit" class="btn btn-template-main"><i class="fa fa-envelope-o"></i> Send message</button>

                                    </div>
                                </div>
                                <!-- /.row -->
                            </form>
                            <?php } ?>
                        </div>

                        <div class="col-md-4">


                            <h3 class="text-uppercase">Địa Chỉ</h3>

                            <p>Shop Điện Thoại LTD
                                <br>New Heaven
                                <br>Điện Ngọc Vàng
                                <br>30/4/1/5 Cung Vàng
                                <br>
                                <strong>Thành Phố Trăng Vàng</strong>
                            </p>

                            <h3 class="text-uppercase">Điện Thoại</h3>

                            <p class="text-muted">Đây là số điện thoại liên lạc miễn phí</p>
                            <p><strong>+33 555 444 333</strong>
                            </p>



                            <h3 class="text-uppercase">Địa Chỉ Email</h3>

                            <p class="text-muted">Vui lòng điền thông tin trong mẫu dưới để liên hệ với chúng tôi (24/24).  </p>
                            <ul>
                                <li><strong><a href="mailto:">didongshop30/4@gmail.com</a></strong>
                                </li>
                                <li><strong><a href="#">thanhluat</a></strong>didongshop30@gmail.com</li>
                            </ul>


                        </div>

                    </div>


                </section>

            </div>