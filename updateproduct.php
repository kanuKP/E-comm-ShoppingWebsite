<?php
session_start();
if(!isset($_SESSION["n"]) or $_SESSION["utype"]!="admin")
	header("location:error.php");
?>

<?php

$pid=$_GET["pid"];
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname) 
or die("Error in connection " . mysqli_connect_error());
$q="select * from addproduct where productid=$pid";
$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);
if($cnt==1)
{
$ans=mysqli_fetch_array($res);
}
if(isset($_POST["s2"]))
{
require_once("vars.php");
$cid=$_POST["cat"];
$scid=$_POST["subcat"];
$pname=$_POST["prodname"];
$rt=$_POST["rate"];
$dis=$_POST["discount"];
$stock=$_POST["stock"];
$ft=$_POST["features"];

$err=$_FILES["prodpic"]["error"];
if($err==0)
{
	$ppic=time().$_FILES["prodpic"]["name"];
	$tname=$_FILES["prodpic"]["tmp_name"];
	move_uploaded_file($tname,"uploads/$ppic");	
}
else
{	
	$ppic=$ans[8];
}
$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());
$pname=mysqli_real_escape_string($conn,$pname);
$ft=mysqli_real_escape_string($conn,$ft);

$q="update addproduct set catid=$cid,subcatid=$scid,prodname='$pname',
   rate='$rt',discount='$dis',stock='$stock',features='$ft',pic='$ppic' 
   where productid=$pid";
mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);
if($cnt==1)
{
	header("location:manageprod.php");
}
else
{
	$msg="Product not added successfully";
}
}
if(isset($_POST["s3"]))
{
	header("location:manageprod.php");
}?>
<html>
<head><title>Update Product</title>

<script type="text/javascript">
function isnumber(evt){
	var charcode=(evt.which)?evt.which:evt.keyCode;
	if(charcode!=46&& charcode>31 && (charcode<48||charcode>57))
		return false;
return true;}
</script>

<?php
include_once("extfiles.php");
?>
</head>
<body>
<?php
include_once("adminheader.php");
?>
<div class="page-head_agile_info_w3l">
		<div class="container" >
			<h3>Update<span> Product</span></h3>
			<!--/w3_short-->
				<div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">
						    <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li style="text-transform:capitalize">Update Product</li>
							</ul>
						</div>
				</div>
	        <!--//w3_short-->   	   
	    </div>	
</div>
				<!-- Modal content-->
				<div class="modal-content" style="margin-left: 30%; margin-right: 30%; margin-top:5%;margin-bottom:5%">
					<div class="container" >
					<div class="modal-header" >						
					</div>
						<div class="modal-body modal-body-sub_agile" >
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Update Product <span>Now</span></h3>
						<form  method="post" enctype="multipart/form-data">
						
							<div class="styled-input" ><br/>
								<label>Category Name</label></br>
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
									print "<option value=''>No Categories</option>";
									}
									else
									{
									while($x=mysqli_fetch_array($res))
									{	
									if(isset($_POST["go"])|| isset($_GET["pid"]))
									{
										if(isset($_POST["go"]))
											$a=$_POST["cat"];
									else
										$a=$ans[1];
									if($a==$x[0])
									{
										print "<option value='$x[0]' selected>$x[1]</option>";
									}
									else
									{
										print "<option value='$x[0]'>$x[1]</option>";
									}
								  }
									else
								 {
									print "<option value='$x[0]'>$x[1]</option>";
									}
									}
									mysqli_close($conn);
									}
									?>
								</select><br/>								
								<span></span>
							</div> 
							<input type="submit" name="go" value="Generate subcategories"  formnovalidate>							
							<div class="styled-input" ><br/>
								<label>Subcategory Name</label></br>
								<select name="subcat" class="form-control" style="width:25%" required>
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
									if(isset($_POST["go"]) || (isset($_GET["pid"])))
									{
										if(isset($_POST["go"]))
											$a=$_POST["subcat"];
									else
										$a=$q[1];
									if($a==$x[0])
									{
										print "<option value='$x[0]' selected>$x[1]</option>";
									}
									else
									{
										print "<option value='$x[0]'>$x[1]</option>";
									}
								  }
									else
								 {
									print "<option value='$x[0]'>$x[1]</option>";
									}
									}
									}
									mysqli_close($conn);
								}
									?>
								</select>								
								<span></span>
							</div> <br/>						
							<div class="styled-input agile-styled-input-top" style="width:30%" >
								<input type="text" name="prodname" value="<?php print $ans[3];?>" style="width:100%" required="">
								<label>Product Name</label>
								<span></span>
							</div><br/>							
							<div class="styled-input agile-styled-input-top" style="width:30%" >
								<input type="text" name="rate" value="<?php print $ans[4];?>" style="width:100%" required="" onkeydown="return isnumber(event)">
								<label>Rate</label>
								<span></span>
							</div><br/>							
							<div class="styled-input agile-styled-input-top" style="width:30%" >
								<input type="text" name="discount" value="<?php print $ans[5];?>" style="width:100%" required="" onkeydown="return isnumber(event)">
								<label>Discount</label>
								<span></span>
							</div><br/>							
							<div class="styled-input agile-styled-input-top" style="width:30%" >
								<input type="text" name="stock" value="<?php print $ans[6];?>" style="width:100%" required="" onkeydown="return isnumber(event)">
								<label>Stock</label>
								<span></span>
							</div>			
							<div class="styled-input" style="width:30%" >
							<label >Features</label>
							<span></span>
							</div><br/>
							<textarea name="features" class="form-control"  style="width:71%; height:20%"><?php print $ans[7];?></textarea><br/>
							
							
							
							<div class="styled-input" style="width:40%"><br/>
								<input type="file" name="prodpic" style="width:100%"> 
								<label>Product Image</label>
								<span></span>
							</div> <br/>							
							<input type="submit" name="s2" value="Update Product" ><br/><br/>
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
														<p><a href="signup.php" data-toggle="modal" data-target="#myModal2" > Don't have an account?</a></p>

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
			</div>				
<?php
include_once("footer.php");
?>
</body>
</html>