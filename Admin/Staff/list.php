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
  <p >Liệt kê nhân viên </p>

               <form method="post" action="" class="container">
                  <fieldset class="fieldset">
                      <p> Thông tin nhân viên: </p>
                         <lable for = "id" class="word"> ID: </label>
                         <input type ="text" name="sort" class="sort" id="sort" placeholder="ID, Tên, Dep"  > </input>
                          <input type = "submit" name="search" value= "Tìm kiếm"  class="btn btn-lg btn-primary" style="margin-left: 1%;font-size: 22px;">
                          <input type = "submit" name="show" value= "Hiện tất cả"  class="btn btn-lg btn-primary" style="margin-left: 1%;font-size: 22px;">
                          <br>
                          <br>
                          <p1 style="float: left;font-size: 20px"><u> Note: </u></p1>
                              <br>
                              <br>
                              <p1 style="margin-left: 2%"> Đi công tác hoặc nghỉ phép:</p1>
                              <input type="text" style="background: #FFA500;width: 100px;margin-left: 0.4%" disabled>
                              <br>
                              <br>
                              <p1 style="margin-left: 2%"> Nghỉ việc:</p1>
                              <input type="text" style="background: #F08080;width: 100px;margin-left: 14.2%" disabled>
                              <br>
                              <br>
                              <p1 style="margin-left: 2%"> Đi làm:</p1>
                              <input type="text" style="background: #FFFFFF;width: 100px;margin-left: 16.2%" disabled>
                            <br>

                  </fieldset>
                  <br>
                  <br>
                  <?php
                   //nut show all dc nhan
                    if(isset($_POST['show']))
                    {
                      ?>
                      <!-- hien thi table html -->
                        <table class="w3-table-all">
                          <tr>
                            <th style="width: 25%;text-align: center;">ID</th>
                            <th style="width: 25%;text-align: center;">Tên</th>
                            <th style="width: 25%;text-align: center;">Dep</th>
                            <th style="width: 25%;text-align: center;">Sub-Dep</th>
                          </tr>
                      <!-- xong phan hien thi th -->
                      <!-- xu ly query php -->
                      <?php
                        $sql="SELECT * FROM nhanvien where dep is not null";
                        $query=mysql_query($sql);
                        while ($array=mysql_fetch_array($query))
                        {
                          $khong_nhan_phan_an=mysql_query("SELECT ms,lydo,ngay FROM nhanvien_khongnhanphanan WHERE ms='$array[ms]' ");
                          $num=mysql_num_rows($khong_nhan_phan_an);
                          if ($num>0)
                          {
                            $array_phu=mysql_fetch_array($khong_nhan_phan_an);
                            if ($array_phu['lydo']==3)
                               $dk=3;//nhan vien da nghi viec
                            else if($array_phu['lydo']!=3&&(strtotime($array_phu['ngay'])==strtotime(date('Y-m-d'))))
                               $dk=12;//nhan vien di cong tac hoac nghi phep
                            else $dk=0;
                          }
                          else $dk=0;
                      ?>
                      <!-- hien thi td -->
                      <tr style="<?php if($dk==3) echo 'background-color: #F08080;'; else if ($dk==12) echo 'background-color: #FFA500;'?>">
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
                        <?php
                    }
                    // xong hien thi nut show
                    // nut search
                    if (isset($_POST['search']))
                    {
                      $sort=$_POST['sort'];
                      if ($sort !='')
                      {
                      $tb=mysql_query("SELECT * From nhanvien where ((ms like '%$sort%' or hoten like '%$sort%' or dep like '%$sort%' or subdep like '%$sort%') and dep is not null)");
                      ?>
                      <!-- hien thi table html -->
                        <table class="w3-table-all">
                          <tr>
                            <th style="width: 25%;text-align: center;">ID</th>
                            <th style="width: 25%;text-align: center;">Tên</th>
                            <th style="width: 25%;text-align: center;">Dep</th>
                            <th style="width: 25%;text-align: center;">Sub-Dep</th>
                          </tr>
                      <!-- xong phan hien thi th -->
                      <!-- xu ly query php -->
                      <?php
                       while ($array=mysql_fetch_array($tb))
                        {
                          $khong_nhan_phan_an=mysql_query("SELECT ms,lydo,ngay FROM nhanvien_khongnhanphanan WHERE ms='$array[ms]' ");
                          $num=mysql_num_rows($khong_nhan_phan_an);
                          if ($num>0)
                          {
                            $array_phu=mysql_fetch_array($khong_nhan_phan_an);
                            if ($array_phu['lydo']==3)
                               $dk=3;//nhan vien da nghi viec
                            else if($array_phu['lydo']!=3&&(strtotime($array_phu['ngay'])==strtotime(date('Y-m-d'))))
                               $dk=12;//nhan vien di cong tac hoac nghi phep
                            else $dk=0;
                          }
                          else $dk=0;
                      ?>
                      <!-- hien thi td -->
                      <tr style="<?php if($dk==3) echo 'background-color: #F08080;'; else if ($dk==12) echo 'background-color: #FFA500;'?>">
                        <td style="width: 25%;text-align: center;"> <?php echo $array['ms'] ?> </td>
                        <td style="width: 25%;text-align: center;"> <?php echo $array['hoten'] ?> </td>
                        <td style="width: 25%;text-align: center;"> <?php echo $array['dep'] ?> </td>
                        <td style="width: 25%;text-align: center;"> <?php echo $array['subdep'] ?> </td>
                      </tr>
                      <?php
                        }
                      ?>
                      </table>
                      <?php
                    }
                    }
                  ?>
               </form>

      </body>
</html>




