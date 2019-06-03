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
<!-- xu ly ajax -->
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

  .sort{
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
  <p >Liệt kê sinh viên </p>

               <form method="post" action="" class="container">
                  <fieldset class="fieldset">
                      <p> Thông tin sinh viên: </p>
                         <lable for = "id" class="word"> ID: </label>
                         <input type ="text" name="sort" class="sort" id="sort" placeholder="ID, Tên"  > </input>
                          <input type = "submit" name="search" value= "Tìm kiếm"  class="btn btn-lg btn-primary" style="margin-left: 1%;font-size: 22px;">
                          <input type = "submit" name="show" value= "Hiển thị tất cả"  class="btn btn-lg btn-primary" style="margin-left: 1%;font-size: 22px;">
                  </fieldset>
                  <?php
                   //nut show all dc nhan
                    if(isset($_POST['show']))
                    {
                      ?>
                      <!-- hien thi table html -->
                        <table class="w3-table-all">
                          <tr>
                            <th style="width: 15%;text-align: center;">ID</th>
                            <th style="width: 20%;text-align: center;">Tên</th>
                            <th style="width: 15%;text-align: center;">Vị trí</th>
                            <th style="width: 15%;text-align: center;">Trường</th>
                            <th style="width: 17.25%;text-align: center;">Ngày bắt đầu</th>
                            <th style="width: 17.25%;text-align: center;">Ngày kết thúc</th>
                          </tr>
                      <!-- xong phan hien thi th -->
                      <!-- xu ly query php -->
                      <?php
                        $sql="SELECT * FROM nhanvien where dep is null and maloai='3'";
                        $query=mysql_query($sql);
                        while ($array=mysql_fetch_array($query))
                        {
                      ?>
                      <!-- hien thi td -->
                      <tr>
                        <td style="width: 15%;text-align: center;"> <?php echo $array['ms'] ?> </td>
                        <td style="width: 20%;text-align: center;"> <?php echo $array['hoten'] ?> </td>
                        <td style="width: 15%;text-align: center;"> Sinh viên </td>
                        <td style="width: 15%;text-align: center;"> <?php echo $array['tentochuc'] ?>  </td>
                        <td style="width: 17.25%;text-align: center;"> <?php echo $array['start'] ?>  </td>
                        <td style="width: 17.25%;text-align: center;"> <?php echo $array['finish'] ?>  </td>
                      </tr>
                      <!-- xong phan td -->
                      <?php
                        }
                      ?>
                        </table>
                        <?php
                    }
                    // xong hien thi nut show
                    // nut search
                    if (isset($_POST['search']))
                    {
                      $sort=$_POST['sort'];
                      $tb=mysql_query("SELECT * From nhanvien where ((ms like '%$sort%' or hoten like '%$sort%' or dep like '%$sort%' or subdep like '%$sort%') and dep is null and maloai='3')");
                      ?>
                      <!-- hien thi table html -->
                        <table class="w3-table-all">
                          <tr>
                             <th style="width: 15%;text-align: center;">ID</th>
                            <th style="width: 20%;text-align: center;">Tên</th>
                            <th style="width: 15%;text-align: center;">Vị trí</th>
                            <th style="width: 15%;text-align: center;">Trường</th>
                            <th style="width: 17.25%;text-align: center;">Ngày bắt đầu</th>
                            <th style="width: 17.25%;text-align: center;">Ngày kết thúc</th>
                          </tr>
                      <!-- xong phan hien thi th -->
                      <!-- xu ly query php -->
                      <?php
                       while ($array=mysql_fetch_array($tb))
                        {
                      ?>
                      <!-- hien thi td -->
                      <tr>
                         <td style="width: 15%;text-align: center;"> <?php echo $array['ms'] ?> </td>
                        <td style="width: 20%;text-align: center;"> <?php echo $array['hoten'] ?> </td>
                        <td style="width: 15%;text-align: center;"> Sinh viên </td>
                        <td style="width: 15%;text-align: center;"> <?php echo $array['tentochuc'] ?>  </td>
                        <td style="width: 17.25%;text-align: center;"> <?php echo $array['start'] ?>  </td>
                        <td style="width: 17.25%;text-align: center;"> <?php echo $array['finish'] ?>  </td>
                      </tr>
                      <?php
                        }
                      ?>
                      </table>
                      <?php
                    }
                  ?>
               </form>

      </body>
</html>




