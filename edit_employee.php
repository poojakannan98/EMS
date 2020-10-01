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
            <div class="col-lg-6 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading panel-light bg-light">Edit Employee</div>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <?php
                        $id =$_GET['e_id'];
                        $sql =  "SELECT * FROM employees WHERE e_id = $id";
                        $result = mysqli_query($conn,$sql);

                        if(mysqli_num_rows($result) > 0){
                            while ($employee = mysqli_fetch_assoc($result)) { ?>
                            <div class="form-group input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Employee Name </span>
                                </div>
                                <input type="text" class="form-control" name="e_name" value="<?php echo $employee['e_name'];?>">
                            </div>
                            <div class="form-group input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Employee Email </span>
                                </div>
                                <input type="email" class="form-control" name="e_email" value="<?php echo $employee['e_email'];?>">
                            </div>
                            <div class="form-group input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroup-sizing-sm">Employee PhNo </span>
                                </div>
                                <input type="tel" class="form-control " name="e_phno" value="<?php echo $employee['e_phno'];?>">
                            </div>
                            <div class="form-group ">
                                <input type="submit" class="btn btn-sm btn-success" value="Update Employee" name="e_update">
                                <a href="dash.php" class="btn btn-sm btn-danger" value="cancle" >Cancle</a>
                            </div>
                            <?php    }       
                        }else{
                            echo "0 results";
                            }
                        ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php



if(isset($_POST['e_update'])){
  $e_name = $_POST['e_name'];
  $e_email = $_POST['e_email'];
  $e_phno = $_POST['e_phno'];

  $sql = "UPDATE employees SET e_name='$e_name',e_email='$e_email',e_phno='$e_phno' WHERE e_id=' $id'";
  if(mysqli_query($conn,$sql)){
    header('Location: dash.php');
  }else{
      echo "error: " . $sql . "<br>" . mysqli_error($con);
  }
  }
?>
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