
<?php

$con = mysqli_connect("localhost", "root", "", "test");
$data = $_POST['firstname'];
$data2 = $_POST['lastname'];
//$rawData = file_get_contents('php://input');
//$query = "SELECT employees.Id, employees.LastName, employees.FirstName,employees.Age, employees.BirthDate,country.country_name FROM employees INNER JOIN country ON employees.Country=country.id ";
//  $query = "SELECT * FROM employees WHERE FirstName='$data'";
$query = "SELECT * FROM employees WHERE FirstName='$data' and lastName='$data2'";
$result = mysqli_query($con, $query);

$ar = array();

while ($row = mysqli_fetch_assoc($result)) {
    array_push($ar, $row);
 }
   echo json_encode($ar);
// $row = mysqli_fetch_assoc($result);
// echo json_encode($row);

?>

