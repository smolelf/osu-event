<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" href="stylesheet.css">
	<link rel="icon" sizes="32x32" href="https://osu.ppy.sh/favicon-32x32.png">
	<title>Sign In - OMT21</title>
</head>
<body>
	<div id="navbar">
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
		<h1 class="stroke">osu! Malaysia Tournament 2021</h1>
		<h2> Sign-In </h2>
		<div class=form>
		<form method="POST" action="sign-in-prcs.php">
			Username:<br>
			<input type="text" name="username" placeholder="Enter Username" size="20" required /><br><br>
			Password:<br>
			<input type="password" name="password" id="password" placeholder="Enter Password" required />
			<button type="button" id="showhide" onclick="showhidepw()">Show</button>
			<script type="text/javascript">
				function showhidepw(){
					var x = document.getElementById("password");
					if (x.type == "password"){
						x.type = "text";
						document.getElementById("showhide").innerHTML="Hide";
					} else {
						x.type = "password"
						document.getElementById("showhide").innerHTML="Show";
					}
				}
			</script>
			<br><br>
			<input type="submit" value="Login" />
		</form>
		</div>
	</div><br>
</body>
</html>