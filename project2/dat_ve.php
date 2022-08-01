<?php
if (!$_SESSION["id_nguoi_dung"]) {
    header("location: admin/index.php");
}

$id = $_GET["id"];
$sql = "SELECT * FROM `chuongtrinh` WHERE `id_chuong_trinh` = '$id'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

if (isset($_POST['submit'])) {

    if (!empty($_POST['vehicle'])) {
        $_SESSION["ghe_da_chon"] = array();
        foreach ($_POST['vehicle'] as $value) {
            array_push($_SESSION["ghe_da_chon"], array('hang' => ($value - $value % 10) / 10, 'cot' => $value % 10));
        }

        header("location: index.php?page_layout=thanh_toan&&id=$id");
    }
}

function selected($i, $j, $id, $conn)
{
    $sql1 = "SELECT * FROM `ghe` WHERE `hang`=$i AND `cot`=$j AND `id_chuong_trinh`=$id";
    $query1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($query1) > 0) {
        echo 'class="selected" disabled';
    }
    // echo $sql1;
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

<div class="note">
    <div>chỗ đã chọn</div>
    <div>chỗ đang chọn</div>
    <div>chỗ trống</div>
</div>

<div class="section">
    <table>
        <tr>
            <th colspan="7">
                <h3>Vị trí trình diễn</h3>
            </th>
        </tr>
        <form role="form" method="post" enctype="multipart/form-data">
            <?php $n = 7;
            for ($i = 1; $i <= $n; $i++) {
            ?>
                <tr>
                    <?php
                    for ($j = 1; $j <= $n; $j++) {
                    ?>
                        <td id="check<?php echo $i . $j ?>" <?php selected($i, $j, $id, $conn); ?> onclick="myFunction(<?php echo $i . $j . ',' . $row['gia_ve'] ?>)">
                            <input type='checkbox' id="vehicle<?php echo $i . $j ?>" name="vehicle[]" value="<?php echo $i . $j ?>">
                            <?php echo $i . $j ?>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>

            <tr>
                <th class="last_th" colspan="7">
                    <div>
                        <div>
                            <h3>Số lượng: <span id="count">0</span></h3>
                            <h3>Tổng tiền: <span id="price">0đ</span></h3>
                        </div>
                        <input class="btn" type="submit" value="Submit" name="submit">
                    </div>
                </th>
            </tr>
        </form>
    </table>
</div>


<script>
    let count = 0

    function myFunction(vitri, gia) {
        if (document.getElementById("check" + vitri).className != "selected")
            if (document.getElementById("vehicle" + vitri).checked) {
                document.getElementById("check" + vitri).classList.remove("choose")
                document.getElementById("vehicle" + vitri).checked = false
                count--
            } else {
                document.getElementById("check" + vitri).classList.add("choose")
                document.getElementById("vehicle" + vitri).checked = true
                count++
            }
        document.getElementById("count").textContent = count;
        document.getElementById("price").textContent = (gia * count).toLocaleString('en-US') + "đ";

    }
</script>