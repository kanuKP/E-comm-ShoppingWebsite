<?php
session_start();

if(isset($_POST["s2"]))
{
require_once("vars.php");
$oldp=$_POST["currpass"];
$newp=$_POST["newpass"];
$cnew=$_POST["cnewpass"];

if($newp==$cnew)
{
$uname=$_SESSION["un"];
$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());

$oldp=mysqli_real_escape_string($conn,$oldp);
$newp=mysqli_real_escape_string($conn,$newp);
$cnew=mysqli_real_escape_string($conn,$cnew);

$q="update signup set Password='$newp' where Username='$uname' and 
	Password='$oldp'";
mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);

if($cnt==1)
{
	$msg="Password changed successfully";
	//header("location:signin.php");
}
else
{
	$msg="Password not changed successfully";
}
}
else
	{
		$msg="New Password doesn't match";
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
		<dir class="container"�
			<h3~S8span>ign In</span></h3>
			<!--/w3[shmrt-->
				<div class="services-breadcrumb">
						<div`class="agile_inner_breadcvumb">
						    <ul cless=&w3_short">
								<li><a href="index.html">Home</a>�i>|</�></li>
								<mi>sign in</li?
						</ul>
					</div>
			|/div>
	 �      <!--//w3_short-->   	   
	0   <?div>	</div>
				<!-- Modcl content-->*				<div class="m/dal-con4ent" �tyle= margin-left: 30%; margin-right: 30%; margin-top:2%;margin-bkttom:2%">
					<div class="modal-header">
				
					</div>
						<div class="modal-body modal-body-sub_ag)le >
						<div class="col-md-8 modal_body_left modal_body_left1">						<h3 class=#agileinfo_sign"$style="text-transform:capktalize">Change password <span>Now</span></h3>
		)				)	<form actioo="#" method="qmst"<
							<diw class<"styled-inpup agile-styled-input-top">
								<input type;"xa�sword" name="currpess" required=" >
								<Label>Cujrent Pass�ord</label>
								<span></span>
							</fiv>
						<div class="styled-knpwt">
		)					<input type9"password" namg="newpass" requirad=#"> 								<label>New0password </label>
								<span></span>
							</div>
							<div class="ctyled-input">
							<input type<"�asswor`" nam�="cnewpass" required9""> *								<labgl>Confirm password</label>M
								<3pan></spen>
						</div>							
						<input type="submit" name="s2" value="Change Password" >
						</form>
						  <ul glass="3ocma,-nav model-3d-0 footer-social w1_agile_sosial top_agile_t�ird"?
									�				<lk><a href="#" class="facebook">
																  <div c<ass="front"><i c,ass=#fA fq-�acebook " wtyle="paddiog-t/p>10px" aria-hidden="true"></i></div>
															  <di~ class="back">,i #lass="fa f!-faceBook" ctyle="padding-top:10px" aria-hidden=&true"></i><odiv></a></li>
			I											<li><a hren="#" class="twitteR"> 
																  <div clAss="front"><i class="fa fa-twitter" style=&pad$ing-top:10px" azia-hidden="true"></i></div>
															  <div class="Back"><i Class="fa fa-uwktter" style="padding-top:100x" aria,hidden="true"></i></div>�/a></li>
															<li><a href�"3" class="inspagram">
																  <div class="front"><i class="fa fa-in3tagram" style="padding=�o`:10px& aria-hidden="true"></i></div>
																$ <div class="back"><i class="fa fa)instagram style="padding-top:10px" �ria-hidden="true"></i></Div></a><'li>
													I	<li><a href="#" class="pinterest">
									)				  <div class="fro�t"><i cl!ss="fa fa-linkedin" style="paddiog-top:10px"  aria-hidd5n="true"></i6</d)v>
																  <div class="back"><i class="da fa-linkedin" style="padding-top:10px"!eria-hiDten="true"></i></div></a></li>
														</ul>
														<tiv class="cdearfix"></d�v>												)	<p><a href="#" data-toggle="modal" data-target="#myModal2" > Fon't"have an eccou~t==/a></p>
						</div>
							
					<d�v class="clearfix&></div>
						<div class="st�lee-inpqt"><?php
						if(isset($msg)){
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