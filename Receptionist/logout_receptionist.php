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



<?php session_start();

if (isset($_SESSION['id_receptionist'])){
    unset($_SESSION['id_receptionist']); // xóa session login
}

?>
<script type="text/javascript">
    $(document).ready(function(){
   swal({
  title: "Tạm biệt!",
  text: "Hẹn gặp lại!",
  icon: "success",
})
   .then((willDelete) => {
   window.location='../index.php';
});
});
</script>



