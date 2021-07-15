<?php
$con = mysqli_connect("localhost","root","","osu_event") or die(header('Location: sign-up?msg=' . urlencode(base64_encode("Error due to \"".mysqli_connect_error()."\". Please Contact Admin!"))));

$uname = $_POST["username"];
$pw = $_POST["password"];
$name = $_POST["name"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$date = $_POST["date"];

//CHECK DUPLICATE
$sql = "SELECT * FROM user WHERE (username = '$uname' OR email = '$email')";
$status = mysqli_query($con,$sql);

if (mysqli_num_rows($status)>0){
	echo '<script>setTimeout(function(){location.href = "./sign-up?msg='.urlencode(base64_encode("Username/Email are taken! Try again.")).'"}, 0);</script>';
}else{
//DATA UPLOAD
	$sql = "INSERT INTO user VALUES ('0','$uname','$pw','$name','$email','$gender','$date','0')";
	$status = mysqli_query($con,$sql) or die(header('Location: sign-up?msg=' . urlencode(base64_encode("Error due to \"".mysqli_error($con)."\". Please Contact Admin!"))));
	if($status){
		echo '<script>setTimeout(function(){location.href = "./sign-in?msg='.urlencode(base64_encode("Successfully Registered.")).'"}, 0);</script>';
	}else{
		echo '<script>setTimeout(function(){location.href = "./sign-up?msg='.urlencode(base64_encode("Something went wrong.")).'"}, 0);</script>';
	}
}

?>