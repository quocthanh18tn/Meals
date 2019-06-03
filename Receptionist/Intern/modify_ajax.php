<?php
include "../../connection.php";

?>

<?php
	$id=$_POST['id'];
	$sql="SELECT * FROM nhanvien where ms='$id' and dep is null and maloai='3'";
	$query=mysql_query($sql);
	$array=mysql_fetch_array($query);
	$num=mysql_num_rows($query);
	if ((substr($id,0,1))!='S')
	{
		?>
		<label style="margin-left:  5%;color: red;font-size: 15px;"> Sai chuẩn. ID không tồn tại</label>
		<?php
	}
	else
	{
	if ($num==0 && $id!='')
	{
		?>
		<label style="margin-left:  5%;color: red;font-size: 15px;"> Không chính xác. ID không tồn tại</label>
		<?php
	}
	else if ($num !=0 && $id!='')
		{

?>
<br>
<br>
		<table class="w3-table-all">
			<tr>
				<th style="width: 15%;text-align: center;">ID</th>
                            <th style="width: 20%;text-align: center;">Tên</th>
                            <th style="width: 15%;text-align: center;">Vị trí</th>
                            <th style="width: 15%;text-align: center;">Trường</th>
                            <th style="width: 17.25%;text-align: center;">Ngày bắt đầu</th>
                            <th style="width: 17.25%;text-align: center;">Ngày kết thúc</th>
			</tr>
			<tr>
				<td style="width: 15%;text-align: center;"> <?php echo $array['ms'] ?> </td>
                        <td style="width: 20%;text-align: center;"> <?php echo $array['hoten'] ?> </td>
                        <td style="width: 15%;text-align: center;"> Sinh viên </td>
                        <td style="width: 15%;text-align: center;"> <?php echo $array['tentochuc'] ?>  </td>
                        <td style="width: 17.25%;text-align: center;"> <?php echo $array['start'] ?>  </td>
                        <td style="width: 17.25%;text-align: center;"> <?php echo $array['finish'] ?>  </td>
			</tr>
		</table>
		<?php
	}
	}
	?>