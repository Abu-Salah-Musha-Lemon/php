<?php
include_once "connection.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>My Shop</title>
</head>
<body>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <a class="btn btn-primary" href="./create_v2.php" role="button">New Clients</a>

    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $sql = "SELECT * FROM clients";
        $result =mysqli_query($conn, $sql);
        if (!$result) {
            die("invalid qure".$conn);
        }
        while ($row = $result->fetch_assoc()) {  
            echo'
            
            <tr>
            <th scope="row">'. $row["id"].'</th>
            <td>'. $row["name"].'</td>
            <td>'. $row["email"].'</td>
            <td>'. $row["phone"].'</td>
            <td>'. $row["address"].'</td>
            <td>  <a class="btn btn-primary" href="./edit.php?editid='.$row['id'].'" role="button">Edit</a>
              <a class="btn btn-danger" href="./delete.php?deleteid='.$row['id'].'" role="button">Delete</a>
          </td>
          </tr>
            
            ';
        }
        

    ?>

<a href="./edit.php"></a>
  </tbody>
</table>
</div>
</body>
</html>