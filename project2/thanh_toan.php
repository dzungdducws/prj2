<?php
$id = $_GET["id"];
$sql = "SELECT * FROM `chuongtrinh` WHERE `id_chuong_trinh` = '$id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
$ma = "";
$giamgia = 100;
$count = 0;

if (isset($_POST["sbm_km"])) {
    $ma = $_POST["ma"];
}

$sql1 = "SELECT * FROM `khuyenmai` WHERE `ma` = '$ma' LIMIT 1;";

$query1 = mysqli_query($conn, $sql1);

if (mysqli_num_rows($query1) > 0) {
    $row1 = mysqli_fetch_array($query1);
    $giamgia = 100 - $row1["gia_tri"];
}

if (isset($_POST["sbm_xn"])) {
    $ma = $_POST["ma"];
    $sql1 = "SELECT * FROM `khuyenmai` WHERE `ma` = '$ma' LIMIT 1;";
    $query1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($query1) > 0) {
        $row1 = mysqli_fetch_array($query1);
        $soluong = $row1['so_luong'];
        $soluong--;
        if ($soluong) {
            $sql1 = "UPDATE `khuyenmai` 
                    SET 
                    `so_luong` = '$soluong'
                    WHERE 
                    `ma` = '$ma'
            ";
        } else {
            $sql1 = "DELETE 
                FROM khuyenmai 
                WHERE ma = $ma;";
        }
        mysqli_query($conn, $sql1);
    }

    $anh_minh_chung = $_FILES["anh_minh_chung"]["name"];
    $tmp_name = $_FILES["anh_minh_chung"]["tmp_name"];
    move_uploaded_file($tmp_name, "admin/images/" . $anh_minh_chung);
    $count1 = $_POST["count"];
    $tongtra1 = $_POST["tongtra"];
    $id_nguoi_dung = $_SESSION["id_nguoi_dung"];
    $date_now = date("Y-m-d");

    $sql1 = "INSERT INTO `thanhtoan` (
        `tong_tien`, 
        `anh`, 
        `ngay_tao`
        ) 
        VALUES (
        '$tongtra1', 
        '$anh_minh_chung', 
        '$date_now'
        );
        ";
    mysqli_query($conn, $sql1);

    $sql1 = "INSERT INTO `hoadon` (
        `so_ve`, 
        `trang_thai`, 
        `id_khach_hang`
        ) 
        VALUES (
        '$count1', 
        '0', 
        '$id_nguoi_dung'
        );
        ";
    mysqli_query($conn, $sql1);

    $sql1 = "SELECT * FROM `hoadon` ORDER BY `hoadon`.`id_hoa_don` DESC LIMIT 1;";
    $query1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_array($query1);
    $id_hoa_don = $row1['id_hoa_don'];
    $gia = $row['gia_ve'];
    foreach ($_SESSION["ghe_da_chon"] as $value) {
        $hang = $value['hang'];
        $cot = $value['cot'];
        $sql1 = "INSERT INTO `ghe` (
        `hang`, 
        `cot`, 
        `gia`, 
        `id_hoa_don`, 
        `id_chuong_trinh`
        ) 
        VALUES (
        '$hang', 
        '$cot', 
        '$gia', 
        '$id_hoa_don', 
        '$id'
        );
        ";
        mysqli_query($conn, $sql1);
    }

    header("location: index.php");
}

?>

<div class="product-detail">
    <img src="admin/images/<?php echo $row['anh_minh_hoa']; ?>">
    <div>
        <h1><?php echo $row['ten_chuong_trinh']; ?></h1>
        <p>Mô tả: <span><?php echo $row["thong_tin_chuong_trinh"] ?></span></p>
        <p>Ngày chiếu: <span><?php $date = date_create($row["ngay_chieu"]);
                                echo date_format($date, "d/m/Y") ?></span></p>
        <p>Giá vé: <?php echo number_format($row["gia_ve"], 0, '', ',') ?>đ</p>
    </div>
</div>

<div class="section">
    <h3>Các vị trí đã chọn:</h3>
    <table class="sortable table_diff">
        <tr>
            <th>STT</th>
            <th>Hàng</th>
            <th>Cột</th>
        </tr>
        <?php
        foreach ($_SESSION["ghe_da_chon"] as $value) {
            $count++;
        ?>
            <tr>
                <td><?php echo $count ?></td>
                <td><?php echo $value["hang"] ?></td>
                <td><?php echo $value["cot"] ?></td>
            </tr>
        <?php
        }
        ?>
        <tfoot>
            <tr>
                <td colspan="2">Tổng tiền</td>
                <td><?php $tongtien = $count * $row["gia_ve"];
                    echo number_format($tongtien) ?></td>
            </tr>
            <tr>
                <td colspan="2">Tổng phải trả</td>
                <td><?php $tongtra = $tongtien * $giamgia / 100;
                    echo number_format($tongtra) ?></td>
            </tr>
            <tr>
                <form role="form" method="post" enctype="multipart/form-data">

                    <td colspan="2">
                        <input name="ma" class="form-control" value="<?php echo $ma ?>">
                    </td>
                    <td>
                        <button name="sbm_km" type="submit" class="btn btn_diff">Thêm khuyến mại</button>
                    </td>
                </form>
            </tr>
        </tfoot>
    </table>

    <form role="form" method="post" enctype="multipart/form-data">

        <p>Mời bạn chuyển khoản vào số tài khoản ***********|||ngân hàng ***|||Và gửi minh chứng vào đây:</p>
        <label>Ảnh sản phẩm</label>
        <input required name="anh_minh_chung" type="file">
        <br>
        <div>
            <img src="admin/images/anh_20194028.jpg">
        </div>
        <input type="text" class="hidden" name="ma" value="<?php echo $ma ?>">
        <input type="text" class="hidden" name="count" value="<?php echo $count ?>">
        <input type="text" class="hidden" name="tongtra" value="<?php echo $tongtra ?>">
        <button name="sbm_xn" type="submit" class="btn">Xác nhận</button>
    </form>

</div>