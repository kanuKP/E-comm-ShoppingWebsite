<!-- header -->
<div class="header" id="home">
	<div style="width: 100%" class="container">
		<ul style="width: 100%">		
			<?php
				if(isset($_SESSION["n"]))
				{
					print "<b><li style='width:15%'><i class='fa fa-user' aria-hidden='true'></i><font color='white'>Welcome ".$_SESSION["n"]."</font></li></b>";
					print "<b><li style='width:15%'><i class='fa fa-history' aria-hidden='true'></i><a href='orderhistory.php'>Order history</a></li></b>";
					print "<b><li style='width:15%'><i class='fa fa-key' aria-hidden='true'></i><a href='changepass.php'>Change Password</a></li></b>";
					print "<b><li style='width:15%'><i class='fa fa-sign-out' aria-hidden='true'></i><a href='signout.php'>Sign out</a></li></b>";
					print "<b><li style='width:15%'><i class='fa fa-phone' aria-hidden='true'></i> Call : 01234567898</li></b>";
					print "<b><li><i class='fa fa-envelope-o' aria-hidden='true'></i> <a href='mailto:info@example.com'>info@example.com</a></li></b> ";
		 
				}
				else
				{
					print "<b><li style='width:25%'><i class='fa fa-user' aria-hidden='true'></i><font color='white'>Welcome Guest </font></li></b>";
					print "<b><li style='width:15%'><i class='fa fa-pencil-square-o' aria-hidden='true'></i><a href='signup.php'>Sign Up</a></li></b>";
					print "<b><li style='width:15%'><i class='fa fa-unlock-alt' aria-hidden='true'></i><a href='signin.php'>Sign In</a></li></b>";
					print "<b><li style='width:20%'><i class='fa fa-phone' aria-hidden='true'></i> Call : 01234567898</li></b>";
					print "<b><li><i class='fa fa-envelope-o' aria-hidden='true'></i> <a href='mailto:info@example.com'>info@example.com</a></li></b> ";
		 
				}
			?>			
		    <!-- <li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> Sign In </a></li>
			<li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up </a></li>
			-->
		
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot" >
	<div class="header-bot_inner_wthreeinfo_header_mid">
		<div class="col-md-4 header-middle">
			<form action="searchprodbyname.php" method="get">
					<input type="search" name="search" placeholder="Search here..." required="" >
					<input type="submit" value="" name="s3" style="padding:21">
				<div class="clearfix"></div>
			</form>
		</div>
		<!-- header-bot -->
			<div class="col-md-4 logo_agile">
				<h1><a href="homepage.php"><span>E</span>lite Shoppy <i class="fa fa-shopping-bag top_logo_agile_bag" aria-hidden="true"></i></a></h1>
			</div>
        <!-- header-bot -->
		<div class="col-md-4 agileits-social top_content">
						<ul class="social-nav model-3d-0 footer-social w3_agile_social">
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
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top" style='height:11.8%'>
<div class="container">
<div class="top_nav_left">
<nav class="navbar navbar-default">
<div class="container-fluid">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>
<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav menu__list">
<li class="active menu__item menu__item--current"><a class="menu__link" href="homepage.php">Home <span class="sr-only">(current)</span></a></li>

<li class="dropdown menu__item">
<?php
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname) or die("Error in connection " . mysqli_connect_error());

$q="select * from addcat";

$res=mysqli_query($conn,$q) or die("Error in query" . mysqli_error($conn));
while($zz=mysqli_fetch_array($res))
{
		
	$cid=$zz[0];
	$q1="select * from addsubcat where catid='$cid'";
	$res1=mysqli_query($conn,$q1) or die("Error in query" . mysqli_error($conn));
	
print "<li ><a href='showsubcat.php?cid=$zz[0]' 
 class='dropdown-toggle menu__link' 
  aria-expanded='false'>$zz[1]</a></li>";
}
?></li>
<li class=" menu__item"><a class="menu__link" href="contact.php">Contact</a></li>

</div>

</ul>
</div>
</div>
</nav>	
<div class="top_nav_right" >
<div class="wthreecartaits wthreecartaits2 cart cart box_1" style='height:72px'> 
<form action="#" method="post" class="last"> 
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="display" value="1">
<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
</form>  
</div>


</div>
</div>
<div class="clearfix"></div>
</div>
</div>
<!-- //banner-top -->