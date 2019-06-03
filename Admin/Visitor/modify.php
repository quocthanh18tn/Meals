<?php
session_start();
if(!(isset($_SESSION['id_administration']))){
header("location:../login_administration.php");
}
?>
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
<!-- xu ly nhan nut -->
<?php
  if (isset($_POST['modify']))
  {
    $flag=0;
    $currentid=$_POST['currentid'];
    $updateid=$_POST['updateid'];
    $name=$_POST['name'];
    $company=$_POST['company'];
    $start=$_POST['start'];
    $finish=$_POST['finish'];
    $sql="SELECT * FROM nhanvien where ms='$currentid' and dep is null and maloai='2'";
    $query=mysql_query($sql);
    $num=mysql_num_rows($query);
    if (substr($currentid,0,1) !='V')
      {
            ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Xin lỗi !",
              text: "Sai chuẩn!! \n\n Xin vui lòng nhập lại!!",
              icon: "error",
            })
               .then((willDelete) => {
               window.location='modify.php';
            });
            });
            </script>
            <?php
      }
      else
      {
    if ($num==0)
    {
            ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Xin lỗi !",
              text: "ID không tồn tại!! \n\n Xin vui lòng nhập lại!!",
              icon: "error",
            })
               .then((willDelete) => {
               window.location='modify.php';
            });
            });
            </script>
            <?php
      // echo '<script> alert("id khong dung")</script>';
    }
    else
    {
      if (substr($updateid,0,1)!='V' && $updateid!='')
      {
        ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Xin lỗi !",
              text: "Sai chuẩn!! \n\n Xin vui lòng nhập lại!!",
              icon: "error",
            })
               .then((willDelete) => {
               window.location='modify.php';
            });
            });
            </script>
            <?php

      }
      else
      {
      if ($name!="")
      {
        $flag=1;
        mysql_query("UPDATE nhanvien SET hoten='$name' where ms='$currentid' ");
      }
      if ($company!="")
      {
        $flag=1;
        mysql_query("UPDATE nhanvien SET tentochuc='$company' where ms='$currentid' ");
      }
      if ($start!="")
      {
        $flag=1;
        mysql_query("UPDATE nhanvien SET start='$start' where ms='$currentid' ");
      }
      if ($finish!="")
      {
        $flag=1;
        mysql_query("UPDATE nhanvien SET finish='$finish' where ms='$currentid' ");
      }

      if ($updateid!="")
      {
        $flag=1;
        mysql_query("UPDATE nhanvien SET ms='$updateid' where ms='$currentid' ");
      }
      if ($flag)
      {
            ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Chúc mừng !",
              text: "Bạn vừa cập nhập thành công!! \n\n Kiểm tra lại thông tin nếu bạn muốn chắc chắn!!",
              icon: "success",
            })
               .then((willDelete) => {
               window.location='modify.php';
            });
            });
            </script>
            <?php
        // echo '<script> alert("update thanh cong")</script>';
      }
      else
      {
        ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Xin lỗi !",
              text: "Bạn không cập nhật gì!! \n\n Xin vui lòng nhập lại nếu bạn muốn cập nhập thông tin nào đó!!",
              icon: "warning",
            })
               .then((willDelete) => {
               window.location='modify.php';
            });
            });
            </script>
            <?php
          //khong co gi
      }
      }
    }
    }
  }
?>
<!-- check ID -->
<script type="text/javascript">
        $(document).ready(function(){
  $("#currentid").keyup(function(){
    var id = $("#currentid").val();
    $.post("modify_ajax.php", {id: id}, function(data){$("#display_id").html(data);})
  })

  })
</script>
<!-- css -->
<style type="text/css">
  p{
    text-align: center;
    font-size: 25px;
    font-weight: bold;
    padding: 10px;
  }
  #p1{
    text-align: center;
    font-size: 25px;
    font-weight: bold;

  }
  .word{
    text-align: center;
    font-size: 15px;
    font-weight: bold;


  }

  .name{
            width: 300px;
            height: 50px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left:10.1%;
            font-weight: normal;
  }
  .currentid{
            width: 300px;
            height: 50px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left:4.6%;
            font-weight: normal;
  }
  .updateid{
            width: 300px;
            height: 50px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left:3.8%;
            font-weight: normal;
  }
    .company{
            width: 300px;
            height: 50px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left:7.1%;
            font-weight: normal;
  }
  .start{
            width: 300px;
            height: 50px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left:2.6%;
            font-weight: normal;
  }
  .finish{
            width: 300px;
            height: 50px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 12px;
            font-size: 18px;
            background-color: white;
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
            margin-left:2.3%;
            font-weight: normal;
  }
  .fieldset{
    border-radius: 20px;
    border: 2px solid #ccc;
    width: 100%;
  }
</style>
<!-- css -->
  <p >Sửa khách hàng </p>

               <form method="post" action="" class="container">
                  <fieldset class="fieldset">
                         <lable for = "currentid" class="word">ID hiện tại: </label>
                         <input type ="text" name="currentid" class="currentid" id="currentid" placeholder="Bắt đầu với kí tự 'V'"  required="" > </input>
                            <span id="display_id"></span>
                      <br >
                      <br >
                         <lable for = "updateid" class="word"> ID cập nhật: </label>
                         <input type ="text" name="updateid" class="updateid" id="updateid" placeholder="Bắt đầu với kí tự 'V'" > </input>
                      <br >
                      <br >
                          <lable for = "name" class="word" > Tên: </label>
                          <input type ="text" class="name" name="name" > </input>
                      <br>
                      <br>
                          <lable for = "company" class="word" > Công ty: </label>
                          <input type ="text" class="company" name="company"  > </input>
                      <br>
                      <br>
                          <lable for = "start" class="word" > Ngày bắt đầu: </label>
                          <input type ="date" class="start" name="start"  > </input>
                      <br>
                      <br>
                          <lable for = "finish" class="word" > Ngày kết thúc: </label>
                          <input type ="date" class="finish" name="finish"  > </input>
                      <br>
                      <br>

                          <input type = "submit" name="modify" value= "Cập nhập vào hệ thống"  class="btn btn-lg btn-primary"  style="margin-left: 10%;">
                  </fieldset>
               </form>

      </body>
</html>




