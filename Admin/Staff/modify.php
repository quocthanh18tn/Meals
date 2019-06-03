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
    $dep=$_POST['dep'];
    $subdep=$_POST['subdep'];
    $sql="SELECT * FROM nhanvien where ms='$currentid' and dep is not null";
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
               window.location='modify.php';
            });
            });
            </script>
            <?php
      // echo '<script> alert("id khong dung")</script>';
    }
    else
    {
      if ($name!="")
      {
        $flag=1;
        mysql_query("UPDATE nhanvien SET hoten='$name' where ms='$currentid' ");
      }
      if ($dep!="")
      {
        $flag=1;
        mysql_query("UPDATE nhanvien SET dep='$dep' where ms='$currentid' ");
      }
      if ($subdep!="")
      {
        $flag=1;
        mysql_query("UPDATE nhanvien SET subdep='$subdep' where ms='$currentid' ");
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
              text: "Bạn vừa cập nhật thành công!! \n\n Kiếm tra lại thông tin nếu bạn muốn chắc chắn!!",
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
              text: "Bạn không cập nhật gì !! \n\n Xin vui lòng nhập lại nếu bạn muốn cập nhật thông tin!!",
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
?>
<!-- check ID -->
<script type="text/javascript">
        $(document).ready(function(){
  $("#currentid").keyup(function(){
    var id = $("#currentid").val();
    $.post("modify_ajax.php", {id: id}, function(data){$("#display_id").html(data);})
  })
  $("#dep").change(function(){
    var dep = $("#dep").val();
    $.post("modify_subdep_ajax.php", {dep: dep}, function(data){$("#display_subdep").html(data);})
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
    margin-left:11.3%;
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
    margin-left:7.5%;
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
            margin-left:11.5%;
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
            margin-left:6.1%;
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
            margin-left:5.3%;
            font-weight: normal;
  }
  .fieldset{
    border-radius: 20px;
    border: 2px solid #ccc;
    width: 100%;
  }
</style>
<!-- css -->
  <p >Sửa nhân viên </p>

               <form method="post" action="" class="container">
                  <fieldset class="fieldset">
                         <lable for = "currentid" class="word">ID hiện tại: </label>
                         <input type ="text" name="currentid" class="currentid" id="currentid" required="" > </input>
                            <span id="display_id"></span>
                      <br >
                      <br >
                         <lable for = "updateid" class="word">ID cập nhật: </label>
                         <input type ="text" name="updateid" class="updateid" id="updateid"  > </input>
                      <br >
                      <br >
                          <lable for = "name" class="word" > Tên: </label>
                          <input type ="text" class="name" name="name" > </input>
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
                          <lable for = "subdep" class="word">Sub-Dep: </label>
                          <select name="subdep" id="display_subdep">
                            <option value="">CHỌN..</option>
                          </select>
                          <br>
                          <br>
                          <input type = "submit" name="modify" value= "Cập nhập vào hệ thống"  class="btn btn-lg btn-primary"  style="margin-left: 10%;">
                  </fieldset>
               </form>

      </body>
</html>




