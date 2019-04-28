<?php
session_start();
if(!isset($_SESSION["n"]) or $_SESSION["utype"]!="admin")
	header("location:error.php");
?>



<?php

if(isset($_POST["s2"]))
{
require_once("vars.php");
$cid=$_POST["cat"];
$scname=$_POST["subcatname"];
$err=$_FILES["subcatpic"]["error"];
if($err==0)
{
	$scpic=time().$_FILES["subcatpic"]["name"];
	$tname=$_FILES["subcatpic"]["tmp_name"];
	move_uploaded_file($tname,"uploads/$scpic");	
}
else
{	
	$scpic="no-images.png";
}
$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());
$scname=mysqli_real_escape_string($conn,$scname);

$q="insert into addsubcat(subcatname,catid,subcatpic) values ('$scname','$cid','$scpic')";
mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));

$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);

if($cnt==1){
	$msg="Subcategory uplaoded successfully";
}
else
{
	$msg="Subcategory not uplaoded successfully";
}
}
?>
<html>
<head><title>Add SubCategory</title>


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
		<div class="container" >
			<h3>A<span>dd SubCategory</span></h3>
			<!--/w3_short-->
				<div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">
						    <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li style="text-transform:capitalize">Add SubCategory</li>
							</ul>
						</div>
				</div>
	        <!--//w3_short-->   	   
	    </div>	
</div>
				<!-- Modal content-->
				<div class="modal-content" style="margin-left: 30%; margin-right: 30%; margin-top:5%;margin-bottom:5%">
					<div class="container" >
					<div class="modal-header" >
						
					</div>
						<div class="modal-body modal-body-sub_agile" >
						<div class="col-md-8 modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Add Subcategory <span>Now</span></h3>
						<form  method="post" enctype="multipart/form-data">
							<div class="styled-input agile-styled-input-top" style="width:30%" >
								<input type="text" name="subcatname" style="width:100%" required="" minlength="3" onkeydown="return ischar(event)">
								<label>Subcategory Name</label>
								<span></span>
							</div>
							
							<div class="styled-input" ><br/>
								<label>Category Name</label></br>
								<select name="cat" class="form-control" style="width:25%" required>
									<option value="">Choose Category</option>
								<?php
									require_once("vars.php");
									$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname) or die("Error in connection " . mysqli_connect_error());

									$q="select * from addcat";

									$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));

									$cnt=mysqli_affected_rows($conn);
									if($cnt==0)
									{	
									//print "<option value=''>No Categories</option>";
									}
									else
									{
									while($x=mysqli_fetch_array($res))
									{	
									print "<option value='$x[0]'>$x[1]</option>";
									}
									}
									mysqli_close($conn);
									?>
								</select>
								
								<span></span>
							</div> 
							
							<div class="styled-input" style="width:40%"><br/>
								<input type="file" name="subcatpic" style="width:100%"> 
								<label>SubCategory Image</label>
								<span></span>
							</div> 							
							<input type="submit" name="s2" value="Add Subcategory">
						</form>
						  <ul class="social-nav model-3d-0 footer-social w3_agile_social top_agile_third">
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook " style="padding-top:10px" aria-hidden="true"></i></div>
			�,�zD��?Bs1Ҍ�x�OG��U��*0�˹l�H��~M0E�m��{�.T�_:X��?�[tV^n_���jK�Z7�e�� C"�n��U'�����`@����>�"6��Յ�5d�l0=��8�g�)b((3�$2G���C�h?�������@�u��G�6Z��l	b�9�:=5�<q,�^��Hc��Ȉ�	X$�wd���� ?r#c2��8ʑOi
p<*l}���&��N�Aϓʕ�č�{��!*�8/_z<W"���%��>���������<j�St�[�0$NuN����N��	g�3s@��Ԅ�w�P����@p 5�N�(�;�t��8�ԛ<O�Ñ9>*h��w�Kۑ��q�"��̷^ñg1�@.�R�� *r`�W�.�U�-0 m���	��n�������<���=�Bv�`�[��fDcF� �:��Ѫ(���됌v�n=�A�6��O"�EIﱱ���#B����n�H6H��{J(m�s�4�π��� Zߴjn2�>����R���.����ş��7DJ���A���sw�����j�?.�Eo��}�5����&����q�f=�Z{�8cĖh}MH�pg���Ua�\ �/�H�{	]��0'|)s�Z�Q%B��o�h�%�C��Cz.F�e k����ݚ�r�g&�HC�ٮ������fT��p�M�X�*.i��-%�0�Ud�kšw��p"��vi�Ʈ�&���-.��3%a=�"�A��G�{����d�F���m�ݣ��:2���`	L��*E��x�qY�B��g����~:��5�n�e^�n$��7��{p)�4�"�-����ڰ�v��k��z0L�·WйU���+���\CCב�V}��S�nH�E��6����5��� �av��>��RVrm�㫟O^ð�P�����:��	�x��;���jW�P�,����[~b>30c*jF�3>��A
��ꔚ�� �X�_6�k�������&X�B					</ul>
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
				</div>
				
<?php
include_once("footer.php");
?>
</body>
</html>