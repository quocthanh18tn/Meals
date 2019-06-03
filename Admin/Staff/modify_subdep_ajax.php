<?php
include "../../connection.php";

?>
	<option value="">CHỌN..</option>
<?php
	$dep=$_POST['dep'];
	$sql="SELECT DISTINCT subdep FROM nhanvien where dep='$dep'";
	$query=mysql_query($sql);
	while ($array=mysql_fetch_array($query))
    {
    ?>
    <option value="<?php echo $array['subdep'] ?>"><?php echo $array['subdep'] ?></option>
    <?php
    }
?>
