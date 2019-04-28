<?php
session_start();
?>

<html>
<head><title>Show product</title>
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
			<h3>S<span>how product </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Show product</li>
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
$sid=$_GET["scid"];
$q="select * from addproduct where subcatid='$sid' ";
$res=mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);

if($cnt==0)
{
	print "No products found";
}
else
{
print "<table width='100%' align='center' class='table'>";
$count=0;
print "<tr align='center'>";
while($x=mysqli_fetch_array($res))
{	
if($count==3)
{
print "</tr><tr align='center'>";
$count=0;
}
print "<td>
<a href='showproddetails.php?pid=$x[0]' ><img src='uploads/$x[8]' height='35%'><br/>
<b><font face='calibri,serif' color='#424242' size='4'>$x[3]</font></b></a>
</td>";
$count++;//1

}
print "</tr></table>";
mysqli_close($conn);

}	
?>
</div>
</div>
<?php
include_once("footer.php");
?>
</body>
</html>