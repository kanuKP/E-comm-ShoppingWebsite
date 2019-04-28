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
								
								<div class="styled-input" ><br/>
								<center><b>Category Name</b></center></br>
								<select name="cat" class="form-control" style="width:20%" required>
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
								if(isset($_POST["go"])|| isset($_POST["sgo"])){
									$a=$_POST["cat"];
									if($a==$x[0]){
										print "<option value='$x[0]' selected>$x[1]</option>";
									}
									else{
										print "<option value='$x[0]'>$x[1]</option>";
									}
								}else{
									print "<option value='$x[0]'>$x[1]</option>";
									}
									}
									mysqli_close($conn);
									}
									?>
								</select>&nbsp;&nbsp;&nbsp;
								
								<span></span>
							</div> 
							<input type="submit" name="go" class='form-control' style='width:15%' value="Generate subcategories"  formnovalidate>							
							<div class="styled-input" ><br/>
								<center><b>Subcategory Name</b></center><br/>
								<select name="subcat" class="form-control" style="width:20%" required>
									<option value="">Choose Subcategory</option>
								<?php
								
								if(isset($_POST["go"]))
								{
									require_once("vars.php");
									$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname) or die("Error in connection " . mysqli_connect_error());
									$cid=$_POST["cat"];//101,102,103
									$q="select * from addsubcat where catID='$cid'";								

									$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));

									$cnt=mysqli_affected_rows($conn);
									if($cnt==0)
									{	
									//print "<option value=''>No subcategories</option>";
									}
									else
									{
									while($x=mysqli_fetch_array($res))
									{	
								if(isset($_POST["sgo"]))
								{
									$a=$_POST["subcat"];
									if($a==$x[0])
									{
										print "<option value='$x[0]' selected>$x[1]</option>";
									}
									else
									{
										print "<option value='$x[0]'>$x[1]</option>";
									}
								 }
								else{
									print "<option value='$x[0]'>$x[1]</option>";
									}
								}
							  }
								}
									mysqli_close($conn);							
									?>
								</select>	
								
								<span></span>
							</div> 
							<br/><center><input type="submit" name='sgo' style='width:15%' class='form-control' value="Generate products" ></center>

</form>

<div style="margin-left: 5%; margin-right: 5%; margin-top:5%;margin-bottom:5%">
<div class="container">

<?php
if(isset($_POST["sgo"]))
{
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());
$cid=$_POST["cat"];//101,102
$subid=$_POST["subcat"];
$q="select * from addproduct where catid='$cid' and subcatid='$subid'";
$res=mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
if($cnt==0)
{
	print "no products found";
}
else
{
	print"<table class='table'>
	<tr>
		<th>Picture</th>
		<th>Name</th>
		<th>Price</th>
		<th>Update</th>
		<th>Delete</th>		
	</tr>";
		
	while($x=mysqli_fetch_array($res))
	{
		print"
		<tr>
			<td><img src='uploads/$x[8]' height='75' ></td>
			<td>$x[3]</td>
			<td>$x[4]</td>
			<td><a href='updateproduct.php?pid=$x[0]'>Update</a></td>
			<td><a href='delproduct.php?pid=$x[0]'>Delete</a></td>
			
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