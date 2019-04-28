<?php
session_start();
ob_start();
?>

<html>
<head><title>show cart</title>
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

<div style="margin-left: 15%; margin-right: 20%; margin-top:5%;margin-bottom:5%">
<div class="container">
<?php
require_once("vars.php");

$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());
$un=$_SESSION["un"];

$q="select * from carttable where username='$un' ";
$res=mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);
if($cnt==0)
{
	print "no products found";
}
else
{
	print"<table width='100%'>
	<tr>
		<th>Picture</th>
		<th>Name</th>
		<th>Rate</th>
		<th>Quantity</th>
		<th>Total cost</th>
		<th>Delete</th>
	</tr>";
		$gt=0;
	while($x=mysqli_fetch_array($res))
	{
		print"
		<tr>
			<td><img src='uploads/$x[5]' height='50'</td>
			<td>$x[1]</td>
			<td>$x[2]</td>
			<td>$x[3]</td>
			<td>$x[4]</td>
			<td><a href='delcart.php?pid=$x[7]'>Delete</td>			
		</tr>";	
		$gt=$gt+$x[4];
	}
		print"</table>";
		print "<br/><br/>$cnt Products found in the cart";
}
?>
<div class="description">
<form name="form1" method="post" >
<input type="submit" name="s4" value="Continue Shopping" class='form-control' style="width:20%"><!--; background-color:darkgreen; color:orange"-->
<br/>
<input type="submit" name="s5" value="Checkout" class='form-control' style="width:20%"><!-- background-color:darkgreen; color:orange"> -->

</form>
</div>
<?php
if(isset($_POST["s4"])){
	header("location:showcat.php");
}
else if(isset($_POST["s5"])){
	$_SESSION["gtotal"]=$gt;
	header("location:checkout.php");
}

?>
</div>
</div>


<?php
include_once("footer.php");
?>
</body>
</html>