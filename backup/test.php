<!DOCTYPE HTML>
<html>
<head>
	<title>ASSG</title>
<style>
	a{
		display: inline-block;
		width: 100%;
		text-align: center;
		margin-top: 50%;
	}
	table tr td{
		padding: 5px 0px;
	}
	.center{
		display: inline-block;
		width: 100%;
		margin-left: 25%;
		margin-top: 25%;
	}
</style>
</head>
<body>
<div>
<form method="POST" class="center" action="" >
<table border="1px" >
<tr>
	<td>NAME:</td>
	<td><input type="text" name="name" /></td>
</tr>
<tr>
	<td>EMAIL:</td>
	<td><input type="text" name="email" /></td>
</tr>
<tr>
	<td>ADDRESS:</td>
	<td><textarea name=address cols=22 rows=5></textarea></td>
</tr>
<tr>
	<td>CONTACT NUMBER:</td>
	<td><input type="text" name="contact" /></td>
</tr>
	<td>AGE:</td>
	<td><input type="text" name="age" maxlength="2" size="2" /></td>
</tr>
<tr>
	<td>GENDER:</td>
	<td><input type="radio" name="gender" value="male" />Male 
	<input type="radio" name="gender" value="female" />Female</td>
</tr>
<tr>
	<td>CATEGORY:</td>
	<td><input type="radio" name="category" value="3KM" />3KM 
	<input type="radio" name="category" value="5KM" />5KM
	<input type="radio" name="category" value="10KM" />10KM</td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="submit" value="Submit" /></td>
</tr>
</table>
</form>
</div>


<form action="signup.html">
<button>CLICK HERE TO SIGN UP</button>
</form>


</body>
</html>