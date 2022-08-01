<div class="header">
    <div class="header-left">
        <a href="index.php">
            <h3>Đặt vé xem</h3>
        </a>
    </div>
    <div class="header-mid">
        <?php
        if (isset($_POST["sbm"])) {
            $search = $_POST["search"];
            header("location: index.php?page_layout=search&&Search=$search");
        }
        ?>
        <form role="form" method="post" enctype="multipart/form-data">
            <input class="form-control" type="search" placeholder="Tìm kiếm" aria-label="Search" name="search">
            <button class="btn btn_diff" type="submit" name="sbm">Tìm kiếm</button>
        </form>
    </div>
    <div class="header-right">
        <h4>
            <?php
            if (isset($_SESSION['loai_tai_khoan'])){
                
            $tmp = $_SESSION["loai_tai_khoan"];
            $sql = "SELECT * FROM nguoidung 
                    JOIN taikhoan 
                    ON nguoidung.ID_tai_khoan = taikhoan.id
                    AND taikhoan.loai_tai_khoan = $tmp";
            $query = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($query);
            echo $row["ten"];
            ?>
        </h4>
        <p>|||||</p>
        <a href="index.php?page_layout=danh_sach_hoa_don">Giỏ hàng</a>
        <?php } ?>
    </div>
</div>