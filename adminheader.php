<!-- header -->
<div class="header" id="home">
	<div style="width: 100%" class="container">
		<ul style="width: 100%">		
			<?php
				if(isset($_SESSION["n"]))
				{
					print "<b><li style='width:25%'><i class='fa fa-user' aria-hidden='true'></i><font color='white'>Welcome ".$_SESSION["n"]."</font></li></b>";
					print "<b><li style='width:15%'><i class='fa fa-key' aria-hidden='true'></i><a href='changepass.php'>Change Password</a></li></b>";
					print "<b><li style='width:15%'><i class='fa fa-sign-out' aria-hidden='true'></i><a href='signout.php'>Sign out</a></li></b>";
					print "<b><li style='width:20%'><i class='fa fa-phone' aria-hidden='true'></i> Call : 01234567898</li></b>";
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
<div class="header-bot">
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
<!-- banner -->
<div class="ban-top" style="height:11.5%">
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
<li class="active menu__item menu__item--current"><a class="menu__link" href="adminpanel.php">Home <span class="sr-only">(current)</span></a></li>
<li class="dropdown menu__item">
<a href="" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Add <span class="caret"></span></a>
<ul class="dropdown-menu multi-column columns-3">
<div class="agile_inner_drop_nav_info" >
<div class="col-sm-6 multi-gd-img1 multi-gd-text " style="height:50%;width:40%">
<a href="#"><img src="uploads/admin.png"  style="height:300%;width:100%" alt=" "/></a>
</div>
<div class="col-sm-3 multi-gd-img"><br/>
<ul class="multi-column-dropdown">

<div>
<a class="Your_class" href="addadmin.php" data-image="uploads/admin.png"><b><font color='orange' >Add admin</font></b></a></b>
</div><br/>
<div>
<a class="Your_class" href="addcat.php" data-image="uploads/admin.png"><b><font color='orange' >Add Category</font></b></a></b>
</div><br/>
<div>
<a class="Your_class" href="addsubcat.php" data-image="uploads/admin.png"><b><font color='orange' >Add Subcategory</font></b></a></b>
</div><br/>
<div>
<a class="Your_class" href="addprod.php" data-image="uploads/admin.png"><b><font color='orange' >Add Product</font></b></a></b>
</div><br/>
</ul>
</div>

<div class="clearfix"></div>
</div>
</ul>
</li>

<li class="dropdown menu__item">
<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">View info <span class="caret"></span></a>
<ul class="dropdown-menu multi-column columns-3" style="height:350%;width:40%">
<div class="col-sm-6 multi-gd-img multi-gd-text " style="height:50%;width:30%">
<a href="#"><img src="uploads/admin.png" style="height:200%;width:100%" alt=" "/></a>
</div>
<div class="agile_inner_drop_nav_info">
<div class="col-sm-3 multi-gd-img">
<ul class="multi-column-dropdown" style="padding-left:10%">
<li><a href="listofadmin.php"><b><font color='fuchsia' >List of Admins</font></b></a></li>
<li><a href="listofmembers.php"><b><font color='fuchsia'>List of Members</font></b></a></li>
<li><a href="listoforders.php"><b><font color='fuchsia' >List of Orders</font></b></a></li>
<li><a href="viewfeedback.php"><b><font color='fuchsia' >Feedback Messages</font></b></a></li>
<li><a href="contactview.php"><b><font color='fuchsia' >Contact Messages</font></b></a></li>
</ul>
<div class="clearfix"></div>
</div>
</ul>
</li>


<li class="dropdown menu__item" >
<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage <span class="caret"></span></a>
<ul class="dropdown-menu multi-column columns-3" style="height:350%;width:40%">
<div class="col-sm-6 multi-gd-img multi-gd-text " style="height:50%;width:30%">
<a href="#"><img src="uploads/admin.png" style="height:200%;width:100%" alt=" "/></a>
</div>
<div class="agile_inner_drop_nav_info">
<div class="col-sm-3 multi-gd-img">
<ul class="multi-column-dropdown" style="padding-left:10%">
<li><a href="managecat.php"><b><font color='purple'>Manage category</font></b></a></li>
<li><a href="managesubcat.php"><b><font color='purple'>Manage Subcategory</font></b></a></li>
<li><a href="manageprod.php"><b><font color='purple' >Manage Product</font></b></a></li>
</ul>
<div class="clearfix"></div>
</div>
</ul>
</li>

<li class="dropdown menu__item" >
<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Update <span class="caret"></span></a>
<ul class="dropdown-menu multi-column columns-3" style="height:350%;width:40%">
<div class="col-sm-6 multi-gd-img multi-gd-text " style="height:50%;width:30%">
<a href="#"><img src="uploads/admin.png" style="height:200%;width:100%" alt=" "/></a>
</div>
<div class="agile_inner_drop_nav_info">
<div class="col-sm-3 multi-gd-img">
<ul class="multi-column-dropdown" style="padding-left:10%">
<li><a href="updatecat.php"><b><font color='darkgreen' >Update category</font></b></a></li>
<li><a href="updatesubcat.php"><b><font color='darkgreen'>Update Subcategory</font></b></a></li>
<li><a href="updateproduct.php"><b><font color='darkgreen' >Update Product</font></b></a></li>
<div style="width:500%"><li><a href="updatestatus.php"><b><font color='darkgreen'>Update Status of orders</font></b></a></li></div>
</ul>
<div class="clearfix"></div>
</div>
</ul>
</li>

</ul>
</div>
</div>
</nav>	
</div>

<div class="clearfix"></div>
</div>
</div>
<!-- //banner-top -->

<!-- banner -->
<script>
$(".Your_class").mouseenter(function(){
        var image_name=$(this).data('image');
        var imageTag='<div style="position:absolute;">'+'<img src="'+image_name+'" alt="image" height="100" />'+'</div>';
        $(this).parent('div').append(imageTag);
    });
    $(".Your_class").mouseleave(function(){
        $(this).parent('div').children('div').remove();
    });
</script>