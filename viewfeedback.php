�E;b����K�B���ݷӒ���<����N'�|B�I�x 	�;��|�=�d}���y��X��W̟��(��Ec�pIyQ�����w���@��֕y�x��6V �]@w��Ǝ�|�^��[^�lx�]��	%��N�:�o9 @m
���2%��j�E
�
d9!��U�� ���D���螠����$ā�
ļ2�[���a��[,�h�R�e+��q���#���/.�wh?��?ɏzɉp#`u/�~�dY'9.TY�4�Co�PV;�~��	�O��_w��b���q�1	+�N�~5=��\��m�D&J\��<1�	��?��V$�V����F@y��}d���M��s��?��+`�D�6o
F����8+����/����XVvS�Ńe��l��a�2mRഌz?��W~��'��F�c��3���+�t�Iz�)">�t8�$}�#�梕�
�]�5t���$�ΟN���1p�b1o�p�]E��[��(>�Y�'
Ѻ���B�m�����w�/���q����B�n��g�  �[�1�-���~L g��1:���*5�ksL��_��)Zv�G�'0���h�|71�; E��;k�K��SeBƎФy�������� �����E�~�]�T�S�6�B��o�Z�-$��IՖ4���東���W���	=?<I�	������ZO�i�����E�x�ʻr)6�%�&�}���:�����R#���{���g���Bǆ�0��NM�߂��%��{��`9��Ucce7�K�{�O���w�!|`�����4�gWCM���3:ҞG"�Q�<i��W�zc��hEA(a��{�T�I9�J�2�fx�QI�W�Q8�ٽ������֦l��\�|�0�M��@�t�%f�0ZX�R�8x���Mc�%(�D���)}ǌ�~p�I4��O8����J8�s�)����N�?� pf�Vʮ�#I{��L��y�dua��'3� �@����EV�5������2 die("error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);
if($cnt==0)
{
	print "No Feedback found";
}
else
{
	print"<table width='100%' class='table' >
	<tr >
		<th>Name</th>
		<th>Phone</th>
		<th>Email</th>
		<th>How do you rate our Service?</th>
		<th>How did you come to know about our website?</th>
		<th>How do you compare our website with others?</th>
		<th>Did you find what you were looking for?</th>
		<th>Would you like to shop from our website again?</th>
		<th>Suggestions</th>		
		<th>Delete feedback</th>
	</tr>";		
	while($x=mysqli_fetch_array($res))
	{
		print"
		<tr>
			<td style:'width=50%' >$x[0]</td>
			<td style:'width=20%' >$x[1]</td>
			<td style:'width=20%' >$x[2]</td>
			<td style:'width=20%' >$x[3]</td>
			<td style:'width=20%' >$x[4]</td>
			<td style:'width=20%' >$x[5]</td>
			<td style:'width=20%' >$x[6]</td>
			<td style:'width=20%' >$x[7]</td>
			<td align='justify'>$x[8]</td>
			<td style:'width=20%'><a href='delfeedback.php?fid=$x[9]'>Delete</a></td>
		
			</tr>";	
	}
		print"</table>";
		print "<br/><br/>$cnt Messages found";
}
?>
</div>
</div>
<?php
include_once("footer.php");
?>
</body>
</html>