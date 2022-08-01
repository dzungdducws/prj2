<?php
if(!defined("TEMPLATE")){
	die("Bạn không có quyền truy cập vào file này !");
}

$id = $_GET["ID_khuyen_mai"];

$sql_prd = "SELECT * FROM `khuyenmai`
            WHERE `ID_khuyen_mai` = $id";

$query_prd = mysqli_query($conn, $sql_prd);
$row_prd = mysqli_fetch_array($query_prd);

if(isset($_POST["sbm"])){

    $ma = $_POST["ma"];
    $gia_tri = $_POST["gia_tri"];
    $ngay_het_han = $_POST["ngay_het_han"];
    $so_luong = $_POST["so_luong"];

    $sql = "UPDATE `khuyenmai` 
    SET 
    `ma` = '$ma', 
    `gia_tri` = '$gia_tri', 
    `ngay_het_han` = '$ngay_het_han', 
    `so_luong` = '$so_luong'
    WHERE 
    `ID_khuyen_mai` = '$id'
    ";

    mysqli_query($conn, $sql);
    header("location: index.php?page_layout=quan_ly_khuyen_mai");
}
?>
<div class="main">
    <h2>Sửa khuyến mãi</h2>

    <form role="form" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Mã</label>
            <input required name="ma" class="form-control" 
                value="<?php echo $row_prd["ma"] ?>">
        </div>
        
        <div class="form-group">
            <label>Giá trị</label>
            <input required name="gia_tri" type="number" min="0" max="100" step=any class="form-control" 
                value="<?php echo $row_prd["gia_tri"] ?>">
        </div>
        
        <div class="form-group">
            <label>Ngày hết hạn</label>
            <input required name="ngay_het_han" type="date" class="form-control"
            value="<?php echo $row_prd["ngay_het_han"] ?>">
        </div>

        <div class="form-group">
            <label>Số lượng</label>
            <input required name="so_luong" type="number" min="0" class="form-control"
                value="<?php echo $row_prd["so_luong"] ?>">
        </div>
        
        <button name="sbm" type="submit" class="btn">Sửa mới</button>

    </form>
</div>