<?php
$con = mysqli_connect("localhost","root","","osu_event") or die("Error due to \"".mysqli_connect_error()."\"");

$id= $_POST["id"];

date_default_timezone_set('Asia/Kuala_Lumpur');
$date = date("Y-m-d");

$sql = "INSERT INTO registered21 (user_id, regdate) VALUES ('$id','$date')";

$status = mysqli_query($con,$sql) or die("Error due to \"".mysqli_error($con)."\"");

echo "<head><link rel=\"stylesheet\" href=\"stylesheet.css\"></head>";
echo "<body></body>";

if($status){
header('Location: ./home?msg=' . urlencode(base64_encode("Successfully Registered for Tournament!")));
}else{
header('Location: ./home?msg=' . urlencode(base64_encode("Something went wrong? Contact Admin.")));
}

?>