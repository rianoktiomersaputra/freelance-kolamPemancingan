<?php
require_once "../config/config.php";
if(isset($_SESSION['rmeg'])){
	echo "<script>window.location='".base_url()."';</script>";
} else {
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  	<link rel="icon" type="image/png" href="<?=base_url('assets/img/teeth.png')?>">
	<title>Login - Rekam Medis Gigi</title>
	
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<link href="<?=base_url('assets/css/now-ui-kit.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" />
	<link href="<?=base_url('assets/css/now-ui-dashboard.css?v=1.0.1')?>" rel="stylesheet" />

	<script src="<?=base_url('assets/js/core/jquery.min.js')?>"></script>
  	<script src="<?=base_url('assets/js/core/popper.min.js')?>"></script>
  	<script src="<?=base_url('assets/js/core/bootstrap.min.js')?>"></script>
  	<script src="<?=base_url('assets/js/plugins/perfect-scrollbar.jquery.min.js')?>"></script>
  	<script src="<?=base_url('assets/js/myscript.js')?>"></script>
  	<script src="<?=base_url('assets/js/plugins/bootstrap-notify.js')?>"></script>
  	<script src="<?=base_url('assets/js/now-ui-dashboard.js?v=1.0.1')?>"></script>
    <script src="<?=base_url('assets/js/sweetalert.min.js')?>"></script>

</head>

<body class="login-page sidebar-collapse">

	<div class="page-header" style="background-color:black">
	<div class="container">
	<div class="col-md-4 content-center" style="margin-top: 100px"><div class="header header-primary text-center">
			<center> <h5 class="title" style="color: white">Selamat Datang di Sistem Monitoring Kolam Pemancingan Ikan</h5> </center>
		</div>
	<div class="card card-login card-plain">
	<form class="form" action="" method="post">
		<div class="header header-primary text-center">
		</div>

		<div class="content" >					
            <?php
				if(isset($_POST['login'])){
					$username = trim(mysqli_real_escape_string($con, $_POST['username']));
					$password = sha1(trim(mysqli_real_escape_string($con, $_POST['password'])));
					$sql_login = mysqli_query($con, "SELECT * FROM user WHERE username = '$username' AND password = '$password' ")or die (mysqli_error($con));

					if (mysqli_num_rows($sql_login) > 0) {
						$_SESSION['rmeg'] = $username; 
							echo '<script language="javascript">swal({text: "Anda Berhasil Login",icon: "success"}).then(() => { window.location.href="../dashboard/" });</script>';
					} else { ?>
						<?php
							echo '<script language="javascript">swal({text: "Username atau Password Salah!",icon: "warning", dangerMode: "true"}).then(() => { window.location.href="../dashboard/" });</script>';
					}
				}
			?>

			<div class="input-group form-group-no-border input-lg">
	        	<input style="color: white" type="text" name="username" class="form-control" placeholder="Username" autofocus required>
	        </div>
								
	        <div class="input-group form-group-no-border input-lg">
	        	<input style="color: white" type="password" name="password" class="form-control" placeholder="Password" required>
	        </div>
								
	        <div class="footer text-center">								
	            <input style="background-color: white; color: black; font-weight: bold" type="submit" name="login" class="btn btn-default btn-round btn-lg btn-block" value="Masuk">		
	        </div>

		</div>
	</form>
	</div>
	</div>
	</div>
	</div>

</body>

</html>
<?php
}
?>