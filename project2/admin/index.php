<script src="ckeditor/ckeditor.js"></script>
<?php
include_once("connect.php");
session_start();
define("TEMPLATE", true);
if(isset($_SESSION["tai_khoan"]) && isset($_SESSION["mat_khau"]) && isset($_SESSION["loai_tai_khoan"]) ){
    if ($_SESSION["loai_tai_khoan"]){
        include_once("admin.php");
    }else{
        header("location: ../index.php");
    }
}
else{
    include_once("login.php");
}
?>