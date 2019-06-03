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
<script type="text/javascript">
  function up(ms)
  {
    var id = "#"+ms;
    var ms = ms;
    $(document).ready(function(){
      //Lấy ra files
        var file_data = $(id).prop('files')[0];
        //lấy ra kiểu file
        var type = file_data.type;
        //Xét kiểu file được upload
        var match = ["image/gif", "image/png", "image/jpg","image/jpeg",];
        //kiểm tra kiểu file
        if (type == match[0] || type == match[1] || type == match[2]|| type == match[3]) {
            //khởi tạo đối tượng form data
            var form_data = new FormData();
            //thêm files vào trong form data
            form_data.append('file', file_data);
            form_data.append('ms', ms);
            //sử dụng ajax post
            $.ajax({
                url: 'upload_avatar.php', // gửi đến file upload.php 
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (data) {
                    $('#noti').html(data);
                    $(id).val('');
                    var src = '../../temp_Images/'+ms+'.jpg';
                    id_img=ms+'_src';
                    setTimeout(function() {
                      document.getElementById(id_img).src =src;
                    }, 1000);
                    
                }
            });
            
        } else {
            alert("Chỉ được upload file ảnh");
            $(id).val('');
        }
    });
  }
</script>
  <p >Chỉnh sửa ảnh đại diện </p>

               <form method="post" action="" class="container">
                <div id="noti"></div>
                  <fieldset class="fieldset">
                      <p> Thông tin</p>
                         <lable for = "id" class="word"> ID: </label>
                         <input type ="text" name="sort" class="sort" id="sort" placeholder="ID, Tên, Dep"  > </input>
                          <input type = "submit" name="search" value= "Tìm kiếm"  class="btn btn-lg btn-primary" style="margin-left: 1%;font-size: 22px;">
                          <input type = "submit" name="show" value= "Hiện tất cả"  class="btn btn-lg btn-primary" style="margin-left: 1%;font-size: 22px;">
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
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Dep</th>
                            <th>Sub-Dep</th>
                            <th>Ảnh đại diện</th>
                            <th>Chọn ảnh</th>
                            <th>Cập nhật ảnh</th>
                          </tr>
                      <!-- xong phan hien thi th -->
                      <!-- xu ly query php -->
                      <?php
                        $sql="SELECT * FROM nhanvien";
                        $query=mysql_query($sql);
                        while ($array=mysql_fetch_array($query))
                        {
                      ?>
                      <!-- hien thi td -->
                      <tr>
                        <td> <?php echo $array['ms'] ?> </td>
                        <td> <?php echo $array['hoten'] ?> </td>
                        <td> <?php echo $array['dep'] ?> </td>
                        <td> <?php echo $array['subdep'] ?> </td>
                        <td><img style="border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 100px;" src='../../Images/<?php
                          if (file_exists("../../Images/" .$array["ms"].".jpg")) 
                            echo "$array[ms].jpg";
                          else echo "none.jpg";
                          ?>' 
                          id='<?php echo "$array[ms]_src";?>'></td>
                        <td><input type="file" id="<?php echo $array['ms'];?>" size="45" /></td>
                        <td><input type="button" class="btn btn-primary" name="" onclick="up('<?php echo $array[ms];?>')" value="Xác nhận"></td>
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
                      $tb=mysql_query("SELECT * From nhanvien where (ms like '%$sort%' or hoten like '%$sort%' or dep like '%$sort%' or subdep like '%$sort%')");
                      ?>
                      <!-- hien thi table html -->
                        <table class="w3-table-all">
                          <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Dep</th>
                            <th>Sub-Dep</th>
                            <th>Ảnh đại diện</th>
                            <th>Chọn ảnh</th>
                            <th>Cập nhật ảnh</th>
                          </tr>
                      <!-- xong phan hien thi th -->
                      <!-- xu ly query php -->
                      <?php
                       while ($array=mysql_fetch_array($tb))
                        {
                      ?>
                      <!-- hien thi td -->
                      <tr>
                        <td> <?php echo $array['ms'] ?> </td>
                        <td> <?php echo $array['hoten'] ?> </td>
                        <td> <?php echo $array['dep'] ?> </td>
                        <td> <?php echo $array['subdep'] ?> </td>
                        <td><img style="border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 100px;" src='../../Images/<?php
                          if (file_exists("../../Images/" .$array["ms"].".jpg")) 
                            echo "$array[ms].jpg";
                          else echo "none.jpg";
                          ?>' 
                          id='<?php echo "$array[ms]_src";?>'></td>
                        <td><input type="file" id="<?php echo $array['ms'];?>" size="45" />
                        </td>
                        <td><input type="button" class="btn btn-primary" name="" onclick="up('<?php echo $array[ms];?>')" value="Xác nhận"></td>
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




