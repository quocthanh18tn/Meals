<?php
include "../connection.php";
?>


<!DOCTYPE html>
<html>
<head>

  <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../Library/bootstrap-4.0.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Library/w3.css">

  <script src="../Library/jquery-3.1.1.min.js"></script>
  <script src="../Library/popper.min.js"></script>
  <script src="../Library/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
  <script src="../Library/sweetalert.min.js"></script>


<?php


// username và password được gửi từ form đăng nhập
$ID=$_POST['ID'];
$password=$_POST['password'];

// Xử lý để tránh MySQL injection
$ID = stripslashes($ID);
$password = stripslashes($password);
$ID = mysql_real_escape_string($ID);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM quanly WHERE msquanly='$ID' and password='$password' and msloai='1'";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
// nếu tài khoản trùng khớp thì sẽ trả về giá trị 1 cho biến $count
if($count==1){

// Lúc này nó sẽ tự động gửi đến trang thông báo đăng nhập thành công
session_start();
$_SESSION['id_administration'] = "$ID";

?>
 <script type="text/javascript">
    $(document).ready(function(){
   swal({
  title: "Chúc mừng !",
  text: "Bạn đã đăng nhập thành công!",
  icon: "success",
})
   .then((willDelete) => {
   window.location='index.php';
});
});
</script>
<?php
}
else {
	?>

	<script type="text/javascript">
    $(document).ready(function(){
   swal({
  title: "Xin lỗi!",
  text: "Sai tên đăng nhập hoặc mật khẩu!! \n\n  Vui lòng thử lại !!",
  icon: "error",
  dangerMode: true,
})
   .then((willDelete) => {
   window.location='login_administration.php';
})
});
</script>
<?php


}
?>