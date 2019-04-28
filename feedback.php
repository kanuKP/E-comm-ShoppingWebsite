<?php
if(isset($_POST["s1"]))
{
require_once("vars.php");
$n=$_POST["Name"];
$ph=$_POST["phone"];
$email=$_POST["Email"];
$gen=$_POST["gen"];
$know=$_POST["know"];
$comp=$_POST["comp"];
$what=$_POST["what"];
$shop=$_POST["shop"];
$sgst=$_POST["suggestions"];

$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());

$n=mysqli_real_escape_string($conn,$n);
$sgst=mysqli_real_escape_string($conn,$sgst);


$q="insert into feedback (Name,Phone,Email,service,KnowUs,compare,find,shopagain,suggestion) values ('$n','$ph','$email','$gen','$know','$comp','$what','$shop','$sgst')";
mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);
if($cnt==1)
{
	header("location:thanks.php");
}
else
{
	$msg="Sorry,Something went wrong in Submitting the form";
}
}
?>

<html>
<head><title>Feedback</title>


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
<div class="page-head_agile_info_w3l">
		<div class="container" >
			<h3>Feedback<span> Form</span></h3>
			<!--/w3_short-->
				<div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">
						    <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li style="text-transform:capitalize">your Satisfaction is our Priority</li>
							</ul>
						</div>
				</div>
	        <!--//w3_short-->   	   
	    </div>	
</div>
				<!-- Modal content-->
				<div class="modal-content" style="margin-left: 18%; margin-right: 18%;margin-top: 3%;margin-bottom:3%">
					<div class="modal-header">
					</div>
						<div class="modal-body modal-body-sub_agile">
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Feedback <span>Form</span></h3>
						<h5 style='width:200%'><b><i>Please take a few moments to fill out the following form  so that we can improve our quality</i></b></h5><br/>
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
								<input type="text" name="phone" required="" minlength="10" maxlength="10" onkeydown="return isnumber(event)"> 
								<label>Phone</label>
								<span></span>
							</div>						
							<div class="styled-input">							
								</br></br><input type="radio" name="gen" value="Excellent"  required="">&nbsp;Excellent&nbsp;&nbsp;
								<input type="radio" name="gen" value="Very Good" required="">&nbsp;Very Good&nbsp;&nbsp;
								<input type="radio" name="gen" value="Good" required="">&nbsp;Good				&nbsp;&nbsp;				
								<input type="radio" name="gen" value="Average" required="">&nbsp;Average&nbsp;&nbsp;
								<input type="radio" name="gen" value="Poor" required="">&nbsp;Poor<br/>
								<label></br>How do you rate our Service?</label></br>
								<span></span>
							</div>
							
								<div class="styled-input" style='width:200%'>							
								</br></br><input type="radio" name="know" value="Friend"  required="">&nbsp;Friend&nbsp;&nbsp;
								<input type="radio" name="know" value="Newspaper" required="">&nbsp;Newspaper&nbsp;&nbsp;
								<input type="radio" name="know" value="Advertisement Board" required="">&nbsp;Advertisement Board&nbsp;&nbsp;				
								<input type="radio" name="know" value="T.V." required="">&nbsp;T.V.&nbsp;&nbsp;
								<input type="radio" name="know" value="Online Website" required="">&nbsp;Online Website&nbsp;
								<input type="radio" name="know" value="Other Source" required="">&nbsp;Other Source<br/>
								<label></br>How did you come to know about our website?</label></br>
								<span></span>
							</div>
							
							<div class="styled-input">							
								</br></br><input type="radio" name="comp" value="Best"  required="">&nbsp;Best&nbsp;&nbsp;
								<input type="radio" name="comp" value="Better" required="">&nbsp;Better&nbsp;&nbsp;
								<input type="radio" name="comp" value="Same" required="">&nbsp;Same&nbsp;&nbsp;				
								<input type="radio" name="comp" value="Average" required="">&nbsp;Average&nbsp;&nbsp;<br/>
								<label></br>How do you compare our website with others?</label></br>
								<span></span>
							</div>
							
							<div class="styled-input">							
								</br></br><input type="radio" name="what" value="Yes, very easily"  required="">&nbsp;Yes, very easily&nbsp;&nbsp;<br/>
								<input type="radio" name="what" value="Took time in finding the products" required="">&nbsp;Took time in finding the products&nbsp;&nbsp;<br/>
								<input type="radio" name="what" value="No" required="">&nbsp;No&nbsp;&nbsp;<br/>
															
								<label></br>Did you find what you were looking for?</label></br>
								<span></span>
							</div>
							
							<div class="styled-input">							
								</br></br><input type="radio" name="shop" value="Yes"  required="">&nbsp;Yes&nbsp;&nbsp;
								<input type="radio" name="shop" value="No" required="">&nbsp;No&nbsp;&nbsp;<br/>
								<label></br>Would you like to shop from our website again?</label></br>
								<span></span>
							</div>
							
							<div class="styled-input" style='width:200%'>
								 
								<label><b>Please share any additional suggestions 
								that may help us to improve our website</b></label>
								<span></span>
							</div> <br/><br/>


								<textarea name="suggestions" class="form-control" 
								style="width:80%; height:20%"></textarea><br/>
													
									
							
							 
							<input type="submit" name="s1" value="Submit">
						</form															
														<div class="clearfix"></div>
														

						</div>
						
						<div class="clearfix"></div>
					</div>
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