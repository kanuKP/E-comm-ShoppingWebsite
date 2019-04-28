<?php
$a=$_GET["id"];
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());
$q="delete from addcat where catid='$a'";
mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);
if($cnt==1)
{	
	header("location:managecat.php");
}
else
{
	$msg="Error in deleting contact";
}
?>