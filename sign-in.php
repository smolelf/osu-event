<!DOCTYPE HTML>
<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
session_start();
if(isset($_SESSION["username"])){
	header('Location: home?msg=' . urlencode(base64_encode("Already Logged-In!")));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $_SESSION['username'] = $_POST['username'];
  $_SESSION['password'] = $_POST['password'];
?>

<!---------------------------REDIRECT LOADING PAGE START-------------------------->

<style>
@font-face{
  font-family: "progress";
  src: url('assets/Aller_Bd.ttf');
}
body{
  background-color: #0b0b0e;
  color: white;
}
h1.rdrt{
  font-family: "progress";
  text-align: center;
  text-shadow: 0 0 10px pink;
  margin-top: -20px;
}
progress{
  display: block;
  width:30%;
  height: 2em;
  margin: 0% 35%;
  /*box-shadow: 0 0 15px pink;*/
  border: 1px solid pink;
  background: #0b0b0e;
  border-radius: 16px;
  padding: 8px;
}
progress::-webkit-progress-bar {
    background: transparent;
    -webkit-font-stroke
}  
progress::-webkit-progress-value {
  /*box-shadow: inset 0 0 3px black;*/
    background: pink;
    border-radius: 16px;
}
span.rdrt{
  display: inline-block;
  position: sticky;
  height: auto;
  width: 50%;
  margin: 5% 0;
}
.mask2 {
  margin: 0 40%;
  width:20%;
  height: auto;
    -webkit-mask-image: radial-gradient(circle at 50% 50%, black 40%, transparent 70%);
    mask-image: radial-gradient(circle at 50% 50%, black 40%, transparent 70%);
}
</style>
<span class="rdrt">
<script>
var timeleft = 2;
var val = "Loading";
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
  }
  document.getElementById("progressBar").value = 3 - timeleft;
  document.getElementById("dots").innerHTML = val += ".";
  document.getElementById("rdct").innerHTML = "Redirecting in ".concat(String(timeleft)," seconds");
  timeleft -= 1;}, 1000);
  setTimeout(function(){location.href = "sign-in-prcs"}, 4000);
</script>
</span>
<img class="mask2" src="assets/heasrt.gif" />
<h1 class="rdrt" id="dots">Loading</h1>
<h1 class="rdrt" id="rdct">Redirecting in 3 seconds </h1>
<progress value="0" max="3" id="progressBar"></progress>

<!----------------------------REDIRECT LOADING PAGE END--------------------------->

<?php
}else{
?>
<html>
<head>
	<link rel="stylesheet" href="stylesheet.css">
	<link rel="stylesheet" href="navbar.css">
	<link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:500,700&amp;display=swap">
	<link rel="icon" sizes="32x32" href="https://osu.ppy.sh/favicon-32x32.png">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<title>Sign In - OMT21</title>
</head>
<body onload="noti()">
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
	<div id="navbar">
		<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/Osu%21Logo_%282015%29.svg/1200px-Osu%21Logo_%282015%29.svg.png" style="width: 50px;height: 50px;">
  		<a href="../osu-event">Home</a>
  		<a href="../osu-event/sign-up">Sign-Up</a>
  		<a class="active" href="../osu-event/sign-in">Sign-In</a>
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
	<h1>osu! Malaysia Tournament 2021</h1>
	<form method="POST" action="sign-in.php">  
  <div class="segment">
    <h2>Sign In</h2><br>
  </div>
  
  <label>Username:
    <input type="text" placeholder="Enter Username" name="username" required />
  </label>Password:
  <div class="input-group">
    <label>
      <input type="password" id="password" placeholder="Enter Password" name="password" required />
    </label>
    <button class="unit black" type="button" id="shb" onclick="showhidepw()"><i id="showhide" class="icon ion-md-eye-off"></i></button>
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
  <button class="color" type="submit"><i class="icon ion-md-lock"></i>&nbsp;&nbsp;Log In</button>
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
<footer class="force">
  <span class="copy">arsyad z. ©<?php echo date("Y"); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact: <a href="mailto:arsyad.z@imsmolelf.my"> arsyad.z@imsmolelf.my</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://imsmolelf.my" target="_blank">Created by Arsyad (SW0105692): imsmolelf.my</a>
</footer>
</html>\
<?php
}
?>