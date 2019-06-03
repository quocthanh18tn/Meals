<!DOCTYPE html>
<html>
<head>
  <title>CAN-TEEN HAI NAM AUTOMATION</title>

  <meta http-equiv="content-type" content="text/html" charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<?php
$path = getcwd();
$sub_path=substr($path,strlen($path)-5);
if ($sub_path=="Meals")
{
 ?>
  <link rel="stylesheet" href="Library/bootstrap-4.0.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="Library/w3.css">

  <script src="Library/jquery-3.1.1.min.js"></script>
  <script src="Library/popper.min.js"></script>
  <script src="Library/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
  <script src="Library/sweetalert.min.js"></script>

<?php
}
elseif ($sub_path=="Admin"||$sub_path=="onist"||$sub_path=="ement")
{
?>
  <link rel="stylesheet" href="../Library/bootstrap-4.0.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Library/w3.css">

  <script src="../Library/jquery-3.1.1.min.js"></script>
  <script src="../Library/popper.min.js"></script>
  <script src="../Library/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
  <script src="../Library/sweetalert.min.js"></script>
<?php
}
else
{
  ?>
  <link rel="stylesheet" href="../../Library/bootstrap-4.0.0-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../Library/w3.css">

  <script src="../../Library/jquery-3.1.1.min.js"></script>
  <script src="../../Library/popper.min.js"></script>
  <script src="../../Library/bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
  <script src="../../Library/sweetalert.min.js"></script>

  <?php
}
?>
  <style type="text/css">

  .fakeimg1 {
      height: 115px;
      color:black;
      padding: 15px;
  }
  .carousel-inner img {
      width: 100%;
      height: 100%;
  }

  .p1 {
            font-weight: bold;
            text-align: center;
          }

  #lib-thanh{
   text-decoration: none;font-size: 15px;padding: 14px;
  }
  #lib-thanh-logout{
   text-decoration: none;font-size: 15px;padding: 14px;float: right;
  }
  #lib-thanh-active{
   text-decoration: none;font-size: 15px;padding: 14px;background-color: #ccc;color: #000;
  }

h1{
  text-align: center;
  font-weight: bold;
}

body{
      background-color: #ceecf5;
              }
</style>
</head>

<body>

<div class="fakeimg1 text-center">
   <h1> HAI NAM AUTOMATION </h1>
   <div class="p1">QUẢN LÝ NHÀ ĂN</div>
</div>
