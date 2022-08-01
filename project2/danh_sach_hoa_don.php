<?php
if (!$_SESSION["id_nguoi_dung"]) {
    header("location: admin/index.php");
}
?>

<div class="section">
    <h2>Danh sách đơn hàng</h2>
    <table class="sortable table_diff_1">
        <tr>
            <th>ID</th>
            <th>Tổng tiền</th>
            <th>Các ghế</th>
            <th>Ngày tạo</th>
            <th>Trạng thái</th>
            <th>Ảnh xác minh</th>
        </tr>

        <?php
        $id_nguoi_dung = $_SESSION["id_nguoi_dung"];
        $sql = "SELECT * FROM hoadon join thanhtoan on thanhtoan.id_thanh_toan = hoadon.id_hoa_don and hoadon.id_khach_hang = $id_nguoi_dung;";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $id_thanh_toan = $row['ID_thanh_toan'];

        ?>

            <tr>
                <td><?php echo $row["ID_thanh_toan"] ?></td>
                <td><?php echo number_format($row["tong_tien"], 0, '', ',') ?></td>
                <td>
                    <table class="sortable table_diff">
                        <tr>
                            <th>STT</th>
                            <th>Hàng</th>
                            <th>Cột</th>
                        </tr>
                        <?php
                        $count = 1;
                        $sql1 = "SELECT * FROM ghe JOIN hoadon ON hoadon.id_hoa_don = ghe.id_hoa_don and hoadon.id_hoa_don = $id_thanh_toan;";
                        $query1 = mysqli_query($conn, $sql1);
                        while ($row1 = mysqli_fetch_array($query1)) {
                        ?>
                            <tr>
                                <td><?php echo $count++ ?></td>
                                <td><?php echo $row1["hang"] ?></td>
                                <td><?php echo $row1["cot"] ?></td>
                            </tr>

                        <?php } ?>
                    </table>
                </td>
                <td><?php echo $row["ngay_tao"] ?></td>
                <td><?php if ($row["trang_thai"]) {
                        echo "Đã xác nhận";
                    } else {
                        echo "Chưa xác nhận";
                    } ?></td>

                <td class="td-img"><img src="admin/images/<?php echo $row["anh"]; ?>" alt=""></td>


            </tr>

        <?php } ?>
    </table>
</div>