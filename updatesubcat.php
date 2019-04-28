<?php
session_start();
if(!isset($_SESSION["n"]) or $_SESSION["utype"]!="admin"){
	header("location:error.php");
}
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());
$sid=$_GET["scid"];
$q="select * from addsubcat where subcatid='$sid'";

$res=mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));

$z=mysqli_fetch_array($res);
mysqli_close($conn);

if(isset($_POST["s2"]))
{
require_once("vars.php");

$scname=$_POST["subcatname"];
$err=$_FILES["subcatpic"]["error"];

if($err==0)
{
	$scpic=time().$_FILES["subcatpic"]["name"];
	$tname=$_FILES["subcatpic"]["tmp_name"];
	move_uploaded_file($tname,"uploads/$scpic");	
}
else
{	
	$scpic=$z[3];
}
$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname) 
or die("Error in connection " . mysqli_connect_error());
$scnamew=mysqli_real_escape_string($conn,$scname);
$cid=$_GET["scid"];
$q="update addsubcat set subcatname='$scnamew', subcatpic='$scpic' where subcatid='$cid'";

mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));

$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);
if($cnt==1)
{	
header("location:managesubcat.php");
}
else
{
$msg="Subcategory not updated successfully";
}
}
if(isset($_POST["s3"]))
{
	header("location:managesubcat.php");
}
?>

<html>
<head><title>Update SubCategory</title>
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
			<h3>U<span>pdate Subcategory</span></h3>
			<!--/w3_short-->
				<div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">
						    <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>update Subcategory</li>
							</ul>
						</div>
				</div>
	        <!--//w3_short-->   	   
	    </div>	
</div>
				<!-- Modal content-->
				<div class="modal-content" style="margin-left: 30%; margin-right: 30%; margin-top:5%;margin-bottom:5%">
					<div class="modal-header">
						
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Update Subcategory <span>Now</span></h3>
							<!--		<form action="#" method="post" enctype="multipart/form-data">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="catname" required="" value="<?php print $x[1]?>">
								<label>Category Name</label>
								<span></span>
							</div>
							
							<div class="styled-input"><br/>
								<input type="file" name="catpic" > 
								<label>Category Image</label>
								<span></span>
							</div> 							
							<input type="submit" name="s2" value="Update category"><br/><br/>
							<input type="submit" name="s3" value="Cancel" >
							<form name="form1" method="post" enctype="multipart/form-data">
-->
							<form  method="post" enctype="multipart/form-data">
							<div class="styled-input agile-styled-input-top" style="width:60%" >
								<input type="text" name="subcatname" style="width:100%" required>
								<label>Subcategory Name</label>
								<span></span>
							</div>
							
							<div class="styled-input" ><br/>
								<label>Category Name</label></br>
								<select name="cat" class="form-control" style="width:50%" required>
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
								if($z[1]==$x[0])
									{
									print "<option value='$x[0]' selected>$x[1]</option>";
									}
									else
									{
									print "<option value='$x[0]'>$x[1]</option>";
									}
									}
									}
									mysqli_close($conn);
									?>
								</select>
								
								<span></span>
							</div> 
							<?php
							print"<img src ='uploads/$z[3]' height='75'><br/><br/>";
							?>
							choose new photo,if required<br/>
							<div class="styled-input" style="width:60%"><br/>
								<input type="file" name="subcatpic" style="width:100%"> 
								<label>SubCategory Image</label>
								<span></span>
							</div> 							
							<input type="submit" name="s2" value="Update Subcategory"><br/><br/>
							<input type="submit" name="s3" value="Cancel" >
						</form>
						  <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook " style="padding-top:10px" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" style="padding-top:10px" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" style="padding-top:10px" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" style="padding-top:10px" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" style="padding-top:10px" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" style="padding-top:10px" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" style="padding-top:10px"  aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" style="padding-top:10px" aria-hidden="true"></i></div></a></li>
														</ul>
														<div class="clearfix"></div>
														<p><a href="#" data-toggle="modal" data-target="#myModal2" > Don't have an account?</a></p>

						</div>							
						<div class="clearfix"></div>
						<div class="styled-input">
						<?php
						if(isset($msg))
						{
							print $msg;	
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