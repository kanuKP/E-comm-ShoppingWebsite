<?php
session_start();

?>

<html>
<head><title>Show category</title>
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
			<h3>S<span>how category </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Show category</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->   
	   
	</div>
	
	
</div>

<div style="margin-right:20% ;margin-top:5%;margin-bottom:5%">
<div class="container">
<?php
require_once("vars.php");

$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());
$q="select * from addcat ";
$res=mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);

if($cnt==0)
{
	print "No Categories found";
}
else
{
print "<table width='100%' align='left' class='table'>";
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
<a href='showsubcat.php?cid=$x[0]'><img src='uploads/$x[2]' height='50%'><br/>
<b><font color='#DF3A01' size='6'>$x[1]</font></b></a>
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