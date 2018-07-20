<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
    <div class="container">
            <form action="" style="width:400px" onsubmit="update(); return false;" id="frm">

                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input id="lastname" autofocus type="text" name="lastname" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="">First Name</label>
                        <input id="firstname" type="text" name="firstname" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Age</label>
                        <input type="text" name="age" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="">BirthDate</label>
                        <input type="date" name="birthdate" class="form-control" value=">">
                    </div>
                    <div class="form-group">
                        <label for="">Country</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
    
                    <button type="submit" id="btnsub" class="btn btn-primary btn-md" style="width:100px" name="btn">Save</button>
    
                </form>

    </div>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
    // $.ajax({
    //     url: "http://localhost:8089/farhan2018/RefresherCRUD/add2.php",
    //     type: "POST",
    //     data:{
    //         lastname: $("#lastname").val(),
    //         firstname: $("#firstname").val(),
    //         age: $("#age").val(),
    //         birthdate: $("#birthdate").val(),
    //         country: $("#country").val(),            
    //     },
    //     success: alert("Successful");
    // });



    function update() {
        $.ajax({
            url: "http://localhost:8089/farhan2018/RefresherCRUD/add2.php",
            type: "POST",
            data: {
                lastname: $("#lastname").val(),
                firstname: $("#firstname").val(),
                age: $("#age").val(),
                birthdate: $("#birthdate").val(),
                country: $("#country").val(),
            },
            success:
                function (data) {
                    alert("successs");
                }




        });
    }
    </script>
</body>
</html>