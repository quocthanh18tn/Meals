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
<!-- thuc hien button -->
<?php
 if(isset($_POST['delete']))
 {
  $id=$_POST['id'];
  $sql="SELECT * FROM quanlyngoaile where ms='$id'";
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
               window.location='delete_quanly.php';
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
                title: "Bạn chắc chứ?",
                text: "Nếu bạn muốn xóa quản lý, nhấn OK!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete)
                {
                  var id  ="<?php echo $_POST['id'] ?>";
                   $.post("delete_quanly_ajax_xylu.php", {id: id}, function(data){$().html(data);});
                  swal({
                    title: "Chúc mừng bạn!",
                    text: "Bạn đã xóa quản lý thành công!",
                    icon: "success",
                  });
                }
                 else
                  {
                  swal({
                    title: "Chúc mừng bạn!",
                    text: "Dữ liệu quản lý đã được an toàn!!",
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
?>
<!-- check ID -->
<script type="text/javascript">
        $(document).ready(function(){
  $("#id").keyup(function(){
    var id = $("#id").val();
    $.post("delete_quanly_ajax.php", {id: id}, function(data){$("#display_id").html(data);})
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
  <p >Xóa quản lý </p>

               <form method="post" action="" class="container">
                  <fieldset class="fieldset">
                      <p>Thông tin quản lý  </p>
                         <lable for = "id" class="word"> ID: </label>
                         <input type ="text" name="id" class="id" id="id" required="" > </input>
                            <span id="display_id"></span>
                      <br >
                      <br >
                          <input type = "submit" name="delete" value= "Xóa nhân viên"  class="btn btn-lg btn-primary" style="margin-left: 10%;" >
                  </fieldset>
               </form>

      </body>
</html>




