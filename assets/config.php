<?php
// this code is for database connection

function redirect($page){

  echo "<script>window.open('$page.php','_self')</script>";
}

function calling_data($table,$where=null){
  $array = [];
 $connecti = mysqli_connect('localhost','root','','shangri-la') or die(mysql_error());
  if($where==null){
    $calling = mysqli_query($connecti,"select * from $table");
  }
  else{

    $calling = mysqli_query($connecti,"select * from $table where $where");
  }
    while($row = mysqli_fetch_array($calling)){
      $array[] = $row;
    }
    return $array;
}
?>

