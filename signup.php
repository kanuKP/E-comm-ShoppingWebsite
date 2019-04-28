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
$q="insert into signup values('$n','$ph','$gen','$co','$email','$pass','normal')";
mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);
if($cnt==1)
{
	header("location:thanks.php");
}
else
{
	$msg="Error in signing up, please Try again";
}
}
?>

<html>
<head><title>Sign up</title>


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
<script type="text/javascript">
function passcompare(){
	var p1,p2;
	p1=document.form1.password.value
	p2=document.form1.ConfirmPassword.value
	if(p1!=p2){
		alert("password doesn't match");
		return false;
	}
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
				<!-- Modal content-->
				<div class="modal-content" style="margin-left: 20%; margin-right: 20%;margin-top: 10%;margin-bottom:10%">
					<div class="modal-header">
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up <span>Now</span></h3>
						 <form name="form1"  method="post" onsubmit="return passcompare()">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="Name" required minlength="3" onkeydown="return ischar(event)" >
								<label>Name</label>
								<span></span>
							</div>
							<div class="styled-input">
								<input type="text" name="phone" required	minlength="10" maxlength="10" onkeydown="return isnumber(event)"> 
								<label>Phone</label>
								<span></span>
							</div>
							<div class="styled-input">							
								</br></br><input type="radio" name="gen" value="Male"  required="">&nbsp;Male&nbsp;&nbsp;
								<input type="radio" name="gen" value="Female" >&nbsp;Female</br>								
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
								<input type="password" name="ConfirmPassword" required=""> 
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