<?php
if(!defined("TEMPLATE")){
	die("Bạn không có quyền truy cập vào file này !");
}



if(isset($_POST["sbm"])){

    $ma = $_POST["ma"];
    $gia_tri = $_POST["gia_tri"];
    $ngay_het_han = $_POST["ngay_het_han"];
    $so_luong = $_POST["so_luong"];


    $sql = "INSERT INTO `khuyenmai` (
        `ma`, 
        `gia_tri`, 
        `ngay_het_han`, 
        `so_luong`
        ) 
        VALUES (
        '$ma', 
        '$gia_tri', 
        '$ngay_het_han', 
        '$so_luong'
        );
        ";

    mysqli_query($conn, $sql);
    header("location: index.php?page_layout=quan_ly_khuyen_mai");
}
?>
<div class="main">
    <h2>Thêm khuyến mãi</h2>

    <form role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Mã</label>
            <input required name="ma" class="form-control">
        </div>
        
        <div class="form-group">
            <label>Giá trị</label>
            <input required name="gia_tri" type="number" min="0" max="100" step=any class="form-control">
        </div>
        
        <div class="form-group">
            <label>Ngày hết hạn</label>
            <input required name="ngay_het_han" type="date" class="form-control">
        </div>

        <div class="form-group">
            <label>Số lượng</label>
            <input required name="so_luong" type="number" min="0" class="form-control">
        </div>

        <button name="sbm" type="submit" class="btn">Thêm mới</button>

    </form>
</div>