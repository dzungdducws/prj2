<?php
session_start();
if(isset($_SESSION["tai_khoan"]) && isset($_SESSION["mat_khau"])){
    unset($_SESSION["tai_khoan"]);
    unset($_SESSION["mat_khau"]);
    unset($_SESSION["loai_tai_khoan"]);
    unset($_SESSION["id_nguoi_dung"]);
}
else{
    die("Bạn không có quyền truy cập vào file này !");
}
header("location: ../index.php");
?>