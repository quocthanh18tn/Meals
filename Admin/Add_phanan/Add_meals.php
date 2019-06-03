<?php
session_start();
if(!(isset($_SESSION['id_administration']))){
header("location:../login_administration.php");
}
?>

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
    $date=$_POST['date'];
    $mode=$_POST['mode'];
    $sql1="SELECT ms FROM nhanvien where ms='$id'";
    $query1=mysql_query($sql1);
    $num1=mysql_num_rows($query1);
    if ($mode=='1')
    {
      $sql2="SELECT ms,thoigian FROM kiemtrachinh where ms='$id' and thoigian like '$date%'and thoigian<='$date 12:45:00'";
      $buoi ="Sáng";
    }
    elseif ($mode=='2')
    {
      $sql2="SELECT ms,thoigian FROM kiemtrachinh where ms='$id' and thoigian like '$date%'and thoigian<='$date 17:15:00' and thoigian>='$date 16:45:00'";
      $buoi="Chiều";
    }
    $query2=mysql_query($sql2);
    $num2=mysql_num_rows($query2);
    if ($num1>0 && $num2==0)
      //cho lam tiep
    {
      switch ($mode) 
      {
        case '1':
          $sql1 = mysql_query("INSERT INTO kiemtraphu (ms,thoigian) VALUES ('$id','$date 12:45:00')");
          $sql2 = mysql_query("INSERT INTO kiemtrachinh (ms,thoigian) VALUES ('$id','$date 12:45:00')");
          $num=mysql_num_rows(mysql_query("SELECT ms from kiemtrachinh where ms='$id' and thoigian='$date 12:45:00'"));
          break;
        case '2':
          $sql1 = mysql_query("INSERT INTO kiemtraphu (ms,thoigian) VALUES ('$id','$date 17:15:00')");
          $sql2 = mysql_query("INSERT INTO kiemtrachinh (ms,thoigian) VALUES ('$id','$date 17:15:00')");
          $num=mysql_num_rows(mysql_query("SELECT ms from kiemtrachinh where ms='$id' and thoigian='$date 17:15:00'"));
          break;                 
      }      
      if($num>0)
      {
            ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Chúc mừng !",
              text: "Thêm mã <?php echo"$id ngày $date buổi $buoi"?>!",
              icon: "success",
            })
               .then((willDelete) => {
               window.location='Add_meals.php';
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
               window.location='Add_meals.php';
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
               window.location='Add_meals.php';
            });
            });
            </script>
            <?php
      // echo '<script> alert("id trung roi")</script>';
    }
    elseif ($num2>0) 
    {
             
             ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Xin lỗi !",
              text: "ID đã nhận phần ăn trước đó!!",
              icon: "error",
            })
               .then((willDelete) => {
               window.location='Add_meals.php';
            });
            });
            </script>
            <?php
      // echo '<script> alert("id trung roi")</script>';
      }
  }
  if (isset($_POST['delete']))
  {
    $id=$_POST['id'];
    $date=$_POST['date'];
    $mode=$_POST['mode'];
    $sql1="SELECT ms FROM nhanvien where ms='$id'";
    $query1=mysql_query($sql1);
    $num1=mysql_num_rows($query1);
    if ($mode=='1')
    {
      $sql2="SELECT ms,thoigian FROM kiemtrachinh where ms='$id' and thoigian like '$date%'and thoigian<='$date 12:45:00'";
            $buoi="Sáng";

    }
    elseif ($mode=='2')
    {
      $sql2="SELECT ms,thoigian FROM kiemtrachinh where ms='$id' and thoigian like '$date%'and thoigian<='$date 17:15:00' and thoigian>='$date 16:45:00'";
            $buoi="Chiều";

    }
    $query2=mysql_query($sql2);
    $num2=mysql_num_rows($query2);
    if ($num1>0 && $num2==1)
     {
              ?>
              <script type="text/javascript">
                  $(document).ready(function(){
                swal({
                title: "Bạn chắc chứ?",
                text: "Nếu bạn muốn xóa nhân viên, nhấn OK!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete)
                {
                  var id  ="<?php echo $_POST['id'] ?>";
                  var date  ="<?php echo $_POST['date'] ?>";
                  var mode  ="<?php echo $_POST['mode'] ?>";
                  $.ajax({
                  url: 'Delete_add_meals.php',
                  dataType: 'text',
                  type: 'POST',
                  data: {id: id,date:date,mode:mode},
                  success: function( data){
                    if(data==1)
                      {
                             swal({
                            title: "Chúc mừng !",
                            text: "Xóa mã <?php echo"$id ngày $date buổi $buoi"?>!",
                            icon: "success",
                          })
                             .then((willDelete) => {
                             window.location='Add_meals.php';
                          });
                      }
                    else
                      {
                          swal({
                          title: "Xin lỗi !",
                          text: "Có lỗi trong quá trình thao tác!! \n\n Xin vui lòng nhập lại!!",
                          icon: "error",
                          })
                           .then((willDelete) => {
                           window.location='Add_meals.php';
                          });
                      }
                  }
                
                })
                }
              })
              })
              </script>
              <?php
        // echo '<script> alert("thanh cong")</script>';
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
               window.location='Add_meals.php';
            });
            });
            </script>
            <?php
      // echo '<script> alert("id trung roi")</script>';
          }
          elseif ($num2==0) 
           {
             
             ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Xin lỗi !",
              text: "ID chưa nhận phần ăn trước đó!!",
              icon: "error",
            })
               .then((willDelete) => {
               window.location='Add_meals.php';
            });
            });
            </script>
            <?php
      // echo '<script> alert("id trung roi")</script>';
          }

  }

?>
<!-- check ID -->
<script type="text/javascript">
        $(document).ready(function(){
        $("#id").keyup(function(){
          var id = $("#id").val();
          // document.getElementByID("display_id").innerHTML="";
          $.post("Add_meals_ajax.php", {id: id}, function(data){$("#display_id").html(data);})
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
  #mode{
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
    margin-left:3.4%;
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
            margin-left:12.3%;
            font-weight: normal;
  }
  #date{
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
            margin-left:9%;
            font-weight: normal; 
  }
  .fieldset{
    border-radius: 20px;
    border: 2px solid #ccc;
    width: 100%;
  }
</style>

<!-- css -->
  <p >Thêm phần ăn</p>

               <form method="post" action="" class="container">
                  <fieldset class="fieldset">

                      <div class="col40">
                      <br>
                      <br>
                         <lable for = "id" class="word"> ID: </label>
                         <input type ="text" name="id" class="id" id="id" required="" > </input>
                            <span id="display_id"></span>
                      
                      <br>
                      <br>
                           <lable for = "mode" class="word">Thời gian: </label>
                           <select name="mode" id="mode" >
                            <option value="1">Sáng</option>
                            <option value="2">Chiều</option>
                          </select>
                      <br>
                      <br>
                         <lable for = "date" class="word"> Ngày: </label>
                         <input type ="date" name="date" class="date" id="date" required=""          value="<?php echo date('Y-m-d');?>"> </input>
                      <br>
                      <br>
                      
                          <input type = "submit" name="add" value= "Thêm"  class="btn btn-lg btn-primary" style="margin-left: 10%;" >
                          <input type = "submit" name="delete" value= "Xóa"  class="btn btn-lg btn-primary" style="margin-left: 10%;" >
                          </div>
                        </form>
              

      </body>
</html>




