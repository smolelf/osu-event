<!DOCTYPE HTML>
<link rel="icon" sizes="32x32" href="https://osu.ppy.sh/favicon-32x32.png">
<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
session_start();
if(isset($_SESSION["username"])){
	header('Location: home?msg=' . urlencode(base64_encode("Already Logged-In!")));
}

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
<html>
<head>
  <link rel="stylesheet" href="stylesheet.css">
  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:500,700&amp;display=swap">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <title>Sign Up - OMT21</title>
</head>
<body onload="noti()">
	<div id="navbar">
  		<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/Osu%21Logo_%282015%29.svg/1200px-Osu%21Logo_%282015%29.svg.png" style="width: 50px;height: 50px;">
  		<a href="../osu-event">Home</a>
  		<a class="active" href="../osu-event/sign-up">Sign-Up</a>
  		<a href="../osu-event/sign-in">Sign-In</a>
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
	</div>
	<div id=content>
  <br><br>
	<h1>osu! Malaysia Tournament 2021</h1>
	<form method="POST" action="sign-up-prcs.php">
    <div class="segment">
    <h2>Sign Up</h2><br>
  </div>
  <label>Username:
    <input type="text" placeholder="Username" name="username" autocomplete="false" required />
  </label>Password:
  <div class="input-group">
    <label>
      <input type="password" id="password" name="password" autcomplete="false" placeholder="Password" required />
    </label>
    <button class="unit black" id="shb" type="button" onclick="showhidepw()"><i id="showhide" class="icon ion-md-eye-off"></i></button>
    <script type="text/javascript">
				function showhidepw(){
					var x = document.getElementById("password");
					if (x.type == "password"){
						x.type = "text";
						document.getElementById("showhide").className="icon ion-md-eye";
						document.getElementById("shb").className="unit blue";
					} else {
						x.type = "password"
						document.getElementById("showhide").className="icon ion-md-eye-off";
						document.getElementById("shb").className="unit black";
					}
				}
			</script>
  </div><br>
  <label>Full Name:
    <input type="text" placeholder="Fullname" name="name" required />
  </label>
  <label>E-mail:
  <input type="email" placeholder="E-mail" name="email" required />
  </label>
  <span style=""><label style="margin-bottom: -10px">Gender:</label>
  <label class="radio" style="margin-bottom: -10px">
    <input type="radio" name="gender" value="Male" required="">
    <span class="design"></span>
    <span class="text">Male</span>
  </label>
  <label class="radio">
    <input type="radio" name="gender" value="Female">
    <span class="design"></span>
    <span class="text">Female</span>
  </label>
  </span>
  <label>Birth Date:
  <input type="date" placeholder="Birthdate" name="date" max="2009-12-31" required />
  </label>
  <div class="input-group">
  <label><button class="color" type="submit"><i class="icon ion-md-document"></i>&nbsp;&nbsp;Register Account!</button></label>
  <button class="unit black" type="reset"><i class="icon ion-md-refresh"></i></button>
</div>
</form>
	</div><br><br>

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
<footer>
  <span class="copy">arsyad z. ©<?php echo date("Y"); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact: <a href="mailto:arsyad.z@imsmolelf.my"> arsyad.z@imsmolelf.my</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://imsmolelf.my" target="_blank">Created by Arsyad (SW0105692): imsmolelf.my</a>
</footer>
</html>