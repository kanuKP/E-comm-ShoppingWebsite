<?php
require_once("vars.php");
$conn=mysqli_connect(dbhost,dbuser,dbpass,dbname) or die("Error in connection " . mysqli_connect_error());

$q="select * from addcat";

$res=mysqli_query($conn,$q) or die("Error in query" . mysqli_error($conn));
while($x=mysqli_fetch_array($res))
{
print "<li><a href='showsubcat.php?cid=$x[0]'>$x[1]</a></li>";
}
?>


<li><a href="searchbyrate.php">Search</a></li>
<li><a href="contact.php">Contact</a></li>
<li><a href="feedback.php">Feedback</a></li>
</ul>
</div>
</nav>
</div>
</div>