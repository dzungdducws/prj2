<?php
if(!defined("TEMPLATE")){
	die("Bạn không có quyền truy cập vào file này !");
}



if(isset($_POST["sbm"])){

    $ten_chuong_trinh = $_POST["ten_chuong_trinh"];

    $anh_minh_hoa = $_FILES["anh_minh_hoa"]["name"];
    $tmp_name = $_FILES["anh_minh_hoa"]["tmp_name"];
    move_uploaded_file($tmp_name, "images/".$anh_minh_hoa);

    $thong_tin_chuong_trinh = $_POST["thong_tin_chuong_trinh"];
    $gia_ve = $_POST["gia_ve"];
    $ngay_chieu = $_POST["ngay_chieu"];


    $sql = "INSERT INTO `chuongtrinh` (
        `ten_chuong_trinh`, 
        `anh_minh_hoa`, 
        `thong_tin_chuong_trinh`, 
        `gia_ve`, 
        `ngay_chieu`
        ) 
        VALUES (
        '$ten_chuong_trinh', 
        '$anh_minh_hoa', 
        '$thong_tin_chuong_trinh', 
        '$gia_ve', 
        '$ngay_chieu'
        );
        ";

    mysqli_query($conn, $sql);
    header("location: index.php?page_layout=quan_ly_chuong_trinh");
}
?>
<div class="main">
    <h2>Thêm chương trình</h2>

    <form role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên chương trình</label>
            <input required name="ten_chuong_trinh" class="form-control" >
        </div>

        <div class="form-group">
            <label>Ảnh sản phẩm</label>

            <input required name="anh_minh_hoa" type="file">
            <br>
            <div>
                <img src="images/anh_20194028.jpg">
            </div>
        </div>

        <div class="form-group">
            <label>Mô tả</label>
            <input required name="thong_tin_chuong_trinh" class="form-control" >
        </div>

        <div class="form-group">
            <label>Giá vé</label>
            <input required name="gia_ve" type="number" min="0" class="form-control">
        </div>

        <div class="form-group">
            <label>Ngày chiếu</label>
            <input required name="ngay_chieu" type="date" class="form-control" >
        </div>

        <button name="sbm" type="submit" class="btn">Thêm mới</button>

    </form>
</div>