<!DOCTYPE HTML>
<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
session_start();
$con = mysqli_connect("localhost","root","","osu_event") or die("Error due to \"".mysqli_connect_error()."\"");
$username = $_SESSION["username"];
$id = $_SESSION["id"];
$level = $_SESSION["level"];
//CHECK USER INFO
$sql = "SELECT * FROM user WHERE username='$username'";
//echo $sql."<br>"; //DEBUG SQL STATEMENT
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res,MYSQLI_NUM);
//CHECK REGISTER
$sql1 = "SELECT * FROM registered21 WHERE user_id='$id'";
//echo $sql1; //DEBUG SQL1 STATEMENT
$res1 = mysqli_query($con,$sql1);
$row1 = mysqli_fetch_array($res1,MYSQLI_NUM);
//VIEW ALL USER INFO
$sql2 = "SELECT * FROM user LEFT JOIN registered21 ON user.id = registered21.user_id ORDER BY ISNULL(registered21.regdate), registered21.regdate ASC";
//echo $sql."<br>"; //DEBUG SQL2 STATEMENT
$res2 = mysqli_query($con,$sql2);
//$row2 = mysqli_fetch_array($res2,MYSQLI_NUM);
//START PROG
if($_SESSION["level"]==1){
?>
<html>
<head>
	<link rel="stylesheet" href="stylesheet.css">
	<link rel="stylesheet" href="navbar.css">
	<link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:500,700&amp;display=swap">
	<link rel="icon" sizes="32x32" href="https://osu.ppy.sh/favicon-32x32.png">
	<title>Registered User Detail - OMT21</title>
</head>
<body class="hidescroll">
<div id="navbar">
	<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/Osu%21Logo_%282015%29.svg/1200px-Osu%21Logo_%282015%29.svg.png" style="width: 50px;height: 50px;">
  	<a href="../osu-event">Home</a>
  	<a href="../osu-event/home">User Info</a>
  	<a class="active" href="../osu-event/reguser">Registered Users</a>
  	<a href="../osu-event/logout">Log Out</a>
  	<span>
	Days Left to Tournament:
	<?php
		$remain = strtotime('2021-08-31 00:00:00') - time();
		$day = floor($remain / 86400);
		if($day){ 
			echo "$day Days ";
		}
	?>
  	</span>
  	<?php
  		if(mysqli_num_rows($res1)==1){ ?>
  			<span class="reg">
  			Status: Registered!
  			</span>
  		<?php }else{ ?>
  			<span class="notreg">
	  		Status: Not Registered
  			</span>
  		<?php }
  	?>
  	<span class="user">
  	Welcome, 
  	<?php 
  		echo $row[3]."!";
  	?>
  	</span>
</div>
<div class="content">
	<h1>osu! Malaysia Tournament 2021</h1>
	<h4>Registered Users Information</h4><br><br>
	<div class="segment"><label><table class="reguser">
		<tr>
			<th>Username</th>
			<th>Full Name</th>
			<th>E-Mail</th>
			<th colspan="3">Birth Date</th>
			<th>Tournament Registration Status</th>
		</tr>
		<?php
		while($row2 = mysqli_fetch_array($res2,MYSQLI_NUM)){
			echo "<tr>";
			echo "<td>".$row2[1]."</td>";
			echo "<td>".$row2[3]."</td>";
			echo "<td>".$row2[4]."</td>";
			////////////BIRTHDATE////////////
  			$date=explode("-", $row2[5]);
  			$date=mktime(0,0,0,$date[1],$date[2],$date[0]);
			echo "<td class=nopad>".date("d",$date)."</td>";
			echo "<td class=nopad>".date("M",$date)."</td>";
			echo "<td class=nopad>".date("Y",$date)."</td>";
			/////////////////////////////////
			//CHECK REGISTER
			$sql3 = "SELECT * FROM registered21 WHERE user_id='$row2[0]'";
			//echo $sql1; //DEBUG SQL3 STATEMENT
			$res3 = mysqli_query($con,$sql3);
			if(mysqli_num_rows($res3)==1){
				$row3 = mysqli_fetch_array($res3,MYSQLI_NUM);
  				$date1=explode("-", $row3[2]);
  				$date1=mktime(0,0,0,$date1[1],$date1[2],$date1[0]);
				echo "<td>Registered on ".date("d F Y",$date1)."</td>";
			}else{
				echo "<td>Not Registered</td>";
			}
			echo "</tr>";
		}
		?>
	</table></label></div>
</div>

<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>

</body>
<?php
}else{
	header('Location: index?msg=' . urlencode(base64_encode("Unauthorised User. Admin Only!")));
}
?>
<footer>
  <span class="copy">arsyad z. ©<?php echo date("Y"); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact: <a href="mailto:arsyad.z@imsmolelf.my"> arsyad.z@imsmolelf.my</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://imsmolelf.my" target="_blank">Created by Arsyad (SW0105692): imsmolelf.my</a>
</footer>
</html>