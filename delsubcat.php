<?php
session_start();
if(!isset($_SESSION["n"]) or $_SESSION["utype"]!="admin")
	header("location:error.php");
?>

<?php
$a=$_GET["scid"];
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or die("error in connection".mysqli_connect_error());
$q="delete from addsubcat where subcatid='$a'";
mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);

if($cnt==1)
{
	
	header("location:managesubcat.php");
}
else
{
	$msg="Error in deleting contact";
}
?>