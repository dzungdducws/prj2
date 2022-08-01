<?php
session_start();
include_once("connect.php");
if(isset($_SESSION["tai_khoan"]) && isset($_SESSION["mat_khau"])){
    $id = $_GET["ID_khuyen_mai"];
    $sql = "DELETE 
            FROM khuyenmai 
            WHERE ID_khuyen_mai = $id;";
    mysqli_query($conn, $sql);
    header("location: index.php?page_layout=quan_ly_khuyen_mai");
    
}
else{
    die("Bạn không có quyền truy cập vào file này !");
}