<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>



<body>
    <div class="container">
        <h1 style="margin-bottom: -10px">Add Employee</h1>
        <hr style="border-top:solid 1px  #4092b6">

        <?php

$lastname = "";
$firstname = "";
$age = "";
$birthdate = "";
$country = "";

if (isset($_POST['btn'])) {

    $errors = array();

    if (empty($_POST['lastname'])) {
        array_push($errors, "Last Name is Required.");
    }
    if (empty($_POST['firstname'])) {
        array_push($errors, "First Name is Required.");
    }

    if (count($errors) == 0) {
        $con = mysqli_connect("localhost", "root", "", "test");

        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $age = $_POST['age'];
        $birthdate = $_POST['birthdate'];
        $country = $_POST['country'];
        $query = "INSERT INTO employees(LastName,FirstName,Age,BirthDate,Country) VALUES  ('$lastname','$firstname','$age','$birthdate','$country')";
        if (mysqli_query($con, $query)) {
            header('Location:employeelist.php');
        } else {
            echo "Unsuccesful";
        }
    } else {

        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $age = $_POST['age'];
        $birthdate = $_POST['birthdate'];
        $country = $_POST['country'];

        echo "<div class='alert alert-danger'>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
        echo "</div>";
    }

}

?>

<!-- <button id="test">test</button> -->
            <div id="alert" class="alert alert-danger">

            </div>
            <form action="" style="width:400px" method="POST" id="frm">

                <div class="form-group">
                    <label for="">Last Name</label>
                    <input id="lastname" autofocus type="text" name="lastname" class="form-control" value="<?php echo $lastname; ?>">
                </div>
                <div class="form-group">
                    <label for="">First Name</label>
                    <input id="firstname" type="text" name="firstname" class="form-control" value="<?php echo $firstname; ?>">
                </div>
                <div class="form-group">
                    <label for="">Age</label>
                    <input type="text" name="age" class="form-control" value="<?php echo $age; ?>">
                </div>
                <div class="form-group">
                    <label for="">BirthDate</label>
                    <input type="date" name="birthdate" class="form-control" value="<?php echo $birthdate; ?>">
                </div>
                <div class="form-group">
                    <label for="">Country</label>
                    <!-- <input type="text" name="" id="" class="form-control"> -->
                    <select name="country" id="" class="form-control">
                        <option> </option>
                        <?php
$con = mysqli_connect("localhost", "root", "", "test");
$query = "SELECT * FROM country";
$result = mysqli_query($con, $query);
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['id'] == $country) {
        echo "<option selected value='" . $row['id'] . "'>" . $row['country_name'] . "</option>";
    } else {
        echo "<option value='" . $row['id'] . "'>" . $row['country_name'] . "</option>";

    }
}
?>
                    </select>
                </div>

                <button type="submit" id="btnsub" class="btn btn-primary btn-md" style="width:100px" name="btn">Save</button>

            </form>
    </div>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        // function add() {
        //     // if (document.getElementById("lastname").value == "") {
        //     alert("Empty Last Name");
        //     // }
        // }
        // document.getElementById("frm").addEventListener("onsubmit", function () {
        //     if (document.getElementById("lastname".value == "")) {
        //         alert("NO LAST NAME")
        //         return false;
        //     }
        // });

 //       function test(){
  //          alert("Alert");
  //      }

//$("#test").click(test);

        $(document).ready(function () {
            $("#alert").hide();
            $("#frm").submit(function (event) {
                
                if ($("#lastname").val() == "" || $("#firstname").val() == "") {
                    
                    if ($("#lastname").val() == "") {
                        $("#alert").append(" <li>Last Name Required </li>");
                    }
                    if ($("#firstname").val() == "") {
                        $("#alert").append("<li>First Name Required </li>");
                    }

                    $("#alert").slideDown("slow");
                    event.preventDefault();
                }

            });
        });
    </script>
</body>

</html>