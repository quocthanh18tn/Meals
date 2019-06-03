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
include "../../Library/PHPExcel.php";

?>

</div>
<!-- thuc hien submit -->
<?php
  if (isset($_POST['add']))
  {
    $day = date('Y-m-d');
    $id=$_POST['id'];
    $lydo=$_POST['lydo'];
    $sql1="SELECT * FROM nhanvien where ms='$id'";
    $query1=mysql_query($sql1);
    $num1=mysql_num_rows($query1);
    $sql2="SELECT * FROM nhanvien_khongnhanphanan where ms='$id' and (lydo ='3' or ngay='$day')";
    $query2=mysql_query($sql2);
    $num2=mysql_num_rows($query2);
    if ($num1>0 && $num2==0)
      //cho lam tiep
    {
      switch ($lydo) 
      {
        case '1':
          $sql="INSERT INTO nhanvien_khongnhanphanan (ms,lydo,chuthich,ngay) values ('$id','1','Đi công tác','$day') ";
          break;
        case '2':
          $sql="INSERT INTO nhanvien_khongnhanphanan (ms,lydo,chuthich,ngay) values ('$id','2','Xin nghỉ phép','$day') ";
          break;
        case '3':
          $sql="INSERT INTO nhanvien_khongnhanphanan (ms,lydo,chuthich) values ('$id','3','Đã nghỉ việc tại công ty') ";
          break;
          
        
      }
      
      mysql_query($sql);
      if(mysql_num_rows(mysql_query("SELECT * from nhanvien_khongnhanphanan where ms='$id' and (lydo ='3' or ngay='$day')"))!=0)
      {
            ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Chúc mừng !",
              text: "Thao tác thành công!",
              icon: "success",
            })
               .then((willDelete) => {
               window.location='create_khong_duoc_an.php';
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
               window.location='create_khong_duoc_an.php';
            });
            });
            </script>
            <?php
        // echo '<script> alert("that bai")</script>';
      }
    }
    elseif ($num1==0) 
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
               window.location='create_khong_duoc_an.php';
            });
            });
            </script>
            <?php
      // echo '<script> alert("id trung roi")</script>';
    }
    elseif ($num2>0) 
    {
             if ($lydo=='4') 
             {
                $sql="DELETE FROM nhanvien_khongnhanphanan where ms='$id' ";
                mysql_query($sql);
                ?>
                 <script type="text/javascript">
                    $(document).ready(function(){
                   swal({
                  title: "Chúc mừng !",
                  text: "Thao tác thành công!",
                  icon: "success",
                })
                   .then((willDelete) => {
                   window.location='create_khong_duoc_an.php';
                });
                });
                </script>
            <?php
             }
             else
            {
             ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Xin lỗi !",
              text: "ID đã tồn tại trong danh sách này!!",
              icon: "error",
            })
               .then((willDelete) => {
               window.location='create_khong_duoc_an.php';
            });
            });
            </script>
            <?php
      // echo '<script> alert("id trung roi")</script>';
          }
    }
  }

  if(isset($_POST['button3']))
  {
      if ($_FILES['file']['size']!='')
           {          #code import excel
             $file=$_FILES['file']['tmp_name'];
             $objReader = PHPExcel_IOFactory::createReaderForFile($file);
             $sheetnames = $objReader->listWorksheetNames($file);
             $objReader->setLoadSheetsOnly($sheetname);
             $objReader->setLoadSheetsOnly($sheetnames[0]);
             // $objReader -> setLoadSheetsOnly('Sheet1');
             $objExcel = $objReader -> load($file);
             $sheetData = $objExcel -> getActiveSheet() -> toArray('null',true,true,true);
             $highestRow = $objExcel -> setActiveSheetIndex() -> getHighestRow();
              for ($row_tam =1 ;;$row_tam++)
                {
                $employee_id_name = $sheetData[$row_tam]['A'];
                if ( $employee_id_name=="EmployeeName")
                break;
                }
              for ($row =($row_tam+1) ;$row <= $highestRow;$row++)
                {
                $msnv = substr($sheetData[$row]['A'],0,4);
                if (mysql_num_rows(mysql_query("SELECT * FROM nhanvien_khongnhanphanan where ms='$msnv' and lydo='3'"))==0)
                mysql_query("INSERT INTO nhanvien_khongnhanphanan (ms,lydo,chuthich) values ('$msnv','3','Đã nghỉ việc tại công ty') ");
                }
                ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Chúc mừng !",
              text: "Bạn đã thêm thành công !",
              icon: "success",
            })
               .then((willDelete) => {
               window.location='create_khong_duoc_an.php';
            });
            });
            </script>
            <?php
            // echo '<script>alert("SUCCESS")</script>';
          }
      else
      {
         ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Xin lỗi !",
              text: "File bị lỗi!! Vui lòng chọn đúng file!!",
              icon: "error",
            })
               .then((willDelete) => {
               window.location='create_khong_duoc_an.php';
            });
            });
            </script>
            <?php
      }
            // echo '<script>alert("Import carefully")</script>';

  }



?>
<!-- check ID -->
<script type="text/javascript">
        $(document).ready(function(){
  $("#id").keyup(function(){
    var id = $("#id").val();
    // document.getElementByID("display_id").innerHTML="";
    $.post("create_khong_duoc_an_ajax.php", {id: id}, function(data){$("#display_id").html(data);})
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
    text-align: left;
    font-size: 25px;
    font-weight: bold;
    margin-left: 16%;
  }
    #p2{
    text-align: left;
    font-size: 25px;
    font-weight: bold;
    margin-left: 10%;
  }
  .col30{
    width: 30%;
    float: left;

  }
  .col40{
    width: 60%;
    float: left;


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
    margin-left:7.4%;
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
            margin-left:10.3%;
            font-weight: normal;
  }
  #lydo{
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
            margin-left:0%;
            font-weight: normal; 
  }
  .fieldset{
    border-radius: 20px;
    border: 2px solid #ccc;
    width: 100%;
  }
</style>
<!-- css -->
  <p >Nhân viên không được nhận phần ăn</p>

               <form method="post" action="" class="container">
                  <fieldset class="fieldset">

                      <div class="col40">
                      <label id="p1">Tình trạng nhân viên</label>
                      <br>
                      <br>
                         <lable for = "id" class="word"> ID: </label>
                         <input type ="text" name="id" class="id" id="id" required="" > </input>
                            <span id="display_id"></span>
                      <br>
                      <br>
                           <lable for = "lydo" class="word">Lý do/Xóa: </label>
                           <select name="lydo" id="lydo" >
                            <option value="1">Đi công tác</option>
                            <option value="2">Nghỉ phép</option>
                            <option value="3">Đã nghỉ việc tại công ty</option>
                            <option value="4">Xóa khỏi danh sách này</option>
                          </select>
                      <br>
                      <br>
                          <input type = "submit" name="add" value= "Lưu dữ liệu"  class="btn btn-lg btn-primary" style="margin-left: 10%;" >
                          </div>
                        </form>
               <form method="post" action="" class="container" enctype="multipart/form-data">

                          <div class="col30">
                      <label id="p2">Import nhân viên đã nghỉ việc (Excel)</label>
                      <br>
                      <br>
                      <input type="file" name = "file" >
                      <br>
                      <br>
                    <button name="button3"  onclick="document.body.style.cursor='progress'" type="submit" class="btn btn-lg btn-primary"  style="margin-left:1px;float: right;">Xác nhận</button>
                      </div>
                  </fieldset>
               </form>

      </body>
</html>




