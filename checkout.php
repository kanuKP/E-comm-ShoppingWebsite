<?php
session_start();
ob_start();
?>

<html>
<head><title>show cart</title>

<script type="text/javascript">
function isnumber(evt){
	var charcode=(evt.which)?evt.which:evt.keyCode;
	if(charcode!=46&& charcode>31 && (charcode<48||charcode>57))
		return false;
return true;}
</script>
<script type="text/javascript">
function ischar(evt){
	var charcode=(evt.which)?evt.which:evt.keyCode;
	if(charcode!=46&& charcode>31 && (charcode<48||charcode>57) ||charcode=08)
		return true;
	return false;
}
</script>
<?php
include_once("extfiles.php");
?>
</head>
<body>
<?php
include_once("header.php");
?>
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>your<span> CART </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>your shopping cart</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->   
	   
	</div>
	
	
</div>

<div align="justify" style="margin-left:30%; margin-right: 15%; margin-top:5%;margin-bottom:5%">
<div class="container" class="description">

<form name="form1" method="post">
<b><label style="color:orange">Shipping Address: &nbsp;&nbsp;&nbsp;&nbsp;</label></b><br/><br/>
<textarea name="sadd" placeholder="shipping address" style="width:50%" class="form-control" rows=6></textarea>
<br/><b><label style="color:orange">Select the payment Mode: &nbsp;&nbsp;&nbsp;&nbsp;</label></b><br/><br/>

<select name="pmode" required class="form-control" style="width:50%">
<option value="">choose payment mode</option>
<option>debit card/credit card</option>
<option>Cash on delivery</option>
</select>
<br/><b><u><label >Fill the following details if you have chosen card as payment Mode</label></b><br/><br>
<b><label style="color:orange">Card Number: &nbsp;&nbsp;&nbsp;&nbsp;</label></b><input type="text" name="cno" placeholder="Card Number" style="border-radius:5px" minlength="16" maxlength="16" onkeydown="return isnumber(event)"><br/>
<br/><b><label style="color:orange">Holder's Name: &nbsp;&nbsp;</label></b><input type="text" name="hnm" placeholder="Holder name" style="border-radius:5px" onkeydown="return ischar(event)"><br/>
<br/><b><label style="color:orange">cvv Number: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></b><input type="text" name="cvv" placeholder="cvv number" style="border-radius:5px" minlength="3" maxlength="3" onkeydown="return isnumber(event)"><br/>

<br/><b><label style="color:orange">Expiry Month/Year</label></b><br/>
<br/><select name="Month" class="form-control" style="width:15%" >

<option value="">choose month</option>
<?php
for($y=1;$y<=12;$y++)
{
	print "<option>$y</option>";
}
?>
</select>
<br/><select name="Year" class="form-control" style="width:15%">
<option value="">choose Year</option>
<?php
for($y=2017;$y<=2040;$y++)
{
	print "<option>$y</option>";
}
?>
</select><br/>
<div class="description">
<b><input type="submit" name="s1" value="Make payment"  style="width:25%;background-color:orange;border-radius:5px;" ></b>
</div>
</form>
</div>
</div>
<?php
if(isset($_POST["s1"])){
	require_once("vars.php");
	$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname) or die ("error in connection".mysqli_connect_error());
	$bamt=$_SESSION["gtotal"];
	$add=$_POST["sadd"];
	$mode=$_POST["pmode"];
	$cno=$_POST["cno"];
	$hn=$_POST["hnm"];
	$exp=$_POST["Month"]."/".$_POST["Year"];
	$cvv=$_POST["cvv"];
	date_default_timezone_set("Asia/Kolkata");
	$dt=date("Y-m-d");
	$st="Payment Received,Processing";
	$us=$_SESSION["un"];
	
	$add=mysqli_real_escape_string($conn,$add);
	
	$q="insert into ordertable (billamt,address,mode,cardno,holder,exp,cvv,odate,status,username) 
	values ('$bamt','$add','$mode','$cno','$hn','$exp','$cvv','$dt','$st','$us')";
	mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
	$cnt=mysqli_affected_rows($conn);
	mysqli_close($conn);
	if($cnt==1){
		header("location:showorderno.php");
	}
	else{
		print "Problem while processing,try again...";
	}
	
	}

?>


<?php
include_once("footer.php");
?>
</body>
</html>