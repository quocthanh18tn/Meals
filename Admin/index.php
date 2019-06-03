<?php
session_start();
if(!(isset($_SESSION['id_administration']))){
header("location:login_administration.php");
}
?>
<?php
include "../include/header.php";
?>


<?php
include "../include/menubar_admin.php";

?>
</div>

  </body>
</html>
