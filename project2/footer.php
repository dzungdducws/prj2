<div class="footer">
    <p>
        2022 © Soict. Developed by NguyenDucDung-20194028.
    </p>
    <?php
    if (isset($_SESSION["tai_khoan"]) && isset($_SESSION["mat_khau"])) {
        if ($_SESSION["loai_tai_khoan"]) {
            echo '<a href="admin/index.php">Quản lý</a>';
        }
        echo '<a href="admin/logout.php">Đăng xuất</a>';
    } else {
        echo '<a href="admin/index.php">Đăng nhập</a>';
    }
    ?>
</div>