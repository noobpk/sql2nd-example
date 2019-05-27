<?php
ob_start();
if (empty($user) || $user == NULL || !$user)
{
?>
<div class="container khung">
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-warning animated shake">
				<div class="panel-heading">
					<h3 class="panel-title text-center">Đăng ký</h3>
				</div>
				<div class="panel-body">
					<form action="" method="POST" role="form">
						<div class="form-group">
							<label for="username">Tên đăng nhập</label>
							<input type="text" class="form-control" id = "username" name="username" placeholder="Tên đăng nhập">
						</div>
						<div class="form-group">
							<label for="password">Mật khẩu</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu">
						</div>
						<div class="form-group">
							<label for="re_password">Nhập lại mật khẩu</label>
							<input type="password" class="form-control" id="re_password" name="re_password" placeholder="Nhập lại mật khẩu">
						</div>
						<button type="submit" name="dangky" class="btn btn-warning"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Đăng ký</a>
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}else{
	header('Location: home');
}
if(isset($_POST['dangky'])){
if(empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["re_password"])){
	?>
	<div class="container dangnhap">
		<div class="row">
			<div class="col-sm-12">
				<div class="alert alert-danger" role="alert">Một số trường bắt buộc nhập.</div>
			</div>
		</div>
	</div>
	<?php
}else{
	$username = $db->real_escape_string(@$_POST["username"]);
	$password = @$_POST["password"];
	$re_password = @$_POST["re_password"];

	$kiem_tra_user = "SELECT username FROM users WHERE username = '$username'";

	?>
	<div class="container dangnhap">
		<div class="row">
			<div class="col-sm-12">
	<?php
	if($db->num_rows($kiem_tra_user)){
		echo '<div class="alert alert-danger" role="alert">Tên đăng nhập đã tồn tại.</div>';
	}
	// else if (strlen($username) < 6 || strlen($username) > 24){
	// 	echo '<div class="alert alert-danger" role="alert">Tên đăng nhập phải nằm trong khoảng 6-24 ký tự.</div>';
	// }
	// else if (preg_match('/\W/', $username)){
	//
	// 		<div class="alert alert-danger" role="alert">Tên đăng nhập không được chứa ký tự đặc biệt và khoảng trắng.</div>
	// 	<?php
	// }
	else if (strlen($password) < 6){
		?>
			<div class="alert alert-danger" role="alert">Mật khẩu phải lớn hơn 6 ký tự.</div>
		<?php
	}
	else if ($password != $re_password){
		?>
			<div class="alert alert-danger" role="alert">Mật khẩu nhập lại không khớp.</div>
		<?php
	}
	else{
		$password = md5($password);

		$sql_signup = "INSERT INTO users VALUES (
        '',
        '$username',
        '$password'
    	)";
    	    $db->query($sql_signup);
    		$db->close();
    		header('Location: index.php?t=login');
	}
	?>
			</div>
		</div>
	</div>
	<?php
}
}