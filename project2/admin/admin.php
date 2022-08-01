<?php
if (!defined("TEMPLATE")) {
    die("Bạn không có quyền truy cập vào file này !");
}
if (isset($_GET["page_layout"])) {
    switch ($_GET["page_layout"]) {
        case "xac_nhan_thanh_toan":
            $title = "Xác nhận thanh toán";
            break;
        case "quan_ly_chuong_trinh":
            $title = "Quản lý chương trình";
            break;
        case "quan_ly_khuyen_mai":
            $title = "Quản lý khuyến mại";
            break;
        case "contact":
            $title = "Thông tin";
            break;
    }
} else
    $title = "Trang chủ";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $title ?></title>
</head>

<body>
    <div class="header">
        <div class="header-left">
            <a href="../index.php">
                <h3>Trang quản lý</h3>
            </a>
        </div>

        <div class="header-right">
            <h4>
                <?php
                $tmp = $_SESSION["loai_tai_khoan"];
                $sql = "SELECT * FROM nguoidung 
                    JOIN taikhoan 
                    ON nguoidung.ID_tai_khoan = taikhoan.id
                    AND taikhoan.loai_tai_khoan = $tmp";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($query);
                echo $row["ten"]
                ?>
            </h4>
            <a href="logout.php">Đăng xuất</a>
        </div>
    </div>

    <div class="sidenav">
        <a href="index.php?page_layout=xac_nhan_thanh_toan">Xác nhận thanh toán</a>
        <a href="index.php?page_layout=quan_ly_chuong_trinh">Quản lý chương trình</a>
        <a href="index.php?page_layout=quan_ly_khuyen_mai">Quản lý khuyến mại</a>
        <a href="logout.php">Đăng xuất</a>
        <a href="index.php?page_layout=contact">Contact</a>
    </div>

    <?php
    if (isset($_GET["page_layout"])) {
        switch ($_GET["page_layout"]) {
            case "xac_nhan_thanh_toan":
                include_once("xac_nhan_thanh_toan.php");
                break;
            case "quan_ly_chuong_trinh":
                include_once("quan_ly_chuong_trinh.php");
                break;
            case "them_chuong_trinh":
                include_once("them_chuong_trinh.php");
                break;
            case "sua_chuong_trinh":
                include_once("sua_chuong_trinh.php");
                break;
            case "sua_chuong_trinh":
                include_once("xoa_chuong_trinh.php");
                break;
            case "quan_ly_khuyen_mai":
                include_once("quan_ly_khuyen_mai.php");
                break;
            case "them_khuyen_mai":
                include_once("them_khuyen_mai.php");
                break;
            case "sua_khuyen_mai":
                include_once("sua_khuyen_mai.php");
                break;

            case "contact":
                include_once("contact.php");
                break;
        }
    } else
        include_once("contact.php");
    ?>
</body>

</html>