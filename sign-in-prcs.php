<?php
session_start();
$con = mysqli_connect("localhost","root","","osu_event") or die(header('Location: sign-in?msg=' . urlencode(base64_encode("Error due to \"".mysqli_connect_error()."\". Please Contact Admin!"))));
$username= $_SESSION["username"];
$pw= $_SESSION["password"];

$sql = "SELECT * FROM user WHERE username='$username'";
echo $sql;
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res,MYSQLI_NUM);
if(mysqli_num_rows($res)==0){ 				//number of rows
	//header('Location: ./sign-in?msg=' . urlencode(base64_encode("Username does not exist. Try Again.")));
	session_destroy();
	echo '<script>setTimeout(function(){location.href = "./sign-in?msg='.urlencode(base64_encode("Username does not exist. Try Again.")).'"}, 0);</script>';
}else{
	if($row[2]==$pw){
		$_SESSION["id"] = $row[0];
		$_SESSION["username"] = $username;	//est session
		$_SESSION["level"] = $row[7];
		header('Location: ./home?msg=' . urlencode(base64_encode("Logged In Successfully!")));		//target
	}else{
		//header('Location: ./sign-in?msg=' . urlencode(base64_encode("Wrong Password! Try Again.")));
		session_destroy();
		echo '<script>setTimeout(function(){location.href = "./sign-in?msg='.urlencode(base64_encode("Wrong Password. Try Again.")).'"}, 0);</script>';
	}}
?>