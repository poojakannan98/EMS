<?php
require 'conn.php';

session_start();
 
if(!$_SESSION['u_name']){
    echo '<script>window.location.href ="index.php" </script>';
}
?>

<!DOCTYPE html>

<html>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Dashboard</title>
</head>

<body>
    <!-- navbar -->
    <?php require 'nav.php' ?>
    <!-- navbar -->

    <!-- main content -->
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading panel-light bg-light">Employees</div>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="add_new_employee.php">Add Employee</a></li>
                        <li class="list-group-item"><a href="dash.php">View all Employee</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading panel-light bg-light">Employees List</div>
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>DETAILS</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>

                        <?php
                        $sql =  "SELECT * FROM employees";
                        $result = mysqli_query($conn,$sql);

                        if(mysqli_num_rows($result) > 0){
                            while ($employee = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <td><?php echo $employee['e_id']; ?></td>
                                <td><?php echo $employee['e_name']; ?></td>
                                <td><a href="employee_details.php?e_id=<?php echo $employee['e_id'];?>" class="btn btn-block btn-xs btn-info">Details</a></td>
                                <td><a href="edit_employee.php?e_id=<?php echo $employee['e_id'];?>" class="btn btn-block btn-xs btn-warning">Edit</a></td>
                                <td><a href="delete_emolyee.php?e_id=<?php echo $employee['e_id'];?>" class="btn btn-block btn-xs btn-danger">Delete</a></td>
                            </tr>
                        <?php    }       
                        }else{
                            echo "0 results";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- main content -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>
</html>