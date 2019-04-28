<?php
session_start();
if(isset($_POST["s2"]))
{
require_once("vars.php");
$n=$_POST["Name"];
$email=$_POST["Email"];

$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());
$q="select * from signup where Name='$n' and Username='$email'";
$res=mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);

if($cnt==1){
	$x=mysqli_fetch_array($res);	
	$_SESSION["n"]=$x[0];
	$_SESSION["un"]=$x[4];
		
	header("location:index.php");
}
else
{
	$msg="Incorrect username/password";
}
}
?>

<html>
<head><title>error</title>
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
			<h3>Unauthorized<span> Access !</span></h3>
			<!--/w3_short-->
				<div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">
						    <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Unauthorized Access</li>
							</ul>
						</div>
				</div>
	        <!--//w3_short-->   	   
	    </div>	
</div>
				<!-- Modal content-->
				<div class="modal-content" style="margin-left: 30%; margin-right: 30%; margin-top:5%;margin-bottom:5%">
					<div class="modal-header" >
						
					</div>
						<div class="modal-body modal-body-sub_agile" >
						<div class="col-md-8 modal_body_left modal_body_left1" >
						
					<form action="#" method="post">
							
						</form>
						
		
						</div><br/>
						<center><h4><font face='Times new roman,vardana,serif'  size="6">welcome to</font></h4></center><br/>
							<center><h2><b><font face='vardana' color="orange" size="16">"Elite Shoppy"</font></b></h2></center>
							
							<h3 class="agileinfo_sign" style="color:darkred"><br/>Please Click <a href="signin.php">here</a> to access <span>the page</span></h3>
							<center><img src="uploads/admin.png" ></center>
						
							
						<div class="clearfix"></div>
						<div class="styled-input">  
						
						</div>
					</div>										
				</div>
				

<?php
include_once("footer.php");
?>
</body>
</html>