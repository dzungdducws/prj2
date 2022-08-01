<?php
if(!defined("TEMPLATE")){
	die("Bạn không có quyền truy cập vào file này !");
}

$id = $_GET["ID_chuong_trinh"];

$sql_prd = "SELECT * FROM `chuongtrinh`
            WHERE `ID_chuong_trinh` = $id";

$query_prd = mysqli_query($conn, $sql_prd);
$row_prd = mysqli_fetch_array($query_prd);

if(isset($_POST["sbm"])){

    $ten_chuong_trinh = $_POST["ten_chuong_trinh"];

    if($_FILES["anh_minh_hoa"]["name"] != ""){
        $anh_minh_hoa = $_FILES["anh_minh_hoa"]["name"];
        $tmp_name = $_FILES["anh_minh_hoa"]["tmp_name"];
        move_uploaded_file($tmp_name, "images/".$anh_minh_hoa);
    }
    else{
        $anh_minh_hoa = $row_prd["anh_minh_hoa"];
    }

    $thong_tin_chuong_trinh = $_POST["thong_tin_chuong_trinh"];
    $gia_ve = $_POST["gia_ve"];
    $ngay_chieu = $_POST["ngay_chieu"];

    $sql = "UPDATE `chuongtrinh` 
    SET 
    `ten_chuong_trinh` = '$ten_chuong_trinh', 
    `anh_minh_hoa` = '$anh_minh_hoa', 
    `thong_tin_chuong_trinh` = '$thong_tin_chuong_trinh', 
    `gia_ve` = '$gia_ve', 
    `ngay_chieu` = '$ngay_chieu'
    WHERE 
    `ID_chuong_trinh` = '$id'
    ";

    mysqli_query($conn, $sql);
    header("location: index.php?page_layout=quan_ly_chuong_trinh");
}
?>
<div class="main">
    <h2>Sửa chương trình</h2>

    <form role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Tên chương trình</label>
            <input required name="ten_chuong_trinh" class="form-control" 
                value="<?php echo $row_prd["ten_chuong_trinh"] ?>">
        </div>
        
        <div class="form-group">
            <label>Ảnh sản phẩm</label>

            <input name="anh_minh_hoa" type="file">
            <br>
            <div>
                <img src="images/<?php echo $row_prd["anh_minh_hoa"] ?>">
            </div>
        </div>

        <div class="form-group">
            <label>Mô tả</label>
            <input required name="thong_tin_chuong_trinh" class="form-control"
                value="<?php echo $row_prd["thong_tin_chuong_trinh"] ?>">
        </div>

        <div class="form-group">
            <label>Giá vé</label>
            <input required name="gia_ve" type="number" min="0" class="form-control"
                value="<?php echo $row_prd["gia_ve"]?>">
        </div>

        <div class="form-group">
            <label>Ngày chiếu</label>
            <input required name="ngay_chieu" type="date" class="form-control"
                value="<?php echo $row_prd["ngay_chieu"] ?>">
        </div>

        <button name="sbm" type="submit" class="btn">Sửa mới</button>

    </form>
</div>