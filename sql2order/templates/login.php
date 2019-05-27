<?php
ob_start();
if (empty($user) || $user == NULL || !$user)
{
?>
<div class="container">
	<div class="row main">
		<div class="panel-heading">
           <div class="panel-title text-center">
           		<h1 class="title">Đăng nhập</h1>
           		<hr />
           	</div>
        </div> 
		<div class="main-login main-center animated shake">
			<form class="form-horizontal" method="POST" action="" role="form">
				<div class="form-group">
					<label for="name" class="cols-sm-2 control-label">Tên đăng nhập</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="text" class="form-control" name="username" id="username" placeholder="Nhập tên đăng nhập"/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="confirm" class="cols-sm-2 control-label">Mật khẩu</label>
					<div class="cols-sm-10">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
							<input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu"/>
						</div>
					</div>
				</div>

				<div class="form-group">
					<button type="submit" name="dangnhap" class="btn btn-primary btn-lg btn-block login-button">Đăng nhập</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
}else{
	header('Location: home');
}
if(isset($_POST['dangnhap'])){
	if(empty($_POST['username']) || empty($_POST['password'])){
		echo '<div class="container">
			<div class="row main">
				<div class="col-sm-12">
					<div class="form-group">
						<div class="alert alert-danger" role="alert">Một số trường bắt buộc nhập.</div>
					</div>
				</div>
			</div>
		</div>';
		}else{
			$username = $db->real_escape_string(@$_POST["username"]);
			$password = md5(@$_POST["password"]);

			$kiem_tra_user = "SELECT username FROM users WHERE username = '$username'";

			if($db->num_rows($kiem_tra_user)){
				$kiem_tra_password = "SELECT username FROM users WHERE username = '$username' AND password = '$password'";
				if($db->num_rows($kiem_tra_password)){

					$ck = $db->fetch_assoc("SELECT * FROM users WHERE username = '$username'", 1);

					$session->send($ck['username']);

					$db->close();
					ob_clean();
					ob_end_flush();

					header('Location: index.php');
				}else{
					echo '
			<div class="container">
				<div class="row main">
					<div class="col-sm-12">
						<div class="alert alert-danger" role="alert">Sai mật khẩu!</div>
					</div>
				</div>
			</div>';
			}
		}else{
			echo '
	    	<div class="container">
				<div class="row main">
					<div class="col-sm-12">
						<div class="alert alert-danger" role="alert">Tên đăng nhập không tồn tại.</div>
					</div>
				</div>
			</div>';
		}
	}
}