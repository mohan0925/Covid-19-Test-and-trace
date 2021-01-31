<?php include_once "../assets/config.php";
session_start();
	
if(!isset($_SESSION['Admin']))
{
  header("location: ../Admin_login.php");
}


$connecti = mysqli_connect('localhost','root','','shangri-la') or die(mysql_error());

$positive_0_17 = mysqli_query($connecti,"SELECT count(Age) as count FROM `testresult` WHERE Age BETWEEN 0 and 17 and TestResult='Positive'");
$count = mysqli_num_rows($positive_0_17);
$array_data= mysqli_fetch_array($positive_0_17);

$age_0_17=0;
$total_age_0_17=0;
$rate_0_17=0;

if($count > 0)
{
	$age_0_17=$array_data['count'];
}
$total_positive_0_17 = mysqli_query($connecti,"SELECT count(Age) as count FROM `testresult` WHERE Age BETWEEN 0 and 17");
$count = mysqli_num_rows($total_positive_0_17);
$array_data= mysqli_fetch_array($total_positive_0_17);
if($count > 0)
{
	$total_age_0_17=$array_data['count'];	
}
if($total_age_0_17 > 0)
{
	$rate_0_17= ($age_0_17/$total_age_0_17)*100;
}
else
{
	$rate_0_17= 0;
}
/////////////////////////////////////////////////////

$positive_18_44 = mysqli_query($connecti,"SELECT count(Age) as count FROM `testresult` WHERE Age BETWEEN 18 and 44 and TestResult='Positive'");
$count = mysqli_num_rows($positive_18_44);
$array_data= mysqli_fetch_array($positive_18_44);

$age_18_44=0;
$total_age_18_44=0;
$rate_18_44=0;

if($count > 0)
{
	$age_18_44=$array_data['count'];
}
$total_positive_18_44 = mysqli_query($connecti,"SELECT count(Age) as count FROM `testresult` WHERE Age BETWEEN 18 and 44");
$count = mysqli_num_rows($total_positive_18_44);
$array_data= mysqli_fetch_array($total_positive_18_44);
if($count > 0)
{
	$total_age_18_44=$array_data['count'];
}
if($total_age_18_44 > 0)
{
	$rate_18_44= ($age_18_44/$total_age_18_44)*100;
}
else
{
	$rate_18_44= 0;
}
/////////////////////////////////////////////////////

$positive_45_64 = mysqli_query($connecti,"SELECT count(Age) as count FROM `testresult` WHERE Age BETWEEN 45 and 64 and TestResult='Positive'");
$count = mysqli_num_rows($positive_45_64);
$array_data= mysqli_fetch_array($positive_45_64);

$age_45_64=0;
$total_age_45_64=0;
$rate_45_64=0;

if($count > 0)
{
	$age_45_64=$array_data['count'];
}
$total_positive_45_64 = mysqli_query($connecti,"SELECT count(Age) as count FROM `testresult` WHERE Age BETWEEN 45 and 64");
$count = mysqli_num_rows($total_positive_45_64);
$array_data= mysqli_fetch_array($total_positive_45_64);
if($count > 0)
{
	$total_age_45_64=$array_data['count'];
}

if($total_age_18_44 > 0)
{
	$rate_45_64= ($age_45_64/$total_age_45_64)*100;
}
else
{
	$rate_45_64= 0;
}
/////////////////////////////////////////////////////

$positive_over_65 = mysqli_query($connecti,"SELECT count(Age) as count FROM `testresult` WHERE Age >=65 and TestResult='Positive'");
$count = mysqli_num_rows($positive_over_65);
$array_data= mysqli_fetch_array($positive_over_65);

$age_over_65=0;
$total_age_over_65=0;
$rate_over_65=0;

if($count > 0)
{
	$age_over_65=$array_data['count'];
}
$total_positive_over_65 = mysqli_query($connecti,"SELECT count(Age) as count FROM `testresult` WHERE Age BETWEEN 0 and 17 and TestResult='Positive'");
$count = mysqli_num_rows($total_positive_over_65);
$array_data= mysqli_fetch_array($total_positive_over_65);
if($count > 0)
{
	$total_age_over_65=$array_data['count'];
}

if($total_age_over_65 > 0)
{
	$rate_over_65= ($age_over_65/$total_age_over_65)*100;
}
else
{
	$rate_over_65= 0;
}
/////////////////////////////////////////////////////

$dataPoints_positive_postcode = array();
$distinct_postcode = mysqli_query($connecti,"SELECT DISTINCT Postcode FROM `testresult` ORDER BY Postcode ASC");
$count = mysqli_num_rows($distinct_postcode);
if($count > 0)
{
	while ($postcodes = mysqli_fetch_array($distinct_postcode)) 
	{
		$postcodes_each=$postcodes['Postcode'];
		$positive_count = mysqli_query($connecti,"SELECT COUNT(TestResult) as count FROM `testresult` WHERE Postcode='$postcodes_each' and TestResult='Positive'");
		$count = mysqli_num_rows($positive_count);
		$array_data= mysqli_fetch_array($positive_count);
		if($count > 0)
		{
			$positive=$array_data['count'];
		}
		
		$postcode_positive_count = mysqli_query($connecti,"SELECT COUNT(TestResult) as count FROM `testresult` WHERE Postcode='$postcodes_each'");
		$count = mysqli_num_rows($postcode_positive_count);
		$array_data= mysqli_fetch_array($postcode_positive_count);
		if($count > 0)
		{
			$whole_positive=$array_data['count'];
		}
		
		if($whole_positive > 0)
		{
			$rate_of_positive= ($positive/$whole_positive)*100;
			array_push($dataPoints_positive_postcode,array("label"=>"$postcodes_each", "y"=>$rate_of_positive));
		}
		else
		{
			$rate_of_positive= 0;
			array_push($dataPoints_positive_postcode,array("label"=>"$postcodes_each", "y"=>$rate_of_positive));
		}
		
		
	}
	echo '<script>console.log('. json_encode($dataPoints_positive_postcode, JSON_HEX_TAG) .')</script>';
}


$dataPoints = array( 
	array("label"=>"0-17", "y"=>$rate_0_17),
	array("label"=>"18-44", "y"=>$rate_18_44),
	array("label"=>"45-64", "y"=>$rate_45_64),
	array("label"=>"Over 65", "y"=>$rate_over_65),
)

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

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", 
	title:{
		text: "Infection rate by age group"
	},
	axisY: {
		title: "Percentage of Infection rate",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "Different age groups",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

var chart_postcode = new CanvasJS.Chart("chartContainer_postcode", {
	animationEnabled: true,
	theme: "light2", 
	title:{
		text: "Infection rate by Postcode"
	},
	axisY: {
		title: "Percentage of Infection rate",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		legendText: "Different Postcodes",
		dataPoints: <?php echo json_encode($dataPoints_positive_postcode, JSON_NUMERIC_CHECK); ?>
	}]
});
chart_postcode.render();

}
</script>
</head>

<body style="background-color:#996a73">
	 <?php include"../assets/header.php"?>
		<div class="container-fluid" >
			<div class="row">			
				<div class="col-12 col-md-5" > 
					<div class="panel" >
						<div id="chartContainer" style=""></div>
					</div>
				</div>
				<div class="col-12 col-md-7" > 
					<div class="panel" >
						<div id="chartContainer_postcode" style=""></div>
					</div>
				</div>
			</div>
		</div>
</body> 
<br>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</html>