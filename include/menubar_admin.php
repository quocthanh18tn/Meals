<?php
$path = getcwd();
$sub_path=substr($path,strlen($path)-5);
if ($sub_path=="Admin")
{
 ?>

<div class="w3-bar w3-black" style="" >
        <a href="index.php" class="w3-bar-item w3-button" id="lib-thanh-active">Trang chính</a>

    <div class="w3-dropdown-hover">
      <button class="w3-button"  style="padding: 14px;">Nhân viên</button>
      <div class="w3-dropdown-content w3-bar-block" >
              <a class="w3-bar-item w3-button" id="lib-thanh" href="Staff/create.php">Thêm nhân viên</a>
              <a class="w3-bar-item w3-button" id="lib-thanh" href="Staff/delete.php">Xóa nhân viên</a>
              <a class="w3-bar-item w3-button" id="lib-thanh" href="Staff/list.php">Danh sách nhân viên</a>
              <a class="w3-bar-item w3-button" id="lib-thanh" href="Staff/modify.php">Chỉnh sửa nhân viên</a>
              <a class="w3-bar-item w3-button" id="lib-thanh" href="Staff/create_quanly.php">Thêm quản lý</a>
              <a class="w3-bar-item w3-button" id="lib-thanh" href="Staff/delete_quanly.php">Xóa quản lý</a>
              <a class="w3-bar-item w3-button" id="lib-thanh" href="Staff/create_khong_duoc_an.php">Không nhận phần ăn</a>

      </div>
    </div>
    <div class="w3-dropdown-hover">
      <button class="w3-button"  style="padding: 14px;">Khách hàng</button>
      <div class="w3-dropdown-content w3-bar-block">
         <a class="w3-bar-item w3-button" id="lib-thanh" href="Visitor/create.php">Thêm khách hàng</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="Visitor/delete.php">Xóa khách hàng</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="Visitor/list.php">Danh sách khách hàng</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="Visitor/modify.php">Chỉnh sửa khách hàng</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="Visitor/export.php">Xuất thông tin</a>
      </div>
    </div>
    <div class="w3-dropdown-hover">
      <button class="w3-button" style="padding: 14px;">Sinh viên thực tập</button>
      <div class="w3-dropdown-content w3-bar-block">
          <a class="w3-bar-item w3-button" id="lib-thanh" href="Intern/create.php">Thêm sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="Intern/delete.php">Xóa sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="Intern/list.php">Danh sách sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="Intern/modify.php">Chỉnh sửa sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="Intern/export.php">Xuất thông tin</a>
      </div>
    </div>
    <a href="Import_Avatar/import_avatar.php" class="w3-bar-item w3-button" id="lib-thanh">Chỉnh sửa ảnh</a>
    <a href="Add_phanan/Add_meals.php" class="w3-bar-item w3-button" id="lib-thanh">Chỉnh sửa phần ăn</a>

    <a class="w3-bar-item w3-button"  href="logout_administration.php" id="lib-thanh-logout">Đăng xuất</a>
<?php
}

else if ($sub_path=="hanan")
{
  ?>

<div class="w3-bar w3-black" style="" >
        <a href="../index.php" class="w3-bar-item w3-button" id="lib-thanh">Trang chính</a>

   <div class="w3-dropdown-hover">
      <button class="w3-button" id="lib-thanh" style="padding: 14px;">Nhân viên</button>
      <div class="w3-dropdown-content w3-bar-block" >
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/create.php">Thêm nhân viên</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/delete.php">Xóa nhân viên</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/list.php">Danh sách nhân viên</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/modify.php">Chỉnh sửa nhân viên</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/create_quanly.php">Thêm quản lý</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/delete_quanly.php">Xóa quản lý</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/create_khong_duoc_an.php">Không nhận phần ăn</a>
      </div>
    </div>
    <div class="w3-dropdown-hover">
      <button class="w3-button"  style="padding: 14px;">Khách hàng</button>
      <div class="w3-dropdown-content w3-bar-block">
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/create.php">Thêm khách hàng</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/delete.php">Xóa khách hàng</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/list.php">Danh sách khách hàng</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/modify.php">Chỉnh sửa khách hàng</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/export.php">Xuất thông tin</a>

      </div>
    </div>
    <div class="w3-dropdown-hover">
      <button class="w3-button" style="padding: 14px;">Sinh viên thực tập</button>
      <div class="w3-dropdown-content w3-bar-block">
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/create.php">Thêm sinh viên</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/delete.php">Xóa sinh viên</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/list.php">Danh sách sinh viên</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/modify.php">Chỉnh sửa sinh viên</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/export.php">Xuất thông tin</a>
      </div>
    </div>

    <a href="../Import_Avatar/import_avatar.php" class="w3-bar-item w3-button" id="lib-thanh">Chỉnh sửa ảnh</a>
    <a href="Add_meals.php" class="w3-bar-item w3-button" id="lib-thanh-active">Chỉnh sửa phần ăn</a>
    <a class="w3-bar-item w3-button"  href="../logout_administration.php" id="lib-thanh-logout">Đăng xuất</a>
    <?php
}


else if ($sub_path=="Staff")
{
  ?>

<div class="w3-bar w3-black" style="" >
        <a href="../index.php" class="w3-bar-item w3-button" id="lib-thanh">Trang chính</a>

   <div class="w3-dropdown-hover">
      <button class="w3-button" id="lib-thanh-active" style="padding: 14px;">Nhân viên</button>
      <div class="w3-dropdown-content w3-bar-block" >
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="create.php">Thêm nhân viên</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="delete.php">Xóa nhân viên</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="list.php">Danh sách nhân viên</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="modify.php">Chỉnh sửa nhân viên</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="create_quanly.php">Thêm quản lý</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="delete_quanly.php">Xóa quản lý</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="create_khong_duoc_an.php">Không nhận phần ăn</a>
      </div>
    </div>
    <div class="w3-dropdown-hover">
      <button class="w3-button"  style="padding: 14px;">Khách hàng</button>
      <div class="w3-dropdown-content w3-bar-block">
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/create.php">Thêm khách hàng</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/delete.php">Xóa khách hàng</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/list.php">Danh sách khách hàng</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/modify.php">Chỉnh sửa khách hàng</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/export.php">Xuất thông tin</a>

      </div>
    </div>
    <div class="w3-dropdown-hover">
      <button class="w3-button" style="padding: 14px;">Sinh viên thực tập</button>
      <div class="w3-dropdown-content w3-bar-block">
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/create.php">Thêm sinh viên</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/delete.php">Xóa sinh viên</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/list.php">Danh sách sinh viên</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/modify.php">Chỉnh sửa sinh viên</a>
         <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/export.php">Xuất thông tin</a>
      </div>
    </div>
    <a href="../Import_Avatar/import_avatar.php" class="w3-bar-item w3-button" id="lib-thanh">Chỉnh sửa ảnh</a>
    <a href="../Add_phanan/Add_meals.php" class="w3-bar-item w3-button" id="lib-thanh">Chỉnh sửa phần ăn</a>

    <a class="w3-bar-item w3-button"  href="../logout_administration.php" id="lib-thanh-logout">Đăng xuất</a>
    <?php
}
else if ($sub_path=="sitor")
{
  ?>

<div class="w3-bar w3-black" style="" >
        <a href="../index.php" class="w3-bar-item w3-button" id="lib-thanh">Trang chính</a>

   <div class="w3-dropdown-hover">
      <button class="w3-button"  style="padding: 14px;">Nhân viên</button>
      <div class="w3-dropdown-content w3-bar-block" >
          <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/create.php">Thêm nhân viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/delete.php">Xóa nhân viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/list.php">Danh sách nhân viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/modify.php">Chỉnh sửa nhân viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/create_quanly.php">Thêm quản lý</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/delete_quanly.php">Xóa quản lý</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/create_khong_duoc_an.php">Không nhận phần ăn</a>
      </div>
    </div>
    <div class="w3-dropdown-hover">
      <button class="w3-button" id="lib-thanh-active" style="padding: 14px;">Khách hàng</button>
      <div class="w3-dropdown-content w3-bar-block">
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="create.php">Thêm khách hàng</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="delete.php">Xóa khách hàng</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="list.php">Danh sách khách hàng</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="modify.php">Chỉnh sửa khách hàng</a>
                    <a class="w3-bar-item w3-button" id="lib-thanh" href="export.php">Xuất thông tin</a>
      </div>
    </div>
    <div class="w3-dropdown-hover">
      <button class="w3-button"  style="padding: 14px;">Sinh viên thực tập</button>
      <div class="w3-dropdown-content w3-bar-block">
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/create.php">Thêm sinh viên</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/delete.php">Xóa sinh viên</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/list.php">Danh sách sinh viên</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/modify.php">Chỉnh sửa sinh viên</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/export.php">Xuất thông tin</a>
      </div>
    </div>
    <a href="../Import_Avatar/import_avatar.php" class="w3-bar-item w3-button" id="lib-thanh">Chỉnh sửa ảnh</a>
    <a href="../Add_phanan/Add_meals.php" class="w3-bar-item w3-button" id="lib-thanh">Chỉnh sửa phần ăn</a>

    <a class="w3-bar-item w3-button"  href="../logout_administration.php" id="lib-thanh-logout">Đăng xuất</a>
    <?php
}
else if ($sub_path=="ntern")
{
  ?>

<div class="w3-bar w3-black" style="" >
        <a href="../index.php" class="w3-bar-item w3-button" id="lib-thanh">Trang chính</a>

   <div class="w3-dropdown-hover">
      <button class="w3-button"  style="padding: 14px;">Nhân viên</button>
      <div class="w3-dropdown-content w3-bar-block" >
              <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/create.php">Thêm nhân viên</a>
              <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/delete.php">Xóa nhân viên</a>
              <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/list.php"  >Danh sách nhân viên</a>
              <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/modify.php">Chỉnh sửa nhân viên</a>
              <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/create_quanly.php">Thêm quản lý</a>
              <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/delete_quanly.php">Xóa quản lý</a>
              <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/create_khong_duoc_an.php">Không nhận phần ăn</a>
      </div>
    </div>
    <div class="w3-dropdown-hover">
      <button class="w3-button"  style="padding: 14px;">Khách hàng</button>
      <div class="w3-dropdown-content w3-bar-block">
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/create.php">Thêm khách hàng</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/delete.php">Xóa khách hàng</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/list.php">Danh sách khách hàng</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/modify.php">Chỉnh sửa khách hàng</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/export.php">Xuất thông tin</a>
      </div>
    </div>
    <div class="w3-dropdown-hover">
      <button class="w3-button" id="lib-thanh-active" style="padding: 14px;">Sinh viên thực tập</button>
      <div class="w3-dropdown-content w3-bar-block">
          <a class="w3-bar-item w3-button" id="lib-thanh" href="create.php">Thêm sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="delete.php">Xóa sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="list.php">Danh sách sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="modify.php">Chỉnh sửa sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="export.php">Xuất thông tin</a>
      </div>
    </div>
    <a href="../Import_Avatar/import_avatar.php" class="w3-bar-item w3-button" id="lib-thanh">Chỉnh sửa ảnh</a>
    <a href="../Add_phanan/Add_meals.php" class="w3-bar-item w3-button" id="lib-thanh">Chỉnh sửa phần ăn</a>

    <a class="w3-bar-item w3-button"  href="../logout_administration.php" id="lib-thanh-logout">Đăng xuất</a>

  <?php
}
else if ($sub_path=="vatar")
{
  ?>

<div class="w3-bar w3-black" style="" >
        <a href="../index.php" class="w3-bar-item w3-button" id="lib-thanh">Trang chính</a>

   <div class="w3-dropdown-hover">
      <button class="w3-button"  style="padding: 14px;">Nhân viên</button>
      <div class="w3-dropdown-content w3-bar-block" >
              <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/create.php">Thêm nhân viên</a>
              <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/delete.php">Xóa nhân viên</a>
              <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/list.php"  >Danh sách nhân viên</a>
              <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/modify.php">Chỉnh sửa nhân viên</a>
              <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/create_quanly.php">Thêm quản lý</a>
              <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/delete_quanly.php">Xóa quản lý</a>
              <a class="w3-bar-item w3-button" id="lib-thanh" href="../Staff/create_khong_duoc_an.php">Không nhận phần ăn</a>
      </div>
    </div>
    <div class="w3-dropdown-hover">
      <button class="w3-button"  style="padding: 14px;">Khách hàng</button>
      <div class="w3-dropdown-content w3-bar-block">
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/create.php">Thêm khách hàng</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/delete.php">Xóa khách hàng</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/list.php">Danh sách khách hàng</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/modify.php">Chỉnh sửa khách hàng</a>
        <a class="w3-bar-item w3-button" id="lib-thanh" href="../Visitor/export.php">Xuất thông tin</a>
      </div>
    </div>
    <div class="w3-dropdown-hover">
      <button class="w3-button" id="lib-thanh" style="padding: 14px;">Sinh viên thực tập</button>
      <div class="w3-dropdown-content w3-bar-block">
          <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/create.php">Thêm sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/delete.php">Xóa sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/list.php">Danh sách sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/modify.php">Chỉnh sửa sinh viên</a>
          <a class="w3-bar-item w3-button" id="lib-thanh" href="../Intern/export.php">Xuất thông tin</a>
      </div>
    </div>
    <a href="import_avatar.php" class="w3-bar-item w3-button" id="lib-thanh-active">Chỉnh sửa ảnh</a>
    <a href="../Add_phanan/Add_meals.php" class="w3-bar-item w3-button" id="lib-thanh">Chỉnh sửa phần ăn</a>

    <a class="w3-bar-item w3-button"  href="../logout_administration.php" id="lib-thanh-logout">Đăng xuất</a>

  <?php
}
  ?>