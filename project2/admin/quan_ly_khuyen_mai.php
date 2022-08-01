<?php
if(!defined("TEMPLATE")){
	die("Bạn không có quyền truy cập vào file này !");
}
?>

<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>

<div class="main">
    <h2>Danh sách mã khuyến mãi</h2>
    <a href="index.php?page_layout=them_khuyen_mai"><button class="btn">Thêm chương trình</button></a>
    <table class="sortable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã</th>
                <th>Giáo trị</th>
                <th>NNgày hết hạn</th>
                <th>Số lượng</th>
                <th>Hành động</th>

            </tr>
        </thead>
        <tbody>

            <?php
                $sql = "SELECT * FROM `khuyenmai`";
                $query = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($query)){
            ?>

            <tr>
                <td><?php echo $row["ID_khuyen_mai"] ?></td>
                <td><?php echo $row["ma"] ?></td>
                <td><?php echo $row["gia_tri"] ?></td>
                <td><?php echo $row["ngay_het_han"] ?></td>
                <td><?php echo number_format($row["so_luong"], 0, '', ',') ?></td>
                <td>
                    <a href="index.php?page_layout=sua_khuyen_mai&&ID_khuyen_mai=<?php echo $row["ID_khuyen_mai"];?>"><button class="btn">Sửa</button></a>
                    <a href="xoa_khuyen_mai.php?ID_khuyen_mai=<?php echo $row["ID_khuyen_mai"];?>"><button class="btn">Xóa    </button></a>
                </td>
            </tr>

            <?php } ?>
        </tbody>
    </table>
</div>