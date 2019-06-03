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
  if (isset($_POST['add']))
  {
    $id=$_POST['id'];
    $sql="SELECT * FROM nhanvien where ms='$id' ";
    $query=mysql_query($sql);
    $num=mysql_num_rows($query);
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
               window.location='create_quanly.php';
            });
            });
            </script>
            <?php
      // echo '<script> alert("id khong dung")</script>';
    }
    else
    {
      $sqlngoaile="SELECT * FROM quanlyngoaile where ms='$id' ";
      $queryngoaile=mysql_query($sqlngoaile);
      $numngoaile=mysql_num_rows($queryngoaile);
      if ($numngoaile==0)
      {
      $sql="INSERT INTO quanlyngoaile (ms) values ('$id') ";
      mysql_query($sql);
      if(mysql_num_rows(mysql_query("SELECT * from quanlyngoaile where ms='$id'"))!=0)
      {
            ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Chúc mừng !",
              text: "Bạn đã thêm thành công quản lý mới!",
              icon: "success",
            })
               .then((willDelete) => {
               window.location='create_quanly.php';
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
               window.location='create_quanly.php';
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
              text: "Quản lý đã tồn tại!! ",
              icon: "error",
            })
               .then((willDelete) => {
               window.location='create_quanly.php';
            });
            });
            </script>
            <?php
        // echo '<script> alert("that bai")</script>';
        }
    }
  }

?>
<!-- check ID -->
<script type="text/javascript">
        $(document).ready(function(){
  $("#id").keyup(function(){
    var id = $("#id").val();
    $.post("create_quanly_ajax.php", {id: id}, function(data){$("#display_id").html(data);})
  })
  $("#show").click(function(){
    var x = document.getElementById("table1");
    if (x.style.display==="none")
      {
        x.style.display="block";
        document.getElementById("show").value="Ẩn tất cả";
      }
    else
      {
        x.style.display="none" ;
        document.getElementById("show").value="Hiện tất cả";

      }
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
            margin-left:6.1%;
            font-weight: normal;
  }

  .fieldset{
    border-radius: 20px;
    border: 2px solid #ccc;
    width: 100%;
  }
</style>
<!-- css -->
  <p >Thêm quản lý </p>

               <form method="post" action="" class="container">

                            <input type = "button" id="show" value= "Hiện tất cả"  class="btn btn-lg btn-primary" style="margin-left: 1%;font-size: 22px;">
                            <br>
                            <br>

                      <!-- hien thi table html -->
                      <div id="table1" style="display: none;">
                        <table class="w3-table-all" >
                          <tr>
                            <th style="width: 25%;text-align: center;">ID</th>
                            <th style="width: 25%;text-align: center;">Tên</th>
                            <th style="width: 25%;text-align: center;">Dep</th>
                            <th style="width: 25%;text-align: center;">Sub-Dep</th>
                          </tr>
                      <!-- xong phan hien thi th -->
                      <!-- xu ly query php -->
                      <?php
                        $sql="SELECT nhanvien.ms,hoten,dep,subdep FROM nhanvien INNER JOIN quanlyngoaile on nhanvien.ms=quanlyngoaile.ms ";
                        $query=mysql_query($sql);
                        while ($array=mysql_fetch_array($query))
                        {
                      ?>
                      <!-- hien thi td -->
                      <tr>
                        <td style="width: 25%;text-align: center;"> <?php echo $array['ms'] ?> </td>
                        <td style="width: 25%;text-align: center;"> <?php echo $array['hoten'] ?> </td>
                        <td style="width: 25%;text-align: center;"> <?php echo $array['dep'] ?> </td>
                        <td style="width: 25%;text-align: center;"> <?php echo $array['subdep'] ?> </td>
                      </tr>
                      <!-- xong phan td -->
                      <?php
                        }
                      ?>
                        </table>
                        </div>
                            <br>
                            <br>
                                          <fieldset class="fieldset">
                         <lable for = "id" class="word">ID: </label>
                         <input type ="text" name="id" class="id" id="id" required="" > </input>
                            <span id="display_id"></span>
                            <br>
                            <br>
                          <input type = "submit" name="add" value= "Lưu dữ liệu"  class="btn btn-lg btn-primary"  style="margin-left: 10%;">
                            <br>
                            <br>


                  </fieldset>
               </form>

      </body>
</html>




