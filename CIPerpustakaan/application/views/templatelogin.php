<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link href="<?php echo base_url('asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"'); ?> >
<!--===============================================================================================-->
	<link href="<?php echo base_url('asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"'); ?> >
<!--===============================================================================================-->
	<link href="<?php echo base_url('asset/fonts/Linearicons-Free-v1.0.0/icon-font.min.css" rel="stylesheet" type="text/css"'); ?> >
<!--===============================================================================================-->
	<link href="<?php echo base_url('asset/vendor/animate/animate.css" rel="stylesheet" type="text/css"'); ?> >
<!--===============================================================================================-->	
	<link href="<?php echo base_url('asset/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" type="text/css"'); ?> >
<!--===============================================================================================-->
	<link href="<?php echo base_url('asset/vendor/animsition/css/animsition.min.css"rel="stylesheet" type="text/css"'); ?> >
<!--===============================================================================================-->
	<link href="<?php echo base_url('asset/vendor/select2/select2.min.css" rel="stylesheet" type="text/css"'); ?> >
<!--===============================================================================================-->	
	<link href="<?php echo base_url('asset/vendor/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css"'); ?> >
<!--===============================================================================================-->
	<link href="<?php echo base_url('asset/css/util.css" rel="stylesheet" type="text/css"'); ?> >
	<link  href="<?php echo base_url('asset/css/main.css" rel="stylesheet" type="text/css"'); ?>>
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(<?php echo base_url('asset/')?>images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>

        <?php
          // Cetak session
          if($this->session->flashdata('sukses')) {
          echo '<p class="warning" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
          }
          // Cetak error
          echo validation_errors('<p class="warning" style="margin: 10px 20px;">','</p>');
        ?>

				<form method="post" action="login" class="login100-form validate-form">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" id="username" name="username" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" id="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>

					
					<div class="container-login100-form-btn">
						<input type="submit" name="submit" id="submit" value="Login"  class="login100-form-btn">
					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/vendor/jquery/jquery-3.2.1.min.js"'); ?>></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/vendor/animsition/js/animsition.min.js"'); ?>></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/vendor/bootstrap/js/popper.js"'); ?>></script>
	<script src="<?php echo base_url('asset/vendor/bootstrap/js/bootstrap.min.js"'); ?>></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/vendor/select2/select2.min.js"'); ?>></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/vendor/daterangepicker/moment.min.js"'); ?>></script>
	<script src="<?php echo base_url('asset/vendor/daterangepicker/daterangepicker.js"'); ?>></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/vendor/countdowntime/countdowntime.js"'); ?>></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url('asset/js/main.js"'); ?>></script>

</body>
</html>