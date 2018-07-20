<?php
 $con = mysqli_connect("localhost", "root", "", "test");
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $age = $_POST['age'];
        $birthdate = $_POST['birthdate'];
        $country = $_POST['country'];
 $query = "INSERT INTO employees(LastName,FirstName,Age,BirthDate,Country) VALUES  ('$lastname','$firstname','$age','$birthdate','$country')";
 mysqli_query($con,$query);

?>