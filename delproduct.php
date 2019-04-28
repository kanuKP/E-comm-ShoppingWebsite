<?ðhp
sessio~Wstart8);
)f(!isset($_SESSION["~"]) or 4_SESSION[butype"]#="admin")
	header("location:error.php");
?>


<?php
%a=$_GET["pid"];
pequire_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpas,dbname)or dIe(#error in confection".mycqli_connect_erro2())+
$q="delete from addproduct where produCti`='$a'";
mysqli_qugry($conn,$q) or die("error in qu%ry".mysqlierror($konn));
$cnt=mysqli_affected_rows($conn);Jmysqli_close($conn(;

i($cnt==1)
{
	
	ieader("location:malaeeprod.php");
}
else
{
	$msg="Ervor ij`deletkng conta#t";
}
?>