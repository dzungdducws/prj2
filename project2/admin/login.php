<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Trang đăng nhập</title>
</head>

<body>
    <?php
	if(isset($_POST["sbm"])){

		$tai_khoan = $_POST["tai_khoan"];
		$mat_khau = $_POST["mat_khau"];
		$loai_tai_khoan = $_POST["loai_tai_khoan"];

		$sql = "SELECT * FROM taikhoan
				WHERE tai_khoan = '$tai_khoan'
				AND mat_khau = '$mat_khau'
				AND loai_tai_khoan = '$loai_tai_khoan'";

		$query = mysqli_query($conn, $sql);
		
		if(mysqli_num_rows($query) > 0){
			
			$_SESSION["tai_khoan"] = $tai_khoan;
			$_SESSION["mat_khau"] = $mat_khau;
			$_SESSION["loai_tai_khoan"] = $loai_tai_khoan;
			$row = mysqli_fetch_array($query);
			$_SESSION["id_nguoi_dung"] = $row["id"];
			header("location: index.php");

		}
		else{
			$error = '<p class="alert">Tài khoản không hợp lệ !</p>';
		}
	}
	?>

    <div class="login-page">
        <form class="form" method="post">
            <input name="tai_khoan" autofocus placeholder="username" />
            <input name="mat_khau" type="password" placeholder="password" />
			<select name="loai_tai_khoan" class="form-control">
                <option value=0 >Khách hàng</option>
                <option value=1 >Admin</option>
            </select>
            <button type="submit" name="sbm">login</button>
            
            <?php if(isset($error)){echo $error;}?>
        </form>
    </div>
</body>

</html>