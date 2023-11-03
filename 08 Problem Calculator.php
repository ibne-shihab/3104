<?php 
$sum=null;
$opa=null;
$x=0;
$y=0;

if(isset($_POST["ADD"])){
	$x=$_POST['fnum'];
	$y=$_POST['snum'];
	$opa=$_POST["ADD"];
	$sum=$x+$y;
}
else if(isset($_POST["SUB"])){
	$x=$_POST['fnum'];
	$y=$_POST['snum'];
	$opa=$_POST["SUB"];
	$sum=$x-$y;
	}
else if(isset($_POST["MUL"])){
	$x=$_POST['fnum'];
	$y=$_POST['snum'];
	$opa=$_POST["MUL"];
	$sum=$x*$y;
	}
else if(isset($_POST["DIV"])){
	$x=$_POST['fnum'];
	$y=$_POST['snum'];
	$opa=$_POST["DIV"];
	$sum=$x/$y;
	$sum=number_format($sum,3);
}
?> 
<html>
	<head>
		<title>This is an Online Calculator</title>
	</head>
	<body>
		<h1 align="center">Online Calculator</h1>
		<div align="center">
			Calculator
			<hr/>
		</div>
		<div align="center">
			<div align="center">
					<form align="center" method="post" action="">
						<label>Input </label> <hr/>
						1st number <input type="text" name="fnum" required/><br/>
						<br/><br/>
						2nd number <input type="text" name="snum" required/><hr/>
						<input type="submit" name="ADD" value="ADDITION"/><br/>
						<input type="submit" name="SUB" value="SUBTRACTION"/><br/>
						<input type="submit" name="MUL" value="MULTIPLICATION"/><br/>
						<input type="submit" name="DIV" value="DIVISION"/><br/>
					</form>
			</div>
		</div>
		<div align="center">
			<label>Result </label> <hr/>
			<textarea rows="3"cols="33"> 
				<?php
				if($sum==null){
					echo "$sum";
				}else{
					echo " $x $opa $y=$sum"; 
				}?>
			</textarea> 
		</div>
	</body>
</html>