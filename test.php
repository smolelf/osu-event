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
var downloadTimer = setInterval(function(){
  if(timeleft <= 0){
    clearInterval(downloadTimer);
  }
  document.getElementById("progressBar").value = 3 - timeleft;
  document.getElementById("rdct").innerHTML = "Redirecting in ".concat(String(timeleft)," seconds..");
  timeleft -= 1;}, 1000);

  setTimeout(function(){location.href = "test"}, 4000);
</script>
</span>
<img class="mask2" src="assets/heasrt.gif" />
<h1 class="rdrt" id="rdct">Redirecting in 3 seconds.. </h1>
<progress value="0" max="3" id="progressBar"></progress>
