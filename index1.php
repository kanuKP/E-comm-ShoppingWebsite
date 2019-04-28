<html>
<head><title>Index</title>
<?php
include_once("extfiles.php");
?>
</head>
<body>
<?php
include_once("header.php");
?>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
			<li data-target="#myCarousel" data-slide-to="3" class=""></li>
			<li data-target="#myCarousel" data-slide-to="4" class=""></li> 
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item active"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>The Biggest <span>Sale</span></h3>
						<p>Special for today</p>
						<a class="hvr-outline-out button2" href="mens.html">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item2"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Summer <span>Collection</span></h3>
						<p>New Arrivals On Sale</p>
						<a class="hvr-outline-out button2" href="mens.html">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item3"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>The Biggest <span>Sale</span></h3>
						<p>Special for today</p>
						<a class="hvr-outline-out button2" href="mens.html">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item4"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>Summer <span>Collection</span></h3>
						<p>New Arrivals On Sale</p>
						<a class="hvr-outline-out button2" href="mens.html">Shop Now </a>
					</div>
				</div>
			</div>
			<div class="item item5"> 
				<div class="container">
					<div class="carousel-caption">
						<h3>The Biggest <span>Sale</span></h3>
						<p>Special for today</p>
						<a class="hvr-outline-out button2" href="mens.html">Shop Now </a>
					</div>
				</div>
			</div> 
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
		<!-- The Modal -->
    </div> 
	<?php
	
	require_once("vars.php");

$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());

$q="select * from addproduct order by rand() limit 6 ";
$res=mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);

if($cnt==0)
{
	print "No products found";
}
else
{
print "<table width='100%' align='center' class='table'>";
$count=0;
print "<tr align='center'>";
while($x=mysqli_fetch_array($res))
{	
if($count==3)
{
print "</tr><tr align='center'>";
$count=0;
}
print "<td>
<a href='showproddetails.php?pid=$x[0]'><img src='uploads/$x[8]' height='35%'><br/>
$x[3]</a>
</td>";
$count++;//1

}
print "</tr></table>";
mysqli_close($conn);

}	
	
	?>
<?php
include_once("footer.php");
?>
</body>
</html>