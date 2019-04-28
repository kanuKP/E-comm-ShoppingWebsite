<?php
session_start();
if(isset($_POST["s2"]))
{
require_once("vars.php");
$nm=$_POST["Name"];
$phn=$_POST["Phone"];
$email=$_POST["Email"];
$mssg=$_POST["Message"];

$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());

$nm=mysqli_real_escape_string($conn,$nm);
$mssg=mysqli_real_escape_string($conn,$mssg);

$q="insert into contact(name,phone,email,message) values('$nm','$phn','$email','$mssg')";
mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);
if($cnt==1)
{	
	$msg="Message sent";
}
else
{
	$msg="Error in sending message";
}
}
?>

<html>
<head><title>Contact Us</title>

<script type="text/javascript">
function isnumber(evt){
	var charcode=(evt.which)?evt.which:evt.keyCode;
	if(charcode!=46&& charcode>31 && (charcode<48||charcode>57))
		return false;
return true;}
</script>

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
include_once("header.php");
?>
<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>C<span>ontact Us </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Contact</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>
   <!--/contact-->
    <div class="banner_bottom_agile_info">
	    <div class="container">
		  <div class="contact-grid-agile-w3s" >
				<div class="col-md-4 contact-grid-agile-w3">
						<div class="contact-grid-agile-w31">
							<i class="fa fa-map-marker" aria-hidden="true"></i>
							<h4>Address</h4>
							<p>221B <span>Baker Street,Hyderabad</span></p>
						</div>
					</div>
					<div class="col-md-4 contact-grid-agile-w3">
						<div class="contact-grid-agile-w32">
							<i class="fa fa-phone" aria-hidden="true"></i>
							<h4>Call Us</h4>
							<p>+91 7087223258<span>+91 7696157008</span></p>
						</div>
					</div>
					<div class="col-md-4 contact-grid-agile-w3">
						<div class="contact-grid-agile-w33">
							<i class="fa fa-envelope-o" aria-hidden="true"></i>
							<h4>Email</h4>
							<p><a href="mailto:kanu28kanu@gmail.com">kanu28kanu@gmail.com</a><span><a href="kpriyamj@yahoo.com">kpriyamj@yahoo.com</a></span></p>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
	   </div>
	 </div>
	   
   <div class="banner_bottom_agile_info">
	<div class="container">
	   <div class="agile-contact-grids">
				<div class="agile-contact-left">
					<div class="col-md-6 address-grid">
						<h4>For More <span>Information</span></h4>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Telephone </p><span>0181-2412147</span>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-envelope-o" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Mail </p><a href="kanu28kanu@gmail.com">kanu28kanu@gmail.com</a>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="mail-agileits-w3layouts">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<div class="contact-right">
									<p>Location</p><span>221B Baker Street,Hyderabad</span>
								</div>
								<div class="clearfix"> </div>
							</div>
							<ul class="social-nav model-3d-0 footer-social w3_agile_social two contact">
							                              <li class="share">SHARE ON : </li>
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" style="padding-top:10px" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" style="padding-top:10px" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" style="padding-top:10px" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" style="padding-top:10px" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" style="padding-top:10px" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" style="padding-top:10px" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin"style="padding-top:10px"  aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" style="padding-top:10px" aria-hidden="true"></i></div></a></li>
														</ul>
					</div>
					<div class="col-md-6 contact-form">
						<h4 class="white-w3ls">Contact <span>Form</span></h4>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="Name" required="" onkeydown="return ischar(event)">
								<label>Name</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="email" name="Email" required=""> 
								<label>Email</label>
								<span></span>
							</div> 
							 <div class="styled-input">
								<input type="text" name="Phone" required="" minlength="10" maxlength="10" onkeydown="return isnumber(event)">
								<label>Phone</label>
								<span></span>
							</div>
							<div class="styled-input">
								<textarea name="Message" required=""></textarea>
								<label>Message</label>
								<span></span><br/><br/>
							</div>	 
							<input type="submit" name='s2' value="SEND">
						</form>
						<?php
					if(isset($msg))
					{
						print "<b><font align='right' color='white' size='4'>$msg</font></b>";
					}					
					?>
					</div>
					
				</div>
				<div class="clearfix"> </div>
			</div>
       </div>
	</div>
 <!--//contact-->
<?php
include_once("footer.php");
?>
</body>
</html>