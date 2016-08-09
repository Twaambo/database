
<?php
$id = $_POST["id"];
$lastName = $_POST["lastName"];
$firstName = $_POST["firstName"];
$number = $_POST["number"];
$posId = $_POST["posId"];

echo "<p>";
echo "id = ".$id."<br>";
echo "lastName = ".$lastName."<br>";
echo "firstName = ".$firstName."<br>";
echo "number = ".$number."<br>";
echo "posId = ".$posId."<br>";
echo "</p>";

$host = "";
$username = "vware0";
$password = "vware0";
$database = "vware0";

$mysqli = new mysqli($host, $username, $password, $database);

if(mysqli_connect_errno())
{
  echo "Error connecting: ".mysqli_connect_errno();
}
else
{
  $query = "update player
               set lastName='".$lastName."'".
                ", firstName='".$firstName."'".
                ", number='".$number."'".
                ", posId=".$posId.
           " where id=".$id.";";

  echo "<p>";
  echo "Query = ".$query."<br>";
  echo "</p>";

  $result = $mysqli->query($query);

  if($result)
  {
    // Success
    echo "Success";
  }
  else
  {
    // Query Error
    echo "Query error";
  }
}

$myqli->close();

?>

