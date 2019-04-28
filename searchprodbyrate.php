<?php
session_start();
?>
<html>
<head><title>Searching results</title>
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
			<h3>searching<span> results </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Search</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->   
	   
	</div>
	
	
</div>

<div style="margin-left: 15%; margin-right: 20%; margin-top:5%;margin-bottom:5%">
<div class="container">
<form name="form1" method="post">

<select name="cat" required class="form-control" style="width:15%">
<option value="">Choose Category</option>
<?php
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname) or die("Error in connection " . mysqli_connect_error());

$q="select * from addcat";

$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));

$cnt=mysqli_affected_rows($conn);

if($cnt==0)
{	
print "<option value=''>No Categories</option>";
}
else
{
while($x=mysqli_fetch_array($res))
{
print "<option value='$x[0]'>$x[1]</option>";
}
}
mysqli_close($conn);

?>
</select ><br/>
<select name="minp" class="form-control" style="width:20%">
<option value="">Choose Minimum Price</option>
<option value="100">Rs. 100</option>
<option value="250">Rs. 250</option>
<option value="500">Rs. 500</option>
<option value="1000">Rs. 1000</option>
</select><br/>
<select name="maxp" class="form-control" style="width:20%">
<option value="">Choose Maximum Price</option>
<option value="5000">Rs. 5000</option>
<option value="2500">Rs. 2500</option>
<option value="1000">Rs. 1000</option>
<option value="500">Rs. 500</option>
<option value="250">Rs. 250</option>
<option value="100">Rs. 100</option>	
</select><br/>
<input type="submit" name="s1" value="Search" class="form-control" style="width:15%;background-color:orange;color:white">
</form>
<input type="range" min="10.50" max="50.00" step="0.1" />
<div class="container">

<?php
if(isset($_POST["s1"]))
{
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname) or die("Error in connection " . mysqli_connect_error());
//$pname=$_GET["search"];
$cid=$_POST["cat"];

$minpr=$_POST["minp"];
$maxpr=$_POST["maxp"];
if($maxpr>$minpr)
{
$q="select * from addproduct where catid='$cid' and rate between $minpr and $maxpr";
$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
if($cnt==0)
{	
print "No products found";
}
else
{
print "<table width='100%' align='center'>";
print "<tr align='center'>";
$count=0;
while($x=mysqli_fetch_array($res))
{
if($count==3)
{
print "</tr><tr align='center'>";
$count=0;
}
print "<td>
<a href='showproddetails.php?pid=$x[0]'>
<img src='uploads/$x[8]' height='100'><br/>
$x[3]
</a>
</td>";
$count++;//1
}
print "</tr></table>";
}
mysqli_close($conn);
}
else
{
print "Please choose proper rates";
}
}
?>
</div>

</div>
</div>
<?php
include_once("footer.php");
?>
</body>
</html>