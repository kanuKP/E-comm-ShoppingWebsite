<?php
$a=$_GET["fid"];
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());
$q="delete from feedback where feedbackid='$a'";
mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);

if($cnt==1)
{
	
	header("location:viewfeedback.php");
}
else
{
	$msg="Error in deleting contact";
}
?>