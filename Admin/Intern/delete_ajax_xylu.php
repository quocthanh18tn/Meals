 <!-- create new employee  -->
 <!-- nhap id check whether employee is not exist? -->
 <!-- submit to create  -->
<?php
include "../../connection.php";
include "../../include/header.php";

?>

<?php
include "../../include/menubar_admin.php";
?>

</div>
<!-- thuc hien button -->
<?php
  $id=$_POST['id'];
  $sql="DELETE FROM nhanvien where ms='$id' ";
  mysql_query($sql);