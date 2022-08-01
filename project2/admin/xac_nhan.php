<?php
session_start();
include_once("connect.php");
if(isset($_SESSION["tai_khoan"]) && isset($_SESSION["mat_khau"])){
    $id = $_GET["ID_thanh_toan"];
    
    $sql = "UPDATE `hoadon` 
            SET 
            `trang_thai` = 1 
            WHERE 
            `id_hoa_don` = '$id'";
    mysqli_query($conn, $sql);
    header("location: index.php?page_layout=xac_nhan_thanh_toan");
}
else{
    die("Bạn không có quyền truy cập vào file này !");
}
?>