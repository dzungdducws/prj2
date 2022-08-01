<?php
session_start();
include_once("connect.php");
if(isset($_SESSION["tai_khoan"]) && isset($_SESSION["mat_khau"])){
    $id = $_GET["ID_chuong_trinh"];
    $sql = "DELETE 
            FROM chuongtrinh 
            WHERE ID_chuong_trinh = $id;";
    mysqli_query($conn, $sql);
    header("location: index.php?page_layout=quan_ly_chuong_trinh");
    
}
else{
    die("Bạn không có quyền truy cập vào file này !");
}
?>