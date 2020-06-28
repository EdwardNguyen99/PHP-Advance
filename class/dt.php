<?php 
require_once "class/goc.php";
class dt extends goc{
    function SanPhamTrongLoai($TenLoai,$pageNum, $pageSize,&$totalRows ){
        $TenLoai = $this->db->escape_string($TenLoai);
        $startRow = ($pageNum-1)*$pageSize;
        $sql="SELECT idDT, TenDT, urlHinh FROM dienthoai  WHERE AnHien = 1
        AND idLoai in (select idLoai FROM loaisp WHERE TenLoai='$TenLoai') 
        ORDER BY NgayCapNhat DESC LIMIT $startRow , $pageSize ";	
        $kq = $this->db-> query($sql);
        if(!$kq) die( $this-> db->error);	
         
        $sql="SELECT count(*) FROM dienthoai WHERE AnHien = 1 
        AND idLoai in (select idLoai FROM loaisp WHERE TenLoai='$TenLoai')";   
        $rs = $this->db->query($sql) ;	
        $row_rs = $rs->fetch_row();
        $totalRows = $row_rs[0];
        if(!$kq) die( $this-> db->error);	
        return $kq;		
     }
     function pagesList1($baseURL,$totalRows,$pageNum,$pageSize,$offset){
        if ($totalRows<=0) return "";
        $totalPages = ceil($totalRows/$pageSize);
        if ($totalPages<=1) return "";
        $from = $pageNum - $offset;	
        $to = $pageNum + $offset;
        if ($from <=0) { $from = 1;   $to = $offset*2; }
        if ($to > $totalPages) { $to = $totalPages; }
        $links = "<ul class='pagination'>";
        for($j = $from; $j <= $to; $j++) {
        if ($j==$pageNum) 
        $links=$links."<li><a href='$baseURL/$j/' class=active>$j</a></li>";
        else
           $links= $links."<li><a href = '$baseURL/$j/'>$j</a></li>"; 
        } //for
        $links= $links."</ul>";
        return $links;
     } // function pagesList1
     function CheckEmail($email){
        $sql="select idUser from users where email ='{$email}'";
        $kq = $this->db->query($sql);
        if ($kq->num_rows>0) return false;	
       else return true;
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
   function  DanhDauKichHoatUser($id, $rd){
      $sql="UPDATE users SET active=1 WHERE iduser =$id AND randomkey='$rd' AND active=0";
      $kq = $this->db->query($sql);
      return $this->db->affected_rows;
      }
         
    
     
}//dt
?>
