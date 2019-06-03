<?php
include "../../connection.php";

?>

<?php
	$id=$_POST['id'];
	$sql="SELECT * FROM nhanvien where ms='$id' and dep is null and maloai='2'";
	$query=mysql_query($sql);
	$num=mysql_num_rows($query);
	if(substr($id,0,1)!='V')
		{
		?>
		<label style="margin-left:  5%;color: red;font-size: 15px;"> Sai chuẩn. Xin vui lòng nhập lại</label>
		<?php
		}
	else
	{
	if ($num==0 && $id !='')
	{
		?>
		<label style="margin-left:  5%;color: green;font-size: 15px;"> Chính xác. Bạn có thể đặt ID này khách hàng mới</label>
		<?php
	}
	else if ($num!=0 && $id!='')
	{
		?>
		<label style="margin-left:  5%;color: red;font-size: 15px;"> Không chính xác. ID này đã tồn tại</label>
		<?php
	}
	}

?>
