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
  $query = "select * from player where id=".$id.";";
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

      echo $row["lastName"];
      echo $row["firstName"];
      echo $row["number"];
      echo $row["posId"];
      
      echo "<form name='player_edit_form'>";

      echo "<input ";
      echo "type='hidden' ";
      echo "name='id' ";
      echo "value='".$id."'";
      echo ">";

      echo "Last Name: ";
      echo "<input type='text' ";
      echo "name='lastName' ";
      echo "value='".$row["lastName"]."'>";
      echo "<br>";
      
      echo "First Name: ";
      echo "<input type='text' ";
      echo "name='firstName' ";
      echo "value='".$row["firstName"]."'>";
      echo "<br>";

      echo "Number: ";
      echo "<input type='text' ";
      echo "name='number' ";
      echo "value='".$row["number"]."'>";
      echo "<br>";

      echo "Position ID: ";
      echo "<input type='text' ";
      echo "name='posId' ";
      echo "value='".$row["posId"]."'>";
      echo "<br>";

      echo "<button type='button' onclick='submitEdits()'>";
      echo "Update";
      echo "</button>";

      echo "</form>";

    }
    else
    {
      echo "<p>";
      echo "You can only update one player at a time.";
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

