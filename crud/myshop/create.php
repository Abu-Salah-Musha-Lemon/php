<?php
include_once "connection.php";
$name ='';
$email ='';
$phone ='';
$address ='';
$errorMassege ='';
$sucessMessage = "";

if ($_SERVER['REQUEST_METHOD'] =="POST") {
    $name =$_POST["name"];
    $email =$_POST["email"];
    $phone =$_POST["phone"];
    $address =$_POST["address"];
    do {
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMassege="All the fields are required";
            break;
        }

        // add a client to databess
        // $name ='';
        // $email ='';
        // $phone ='';
        // $address ='';
        $sucessMessage = "client data entry successfully";
        //add new clients data
        $sql = "INSERT INTO `clients`(`id`, `name`, `email`, `phone`, `address`) VALUES($name,$email,$phone,$address)";
        $result = $conn->query($sql);
        if (!$result) {
            $errorMassege="invalide query".$conn->connect_error;
            break;
        }
        header("localhost:./index.php");
        exit;
    } while (false);
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
        <h2>New Client</h2>
        <?php 
        if (!empty($errorMassege)) {
            echo"
            <div class='alert alert-danger'>
            <strong>$errorMassege</strong> Indicates a dangerous or potentially negative action.
                </div>
            ";
        }
        ?>
            <form method="$_POST">
                <div class="row md-3">
                        <label class="col-sm-3 col-form-lable">Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" placeholder="Ente Your name" value="<?php echo $name;?>">
                    </div>
                </div><br>
                <div class="row md-3">
                        <label class="col-sm-3 col-form-lable">Email</label>
                        <div class="col-sm-6">
                            <input type="Email" class="form-control" name="email" placeholder="Ente Your Email"value="<?php echo $email;?>">
                        </div>
                </div><br>
                <div class="row md-3">
                        <label class="col-sm-3 col-form-lable">Phone Number</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" name="phone" placeholder="Ente Your Phone Number" value="<?php echo $phone;?>">
                        </div>
                </div><br>
                <div class="row md-3">
                        <label class="col-sm-3 col-form-lable">Address</label>
                        <div class="col-sm-6">
                         <input type="text" class="form-control" name="address" placeholder="Ente Your address" value="<?php echo $address;?>">
                        </div>
                </div><br>

                <?php 
        if (!empty($sucessMessage)) {
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>  $sucessMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss = 'alert' aria label = 'Close'></buttone>
            </div>
            ";
        }?>

                <div class="row md-3">
                        <div class="offset-sm-3 col-sm-3 d-grid">
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </div>
                        <div class="col-sm-3 d-grid">
                            <a class="btn btn-danger" href="./index.php" role="button">Cancel</a>
                        </div>
                </div>
            </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>