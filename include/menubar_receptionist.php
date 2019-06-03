<?php
$path = getcwd();
$sub_path=substr($path,strlen($path)-5);
if ($sub_path=="onist")
{
 ?>

<div class="w3-bar w3-black" style="" >
        <a href="index.php" class="w3-bar-item w3-button" id="lib-thanh-active">Trang chính</a>

    <div class="w3-dropdown-hover">
      <button class="w3-button"  style="padding: 14px;">Khách hàng</button>
      <div class="w3-dropdown-content w3-bar-block">
         <a class="w3-bar-item w3-button" id="lib-thanh" href="Visitor/create.php">Thêm khách hàng</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="Visitor/delete.php">Xóa khách hàng</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="Visitor/list.php">Liệt kê khách hàng</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="Visitor/modify.php">Chỉnh sửa khách hàng</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="Visitor/export.php">Xuất thông tin</a>
      </div>
    </div>
    <div class="w3-dropdown-hover">
      <button class="w3-button" style="padding: 14px;">Sinh viên thực tập</button>
      <div class="w3-dropdown-content w3-bar-block">
          <a class="w3-bar-item w3-button" id="lib-thanh" href="Intern/create.php">Thêm sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="Intern/delete.php">Xóa sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="Intern/list.php">Liệt kê sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="Intern/modify.php">Chỉnh sửa sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="Intern/export.php">Xuất thông tin</a>
      </div>
    </div>
    <a class="w3-bar-item w3-button"  href="logout_receptionist.php" id="lib-thanh-logout">Đăng xuất</a>
<?php
}

else if ($sub_path=="sitor")
{
  ?>

<div class="w3-bar w3-black" style="" >
        <a href="../index.php" class="w3-bar-item w3-button" id="lib-thanh">Trang chính</a>

    <div class="w3-dropdown-hover">
      <button class="w3-button" id="lib-thanh-active" style="padding: 14px;">Khách hàng</button>
      <div class="w3-dropdown-content w3-bar-block">
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="create.php">Thêm khách hàng</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="delete.php">Xóa khách hàng</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="list.php">Liệt kê khách hàng</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="modify.php">Chỉnh sửa khách hàng</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="export.php">Xuất thông tin</a>
      </div>
    </div>
    <div class="w3-dropdown-hover">
      <button class="w3-button"  style="padding: 14px;">Sinh viên thực tập</button>
      <div class="w3-dropdown-content w3-bar-block">
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/create.php">Thêm sinh viên</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/delete.php">Xóa sinh viên</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/list.php">Liệt kê sinh viên</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/modify.php">Chỉnh sửa sinh viên</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/export.php">Xuất thông tin</a>
      </div>
    </div>
    <a class="w3-bar-item w3-button"  href="../logout_receptionist.php" id="lib-thanh-logout">Đăng xuất</a>
    <?php
}
else if ($sub_path=="ntern")
{
  ?>

<div class="w3-bar w3-black" style="" >
        <a href="../index.php" class="w3-bar-item w3-button" id="lib-thanh">Trang chính</a>

    <div class="w3-dropdown-hover">
      <button class="w3-button"  style="padding: 14px;">Khách hàng</button>
      <div class="w3-dropdown-content w3-bar-block">
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/create.php">Thêm khách hàng</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/delete.php">Xóa khách hàng</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/list.php">Liệt kê khách hàng</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/modify.php">Chỉnh sửa khách hàng</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/export.php">Xuất thông tin</a>
      </div>
    </div>
    <div class="w3-dropdown-hover">
      <button class="w3-button" id="lib-thanh-active" style="padding: 14px;">Sinh viên thực tập</button>
      <div class="w3-dropdown-content w3-bar-block">
          <a class="w3-bar-item w3-button" id="lib-thanh" href="create.php">Thêm sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="delete.php">Xóa sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="list.php">Liệt kê sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="modify.php">Chỉnh sửa sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="export.php">Xuất thông tin</a>
      </div>
    </div>
    <a class="w3-bar-item w3-button"  href="../logout_receptionist.php" id="lib-thanh-logout">Đăng xuất</a>
    <?php
}

?>
