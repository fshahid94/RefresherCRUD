<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>



<body>
    <?php
  $con = mysqli_connect("localhost","root", "","test");

  $query = "SELECT employees.Id, employees.LastName, employees.FirstName,employees.Age, employees.BirthDate,country.country_name FROM employees INNER JOIN country ON employees.Country=country.id";

  $result = mysqli_query($con, $query);
 
?>

<div class="container">
    
    <h1 style="margin-bottom: -10px">Employee List</h1>
    <a href="add.php" class="pull-right" style="margin-top: -5px;"><i class="fas fa-plus"></i> Add Employee</a>
    
    <hr style="border-top:solid 1px  #4092b6">
    <?php
            if(isset($_GET['id'])){
               $id= $_GET['id'];
               $con = mysqli_connect("localhost","root", "","test");
               $query= "DELETE FROM employees WHERE Id=$id";
               $result1= mysqli_query($con,$query);
               if($result1){
                   header("Location:employeelist.php");

               }else{
                   echo "<h1 style='color:red'>Delete Failed</h1>";
               }
            }
            ?>
        <table class="table table-striped table-hover table-bordered">
            <tr style="background-color:#0f7faf; color:white">
                <th>Id</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Age</th>
                <th>Birthdate</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>



            <?php  

while($row= mysqli_fetch_assoc($result)){  ?>



            <tr>
                <td>
                    <?php  echo $row['Id'] ; ?>
                </td>
                <td>
                    <?php  echo $row['LastName'] ; ?>
                </td>
                <td>
                    <?php  echo $row['FirstName'] ; ?>
                </td>
                <td>
                    <?php  echo $row['Age']; ?>
                </td>
                <td>
                    <?php  echo $row['BirthDate']; ?>
                </td>
                <td>
                    <?php  echo $row['country_name'];?>
                </td>

                <td>
                        <a href="update.php?id='<?php echo $row['Id']?>'" class="btn btn-success btn-xs">Edit </a>
                        <a href="employeelist.php?id='<?php echo $row['Id']?>'" class="btn btn-danger btn-xs">Delete</a>
                    </td>
            
            

            </tr>

            <?php }  ?>

            
                
        </table>
     </div> <!-- tabel div end -->
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>