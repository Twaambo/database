<?php
$host="";
$username="vware0";
$password="vware0";
$database="vware0";

$mysqli = new mysqli($host,$username,$password,$database);

if(mysqli_connect_errno())
{
  echo "ERROR: ".mysqli_connect_errno();
}
else
{
  $query = "select * from player;";

  $result = $mysqli->query($query);

  if($result)
  {
    // do stuff with the result of the query
    $num_rows = $result->num_rows;
    $num_cols = $result->field_count;
    $fields = $result->fetch_fields();

    echo "<form>";

    echo "<select onchange=showPlayerEditForm(this.value)";
    echo " name='id'";
    echo ">";
    echo "<option value =''>Select a Player</option>";

    while($row=$result->fetch_assoc())
    {
      echo "<option value=";
      echo "'";
      echo $row["id"];
      echo "'";
      echo ">";
      echo $row["lastName"];
      echo $row["firstName"];
      echo $row["number"];
      echo $row["posId"];
      echo "</option>";
    }
    echo "</select>";

    echo "</form>";
  }
  else
  {
    echo "ERROR: ".$mysqli->error;
  }

  $mysqli->close();
}

?>
