<?php
session_start();
?>
<?php
ob_start();
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname) or die("Error in connection " . mysqli_connect_error());

$id=$_GET["pid"];
$q="select prodname,rate,discount,stock,features,pic,catname,subcatname 
	from addproduct,addcat,addsubcat where productid='$id' and 
	addproduct.catid=addcat.catid and addproduct.subcatid=addsubcat.subcatid";

$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
$x=mysqli_fetch_array($res);
$disamt=($x[1]*$x[2])/100;
$remamt=$x[1]-$disamt;

mysqli_close($conn);	
?>
<html>
<head><title>Product Details</title>
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
			<h3>P<span>roduct details </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">Home</a><i>|</i></li>
								<li>Product details |&nbsp;&nbsp;</li>
								<li><?php print $x[6]?> |&nbsp;&nbsp;</li>
								<li><?php print $x[7]?></li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->   
	   
	</div>
	
	
</div>

<div style="margin-left: 5%; margin-right: 20%; margin-top:5%;margin-bottom:5%">
<div class="container">
<!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
	     <div class="col-md-4 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					
					<ul>
						<li >
							<div class="thumb-image"> <?php
							print "<img src='uploads/$x[5]'
							  class='img-responsive' data-imagezoom='true' >";?>
							  </div>
						</li>						
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-8 single-right-left simpleCart_shelfItem">
					<br/><h3><?php print $x[0];?></h3>
					<p><del><font size='3'><?php print "$x[1]";?></font></del>/- <font color="red" size="3">&#40;<?php print "$x[2]% off";?>&#41;</font><br/>
					<span class="item_price"><?php print "Rs:$remamt/-";?></span> </p>
					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
					<div class="description">
						 <form name="form1" method="post" >
						 <?php
						 if($x[3]>0){
							 print'
							 <div class="color-quality">
						<div class="color-quality-right">	
						<select name="qty" required>
							 <option value="">choose quantity</option>
							 </div>
							 </div>'
							 ;
							 if($x[3]>=10)
							 {
								 for($y=1;$y<=10;$y++)
								 {									 
									 print"<option>$y</option>";
								 }
							 }
							 else{
								 for($y=1;$y<=$x[3];$y++)
								 {
									 print"<option>$y</option>";
								 }
							 }
							 print'</select><br/><br/>';
						 
						print'<input type="submit" name="s3" value="Add to cart">';
						 
						 }else
						 {
							 print "<h3 style='color:red'>out of Stock</h3>";
						 }
			
			 if(isset($_POST["s3"]))
			 {
				 if(isset($_SESSION["un"]))
				 {
					require_once("vars.php");
					$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname) or die("Error in connection " . mysqli_connect_error());
					$uname=$_SESSION["un"];
					$qt=$_POST["qty"];
					$tc=$qt * $remamt;
					$q="insert into carttable (productname,rate,quantity,tcost,picture,username,prodid) values ('$x[0]','$remamt','$qt','$tc','$x[5]','$uname','$id')";
					mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
					$cnt=mysqli_affected_rows($conn);
					mysqli_close($conn);
					if($cnt==1)
					{
						header("location:showcart.php");
					}
					else
					{
						print "problem while adding to cart";
					}
				 }
				 else
				 {
					 header("location:signin.php");
				 }
			 }
			 ?>
						</form>
					</div>
					
	<div >
								<br/><h4><b><font color='#2fdab8'>DESCRIPTION</font></b></h4><br/>
							  <h5><b><?php print $x[0];?></b></h5><br/>
							   <p style='font-size:14px'><?php print $x[4]?></p>
							   
							   							</div>
																			
					</div>
					<ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
						                                   <li class="share">Share On : </li>
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
																  <div class="front"><i class="fa fa-linkedin" style="padding-top:10px" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" style="padding-top:10px" aria-hidden="true"></i></div></a></li>
														</ul>
					
					
		      </div>
	 			<div class="clearfix"> </div>
					<div class="clearfix"> </div>
						             </div>
									
								 </div>
								 
							 </div>
						 </div>
						   <div class="tab3">

							
						</div>
					</div>
				</div>	
			</div>
	<!-- //new_arrivals -->
</div>
</div>
<?php
include_once("footer.php");
?>
</body>
</html>