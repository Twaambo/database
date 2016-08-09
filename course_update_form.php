<!DOCTYPE html>
<html>
<head>
<title>Update a Course </title>
<style>
p
{
  border:1px solid #c0c0c0;
  padding:1em;
  border-radius:1em;
}
</style>
<body>

<h1>Update a Course </h1> 

<?php
$id = $_GET["id"];
//echo "id =".$id;

$host = "";
$username = "vware0";
$password = "vware0";
$database = "vware0";

$mysqli = new mysqli($host, $username, $password, $database);

if(mysqli_connect_errno())
{
  echo "Connect Error: ".mysqli_connect_errno();
}
else
{
  $query = "select * from course where id=".$id.";";
  echo "<p>";
  echo $query;
  echo "</p>";
  $result = $mysqli->query($query);

  if($result)
  {
    // Do stuff
    $num_rows = $result->num_rows;

    if($num_rows==1)
    {
      // Display a form for the user to edit the
      // information about the requested course.

      $num_cols = $result->field_count;
      $row = $result->fetch_assoc();

      echo $row["prefix"];
      echo $row["number"];
      echo $row["section"];
      
      echo "<form action='./course_update.php'>";

      echo "<input ";
      echo "type='hidden' ";
      echo "name='id' ";
      echo "value='".$id."'";
      echo ">";

      echo "Teacher: ";
      echo "<input type='text' ";
      echo "name='teacher' ";
      echo "value='".$row["teacher"]."'>";
      echo "<br>";
      
      echo "Building: ";
      echo "<input type='text' ";
      echo "name='building' ";
      echo "value='".$row["building"]."'>";
      echo "<br>";

      echo "Room: ";
      echo "<input type='text' ";
      echo "name='room' ";
      echo "value='".$row["room"]."'>";
      echo "<br>";

      echo "Maximum Registration: ";
      echo "<input type='text' ";
      echo "name='maxreg' ";
      echo "value='".$row["maxreg"]."'>";
      echo "<br>";

      echo "<input type='submit'>";

      echo "</form>";

    }
    else
    {
      echo "<p>";
      echo "More than one row? What are you thinking!?";
      echo "</p>";
    }
  }
  else
  {
    echo "<p>";
    echo "Query Error: ".$mysqli->error;
    echo "</p>";
  }

  $mysqli->close();

}

?>

</body>
</html>
