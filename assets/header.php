<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Modak&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
     <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script|Satisfy&display=swap" rel="stylesheet">

<style type="text/css">
    .bs-example{
        margin: 20px;
    }
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #e997b3;;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

<div class="bs-example">
    <nav class="navbar navbar-expand-md navbar-light bg-light" style="background: linear-gradient(#eba4b6,#ff3669,#ff0041);">
        <a href="" class="navbar-brand"></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
					<h3  style="position:relative;margin-left:5%;font-family: 'Lobster', cursive;font-size:150%;">MyCoVTest Hub </h3><hr></b>
			<ul class="navbar-nav">
					
			<?php
				if(!isset($_SESSION['Admin']))
				{
					
			?>
                    <li class="nav-item">
						<li class="nav-item">
							<a href="index.php" class="nav-link text-white"  class="item"> Test Reporting</a>
						</li>
					  	<div class="nav-item dropdown">
							<a href="#" class="nav-link text-white"   class="item">Login</a>
							<div class="dropdown-content">
								<a href="Admin_login.php" class="dropdown-item">Admin</a>
							</div>
						</div>
                    </li>					
			<?php 
				}
				else
				{				
					$log = $_SESSION['Admin'];
					echo '<script>console.log('. json_encode($log, JSON_HEX_TAG) .')</script>';
            ?>
					<li class="nav-item">
						<a href="infection_rate.php" style="border-radius:15px; position:relative;color: #171819;margin-left: -122%;"><strong>Infection rate</strong></a>
					</li>
					<li class="nav-item">
						<a href="positive_cases.php" style="border-radius:15px; position:relative;color: #171819;margin-left: -80%;"><strong>Positive Cases</strong></a>
					</li>					
					<li class="nav-item" >
						<a href="logout.php" style="border-radius:15px; position:relative;color: #171819;margin-left: -93%;"><strong>Logout</strong></a>
					</li>
				<?php } ?>
			</ul>
               
        </div>
    </nav>
</div>

