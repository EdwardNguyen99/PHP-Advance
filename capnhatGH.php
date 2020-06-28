<?php 
session_start();
require_once "class/dt.php";
$dt=new dt;
$action =$_GET['action'];//de biet phai lam gi them/xoa/sua/cap nhat
$idDT=$_GET['idDT']; //de biet san pham nao them hay bot
$dt->CapNhatGioHang($action, $idDT);
if ($action=="add") header("location:gio-hang/" );
if ($action=="remove") header("location:gio-hang/");
if ($action=="update") header("location:gio-hang/");
?>