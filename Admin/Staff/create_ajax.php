<?php
include "../../connection.php";

?>

<?php
	$id=$_POST['id'];
	$sql="SELECT * FROM nhanvien where ms='$id'";
	$query=mysql_query($sql);
	$num=mysql_num_rows($query);
	if ($num==0 && $id !='')
	{
		?>
		<label style="margin-left:  5%;color: green;font-size: 15px;"> Chính xác. Bạn có thể đặt ID này cho nhân viên mới</label>
		<?php
	}
	else if ($num!=0 && $id!='')
	{
		?>
		<label style="margin-left:  5%;color: red;font-size: 15px;"> Không chính xác. ID này đã tồn tại</label>
		<?php
	}

?>
