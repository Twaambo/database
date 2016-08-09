<!DOCTYPE html>
<html>
<head>
<title>Update a course </title>
</head>
<body>
<h1>Update a Course</h1>
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
  $query = "select * from course;";

  $result = $mysqli->query($query);

  if($result)
  {
    // do stuff with the result of the query
    $num_rows = $result->num_rows;
    $num_cols = $result->field_count;
    $fields = $result->fetch_fields();

    echo "<form action='./course_update_form.php'>";

    echo "<select name='id'";
    echo ">";

    while($row=$result->fetch_assoc())
    {
      echo "<option value=";
      echo "'";
      echo $row["id"];
      echo "'";
      echo ">";
      echo $row["prefix"];
      echo $row["number"];
      echo $row["section"];
      echo "</option>";
    }
    echo "</select>";

    echo "<input type='submit' value='Update Course'>";

    echo "</form>";
  }
  else
  {
    echo "ERROR: ".$mysqli->error;
  }

  $mysqli->close();
}

?>
</body>
</html>
