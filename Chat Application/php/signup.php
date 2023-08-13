<?php
include_once 'config.php';
$fname = mysqli_real_escape_string($con, $_POST['fname']);
$lname = mysqli_real_escape_string($con, $_POST['lname']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
	// email is valid or not
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$sql = mysqli_query($con, "SELECT email FROM user WHERE email = '$email'");
		if (mysqli_num_rows($sql) > 0) {
			echo "$email.This email already exist!!";
		} else {
			//    check user upload file or not 
			if ($_FILES['image']) { // if file is uploded
				$img_name = $_FILES ["image"]['name'];
				$img_type = $_FILES ["image"]['type'];
				$img_tmp = $_FILES ["image"]['tmp_name'];
				$img_explode  = explode('.',$img_name);
				$img_ext = end($img_explode);
				$extensions = ['png','jpeg', 'jpg'];
				if (in_array($img_ext, $extensions) == true) {
					$time = time();
					$new_img_name = $time.$img_name;
					if (move_uploaded_file($tmp_name,'images/'.$new_img_name)) {
							$status = "Active";
							$random_id = rand(time(), 1000000000);// create a random id for user 
							$sql2 = mysqli_query($con, "INSERT INTO `user`(`user_id`, `uniqe_id`, `fname`, `lname`, `email`, `password`, `img`, `status`) VALUES ('$random_id','$fname','$lname','$email','$password','$new_img_name','$status')");
							if ($sql2) {
								$sql3 = mysqli_query($con, "SELECT * FROM user WHERE email = $email");
								if (mysqli_num_rows($sql3)>0) {
									$row = mysqli_fetch_assoc($sql3);
									$_session['uniqe_id'] = $row['uniqe_id']; // session start 
									echo "success";
								}
							}
					} 
					
				}else{
					echo "Please select adn image file";
				}
			} else {
				echo "Please upload File";
			}
		}
	} else {
		echo "$email. This is not a valid Email ";
	}
} else {
	echo "data is not submite";
}
