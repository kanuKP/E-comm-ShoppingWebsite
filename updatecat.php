<?php
session_start();
if(!isset($_SESSION["n"]) or $_SESSION["utype"]!="admin"){
	header("location:error.php");
}
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());
$cid=$_GET["cid"];
$q="select * from addcat where catid='$cid'";

$res=mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));

$x=mysqli_fetch_array($res);
mysqli_close($conn);

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
	$cpic=$x[2];
}
$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname) 
or die("Error in connection " . mysqli_connect_error());
$cname=mysqli_real_escape_string($conn,$cname);
$q="update addcat set catname='$cname',catpic='$cpic' where catid='$cid'";

mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));

$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);
if($cnt==1)
{	
header("location:managecat.php");
}
else
{
$msg="Category not updated successfully";
}
}
if(isset($_POST["s3"])){
	header("location:managecat.php");
}
?>

<html>
<head><title>Update Category</title>
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
			<h3>U<span>pdate Category</span></h3>
			<!--/w3_short-->
				<div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">
						    <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>update category</li>
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
						<h3 class="agileinfo_sign">Update category <span>Now</span></h3>
									<form action="#" method="post" enctype="multipart/form-data">
							<div class="styled-input agile-styled-input-top">
								<input type="text" name="catname" required="" value="<?php print $x[1]?>">
								<label>Category Name</label>
								<span></span>
							</div>
							<?php
							print"<img src ='uploads/$x[2]' height='75'><br/><br/>";
							?>
							<div class="styled-input"><br/>
								<input type="file" name="catpic" > 
								<label>Category Image</label>
								<span></span>
							</div> 							
							<input type="submit" name="s2" value="Update category"><br/><br/>
							<input type="submit" name="s3" value="Cancel" >
						</form>
						  <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
															<li><a href="#"A�<z/e_Έ����-�L`#Gk���g�{�a��L�~J�J��""���QS`X%m0�j�S
ꤻ+��y�0�?��'6K��e2Fs��v%Fm)�_`�[�.bVO�T��G��!¬o����֟�o�����Zy:���=�T2�r�/Z�hs�"j(���hb=�Ʀ,3܇O���1
��E�m���I�L��ha�W���Nӈɿ �)��;��M���	/�\v�����K�2`I��	��ϻ\��{����w"��l_Au_P����&�y�M�õ�D	�ej���݊�A��v���6*�B���c��ꁩjgnM�;���|�j ��J�2�Gy�qj6��s���x�RRpphA]G�{�1�|١)�u�4;h:1%��&��?m1g�H`�vyY�%����!��w4�$�KV�ʹ�zvG�+�ר�H�� EK�i�X��s��C�VX��	Os�H{�@�j��\V�'�)��q'�����Ճf5å#��$���������~���ku�c�BJ���KI�����W�DB��s����3�7�ذ����1��̽/0Oo�I�;�P_G���(��A�{Ө%J\���6d�/Fu��ݿYh$;�_��Ю�B�xfE��.��А��<v��ͬ1p>*H%�4�������z��JD��},�CA}m:~�Z*��5m��R|S[�����@ێ��ѻ%���T�G9fb��U�]����M�.���y6�#H���������gcw�D�R� bYd�!'縼b��A$O���z��*$��Rk8�j��[ti������0�U���Z������阞�Cu�ǘs�AF[q��D��\I:�*r}���c��W8>�>��*�E�����9�,�V��������7 
�C���'lȿtI;;���Ogg7�wZ�?��gA0m�
Ц�T�p�����;F��X�"�c�-��q.���������f�����-;�¦9A��i�S�9[M��no��] ӗ�-C�/div>
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