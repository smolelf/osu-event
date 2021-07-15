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
//START PROG
if($_SESSION["username"]!=NULL){
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="stylesheet.css">
	<link rel="stylesheet" href="navbar.css">
	<link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:500,700&amp;display=swap">
	<link rel="icon" sizes="32x32" href="https://osu.ppy.sh/favicon-32x32.png">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<title><?php echo $row[3] ?>'s Profile - OMT21</title>
</head>
<body class="special" onload="noti()">
<?php
if (isset($_GET['msg']))
{
	echo "	<span class=\"noti\">".base64_decode(urldecode($_GET['msg']))."</span>
	";
    echo "<script type=\"text/javascript\">
    	
    	function noti() {
    		$(\"span.noti\").fadeIn(300).delay(4000).fadeOut(400);
    	}
    	</script>
    	";
}
?>
	<div style="position: fixed; z-index: -99; width: 100%; height: 100%">
	<iframe frameborder="0" height="100%" width="100%" src="https://youtube.com/embed/2OM137h9yqg?start=12&mute=1&autoplay=1&loop=1&modestbranding=1&showinfo=0&rel=0&iv_load_policy=3&fs=0&controls=0&disablekb=1&playlist=2OM137h9yqg">
	</iframe>
	</div>
	<div id="navbar">
	<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/Osu%21Logo_%282015%29.svg/1200px-Osu%21Logo_%282015%29.svg.png" style="width: 50px;height: 50px;">
  	<a href="../osu-event">Home</a>
  	<a class="active" href="../osu-event/home">User Info</a>
  	<?php if($level==1){ ?>
  	<a href="../osu-event/reguser">Registered Users</a>
  	<?php }else{} ?>
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
<div class="content" class="sticky">
	<h1>osu! Malaysia Tournament 2021</h1>
	<h4><?php echo $row[3]; ?>'s Information.</h4><br>
		<form method="POST" action="reggame.php">
   		<div class="segment userinfo">
   		<input type="text" name="id" value="<?php echo $row[0]; ?>" hidden />
		<label>Username:
    	<input type="text" name="username" value="<?php echo $row[1]; ?>" disabled />
  		</label>
  		<label>Password:
    	<input type="text" name="password" value="<?php echo $row[2]; ?>" disabled />
  		</label>
  		<label>Full Name:
    	<input type="text" name="name" value="<?php echo $row[3]; ?>" disabled />
  		</label>
  		<label>E-Mail:
    	<input type="text" name="email" value="<?php echo $row[4]; ?>" disabled />
  		</label>
      <span style=""><label style="margin-bottom: -10px">Gender:</label>
      <label class="radio" style="margin-bottom: -10px">
      <input type="radio" name="gender" value="Male" <?php if($row[5]=="Male"){echo "checked";} ?> readonly disabled>
      <span class="design"></span>
      <span class="text">Male</span>
      </label>
      <label class="radio">
      <input type="radio" name="gender" value="Female" <?php if($row[5]=="Female"){echo "checked";} ?> readonly disabled>
      <span class="design"></span>
      <span class="text">Female</span>
      </label>
      </span>
  		<label>Birth Date:
  		<?php
  		$date=explode("-", $row[6]);
  		$date=mktime(0,0,0,$date[1],$date[2],$date[0])
  		?>
    	<input type="text" name="date" value="<?php echo date("d - F - Y",$date); ?>" disabled />
  		</label>
  		<?php
  		if(mysqli_num_rows($res1)==1){ 
  			$date1=explode("-", $row1[2]);
  			$date1=mktime(0,0,0,$date1[1],$date1[2],$date1[0])
  			?>
  			<label><button class="gray" type="submit" disabled><i class="icon ion-md-done-all"></i>&nbsp;&nbsp;Registered on <?php echo date("d F Y",$date1); ?></button></label>
  		<?php }else{ ?>
  			<label><button class="green" type="submit"><i class="icon ion-md-checkmark"></i>&nbsp;&nbsp;Register for Tournament now!</button></label>
  		<?php }
  		?>
		</div>
		</form>
</div><br>

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
	header('Location: sign-in?msg=' . urlencode(base64_encode("Unauthorised User. Login First!")));
}
?>
<footer class="force">
  <span class="copy">arsyad z. ©<?php echo date("Y"); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact: <a href="mailto:arsyad.z@imsmolelf.my"> arsyad.z@imsmolelf.my</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://imsmolelf.my" target="_blank">Created by Arsyad (SW0105692): imsmolelf.my</a>
</footer>
</html>