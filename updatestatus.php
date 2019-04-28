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
$oid=$_GET["oid"];
$st=$_POST["newstatus"];
$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());
 $cname=mysqli_real_escape_string($conn,$cname);

$q="update ordertable set status='$st' where orderno='$oid'";
mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);

if($cnt==1){
	header("location:listoforders.php");
}
else
{
	$msg="order not uplaoded successfully";
}
}
?>

<html>
<head><title>Update Status</title>
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
			<h3>Update<span> Status</span></h3>
			<!--/w3_short-->
				<div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">
						    <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Update Status</li>
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
						<h3 class="agileinfo_sign">Update Status <span></span></h3>
						<form method="post" enctype="multipart/form-data">
							<select name="newstatus" class="form-control" style="width:50%">
								<option>processing</option>
								<option>Packed</option>
								<option>Shipped</option>
								<option>In-Transit</option>
								<option>Delivered</option>
								<option>Cancelled</option>
								<option>Delayed</option>
							</select><br/>							
							<input type="submit" name="s2" value="Update">
						</form>
						  
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