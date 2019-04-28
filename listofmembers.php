<?php
session_start();
if(!isset($_SESSION["n"]) or $_SESSION["utype"]!="admin")
	header("location:error.php");
?>



<?php
session_start();
?>

<html>
<head><title>list of members</title>
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
			<h3>List<span> of members </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>List of members</li>
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
$q="select * from signup ";
$res=mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);
if($cnt==0)
{
	print "no members found";
}
else
{
	print"<table width='100%'>
	<tr>
		<th>Name</th>
		<th>Phone</th>
		<th>Gender</th>
		<th>Country</th>
		<th>Username</th>
	</tr>";
		
	while($x=mysqli_fetch_array($res))
	{
		print"
		<tr>
			<td>$x[0]</td>
			<td>$x[1]</td>
			<td>$x[2]</td>
			<td>$x[3]</td>
			<td>$x[4]</td>
		</tr>";	
	}
		print"</table>";
		print "<br/><br/>$cnt members found";
}
?>
</div>
</div>
<?php
include_once("footer.php");
?>
</body>
</html>