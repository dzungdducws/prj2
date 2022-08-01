<?php
if(!defined("TEMPLATE")){
	die("Bạn không có quyền truy cập vào file này !");
}
?>

<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>

<div class="main">
    <h2>Danh sách đơn hàng</h2>
    <table class="sortable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tổng tiền</th>
                <th>Ngày tạo</th>
                <th>Trạng thái</th>
                <th>Ảnh xác minh</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $sql = "SELECT * FROM hoadon join thanhtoan on thanhtoan.id_thanh_toan = hoadon.id_hoa_don;";
                $query = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($query)){
            ?>

            <tr>
                <td><?php echo $row["ID_thanh_toan"] ?></td>
                <td><?php echo number_format($row["tong_tien"], 0, '', ',') ?></td>
                <td><?php echo $row["ngay_tao"] ?></td>
                <td><?php if ($row["trang_thai"]){echo "Đã xác nhận";}else{echo "Chưa xác nhận";} ?></td>
                
                <td class="td-img"><img src="images/<?php echo $row["anh"];?>" alt=""></td>
                <td>
                    <a href="xac_nhan.php?ID_thanh_toan=<?php echo $row["ID_thanh_toan"];?>"><button class="btn">xác nhận</button></a>
                    <a href="huy_xac_nhan.php?ID_thanh_toan=<?php echo $row["ID_thanh_toan"];?>"><button class="btn">hủy xác nhận</button></a>
                </td>

            </tr>

            <?php } ?>
        </tbody>
    </table>
</div>