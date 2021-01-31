<?php include_once "assets/config.php";
session_start();
$connecti = mysqli_connect('localhost','root','','shangri-la') or die(mysql_error());
?>
<!DOCTYPE html>
<html lang="en" dir="auto">
  <head>
    <meta charset="utf-8">
	<title>MyCoVTest Hub</title>
	<link rel="stylesheet" href="bootstrap\bootstrap.min.css">

	<style>
		.error {color: #FF0000;}
	</style>
  </head>

  <body>
    <?php include"assets\header.php";?>
	   <?php 
			$Email_exists=$Already_used=$Code_doesnt_match="";
	   ?>

<div class="container">
	<div class="container form-top">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12" style="	margin-left: 350px;"> 
				<div class="panel panel-danger">
					<div class="panel-body">
						<form  method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
						
							<div class="form-group"> 
						 		<label><i class="fa fa-envelope" aria-hidden="true"></i> Email</label> 
						 		<input type="email" name="email" class="form-control" placeholder="Enter Email" required oninvalid="this.setCustomValidity('Required Email Field')" oninput="this.setCustomValidity('')"> 
								  <span class="error">* <?php echo $Email_exists;?></span>
							</div>
						 	<div class="form-group"> 
						 		<label><i class="fa fa-user" aria-hidden="true"></i>Full Name</label>
						 		<input type="text" name="name" class="form-control" placeholder="Enter Full Name" required oninvalid="this.setCustomValidity('Required Full Name Field')" oninput="this.setCustomValidity('')"> 
						 	</div> 
							<div class="form-group"> 
						 		<label><i class="fa fa-child" aria-hidden="true"></i> Age</label>
						 		<input type="text" name="age" class="form-control" placeholder="Enter Age" required oninvalid="this.setCustomValidity('Required Age Field')" oninput="this.setCustomValidity('')"> 
						 	</div> 	
							<div class="form-group"> 
						 		<label><i class="fa fa-mars" aria-hidden="true"></i> Gender</label>
						 		<select name="formGender">
									<option value="M">Male</option>
									<option value="F">Female</option>
									<option value="Other">Other</option>
								</select>
						 	</div> 
						 	<div class="form-group"> 
						 		<label><i class="fa fa-address-card" aria-hidden="true"></i> Address</label> 
						 		<textarea rows="3" name="address" class="form-control" placeholder="Type Your Address" required oninvalid="this.setCustomValidity('Required Address Field')" oninput="this.setCustomValidity('')"></textarea> 
						 	</div>
							<div class="form-group"> 
						 		<label><i class="fa fa-map-pin" aria-hidden="true"></i> Postcode</label>
						 		<input type="text" name="postcode" class="form-control" placeholder="Enter Postcode" required oninvalid="this.setCustomValidity('Required Postcode Field')" oninput="this.setCustomValidity('')"> 
						 	</div>
							<div class="form-group"> 
						 		<label><i class="fa fa-code" aria-hidden="true"></i> TNN Code</label>
						 		<input type="text" name="code" class="form-control" placeholder="Enter TNN Code" required oninvalid="this.setCustomValidity('Required TNN Code Field')" oninput="this.setCustomValidity('')"> 
							</div> 
 							<div class="form-group"> 
						 		<label><i class="fa fa-list-alt" aria-hidden="true"></i> Test Result</label>
						 		<select name="formresult">
									<option value="Positive">Positive</option>
									<option value="Negative">Negative</option>
									<option value="Inconclusive">Inconclusive</option>
								</select>
						 	</div>
  	
						 	<div class="form-group">
								<input type="submit" class="btn btn-raised btn-block btn-danger" value="Submit" name="post">
						 	</div> 
							
							<?php 
								if(isset($_GET['message'])):
								
							?>
								<h6 style="color:green;">Success! Your Message was Sent Successfully.</h6>
							<?php endif; ?>
							
						</form>
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 
	<hr>
<br>
        </body>
</html>

<?php
	$connecti = mysqli_connect('localhost','root','','shangri-la') or die(mysqli_error());
	
	if(isset($_POST['post']))
	{
		$email=$_POST['email'];
		$name=$_POST['name'];
		$age=$_POST['age'];
		$gender=$_POST['formGender'];
		$address=$_POST['address'];
		$postcode=$_POST['postcode'];
		$code=$_POST['code'];
		$result=$_POST['formresult'];
		
		$Error_message="";
			
		if(isset($_POST['code']))
		{
			$code = $_POST['code'];
					
			$query = mysqli_query($connecti,"select * from hometestkit where TNN_Code ='$code'");
			$count = mysqli_num_rows($query);
			$array_data= mysqli_fetch_array($query);
			if($count > 0)
			{
				if($array_data['used']=='1')
				{
					$Error_message="Error";
					echo "<script>alert('Another person has already used the provided TTN code.')</script>";
				}
			}
			else
			{
				$Error_message="Error";
				echo "<script>alert('TTN code does not match the record in the database.')</script>";
			}
		}
		if(isset($_POST['email']))
		{
			$email = $_POST['email'];
			$query = mysqli_query($connecti,"select * from testresult where Email ='$email'");
			$count = mysqli_num_rows($query);
			$array_data= mysqli_fetch_array($query);
			if($count > 0)
			{
				if($array_data['Email']==$email)
				{
					$Error_message="Error";
					$Email_exists="The provided email is already associated with another (used) Home Test Kit";
					echo "<script>alert('The provided email is already associated with another (used) Home Test Kit')</script>";
				}
			}
		}
		
		if(is_null($Error_message))
		{
			if(is_bool(mysqli_query ($connecti,"INSERT INTO testresult (Email,Fullname,Age,Gender,Address,Postcode,TTN,TestResult) value('$email','$name','$age','$gender','$address','$postcode','$code','$result')"))===true)
			{
				if(is_bool(mysqli_query ($connecti,"update hometestkit set used='1' where TNN_Code='$code'"))===true)
				{
					$Registered="Test result is registered with database.";
					echo "<script>alert('Test result is registered with database.')</script>";
				}
			}	
		}
	}
?>
