<?php
session_start();
if(!(isset($_SESSION['id_receptionist']))){
header("location:login_receptionist.php");
}
?>
<?php
include "../include/header.php";
?>


<?php
include "../include/menubar_receptionist.php";

?>
</div>

  </body>
</html>
