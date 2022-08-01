<div class="">
    <h3>Chương trình có chứa "<?php $search = $_GET['Search'];
                                echo $search; ?>"</h3>
    <div class="product-list">
        <?php
        $search = '%' . $search . '%';
        $sql = "SELECT * FROM `chuongtrinh` WHERE `ten_chuong_trinh` LIKE '$search'";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
        ?>
            <a href="index.php?page_layout=chi_tiet_chuong_trinh&&id=<?php echo $row["ID_chuong_trinh"] ?>" class="product-item">
                <img src="admin/images/<?php echo $row['anh_minh_hoa']; ?>">
                <h4><?php echo $row['ten_chuong_trinh']; ?></h4>
                <p>Ngày chiếu: <span><?php $date = date_create($row["ngay_chieu"]);
                                        echo date_format($date, "d/m/Y") ?></span></p>
                <p>Giá vé: <?php echo number_format($row["gia_ve"], 0, '', ',') ?>đ</p>
            </a>
        <?php } ?>
    </div>
</div>