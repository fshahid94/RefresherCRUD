<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>



<body>
    <div class="container">

        <h1>Update Employee</h1>
        <hr style="border-top:solid 1px #4092b6">

        <div class='alert alert-danger collapse' id="alert"> 

            </div>


<!--         
        <div id="divErrorText">
                <a id="linkClose" href="#" class="close">&times;</a>
            <div id="alert" class="alert alert-danger collapse">
            </div>
        </div> -->



        <?php

// $lastname = "";
// $firstname = "";
// $age = "";
// $birthdate = "";
// $country = "";


$id = $_GET['id'];

$con = mysqli_connect("localhost", "root", "", "test");
$query = "SELECT * FROM employees WHERE id=$id";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

$lastname = $row['LastName'];
$firstname =$row['FirstName'];
$age = $row['Age'];
$birthdate = $row['BirthDate'];
$country = $row['Country'];

$errors = array();

if (isset($_POST['update'])) {
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $age = $_POST['age'];
    $birthdate = $_POST['birthdate'];
    $country = $_POST['country'];

    if ($lastname == "") {
        array_push($errors, "Last Name is Required");
    }
    if ($firstname == "") {
        array_push($errors, "First Name is Required");
    }
    if (count($errors) == 0) {
        $con = mysqli_connect("localhost", "root", "", "test");

        $query = "UPDATE employees SET LastName = '$lastname', FirstName='$firstname', Age='$age', BirthDate='$birthdate',Country='$country' WHERE id = $id";
        if (mysqli_query($con, $query)) {
            header("Location:employeelist.php");
        } else {
            echo "<h1>COULD NOT UPDATE</h1>";
        }
    } else {
        echo "<div class='alert alert-danger'>";
        foreach ($errors as $error) {
            echo "<li>" . $error . "</li>";
        }
    } echo "</div>";

}

?>





            <div class="">
                <form action="" method="POST" style="width:400px" id="form">
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input id="lastname" name="lastname" type="text" class="form-control" value="<?php echo $lastname ?>">
                    </div>
                    <div class="form-group">
                        <label for="">First Name</label>
                        <input id="firstname" name="firstname" type="text" class="form-control" value="<?php echo $firstname ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Age</label>
                        <input name="age" type="text" class="form-control" value="<?php echo $age ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Birthdate</label>
                        <input name="birthdate" type="date" class="form-control" value="<?php echo $birthdate ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Country</label>
                        <select name="country" class="form-control" name="" id="">


                            <?php
$con = mysqli_connect("localhost", "root", "", "test");
$query = "SELECT * FROM country";
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($result)) {

    if ($row['id'] == $country) {
        echo "<option selected value=" . $row['id'] . ">" . $row['country_name'] . "</option>";
    } else {
        echo "<option value=" . $row['id'] . ">" . $row['country_name'] . "</option>";
    }
}
?>

                        </select>
                    </div>
                    <input id="update" type="submit" value="Update" name="update" class="btn btn-primary btn-md" style="width:100px">

                </form>

            </div>


    </div>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <script>
        // $("#update").click( function(){
        //    if($("#lastname").val()=="" ||$("#firstname").val()=="") {
        // alert("Items Missing");
        //return false;
        //    }
        //});
        $("#alert").hide();
        $("form").submit(function (e) {
            if ($("#lastname").val() == "" || $("#firstname").val() == "") {
                $("#alert").hide();
                if ($("#lastname").val() == "") {
                    $("#alert").html("<li> Last Name is Required</li>")
                }
                if ($("#firstname").val() == "") {
                    $("#alert").append("<li> First Name is Required</li>")
                }
                $("#alert").show("slow");
                e.preventDefault();
            }
        });
        // $('#linkClose').click(function () {
        //     $('#divErrorText').hide('fade');
        // });
    </script>



</body>

</html>