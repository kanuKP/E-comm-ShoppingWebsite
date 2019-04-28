<?php
session_start();
$pid=$_GET["pid"];
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) 
or die("Error in connection " . mysqli_connect_error());
$q="select * from addprod where prodid=$pid";
$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);
if($cnt==1)
{
$ans=mysqli_fetch_array($res);
}
if(isset($_POST["s1"]))
{
require_once("vars.php");
$cid=$_POST["cat"];
$scid=$_POST["subcat"];
$pname=$_POST["productname"];
$rt=$_POST["rate"];
$dis=$_POST["discount"];
$st=$_POST["stock"];
$ft=$_POST["features"];
$err=$_FILES["prodpic"]["error"];
if($err==0)
{
$ppic=time().$_FILES["prodpic"]["name"];
$tname=$_FILES["prodpic"]["tmp_name"];
move_uploaded_file($tname,"uploads/$ppic");
}
else
{
$ppic=$ans[8];
}
$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) 
or die("Error in connection " . mysqli_connect_error());
$q="update addprod set catid=$cid,subcatid=$scid,prodname='$pname',rate='$rt',discount=$dis,stock=$st,features='$ft',pic='$ppic' where prodid=$pid";
mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);
if($cnt==1)
{	
header("location:manageproduct.php");
}
else
{
$msg="Product not added successfully";
}
}
?>
<html>
<head><title>Add Product</title>
<?php
include_once("extfiles.php");
?>
</head>
<body>
<?php
include_once("header.php");
?>

<div class="breadcrumbs">
<div class="container">
<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
<li class="active">Add Product</li>
</ol>
</div>
</div>
<!-- //breadcrumbs -->
<!-- login -->
<div class="login">
<div class="container">
<h2>Add Product</h2>

<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
<form name="form1" method="post" enctype="multipart/form-data">

<select name="cat" class="form-control" required>
<option value="">Choose Category</option>
<?php
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection " . mysqli_connect_error());

$q="select * from addcat";

$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));

$cnt=mysqli_affected_rows($conn);

if($cnt==0)
{	
print "<option value=''>No Categories</option>";
}
else
{
while($x=mysqli_fetch_array($res))
{
if(isset($_POST["viewsubcat"]) || isset($_GET["pid"]))
{
if(isset($_POST["viewsubcat"]))
$a=$_POST["cat"];
else
$a=$ans[1];
if($x[0]==$a)
{
print "<option value='$x[0]' selected>$x[1]</option>";
}
else
{
print "<option value='$x[0]'>$x[1]</option>";
}

}
else
{
print "<option value='$x[0]'>$x[1]</option>";
}
}
}
mysqli_close($conn);

?>
</select>
<input type="submit" name="viewsubcat" value="Go" formnovalidate>
<br/>
<select name="subcat" class="form-control" required>
<option value="">Choose Sub Category</option>
<?php
if(isset($_POST["viewsubcat"]) || isset($_GET["pid"]))
{
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection " . mysqli_connect_error());
if(isset($_POST["viewsubcat"]))
$cid=$_POST["cat"];//101,102,103
else
$cid=$ans[1];
$q="select * from addsubcat where catid='$cid'";

$res=mysqli_query($conn,$q) or die("Error in query " . mysqli_error($conn));

$cnt=mysqli_affected_rows($conn);

if($cnt==0)
{	
print "<option value=''>No Sub Categories</option>";
}
else
{
if(isset($_GET["pid"]))
{
$subid=$ans[2];
while($x=mysqli_fetch_array($res))
{
if($subid==$x[0])
{
print "<option value='$x[0]' selected>$x[2]</option>";
}
else
{
print "<option value='$x[0]'>$x[2]</option>";
}
}
}
else
{
while($x=mysqli_fetch_array($res))
{

print "<option value='$x[0]'>$x[2]</option>";
}
}
}
mysqli_close($conn);
}
?>
</select><br/>

<input type="text" name="productname" placeholder="Product Name" required=" " value="<?php print $ans[3];?>"><br/>

<input type="text" name="rate" placeholder="Rate" required=" " value="<?php print $ans[4];?>"><br/>

<input type="text" name="discount" placeholder="Discount(in percent)" required=" " value="<?php print $ans[5];?>"><br/>

<input type="text" name="stock" placeholder="Stock" required=" " value="<?php print $ans[6];?>"><br/>

<textarea name="features" class="form-control"><?php print $ans[7];?></textarea><br/>
<?php
print "<img src='uploads/$ans[8]' width='75px'>";
?>
<input type="file" name="prodpic">
<input type="submit" name="s1" value="Add Product"><br/><br/>

<?php
if(isset($msg))
{
print $msg;
}

?>
</form>
</div>
</div>
</div>
<?php
include_once("footer.php");
?>
</body>
</html>