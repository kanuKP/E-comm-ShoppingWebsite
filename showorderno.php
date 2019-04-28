
<?php
session_start();
?>

<html>
<head><title>Index</title>
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
			<h3>I<span>ndex </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Index</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->   
	   
	</div>
	
	
</div>

<div style="margin-left: 15%; margin-+right: 20%; margin-top:5%;margin-bottom:5%">
<div class="container">
<?php
require_once("vars.php");

$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());
$un=$_SESSION["un"];
$q="select * from ordertable where username='$un' order by orderno desc ";
$res=mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));

$x=mysqli_fetch_array($res);
print "<center><b><label style='color:darkred;font-size:25px;font-family:Georgia'>Thanks for Shopping from our website</label></b></center><br/>
<b><label style='color:black'>Your order number : <font color=orange>$x[0]</form></label></b><br/>
<b><label style='color:black'>total bill : <font color=orange>Rs.$x[1]</form></label></b><br/>
<b><label style='color:black'>Your shipping address : <font color=orange>$x[2]</form></label></b><br/>
 <br/>
";

$q="select * from carttable where username='$un'";
$res=mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));
while($y=mysqli_fetch_array($res)){
	$q="insert into orderdetails (productname,rate,quantity,tcost,picture,
	username,prodid,orderno) values ('$y[1]','$y[2]','$y[3]','$y[4]','$y[5]',
	'$y[6]','$y[7]','$x[0]')";
	
	mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));
					
	$q1="update addproduct set stock=stock-'$y[3]' where productid='$y[7]'";
	mysqli_query($conn,$q1) or die ("error in query".mysqli_error($conn));
}

$q="delete from carttable where username='$un'";
mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));
mysqli_close($conn);
?>
</div>
</div>
<?php
include_once("footer.php");
?>
</body>
</html>