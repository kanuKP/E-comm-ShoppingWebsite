<?php
session_start();
if(!isset($_SESSION["n"]) or $_SESSION["utype"]!="admin")
	header("location:error.php");
?>
<?php
session_start();
if(isset($_POST["s2"]))
{
require_once("vars.php");
$cname=$_POST["catname"];
$err=$_FILES["catpic"]["error"];

if($err==0)
{
	$cpic=time().$_FILES["catpic"]["name"];
	$tname=$_FILES["catpic"]["tmp_name"];
	move_uploaded_file($tname,"uploads/$cpic");	
}
else

{	
	$cpic="no-images.png";
}

$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());
 
 $cname=mysqli_real_escape_string($conn,$cname);

$q="insert into addcat(catname,catpic) values ('$cname','$cpic')";
mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);

if($cnt==1){
	$msg="Category uplaoded successfully";
}
else
{
	$msg="Category not uplaoded successfully";
}
}
?>

<html>
<head><title>Add Category</title>
<script type="text/javascript">
function ischar(evt){
	var charcode=(evt.which)?evt.which:evt.keyCode;
	if(charcode!=46&& charcode>31 && (charcode<48||charcode>57) ||charcode=08)
		return true;
	return false;
}
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
		<div class="container">
			<h3>A<span>dd Category</span></h3>
			<!--/w3_short-->
				<div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">
						    <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>sign in</li>
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
						<h3 class="agileinfo_sign">Add category <span>Now</span></h3>
									<form action="#" method="post" enctype="multipart/form-data">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="catname" required="" minlength='3" onkeydown="return ischar(event)">
								<label>Category Name</label>
								<span></span>
							</div>
							<div class="styled-input"><br/>
								<input type="file" name="catpic" > 
								<label>Category Image</label>
								<span></span>
							</div> 							
							<input type="submit" name="s2" value="Add category">
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