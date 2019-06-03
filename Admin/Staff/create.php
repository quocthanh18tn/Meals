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
    $id=$_POST['id'];
    $name=$_POST['name'];
    $dep=$_POST['dep'];
    $subdep=$_POST['subdep'];
    $sql="SELECT * FROM nhanvien where ms='$id'";
    $query=mysql_query($sql);
    $num=mysql_num_rows($query);
    if ($num==0)
      //cho lam tiep
    {
      $sql="INSERT INTO nhanvien (ms,hoten,dep,subdep,maloai) values ('$id','$name','$dep','$subdep','1') ";
      mysql_query($sql);
      if(mysql_num_rows(mysql_query("SELECT * from nhanvien where ms='$id'"))!=0)
      {
            ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Chúc mừng !",
              text: "Bạn đã thêm thành công nhân viên mới!",
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
                $hoten = substr($sheetData[$row]['A'],5);
                $dep = $sheetData[$row]['B'];
                $subdep = $sheetData[$row]['C'];
                if (mysql_num_rows(mysql_query("SELECT * FROM nhanvien where ms='$msnv'"))==0)
                mysql_query("INSERT INTO nhanvien (ms,hoten,dep,subdep,maloai) values ('$msnv','$hoten','$dep','$subdep','1')");
                }
                ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Chúc mừng !",
              text: "Bạn đã thêm thành công nhân viên mới!",
              icon: "success",
            })
               .then((willDelete) => {
               window.location='create.php';
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
               window.location='create.php';
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
    $.post("create_ajax.php", {id: id}, function(data){$("#display_id").html(data);})
  })
  $("#dep").change(function(){
    var dep = $("#dep").val();
    $.post("create_subdep_ajax.php", {dep: dep}, function(data){$("#display_subdep").html(data);})
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
            margin-left:8.1%;
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
            margin-left:9.4%;
            font-weight: normal;
  }
  .fieldset{
    border-radius: 20px;
    border: 2px solid #ccc;
    width: 100%;
  }
</style>
<!-- css -->
  <p >Thêm nhân viên </p>

               <form method="post" action="" class="container">
                  <fieldset class="fieldset">

                      <div class="col40">
                      <label id="p1">Thông tin nhân viên  </label>
                      <br>
                      <br>
                         <lable for = "id" class="word"> ID: </label>
                         <input type ="text" name="id" class="id" id="id" required="" > </input>
                            <span id="display_id"></span>
                      <br >
                      <br >
                          <lable for = "name" class="word" > Tên: </label>
                          <input type ="text" class="name" name="name" required="" > </input>
                      <br>
                      <br>
                           <lable for = "dep" class="word">Dep: </label>
                           <select name="dep" id="dep" >
                            <option value="">CHỌN..</option>
                   <?php
                           $sql="SELECT DISTINCT dep FROM nhanvien";
                           $query=mysql_query($sql);
                           while ($array=mysql_fetch_array($query))
                            {
                    ?>
                            <option value="<?php echo $array['dep'] ?>"><?php echo $array['dep'] ?></option>
                    <?php
                            }
                    ?>
                          </select>
                          <br>
                          <br>
                          <lable for = "subdep" class="word" >Sub-Dep: </label>
                          <select name="subdep"  id="display_subdep">
                            <option value="">CHỌN..</option>
                          </select>
                      <br>
                      <br>
                          <input type = "submit" name="add" value= "Lưu dữ liệu"  class="btn btn-lg btn-primary" style="margin-left: 10%;" >
                          </div>
                        </form>
               <form method="post" action="" class="container" enctype="multipart/form-data">

                          <div class="col30">
                      <label id="p2">Import danh sách  </label>
                      <br>
                      <br>
                      <input type="file" name = "file" >
                      <br>
                      <br>
                    <button name="button3"  onclick="document.body.style.cursor='progress'" type="submit" class="btn btn-lg btn-primary" style="margin-left:1px;">Xác nhận</button>
                      </div>
                  </fieldset>
               </form>

      </body>
</html>




