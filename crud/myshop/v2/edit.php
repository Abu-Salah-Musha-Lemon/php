<?php
include_once "connection.php";
$id = $_GET["editid"];
$sql = "SELECT * FROM `clients` WHERE id = $id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$name =$row["name"];
$email =$row["email"];
$phone =$row["phone"];
$address =$row["address"];

if (isset($_POST['submit'])) {
    $name =$_POST["name"];
    $email =$_POST["email"];
    $phone =$_POST["phone"];
    $address =$_POST["address"];
        $sql = "UPDATE `clients` SET `id`='$id',`name`='$name',`email`='$email',`phone`='$phone',`address`='$address' WHERE id = $id ";
        $result = mysqli_query($conn,$sql);
        if ($result) {
            // echo"data inserted successfully";
            header("location:index_v2.php");
        }else{
            die(mysqli_error($conn));
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>My Shop</title>
</head>
<body>
    <div class="container my-5">
        <h2>New Update </h2>
            <form method="POST">
                <div class="row md-3">
                        <label class="col-sm-3 col-form-lable">Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" value="<?php echo $name;?>" >
                    </div>
                </div><br>
                <div class="row md-3">
                        <label class="col-sm-3 col-form-lable">Email</label>
                        <div class="col-sm-6">
                            <input type="Email" class="form-control" name="email" value="<?php echo $email;?>">
                        </div>
                </div><br>
                <div class="row md-3">
                        <label class="col-sm-3 col-form-lable">Phone Number</label>
                        <div class="col-sm-6">
                            <input type="" class="form-control" name="phone" value="<?php echo $phone;?>">
                        </div>
                </div><br>
                <div class="row md-3">
                        <label class="col-sm-3 col-form-lable">Address</label>
                        <div class="col-sm-6">
                         <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
                        </div>
                </div><br>
                <div class="row md-3">
                        <div class="offset-sm-3 col-sm-3 d-grid">
                            <button type="submit" class="btn btn-primary" name="submit">Update</button>
                            <!-- <a type="submit" class="btn btn-primary" href=""name="submit" role="button">Submit</a> -->
                        </div>
                        <div class="col-sm-3 d-grid">
                            <a class="btn btn-danger" href="./index_v2.php" role="button">Cancel</a>
                        </div>
                </div>
            </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>