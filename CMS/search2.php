<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>search</title>
</head>

<body>


    <form class="container my-2 mx-2" method="get">
        <div class="col-4">
            <input type="text" class="form-control" name="searchInput" aria-describedby="emailHelp" value="<?php if (isset($_GET["searchInput"])) {
                                                                                                                echo $_GET["searchInput"];
                                                                                                            } ?>">

        </div>
        <button type="submit" class="btn btn-primary col-2 my-2" name="submint">Search</button>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include_once "./admin/config.php";
            if (isset($_GET["submint"])) {
                $searchInput = $_GET["searchInput"];
                 $searchQuery = "SELECT * FROM `post_table` WHERE `Post_ID`= '$searchInput' or `Post_Title`= '$searchInput' or `Post_Description` ";
                $result = mysqli_query($conn, $searchQuery) or die("query faild");
                if (mysqli_num_rows($result) > 0) {
                    foreach($result as $row) {

            ?>
                        <tr>
                            <td scope="row"><?php echo $row['Post_ID'] ?></th>
                            <td><?php echo $row['Post_Title'] ?></td>
                            <td><?php echo $row['Post_Description'] ?></td>
                        </tr>
                    <?php    }
                } else {
                    ?>
                    <tr>
                        <td colspan="3">No result Found</td>
                    </tr>
            <?php
                }
            }


            ?>
        </tbody>
    </table>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>