<?php
include_once("admin/connect.php");
session_start();

if (isset($_GET["page_layout"])) {
    switch ($_GET["page_layout"]) {
        case "chi_tiet_chuong_trinh":
            $title = "Chi tiết chương trình";
            break;
        case "dat_ve":
            $title = "Đặt vé";
            break;
        case "thanh_toan":
            $title = "Thanh toán";
            break;
        case "danh_sach_hoa_don":
            $title = "Danh sách hóa đơn";
            break;
        case "search":
            $title = "search";
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
    <title><?php echo $title; ?></title>
</head>

<body>
    <?php
    include_once("header.php");

    if (isset($_GET["page_layout"])) {
        switch ($_GET["page_layout"]) {
            case "chi_tiet_chuong_trinh":
                include_once("chi_tiet_chuong_trinh.php");
                break;
            case "danh_sach":
                include_once("danh_sach.php");
                break;
            case "search":
                include_once("search.php");
                break;
            case "dat_ve":
                include_once("dat_ve.php");
                break;
            case "danh_sach_hoa_don":
                include_once("danh_sach_hoa_don.php");
                break;
            case "thanh_toan":
                include_once("thanh_toan.php");
                break;
        }
    } else
        include_once("danh_sach.php");
    include_once("footer.php");
    ?>
</body>

</html>