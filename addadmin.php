<?php
session_start();
if(!isset($_SESSION["n"]) or $_SESSION["utype"]!="admin")
	header("location:error.php");
?>

<?php
if(isset($_POST["s1"]))
{
require_once("vars.php");
$n=$_POST["Name"];
$ph=$_POST["phone"];
$gen=$_POST["gen"];
$co=$_POST["co"];
$email=$_POST["Email"];
$pass=$_POST["password"];

$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());
$q="insert into signup values('$n','$ph','$gen','$co','$email','$pass','admin')";
mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);
if($cnt==1)
{
	header("location:adminpanel.php");
}
else
{
	$msg="Error in signing up, please Try again";
}
}
?>

<html>
<head><title>Add Admin</title>
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
			<h3>A<span>dd Admin</span></h3>
			<!--/w3_short-->
				<div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">
						    <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Add Admin</li>
							</ul>
						</div>
				</div>
				</div>
				</div>
				<!-- Modal content-->
				<div class="modal-content" style="margin-left: 20%; margin-right: 20%;margin-top: 10%;margin-bottom:10%">
					<div class="modal-header">
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Add Admin <span>Now</span></h3>
						 <form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="Name" required="">
								<label>Name</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="text" name="phone" required=""> 
								<label>Phone</label>
								<span></span>
							</div>
							<div class="styled-input">							
								</br></br><input type="radio" name="gen" value="Male"  required="">&nbsp;Male&nbsp;&nbsp;
								<input type="radio" name="gen" value="Female" required="">&nbsp;Female</br>								
								<label></br>Gender</label></br>
								<span></span>
							</div>
							<div>Country</br>
							</div>
							<div class="styled-input" style="margin-top: 13px">						
							<select name="co" required style="padding: 6px;border-radius:4px">
								<option value=" ">choose</option>
								<option>USA</option>
								<option>India</option>
								<option>Canada</option>
								<option>Dubai</option>
								<option>Italy</option>
							</select>							
							<span></span>							
							</div>							
							
							<div class="styled-input">
								<input type="email" name="Email" required=""> 
								<label>Email</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" name="password" required=""> 
								<label>Password</label>
								<span></span>
							</div> 
							<div class="styled-input">
								<input type="password" name="Confirm Password" required=""> 
								<label>Confirm Password</label>
								<span></span>
							</div> 
							<input type="submit" name="s1" value="Sign Up">
						</form>
						  <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
															<li><a href="#" class="facebook">
																  <div class="front"><i style="padding-top:10px" class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i style="padding-top:10px" class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i style="padding-top:10px" class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i style="padding-top:10px" class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i style="padding-top:10px" class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i style="padding-top:10px" class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i style="padding-top:10px" class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i style="padding-top:10px" class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>
														<div class="clearfix"></div>
														<p><a href="#">By clicking register, I agree to your terms</a></p>

						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<img src="images/log_pic.jpg" alt=" "/>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- //Modal content-->

				<?php
if(isset($msg))
{
print $msg;
}

?>



<?php
include_once("footer.php");
?>
</body>
</html>