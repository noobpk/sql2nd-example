<!DOCTYPE html>
<html lang="vn">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Not only First SQL injection</title>
	<link href="https://getbootstrap.com/favicon.ico" rel="icon">
	<!-- css -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/animate.css">
</head>
<body>
<div class="navbar-wrapper">
    <div class="container-fluid">
        <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="./">Find me</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                    </ul>
                    <?php
						if(!$user || empty($user) || $user == NULL){
					?>
                    <ul class="nav navbar-nav pull-right">
                        <li class=""><a href="index.php?t=login">Đăng nhập</a></li>
                        <li class=""><a href="index.php?t=signup">Đăng ký</a></li>
                    </ul>
                    <?php
                    }else{
                    ?>
					<ul class="nav navbar-nav pull-right">
                        <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $user_name?> <span class="caret"></span></a>
                        </li>
                        <li class=""><a href="index.php?t=logout">Đăng xuất</a></li>
                    </ul>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </nav>
    </div>
</div>