<?php
$loi = array(); 
$loi_str="";
if (isset($_POST['mail'])){	
      $thanhcong = $dt->DangKyThanhVien($loi);
      if ($thanhcong==true) {
        echo "<script>document.location='main.php?p=dangkytc';</script>";
        exit();
      }
      else foreach($loi as $s) $loi_str = $loi_str . $s . "<br/>";
}
?>
<h1>ĐĂNG KÍ THÀNH VIÊN</h1>
<div class="col-md-8">
<?php if ($loi_str!="") {?>
<div class="alert alert-danger">  <?=$loi_str?> </div>
<?php }?>

<form action="" method="post">
   <div class="form-group row">
     <div class="col-md-3"> <label for="mail">Email</label> </div>
     <div class="col-md-9"> 
     <input type="email" class="form-control" name="mail" id="mail"oninvalid="this.setCustomValidity('Bạn nhập email không đúng')" oninput="this.setCustomValidity('')" value="<?php if (isset($_POST['mail'])) echo $_POST['mail']; ?>">	<span id="kiemtraEmail"></span>
     </div>
   </div>
   <div class="form-group row">
     <div class="col-md-3"> <label for="pass">Mật khẩu</label> </div>
     <div class="col-md-9"> 
     <input type="password" class="form-control" name="pass" id="pass" pattern=".{6,30}" oninvalid="this.setCustomValidity('Mật khẩu từ 6 đến 30 ký tự nhé')" oninput="this.setCustomValidity('')" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>" >
     </div>
   </div>
   <div class="form-group row">
     <div class="col-md-3"><label for="repass">Gõ lại MK</label> </div>
     <div class="col-md-9"> 
     <input type="password" class="form-control" name=repass id=repass pattern=".{6,30}" oninvalid="this.setCustomValidity('Mật khẩu từ 6 đến 30 ký tự nhé')" oninput="this.setCustomValidity('')" value="<?php if (isset($_POST['repass'])) echo $_POST['repass']; ?>">
     </div>
   </div>
   <div class="form-group row">
     <div class="col-md-3"> <label for="ht">Họ tên</label> </div>
     <div class="col-md-9"> 
     <input class="form-control" name="ht" id="ht" required oninvalid="this.setCustomValidity('Nhập họ tên vô bạn ơi')" oninput="this.setCustomValidity('')" value="<?php if (isset($_POST['hoten'])) echo $_POST['hoten']; ?>">
     </div>
   </div>
   <div class="form-group row">
     <div class="col-md-3"> <label for="dc">Địa chỉ</label> </div>
     <div class="col-md-9"> 
     <input class="form-control" name="dc" id="dc" required oninvalid="this.setCustomValidity('Bạn ơi , địa chỉ sao không nhập vào')" oninput="this.setCustomValidity('')" >	</div>
   </div>
   <div class="form-group row">
     <div class="col-md-3"> <label for="dt">Điện thoại</label> </div>
     <div class="col-md-9"> 
     <input type="tel" class="form-control" name="dt" id="dt" pattern="\d{10,10}" oninvalid="this.setCustomValidity('Nhập số di động 10 ký tự nhé')" oninput="this.setCustomValidity('')"    >	
     </div>
   </div>
   <div class="form-group row">
     <div class="col-md-3"> <label>Phái</label> </div>
     <div class="col-md-9"> 
     <input type="radio" name="phai" value="1"> Nam &nbsp;
     <input type="radio" name="phai" value="0"> Nữ
     </div>
   </div>
   <div class="form-group row text-center">
     <button type="submit" class="btn btn-template-main">
     <i class="fa fa-sign-in"></i> ĐĂNG KÝ
     </button>
   </div>
   <script>
jQuery(function($) { 
$('#mail').blur(function() { 
		$.get(
             'checkemail.php' , 
              "mail=" + $(this).val()  , 
		     function (d){  $('#kiemtraEmail').html(d); }
		);//$.get
	}); 
})(jQuery);
</script>
</form>
</div>


