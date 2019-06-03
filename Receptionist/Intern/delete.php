<?php
session_start();
if(!(isset($_SESSION['id_receptionist']))){
header("location:../login_receptionist.php");
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
include "../../include/menubar_receptionist.php";

?>
</div>
<!-- thuc hien button -->
<?php
 if(isset($_POST['delete']))
 {
  $id=$_POST['id'];
  $sql="SELECT * FROM nhanvien where ms='$id' and dep is null and maloai='3'";
  $query=mysql_query($sql);
  $num=mysql_num_rows($query);
  if (substr($id,0,1)!='S')
  {

             ?>
             <script type="text/javascript">
                $(document).ready(function(){
               swal({
              title: "Xin lỗi !",
              text: "Sai chuẩn!! \n\n Vui lòng nhập lại!!",
              icon: "error",
            })
               .then((willDelete) => {
               window.location='delete.php';
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
              text: "ID không tồn tại!! \n\n Vui lòng nhập lại!!",
              icon: "error",
            })
               .then((willDelete) => {
               window.location='delete.php';
            });
            });
            </script>
            <?php
        // echo '<script> alert("id k co")</script>';
  }
  else
  {
        {
              ?>
              <script type="text/javascript">
                  $(document).ready(function(){
                swal({
                title: "Bạn có chắc?",
                text: "Nếu bạn muốn xóa sinh viên, nhấn OK!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete)
                {
                  var id  ="<?php echo $_POST['id'] ?>";
                   $.post("delete_ajax_xylu.php", {id: id}, function(data){$().html(data);});
                  swal({
                    title: "Chúc mừng!",
                    text: "Sinh viên của bạn đã được xóa !!",
                    icon: "success",
                  });
                }
                 else
                  {
                  swal({
                    title: "Chúc mừng!",
                    text: "Dữ liệu sinh viên đã được bảo vệ!!",
                    icon: "success",});
                }
              });
                 // window.location='Delete_Panel.php';
              });
              </script>
              <?php
        // echo '<script> alert("thanh cong")</script>';
        }
  }
 }
 }
?>
<!-- check ID -->
<script type="text/javascript">
        $(document).ready(function(){
  $("#id").keyup(function(){
    var id = $("#id").val();
    $.post("delete_ajax.php", {id: id}, function(data){$("#display_id").html(data);})
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
  <p >Xóa sinh viên </p>

               <form method="post" action="" class="container">
                  <fieldset class="fieldset">
                      <p>Thông tin sinh viên  </p>
                         <lable for = "id" class="word"> ID: </label>
                         <input type ="text" name="id" class="id" id="id" required="" placeholder="Bắt đầu với kí tự 'S'" > </input>
                            <span id="display_id"></span>
                      <br >
                      <br >
                          <input type = "submit" name="delete" value= "Xóa sinh viên"  class="btn btn-lg btn-primary" style="margin-left: 10%;" >
                  </fieldset>
               </form>

      </body>
</html>




