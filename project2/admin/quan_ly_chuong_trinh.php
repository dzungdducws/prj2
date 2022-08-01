<?php
if(!defined("TEMPLATE")){
	die("Bạn không có quyền truy cập vào file này !");
}
?>

<script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>

<div class="main">
    <h2>Danh sách chương trình</h2>
    <a href="index.php?page_layout=them_chuong_trinh"><button class="btn">Thêm chương trình</button></a>
    <table class="sortable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên chương trình</th>
                <th>Ảnh minh họa</th>
                <th>Mô tả</th>
                <th>Giá vé</th>
                <th>Ngày chiếu</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $sql = "SELECT * FROM `chuongtrinh`";
                $query = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($query)){
            ?>

            <tr>
                <td><?php echo $row["ID_chuong_trinh"] ?></td>
                <td><?php echo $row["ten_chuong_trinh"] ?></td>
                <td class="td-img"><img src="images/<?php echo $row["anh_minh_hoa"];?>" alt=""></td>
                <td><?php echo $row["thong_tin_chuong_trinh"] ?></td>
                <td><?php echo number_format($row["gia_ve"], 0, '', ',') ?>đ</td>
                <td><?php $date = date_create($row["ngay_chieu"]); echo date_format($date, "d/m/Y") ?></td>
                <td>
                    <a href="index.php?page_layout=sua_chuong_trinh&&ID_chuong_trinh=<?php echo $row["ID_chuong_trinh"];?>"><button class="btn">Sửa</button></a>
                    <a href="xoa_chuong_trinh.php?ID_chuong_trinh=<?php echo $row["ID_chuong_trinh"];?>"><button class="btn">Xóa    </button></a>
                </td>
            </tr>

            <?php } ?>
        </tbody>
    </table>
</div>