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
<!-- thuc hien submit -->
<?php
  if (isset($_POST['add']))
  {
    $id=$_POST['id'];
    $name=$_POST['name'];
    $school=$_POST['school'];
    $start=$_POST['start'];
    $finish=$_POST['finish'];
    $sql="SELECT * FROM nhanvien where ms='$id' and dep is null";
    $query=mysql_query($sql);
    $num=mysql_num_rows($query);
    if (substr($id,0,1)!='S')
    {
             ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Xin lỗi !",
              text: "Sai chuẩn!! \n \n Xin vui lòng nhập lại!!",
              icon: "error",
            })
               .then((willDelete) => {
               window.location='create.php';
            });
            });
            </script>
            <?php
    }
    else
    {
    if ($num==0)
      //cho lam tiep
    {
      $sql="INSERT INTO nhanvien (ms,hoten,maloai,tentochuc,start,finish) values ('$id','$name','3','$school','$start','$finish') ";
      mysql_query($sql);
      if(mysql_num_rows(mysql_query("SELECT * from nhanvien where ms='$id'"))!=0)
      {
            ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Chúc mừng !",
              text: "Bạn đã thêm thành công sinh viên mới !!",
              icon: "success",
            })
               .then((willDelete) => {
               window.location='create.php';
            });
            });
            </script>
            <?php
        // echo '<script> alert("thanh cong")</script>';
      }
      else
      {
             ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Xin lỗi !",
              text: "Có lỗi trong quá trình thao tác!! \n\n Xin vui lòng nhập lại!!",
              icon: "error",
            })
               .then((willDelete) => {
               window.location='create.php';
            });
            });
            </script>
            <?php
        // echo '<script> alert("that bai")</script>';
      }
    }
    else
    {
             ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Xin lỗi !",
              text: "ID đã tồn tại!! \n\n Xin vui lòng nhập lại!!",
              icon: "error",
            })
               .then((willDelete) => {
               window.location='create.php';
            });
            });
            </script>
            <?php
      // echo '<script> alert("id trung roi")</script>';
    }
  }
}
?>
<!-- check ID -->
<script type="text/javascript">
        $(document).ready(function(){
  $("#id").keyup(function(){
    var id = $("#id").val();
    // document.getElementByID("display_id").innerHTML="";
    $.post("create_ajax.php", {id: id}, function(data){$("#display_id").html(data);})
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
  #dep{
    text-align: center;
    font-size: 15px;
    font-weight: normal;
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
    margin-left:5%;
  }
  #display_subdep{
    text-align: center;
    font-size: 15px;
    font-weight: normal;
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
    margin-left:1.5%;
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
            margin-left:10.0%;
            font-weight: normal;
  }
  .id{
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
            margin-left:10.6%;
            font-weight: normal;
  }
    .school{
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
            margin-left:7.2%;
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
            margin-left:2.8%;
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
  <p >Thêm sinh viên </p>

               <form method="post" action="" class="container">
                  <fieldset class="fieldset">
                      <p id="p1"> Thông tin sinh viên </p>
                         <lable for = "id" class="word"> ID: </label>
                         <input type ="text" name="id" class="id" id="id" required="" placeholder="Bắt đầu với kí tự 'S'"> </input>
                            <span id="display_id"></span>
                      <br >
                      <br >
                          <lable for = "name" class="word" > Tên: </label>
                          <input type ="text" class="name" name="name" required="" > </input>
                      <br>
                      <br>
                          <lable for = "school" class="word" > Trường: </label>
                          <input type ="text" class="school" name="school" required="" > </input>
                      <br>
                      <br>
                          <lable for = "start" class="word" > Ngày bắt đầu: </label>
                          <input type ="date" class="start" name="start" required="" > </input>
                      <br>
                      <br>
                          <lable for = "finish" class="word" > Ngày kết thúc: </label>
                          <input type ="date" class="finish" name="finish" required="" > </input>
                      <br>
                      <br>
                          <input type = "submit" name="add" value= "Lưu dữ liệu"  class="btn btn-lg btn-primary" style="margin-left: 10%;" >
                  </fieldset>
               </form>

      </body>
</html>




