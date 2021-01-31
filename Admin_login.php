<?php include_once "assets/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Farmer SuperMarket</title>
	<link rel="stylesheet" href="bootstrap\bootstrap.min.css">
	<link rel="stylesheet" href="css\body.css">
	<link rel="stylesheet" type="text/css" href="css/log_style.css">
	<link rel="stylesheet" type="text/css" href="css/carrers_css.css">	
	
	</head>

<style>
@import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);
body{
    margin: 0;
    font-size: .9rem;
    font-weight: 400;
    line-height: 1.6;
    color: #212529;
    text-align: left;
    background-color: #f5f8fa;
}

.my-form
{
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}

.my-form .row
{
    margin-left: 0;
    margin-right: 0;
}

.login-form
{
    padding-top: 1.5rem;
    padding-bottom: 1.5rem;
}

.login-form .row
{
    margin-left: 0;
    margin-right: 0;
}

.container {
    width: 100%;
    padding-right: 177px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}
</style>
</head>
<body style="background-color:#996a73">
	 <?php include"assets/header.php"?>
		<div class="container" style="  background: url(css/admin.jpg) no-repeat;  background-size: contain;">
			<div class="container form-top" style="margin-left: 63px;">
				<div class="row">
					<div class="col-md-6 col-md-offset-3 center" > 
						<div class="panel panel-danger">
								<div class="panel-body" >
										<div style="center">
											<h6><label style="text-center text-white">Admin Login</label></h6>
										</div>
									<form action="admin_login.php" method="post">

										<div class="form-group"> 
											<label><i class="fa fa-envelope" aria-hidden="true"></i> UserName</label> 
											<input type="text" name="A_username" class="form-control" placeholder="Enter UserName" required oninvalid="this.setCustomValidity('Required Username Field')" oninput="this.setCustomValidity('')"> 
										</div> 
										<div class="form-group"> 
											<label><i class="fa fa-key" aria-hidden="true"></i> Password</label>
											<input type="password" name="A_password" class="form-control" placeholder="Enter Password" required oninvalid="this.setCustomValidity('Required Password Field')" oninput="this.setCustomValidity('')"> 
										</div> 	
										<div class="form-group">
											<input type="submit" class="btn btn-raised btn-block btn-danger" value="Login" name="post">
										</div><br>
									</form>									
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>				
</body> <br>

</html>
<?php
	$connecti = mysqli_connect('localhost','root','','shangri-la') or die(mysql_error());
	if(isset($_POST['post'])){
		$username = $_POST['A_username'];
		$password = hash("sha256", $_POST['A_password']);
		$query = mysqli_query($connecti,"select * from admin where Username ='$username' AND PasswordHash ='$password'");
		$count = mysqli_num_rows($query);
		$array_data= mysqli_fetch_array($query);
		if($count > 0)
		{
			$_SESSION['Admin'] = $array_data['Username'];
			echo '<script>console.log('. json_encode($_SESSION['Admin'], JSON_HEX_TAG) .')</script>';
			redirect('Admin/positive_cases');
		}
		else
		{
			echo "<script>alert('your username and password is wrong')</script>";
		}
	}
?>