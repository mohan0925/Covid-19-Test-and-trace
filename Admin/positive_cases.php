<?php include_once "../assets/config.php";
session_start();

if(!isset($_SESSION['Admin']))
{
  header("location: ../Admin_login.php");
}

$connecti = mysqli_connect('localhost','root','','shangri-la') or die(mysql_error());

$query_negative = mysqli_query($connecti,"SELECT COUNT(TestResult) as result FROM testresult WHERE TestResult='Negative'");
$count = mysqli_num_rows($query_negative);
$array_data= mysqli_fetch_array($query_negative);
if($count > 0)
{
	$Negative=$array_data['result'];
}

$query_positive = mysqli_query($connecti,"SELECT COUNT(TestResult) as result FROM testresult WHERE TestResult='Positive'");
$count = mysqli_num_rows($query_positive);
$array_data= mysqli_fetch_array($query_positive);
if($count > 0)
{
	$Positive=$array_data['result'];
}


$dataPoints_case = array();
$distinct_postcode = mysqli_query($connecti,"SELECT DISTINCT Postcode FROM `testresult` ORDER BY Postcode ASC");
$count = mysqli_num_rows($distinct_postcode);
if($count > 0)
{
	while ($postcodes = mysqli_fetch_array($distinct_postcode)) 
	{
		$postcodes_each=$postcodes['Postcode'];
		echo '<script>console.log('. json_encode($postcodes_each, JSON_HEX_TAG) .')</script>';
		$positive_count = mysqli_query($connecti,"SELECT COUNT(TestResult) as count FROM `testresult` WHERE Postcode='$postcodes_each' and TestResult='Positive'");
		$count = mysqli_num_rows($positive_count);
		$array_data= mysqli_fetch_array($positive_count);
		if($count > 0)
		{
			$count_each=$array_data['count'];
			array_push($dataPoints_case,array("label"=>"$postcodes_each", "y"=>$count_each));
		}
	}
	echo '<script>console.log('. json_encode($dataPoints_case, JSON_HEX_TAG) .')</script>';
}

$dataPoints_age = array();
$positive_0_17 = mysqli_query($connecti,"SELECT count(TestResult) as count FROM `testresult` where Age BETWEEN 0 and 17 and TestResult='Positive'");
$count = mysqli_num_rows($positive_0_17);
$array_data= mysqli_fetch_array($positive_0_17);
if($count > 0)
{
	array_push($dataPoints_age,array("label"=>"Age(0-17)", "y"=>$array_data['count']));
}

$positive_18_44 = mysqli_query($connecti,"SELECT count(TestResult) as count FROM `testresult` where Age BETWEEN 18 and 44 and TestResult='Positive'");
$count = mysqli_num_rows($positive_18_44);
$array_data= mysqli_fetch_array($positive_18_44);
if($count > 0)
{
	array_push($dataPoints_age,array("label"=>"Age(18-44)", "y"=>$array_data['count']));
}
$positive_45_64 = mysqli_query($connecti,"SELECT count(TestResult) as count FROM `testresult` where Age BETWEEN 45 and 64 and TestResult='Positive'");
$count = mysqli_num_rows($positive_45_64);
$array_data= mysqli_fetch_array($positive_45_64);
if($count > 0)
{
	array_push($dataPoints_age,array("label"=>"Age(45-64)", "y"=>$array_data['count']));
}
$positive_over_65 = mysqli_query($connecti,"SELECT count(TestResult) as count FROM `testresult` where Age >= 65 and TestResult='Positive'");
$count = mysqli_num_rows($positive_over_65);
$array_data= mysqli_fetch_array($positive_over_65);
if($count > 0)
{
	array_push($dataPoints_age,array("label"=>"Age(over 65)", "y"=>$array_data['count']));
}
?>

<!DOCTYPE HTML>
<html>
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MyCoVTest Hub</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
	
<script>
window.onload = function () {

var chart_case = new CanvasJS.Chart("chartContainer_case", {
	animationEnabled: true,
	title: {
		text: "Total number of positive/negative cases"
	},
	data: [{
		type: "pie",
		
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode(array(array("label"=>"Positive", "y"=>$Positive),array("label"=>"Negative", "y"=>$Negative),), JSON_NUMERIC_CHECK); ?>
	}]
});
chart_case.render();

var chart_case_distribution = new CanvasJS.Chart("chartContainer_case_distribution", {
	animationEnabled: true,
	title: {
		text: "Total number of positive cases per Postcode"
	},
	data: [{
		type: "column",
		
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints_case, JSON_NUMERIC_CHECK); ?>
	}]
});
chart_case_distribution.render();

var chart_positive_age = new CanvasJS.Chart("chartContainer_age", {
	animationEnabled: true,
	title: {
		text: "Total number of positive cases per Age group"
	},
	data: [{
		type: "pie",
		
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints_age, JSON_NUMERIC_CHECK); ?>
	}]
});
chart_positive_age.render();



}
</script>
</head>

<body style="background-color:#996a73">
	 <?php include"../assets/header.php"?>
		<div class="container-fluid" >
			<div class="row">
				<div class="col-12 col-md-2" > 
					<div class="panel-body" >
						<div id="chartContainer_case" style=""></div>
					</div>
				</div>	
				<div class="col-12 col-md-3" > 
					<div class="panel-body" >
						<div id="chartContainer_age" style=""></div>
					</div>
				</div>
				<div class="col-12 col-md-7" > 
					<div class="panel-body" >
						<div id="chartContainer_case_distribution" style=""></div>
					</div>
				</div>						
			</div>
		</div>
</body> 
<br>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</html>