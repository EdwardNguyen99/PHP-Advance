<?php
require_once "config.php";
class goc {
	protected $db;
	function __construct(){
	   $this->db = new mysqli (DB_HOST, DB_USER, DB_PASS, DB_NAME);
	   $this->db->set_charset("utf8"); 
    } 
    function Blog($sotin){
        $sql="SELECT idTin, TieuDe, TomTat,urlHinh FROM tin  WHERE AnHien = 1 
        ORDER BY RAND() LIMIT 0,$sotin";	
        $kq = $this->db->query($sql);	
        if(!$kq) die( $this-> db->error);
        return $kq;		
     }
     function SanPhamMoi($sosp = 10){				
      $sql="SELECT idDT, TenDT, urlHinh,Gia FROM dienthoai  WHERE AnHien = 1 
      ORDER BY NgayCapNhat DESC LIMIT 0,$sosp";	
      $kq = $this->db->query($sql);	
      if(!$kq) die( $this-> db->error);
      return $kq;		
   }
   function ListLoaiSP(){
      $sql="SELECT idLoai, TenLoai, hinh FROM loaisp  WHERE AnHien = 1
      ORDER BY ThuTu DESC LIMIT 0,12";	
      $kq = $this->db->query($sql);	
      if(!$kq) die( $this-> db->error);
      return $kq;		
   }
   function SanPhamBanChay($sosp = 10){				
      $sql="SELECT idDT, TenDT, urlHinh,Gia FROM dienthoai WHERE AnHien=1 
      ORDER BY SoLanMua DESC LIMIT 0,$sosp";	
      $kq = $this->db->query($sql);
      if(!$kq) die( $this-> db->error);
      return $kq;
   }   
   function SanPhamHot($sosp = 10){
      $sql="SELECT idDT,TenDT,urlHinh,Gia FROM dienthoai 
      WHERE AnHien=1 AND Hot=1 ORDER BY NgayCapNhat DESC LIMIT 0,$sosp";
      $kq = $this->db->query($sql);
      if(!$kq) die( $this-> db->error);
      return $kq;
   }
   function CapNhatGioHang($action, $idDT){	
      if ( !isset($_SESSION['daySoLuong']) ) $_SESSION['daySoLuong']=array();
      if ( !isset($_SESSION['dayDonGia']) )  $_SESSION['dayDonGia']=array();
      if ( !isset($_SESSION['dayTenDT']) )   $_SESSION['dayTenDT']=array();
   
      if ($action=="add") {
         settype($idDT,"int"); if ($idDT<=0) return;
         $sql="SELECT TenDT,Gia,SoLuongTonKho FROM dienthoai WHERE idDT=$idDT";
         $kq = $this->db->query($sql);	
         if(!$kq) die( $this-> db->error);	
         $row = $kq->fetch_assoc();		
   
         $_SESSION['dayTenDT'][$idDT] = $row['TenDT'];
         $_SESSION['dayDonGia'][$idDT] = $row['Gia'];
         $_SESSION['daySoLuong'][$idDT]+=1;
    
         if ($_SESSION['daySoLuong'][$idDT]>$row['SoLuongTonKho']) $_SESSION['daySoLuong'][$idDT] = $row['SoLuongTonKho'];
      }//add
   
      if ($action=="remove") {
         settype($idDT,"int"); if ($idDT<=0) return;
         unset($_SESSION['dayTenDT'][$idDT]);
         unset($_SESSION['dayDonGia'][$idDT]);
         unset($_SESSION['daySoLuong'][$idDT]);
      } //remove
      if ($action=="update"){
         $iddt_arr = $_POST['iddt_arr']; 
         $soluong_arr = $_POST['soluong_arr']; 
           for($i=0; $i<count($iddt_arr);$i++){
           $idDT = $iddt_arr[$i]; settype($idDT,"int"); if ($idDT<=0) continue;
           $soluong=$soluong_arr[$i];settype($soluong,"int");
           if ($soluong<=0) continue;
           $kq = $this->chiTietSP($idDT);
           $row = $kq->fetch_assoc();
           $_SESSION['dayTenDT'][$idDT] = $row['TenDT'];
           $_SESSION['dayDonGia'][$idDT] = $row['Gia'];
           $_SESSION['daySoLuong'][$idDT] = $soluong;
           if ($_SESSION['daySoLuong'][$idDT]>$row['SoLuongTonKho']) $_SESSION['daySoLuong'][$idDT] = $row['SoLuongTonKho'];
      
         } //for
      } //update
      
   }// function capnhatgiohang
   function chiTietSP($idDT){
      $sql="SELECT * FROM dienthoai WHERE AnHien = 1 AND idDT=$idDT";
      $kq = $this->db->query($sql);
      if(!$kq) die( $this-> db->error);
      return $kq;
   }
   function LuuDonHang(&$error){    
      $hoten=$this->db->escape_string( trim(strip_tags( $_SESSION['DonHang']['hoten'] ) ) );
      $dienthoai = $this->db->escape_string(  trim( strip_tags($_SESSION['DonHang']['dienthoai'] ) ) );
      $diachi = $this->db->escape_string(  trim( strip_tags($_SESSION['DonHang']['diachi'] ) ) );     
      $email = $this->db->escape_string(  trim( strip_tags($_SESSION['DonHang']['email'] ) ) );
      $pttt = $this->db->escape_string(  trim( strip_tags( $_SESSION['DonHang']['payment'] ) ) );      
      $ptgh = $this->db->escape_string(  trim( strip_tags( $_SESSION['DonHang']['delivery'] ) ) );	
      
      //kiểm tra dữ liệu  
      if (count($_SESSION['daySoLuong'])==0) $error[] = "Bạn chưa chọn sản phẩm nào";
      if ($hoten == "") $error[] = "Bạn chưa nhập họ tên";
      if ($diachi == "") $error[] = "Bạn chưa nhập địa chỉ";
      if ($email == "") $error[] = "Bạn chưa nhập email";
      if ($dienthoai== "") $error[] = "Bạn ơi! Điện thoại người nhận chưa có";
      if ($pttt=="") $error[] = "Bạn chưa chọn phương thức thanh toán";
      if ($ptgh=="") $error[] = "Bạn chưa chọn phương thức giao hàng";
      if (count($error)>0) return;
      
      //lưu dữ liệu vào db    
      if (isset($_SESSION['DonHang']['idDH'])==false) {
       $sql="INSERT INTO donhang SET tennguoinhan = '$hoten',diachi =
         '$diachi', dtnguoinhan = '$dienthoai',	idpttt = '$pttt',idptgh=
         '$ptgh', thoidiemdathang = now() ";
       $kq = $this->db->query($sql);
       if(!$kq) die( $this-> db->error);
       $_SESSION['DonHang']['idDH'] = $this->db->insert_id;
       
      }else{
          $idDH = $_SESSION['DonHang']['idDH'];
          $sql="UPDATE donhang SET tennguoinhan = '$hoten',diachi= 
         '$diachi', dtnguoinhan = '$dienthoai', idpttt='$pttt',idptgh=
         '$ptgh', thoidiemdathang = now() 
       WHERE idDH = $idDH";
       $kq = $this->db->query($sql) ;
       if(!$kq) die( $this-> db->error);
      }
      
    } 
    function LuuChiTietDonHang(){		
      $sosp = count($_SESSION['daySoLuong']);
      if ($sosp<=0) {echo "Không có sản phẩm"; return;}
      if (isset($_SESSION['DonHang']['idDH'])==false){echo "Kô có idDH"; return;}
      $idDH = $_SESSION['DonHang']['idDH'];
      $sql = "DELETE FROM donhangchitiet WHERE idDH = $idDH";
      $this->db->query($sql);
      reset( $_SESSION['daySoLuong'] ); 
      reset( $_SESSION['dayDonGia'] );
      reset( $_SESSION['dayTenDT'] );		
      for ($i = 0; $i<$sosp ; $i++) {
          $idDT = key( $_SESSION['daySoLuong'] );
          $tendt = current( $_SESSION['dayTenDT'] );
          $soluong = current( $_SESSION['daySoLuong'] );
          $gia = current( $_SESSION['dayDonGia'] );
          $sql ="INSERT INTO donhangchitiet (idDH,idDT,TenDT,SoLuong,Gia)
                 VALUES ($idDH, $idDT, '$tendt',$soluong, $gia)";		
          $this->db->query($sql);
          next( $_SESSION['daySoLuong'] );  
       next( $_SESSION['dayDonGia'] );
          next( $_SESSION['dayTenDT'] );
      }//for
   }//function LuuChiTietDonHang
       
   function layHinhSP($idDT, $sohinh){
      $sql="SELECT urlHinh FROM hinh  WHERE AnHien = 1 AND
            idDT=$idDT LIMIT 0, $sohinh";
      $kq = $this->db->query($sql);
      if(!$kq) die( $this-> db->error);
      return $kq;
   }
   function GuiMail($to, $from, $from_name, $subject, $body, $username, $password, &$error){ 
      $error="";
      require_once "class/class.phpmailer.php";      
      require_once "class/class.smtp.php";      
      try {
         $mail = new PHPMailer();  
         $mail->IsSMTP(); 
         $mail->SMTPDebug = 0;  //  1=errors and messages, 2=messages only
         $mail->SMTPAuth = true;  
         $mail->SMTPSecure = 'ssl'; 
         $mail->Host = 'smtp.gmail.com';
         $mail->Port = 465; 
         $mail->Username = $username;  
         $mail->Password = $password;           
         $mail->SetFrom($from, $from_name);
         $mail->Subject = $subject;
         $mail->MsgHTML($body);// noi dung chinh cua mail
         $mail->AddAddress($to);
         $mail->CharSet="utf-8";
         $mail->IsHTML(true);   
         $mail->SMTPOptions = array(
            'ssl' => array(
               'verify_peer' => false,
               'verify_peer_name' => false,
               'allow_self_signed' => true
          ));
         if(!$mail->Send()) {$error='Loi:'.$mail->ErrorInfo; return false;}
         else { $error = ''; return true; }
      } 
      catch (phpmailerException $e) { echo "<pre>".$e->errorMessage(); }    
   }//function
   function DangKyThanhVien(&$loi){			
      $thanhcong = true;
       //tiếp nhận dữ liệu từ form
      $email = $this->db->escape_string(trim(strip_tags($_POST['mail'])));
      $pass=$this->db->escape_string(trim(strip_tags($_POST['pass'])));
      $rd = md5(rand(1,99999));
      $repass=$this->db->escape_string(trim(strip_tags($_POST['repass']))); 
      $ht = $this->db->escape_string(trim(strip_tags($_POST['ht'])));	
      $dc=$this->db->escape_string(trim(strip_tags($_POST['dc'])));
      $dt=$this->db->escape_string(trim(strip_tags($_POST['dt'])));
      $p = $_POST['phai']; settype($phai, "int");
      $sql = "INSERT INTO  users  SET email='$email', password= '$mahoa', hoten='$ht', diachi='$dc', dienthoai='$dt', gioitinh=$p, active=0,randomkey='$rd', ngaydangky=NOW()";
      $id = $this->db->insert_id;
      $subject = "Kích hoạt tài khoản";
      $content = file_get_contents("dangky_thukichhoat.html");		
      $link="http://".$_SERVER['SERVER_NAME']."/banhang/kh.php?id=$id&rd=$rd";
      $noidungthu = str_replace(	
         array("{email}","{matkhau}","{hoten}","{link}"), 
         array($email,$pass,$ht,$link),$content);
      $from = "EmailGmailCuaBan"; //dùng mail test, đừng dùng mail chính thức
      $p = "MatKhauCuaban"; 
      $this->GuiMail($email,$from,$ten="BQT",$subject,$content,$from,$p,$error);
      if ($error!="") $loi['guimail']=$error;
 
      //kiễm tra dữ liệu
       if ($email == NULL){
         $thanhcong = false;
         $loi['email'] = "Bân chưa nhập email"; }
      elseif (filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE) { 
            $thanhcong = false; 
            $loi['email']="Bạn nhập email không đúng";
      }elseif ($this->CheckEmail($email)==false) { 
            $thanhcong = false; 
            $loi['email'] = "Email này đã có người dùng";
      }
      if ($hoten != NULL){
         $thanhcong = false; 
         $loi['hoten']= "Chưa nhập họ tên";
     }
      if ($pass == NULL) {
         $thanhcong = false; 
         $loi['pass'] = "Bạn chưa nhập mật khẩu";
      }elseif (strlen($pass)<6 ) {
            $thanhcong = false; 
            $loi['pass'] = "Mật khẩu của bạn phải >=6 ký tự";
      } 
      if ($repass == NULL) {  
            $thanhcong=false; 
            $loi['repass'] = "Nhập lại mật khẩu đi";
      }elseif ($pass != $repass ) { 
            $thanhcong = false; 
            $loi['repass'] = "Mật khẩu 2 lần không giống";
      }
      
      // chèn dữ liệu
      if ($thanhcong==true) {
          $mahoa = md5($pass);
          $sql = "INSERT INTO  users  
          SET email='$email', password= '$mahoa', hoten='$ht', diachi='$dc', 
              dienthoai='$dt',gioitinh=$p, ngaydangky=NOW()";
          $kq = $this->db->query($sql) ;
     }
      return $thanhcong;
     }//DangKyThanhVien
     
      
	//các method
	
} //class goc
?>
