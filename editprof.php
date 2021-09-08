<?php
$con = mysqli_connect("localhost","root","","osu_event") or die("Error due to \"".mysqli_connect_error()."\"");

$id = $_POST["id"];
$username = $_POST["username"];
$password = $_POST["password"];
$name = $_POST["name"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$date = $_POST["date"];

date_default_timezone_set('Asia/Kuala_Lumpur');
//$date = date("Y-m-d");

$sql = "UPDATE user SET username='$username', password='$password', name='$name', email='$email', gender='$gender', birthdate='$date' WHERE id='$id' ";

$status = mysqli_query($con,$sql) or die("Error due to \"".mysqli_error($con)."\"");

echo "<head><link rel=\"stylesheet\" href=\"stylesheet.css\"></head>";
echo "<body></body>";

if($status){
header('Location: ./home?msg=' . urlencode(base64_encode("Successfully update profile!")));
}else{
header('Location: ./home?msg=' . urlencode(base64_encode("Something went wrong? Contact Admin.")));
}

?>
