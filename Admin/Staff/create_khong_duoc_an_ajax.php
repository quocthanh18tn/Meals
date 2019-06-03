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
		<label style="margin-left:  5%;color: red;font-size: 15px;">ID không tồn tại</label>
		<?php
	}
	else if ($num!=0 && $id!='')
	{
		$array=mysql_fetch_array($query);
		?>
		<br>
		<br>
		<table class="w3-table-all">
			<tr>
				<th style="width: 25%;text-align: center;">ID</th>
				<th style="width: 25%;text-align: center;">Tên</th>
				<th style="width: 25%;text-align: center;">Dep</th>
				<th style="width: 25%;text-align: center;">Sub-Dep</th>
			</tr>
			<tr>
				<td style="width: 25%;text-align: center;"> <?php echo $array['ms']; ?> </td>
				<td style="width: 25%;text-align: center;"> <?php echo $array['hoten']; ?> </td>
				<td style="width: 25%;text-align: center;"> <?php echo $array['dep']; ?> </td>
				<td style="width: 25%;text-align: center;"> <?php echo $array['subdep']; ?> </td>
			</tr>
		</table>
		<?php
	}

?>
