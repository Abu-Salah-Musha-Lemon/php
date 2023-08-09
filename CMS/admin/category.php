<?php
include_once "header.php";
include_once "config.php";
if (isset($_GET['delete'])) {
	$delete = base64_decode($_GET['delete']);
	$sql = "DELETE FROM `categorytable` WHERE `Category_ID` = $delete";
	$result = mysqli_query($conn, $sql) or dir("faild to delte ");
}

?>

<div class="container md-5">
	<div class="container mt-3">

		<i class="bi bi-person-add btn btn-success my-2" data-bs-toggle="modal" data-bs-target="#myModal"></i>
	</div>


	<div class="modal" id="myModal">
		<form action="" method="post">
			<div class="modal-dialog">
				<div class="modal-content">

					<div class="modal-header">
						<h4 class="modal-title">Add Cetegory</h4>
						<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
					</div>

					<div class="modal-body">
						<div class="form-group">
							<label>Category Name</label>
							<input type="text" class="form-control" name="cName" placeholder="Category Name">
						</div>
					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-success" name="cSave">Save</button>
						<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>

					</div>

				</div>
		</form>

		<?php if (isset($_POST['cSave'])) {
			$cName = $_POST['cName'];
			$sql = "INSERT INTO `categorytable`( `CategoryName`) VALUES ('$cName');";
			$result = mysqli_query($conn, $sql);
		}
		?>
	</div>
</div>
<?php
$sql = "SELECT * FROM `categorytable`ORDER BY`Category_ID`DESC ";
$result = mysqli_query($conn, $sql) or die("query unsuccessfull");
if (mysqli_num_rows($result) > 0) {

?>
	<!-- <a href="add-category.php">  <i class="bi bi-person-add btn btn-success my-2" ></i></a> -->
	<table class="table md-5">
		<thead>
			<tr>
				<th scope="col">Category Id</th>
				<th scope="col"> Cetegory Name</th>
				<th scope="col">Post N0.</th>
				<th scope="col">Action.</th>
			</tr>
		</thead>
		<tbody>

			<?php
			while ($row = mysqli_fetch_assoc($result)) {
				echo '
                    <tr>
                    <td>' . $row["Category_ID"] . '</td>
                    <td>' . $row["CategoryName"] . '</td>
                    <td>' . $row["Post"] . '</td>
                    <td > 
                            <a  href="./category.php?edit-post=' . base64_encode($row["Category_ID"]) . '" role="button"><i class="btn btn-primary bi bi-pencil-square"></i>
                            </a>
                            <a href="./category.php?delete=' . base64_encode($row["Category_ID"]) . '" role="button"><i class="btn btn-danger bi bi-trash"></i></a>
                        </td>
                       </tr>
                    ';
			}

			?>

		</tbody>
	</table>

<?php } ?>
</div>

<?php include_once "footer.php"; ?>