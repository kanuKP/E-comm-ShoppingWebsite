<?php
session_start();
if(!isset($_SESSION["n"]) or $_SESSION["utype"]!="admin")
	header("location:error.php");
?>

<html>
<head><title>Manage category</title>
<?php
include_once("extfiles.php");
?>
</head>
<body>
<?php
include_once("adminheader.php");
?>
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>M<span>anage category </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Manage category</li>
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
$q="select * from addcat ";
$res=mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);
if($cnt==0)
{
	print "no categories found";
}
else
{
	print"<table class='table'>
	<tr>
		<th>Picture</th>
		<th>Category name</th>
		<th>Update</th>
		<th>Delete</th>		
	</tr>";
		
	while($x=mysqli_fetch_array($res))
	{
		print"
		<tr>
			<td><img src='uploads/$x[2]' height='75' ></td>
			<td>$x[1]</td>
			<td><a href='updatecat.php?cid=$x[0]'>Update</a></td>
			<td><a href='delcat.php?cid=$x[0]'>Delete</a></td>
			
		</tr>";	
	}
		print"</table>";
		print "<br/><br/>$cnt categories found";
}
?>
</div>
</div>
<?php
include_once("footer.php");
?>
</body>
</html>