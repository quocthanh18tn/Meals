<?php
include "connection.php";
$day = date('Y-m-d 23:59:00');
$day_previus=strtotime($day)-86400;
$day_previus=date('Y-m-d H:i:s',$day_previus);
$sql =mysql_query("DELETE  FROM kiemtraphu WHERE thoigian <= '$day_previus'");
?>
<?php
include "include/header.php";
?>
<div class="w3-bar w3-black" style="" >
      <div class="w3-dropdown-hover">
      <button class="w3-button" style="padding: 14px;">Đăng nhập</button>
      <div class="w3-dropdown-content w3-bar-block">
                <a class="w3-bar-item w3-button" id="lib-thanh" href="Admin/index.php">Quản lý nhân sự</a>
                <!-- <a class="w3-bar-item w3-button" id="lib-thanh" href="Receptionist/index.php">Tiếp tân</a> -->
      </div>
      </div>
<?php
include "include/menubar.php";
?>
</div>
<?php
include "include/footer.php";
?>
  </body>
</html>
