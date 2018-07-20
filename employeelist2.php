<?php
  $con = mysqli_connect("localhost","root", "","test");
  //$query = "SELECT employees.Id, employees.LastName, employees.FirstName,employees.Age, employees.BirthDate,country.country_name FROM employees INNER JOIN country ON employees.Country=country.id";
  // $query = "SELECT * FROM employees WHERE FirstName='Farhan'"; 
  $get= $_GET['firstname'];
  $query = "SELECT employees.Id, employees.LastName, employees.FirstName,employees.Age, employees.BirthDate,country.country_name FROM employees INNER JOIN country ON employees.Country=country.id WHERE FirstName='$get'";
  $result = mysqli_query($con, $query); 
  $data= array();
while($row=mysqli_fetch_assoc($result)){
array_push($data,$row);
}
$json= JSON_encode($data);
echo $json;
?>


    