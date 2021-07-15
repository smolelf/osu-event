<!DOCTYPE HTML>
<html>
<head>
	<!--<link rel="stylesheet" href="stylesheet.css">-->
	<link rel="stylesheet" href="navbar.css">
	<link rel="stylesheet" href="logform.css">
	<link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:500,700&amp;display=swap">
	<link rel="icon" sizes="32x32" href="https://osu.ppy.sh/favicon-32x32.png">
	<title>Sign Up - OMT21</title>
	<style>
	</style>
</head>
<body>
	<div id="navbar">
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
		<form>
  
  <div class="segment">
    <h1>Sign up</h1>
  </div>
  
  <label>
    <input type="text" placeholder="Email Address" placeholder />
  </label>
  <label>
    <input type="password" placeholder="Password" placeholder />
  </label>
  <button class="red" type="button"><i class="icon ion-md-lock"></i> Log in</button>
  
  <div class="segment">
    <button class="unit" type="button"><i class="icon ion-md-arrow-back"></i></button>
    <button class="unit" type="button"><i class="icon ion-md-bookmark"></i></button>
    <button class="unit" type="button"><i class="icon ion-md-settings"></i></button>
  </div>
  
  <div class="input-group">
    <label>
      <input type="text" placeholder="Email Address"/>
    </label>
    <button class="unit" type="button"><i class="icon ion-md-search"></i></button>
  </div>
  
</form>
	</div><br>
</body>
</html>