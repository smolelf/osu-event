<!DOCTYPE HTML>
<?php
date_default_timezone_set('Asia/Kuala_Lumpur');
session_start();
?>
<html>
<head>
	<link rel="stylesheet" href="stylesheet.css">
	<link rel="stylesheet" href="navbar.css">
	<link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:500,700&amp;display=swap">
	<link rel="script" href="scplay.js"/>
	<link rel="icon" sizes="32x32" href="https://osu.ppy.sh/favicon-32x32.png">
	<title>osu! Malaysia Tournament 2021</title>
	<script type="text/javascript" src="scplay.js"></script>
</head>
<body class="special" onload="noti()">
<?php
if (isset($_GET['msg']))
{
	echo "	<span class=\"noti\">".base64_decode(urldecode($_GET['msg']))."</span>
	";
    echo "<script type=\"text/javascript\">
    	function noti() {
    		$(\"span.noti\").fadeIn(1000).delay(4000).fadeOut(400);
    	}
    	</script>
    	";
}
?>
<div style="position: fixed; z-index: -99; width: 100%; height: 100%">
<iframe frameborder="0" height="100%" width="100%" src="https://youtube.com/embed/2OM137h9yqg?start=12&mute=1&autoplay=1&loop=1&modestbranding=1&showinfo=0&rel=0&iv_load_policy=3&fs=0&controls=0&disablekb=1&playlist=2OM137h9yqg">
</iframe>
</div>
<?php
if(isset($_SESSION["username"])){
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
?>
<div id="navbar">
	<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/Osu%21Logo_%282015%29.svg/1200px-Osu%21Logo_%282015%29.svg.png" style="width: 50px;height: 50px;" href="/osuevent" />
  	<a class="active" href="../osu-event">Home</a>
  	<a href="../osu-event/home">User Info</a>
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
<?php }else{ ?>
<div id="navbar">
	<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/Osu%21Logo_%282015%29.svg/1200px-Osu%21Logo_%282015%29.svg.png" style="width: 50px;height: 50px;">
  	<a class="active" href="../osu-event">Home</a>
  	<a href="../osu-event/sign-up">Sign-Up</a>
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
<?php } ?>
<div class="content">
</h2>
<h1>osu! Malaysia Tournament 2021</h1>
<h3 class="infor">Venue: Kuala Lumpur Convention Center &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Date: 31st August 2021 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Time: 10:00 AM-5:00 PM</h3>
<span class="one">

	<h5>What is "osu!"?</h5>
	osu! is a rhythm game primarily developed, published and created by Dean "Peppy" Herbert also known as ppy. The game has received generally positive reviews and has been recommended by professional gamers as a way of improving cursor aim and gaining advantage in games other than osu!.

	<h5>What is the criteria to join OMT21?</h5>
	<ul><li> ≥ 12 Years Old by 2021</li><li>Malaysian</li><li>Top 100,000 World Rank (Optional)</li></ul>As long as you have the skill to play 5* maps and above, you are welcomed to join! Any rank would be accepted. But it is recommended to rank top 100,000 worldwide OR you might have hard time later ( ͡° ͜ʖ ͡°)

	<h5>What is the prize?</h5>
	<ul><li class="prz"><span class="first">First Place</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 1 Year of osu! Supporter and OMT21 Banner on osu! profile.</li><br>
		<li class="prz"><span class="second">Second Place</span>&nbsp;: 6 Months of osu! Supporter.</li><br>
		<li class="prz"><span class="third">Third Place</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 3 Months of osu! Supporter.</li>
	</ul>

	<h5>Sounds Exciting!</h5>
	It is indeed! On Malaysia Independance day, <span> 31<sup>st</sup> August 2021</span>, the tournament will be held at KLCC! Wait no more, Register Now! &nbsp;&nbsp;&nbsp;&nbsp;がんばってよ !!!

	<h5>Past Winner?</h5>
	Here's the latest winner of OMT 2019 and OMT 2020.

</span>
<br>
<table border=0px>
	<tr>
		<td>
			<h3>In 2020, ClawViper pronounced winner.</h3>
		</td>
		<td>
			<h3>As for 2019, ShaneLiang declared winner.</h3>
		</td>
	</tr>
	<tr>
		<td>
			<img src="assets/podium20.png" usemap="#map-2020" alt="2020 Winner">
			<map name="map-2020">
				<area target="_blank" alt="vernonlim" title="vernonlim" href="https://osu.ppy.sh/users/10167542" coords="81,620,214,752" shape="rect">
				<area target="_blank" alt="ClawViper" title="ClawViper" href="https://osu.ppy.sh/users/2681361" coords="438,391,570,523" shape="rect">
				<area target="_blank" alt="seabee" title="seabee" href="https://osu.ppy.sh/users/13472074" coords="801,621,932,752" shape="rect">
			</map>
		</td>
		<td>
			<img src="assets/podium19.png" usemap="#map-2019" alt="2019 Winner">
			<map name="map-2019">
				<area target="_blank" alt="ShaneLiang" title="ShaneLiang" href="https://osu.ppy.sh/users/6716499" coords="376,494,109" shape="circle">
				<area target="_blank" alt="Rampax" title="Rampax" href="https://osu.ppy.sh/users/3995630" coords="657,493,109" shape="circle">
				<area target="_blank" alt="ClawViper" title="ClawViper" href="https://osu.ppy.sh/users/2681361" coords="943,493,108" shape="circle">
				<area target="_blank" alt="TequilaWolf" title="TequilaWolf" href="https://osu.ppy.sh/users/3633477" coords="1221,493,109" shape="circle">
			</map>
		</td>
	</tr>
</table>
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="jquery.rwdImageMaps.min.js"></script>
<script>
$(document).ready(function(e) {
	$('img[usemap]').rwdImageMaps();
	
	$('area').on('click', function() {
		//alert($(this).attr('alt') + ' clicked');
	});
});
</script>
</div>
<iframe onload="scplay()" id="track" width="0" height="0" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/223164133&auto_play=true&show_comments=false&show_user=true&show_reposts=false&show_teaser=true&visual=true&single_active=false&start_track=0">
</iframe>
<script>
	var id = 'track';
	var iframe = document.getElementById(id)
	var widget = SC.Widget(iframe);
	function scplay(){
		widget.setVolume(5); // goes from 0 to 100
	}
</script>
</body><br><br><br><br>
<footer>
  <span class="copy">arsyad z. ©<?php echo date("Y"); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact: <a href="mailto:arsyad.z@imsmolelf.my"> arsyad.z@imsmolelf.my</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;<a href="https://imsmolelf.my" target="_blank">Created by Arsyad (SW0105692): imsmolelf.my</a>
</footer>
</html>