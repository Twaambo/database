<!DOCTYPE html>
<html>
<head>
<title>Create a New Player </title>
</head>
<body>


<?php
$lastName = $_GET["lastName"];
$firstName = $_GET["firstName"];
$number = $_GET["number"];
$posId = $_GET["posId"];


$host = "";
$username = "vware0";
$password = "vware0";
$database = "vware0";

$mysqli = new mysqli($host, $username, $password, $database);

if(mysqli_connect_errno())
{
  echo "Connect error:".mysqli_connect_errno();
}
else
{
  // do stuff with the database

  $todo = "123";

  $query = "";
  $query = $query."insert into player values(";
  $query = $query."0";
  $query = $query.", '".$lastName."'";
  $query = $query.", '".$firstName."'";
  $query = $query.", '".$number."'";
  $query = $query.", '".$posId."'";
  $query = $query.");";
  
  echo $query;

  $result = $mysqli->query($query);

  if( $result)
  {
    echo "<p>";
    echo "Player inserted successfully.";
    echo "</p>";
  }
  else
  {
    echo "<p>";
    echo "Error inserting player: ".$mysqli->error;
    echo "</p>";
  }

  $mysqli->close();
}


?>


</body>
</html>
