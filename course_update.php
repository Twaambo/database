<!DOCTYPE html>
<html>
<head>
<title>Update a Course </title>
<style>
p
{
  border:1px solid #c0c0c0
  padding:1em;
  border-radius:1m;
}
</style>
</head>
<body>
<h1>Update a Course </h1>


<?php
$id = $_GET["id"];
$teacher = $_GET["teacher"];
$building = $_GET["building"];
$room = $_GET["room"];
$maxreg = $_GET["maxreg"];

echo "id = ".$id."<br>";
echo "teacher = ".$teacher."<br>";
echo "building = ".$building."<br>";
echo "room = ".$room."<br>";
echo "maxreg = ".$maxreg."<br>";
?>

</body>
</html>
