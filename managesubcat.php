<?php
session_start();
if(!isset($_SESSION["n"]) or $_SESSION["utype"]!="admin")
	header("location:error.php");
?>
<html>
<head><title>Manage Subcategory</title>
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
			<h3>M<span>anage Subcategory </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Manage Subcategory</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->     
	</div>
</div>

<form  action="#" method="post" > 
<div class="styled-input" align='center'><br/>

								<center><b>Category Name</b></center><br/>
								<select name="cat" class="form-control" style="width:25%" required>
									<option value="">Choose Category</option>
								<?php
									require_once("vars.php");
									$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname) or die("Error in connection " . mysqli_connect_error());

									$q="select * from addcat";

									$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));

									$cnt=mysqli_affected_rows($conn);
									if($cnt==0)
									{	
									//print "<option value=''>No Categories</option>";
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
								</select>								
								<span></span>
							</div> 
							<center><input type="submit" name='s3' value="GO" ></center>

</form>

<div style="margin-left: 5%; margin-right: 5%; margin-top:5%;margin-bottom:5%">
<div class="container">

<?php
if(isset($_POST["s3"]))
{
require_once("vars.php");

$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());
$cid=$_POST["cat"];//101,102
$q="select * from addsubcat where catid='$cid'";


$res=mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);

if($cnt==0)
{
	print "no sub categories found";
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
			<td><img src='uploads/$x[3]' height='75' ></td>
			<td>$x[1]</td>
			<td><a href='updatesubcat.php?scid=$x[0]'>Update</a></td>
			<td><a href='delsubcat.php?scid=$x[0]'>Delete</a></td>
			
		</tr>";	
	}
		print"</table>";
		print "<br/><br/>$cnt subcategories found";
}

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