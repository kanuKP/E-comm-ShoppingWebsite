<?php
session_start();
if(isset($_POST["s2"]))
{
require_once("vars.php");
$email=$_POST["email"];
$pass=$_POST["pass"];

$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());
$q="select * from signup where username='$email' and password='$pass'";
$res=mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);

if($cnt==1){
	$x=mysqli_fetch_array($res);	
	$_SESSION["n"]=$x[0];
	$_SESSION["un"]=$x[4];
	$_SESSION["utype"]=$x[6];
if($x[6]=="admin")
{
	header("location:adminpanel.php");
}
else if($x[6]=="normal")
{	
	header("location:homepage.php");
}
}
else
{
	$msg="Incorrect username/password";
}
}
?>
<html>
<head><title>Sign In</title>
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
			<h3>S<span>ign in</span></h3>
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
						<h3 class="agileinfo_sign">Sign In <span>Now</span></h3>
									<form  method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="email" name="email" required="">
								<label>Email</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="password" name="pass" required=""> 
								<label>Password</label>
								<span></span>
							</div> 
							<input type="submit" name="s2" value="Sign In">
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
?>						</div>
					</div>
										
				</div>
				
				

<?php
include_once("footer.php");
?>
</body>
</html>