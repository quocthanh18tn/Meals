<?php
include "../../connection.php";
?>
<?php
if(isset($_POST['select_time']))
{
  $select_time=$_POST['select_time'];
  $select_mode=$_POST['select_mode'];
  $start=$_POST['start'];
  $end=$_POST['end'];
  switch ($select_time)
  {
    case "this_week":
      $weekday = date("l");
      $day =date('Y-m-d');
      switch($weekday)
      {
          case 'Monday':
              $start = $day;
              $end = strtotime($day);
              $end = $end+86400*6;
              $end = date('Y-m-d',$end);
              break;
          case 'Tuesday':
              $start = strtotime($day);
              $start = $start -86400;
              $start = date('Y-m-d',$start);
              $end = strtotime($day);
              $end = $end+86400*5;
              $end = date('Y-m-d',$end);
              break;
          case 'Wednesday':
              $start = strtotime($day);
              $start = $start -86400*2;
              $start = date('Y-m-d',$start);
              $end = strtotime($day);
              $end = $end+86400*4;
              $end = date('Y-m-d',$end);
              break;
          case 'Thursday':
              $start = strtotime($day);
              $start = $start -86400*3;
              $start = date('Y-m-d',$start);
              $end = strtotime($day);
              $end = $end+86400*3;
              $end = date('Y-m-d',$end);
              break;
          case 'Friday':
              $start = strtotime($day);
              $start = $start -86400*4;
              $start = date('Y-m-d',$start);
              $end = strtotime($day);
              $end = $end+86400*2;
              $end = date('Y-m-d',$end);
              break;
          case 'Saturday':
              $start = strtotime($day);
              $start = $start -86400*5;
              $start = date('Y-m-d',$start);
              $end = strtotime($day);
              $end = $end+86400*1;
              $end = date('Y-m-d',$end);
              break;
          default:
              $start = strtotime($day);
              $start = $start -86400*6;
              $start = date('Y-m-d',$start);
              $end = $day;
              break;
        }
      break;
    case 'this_month':
      $start=date('Y-m-01');
      $month = date('m');
      $year = date('Y');
      $end = strtotime("{$year}-{$month}-01");
      $end = strtotime('-1 second', strtotime('+1 month', $end));
      $end = date('Y-m-d', $end);
      break;
    default:
      break;
  }
}
?>
        <div>
           <p style="text-align: right;"><input type="button" name="in" onclick="In_Content('print')" value="IN BẢNG" style="margin-top: 30px" class="btn btn-primary"></p>
        </div>
        <fieldset>
        <article class="content" id="print">
        <h2 id="ten_bang" style="text-align: center;">BẢNG BÁO CÁO SỐ LƯỢNG PHẦN ĂN</h2>
          <div>
              <p>NGÀY BẮT ĐẦU: <?php echo $start; ?></p>
          </div>
              <p></p>
          <div>
              <p>NGÀY KẾT THÚC: <?php echo $end; ?></p>
          </div>
              <p></p>
        <?php
          if ($select_mode=="normal")
          {
        ?>
          <div>
            <table class="table table-stripedauto" border="1" style="border-collapse: collapse;">
            <thead>
              <tr>
                <td width="225" bgcolor="#999999"><strong>NGÀY</strong></td>
                <td width="225" bgcolor="#999999"><strong>PHẦN ĂN CỦA NHÂN VIÊN</strong></td>
                <td width="225" bgcolor="#999999"><strong>PHẦN ĂN CỦA KHÁCH</strong></td>
                <td width="225" bgcolor="#999999"><strong>PHẦN ĂN CỦA SINH VIÊN</strong></td>
                <td width="225" bgcolor="#999999"><strong>TỔNG CỘNG</strong></td>
              </tr>
            </thead>
            <tbody>
        <?php
            $tongtatca_sang=0;
            $tongtatca_chieu=0;
            $tongtatca_tong=0;
            while ((strtotime($end) - strtotime($start))>=0)
            {
            $sql = mysql_query("SELECT ms FROM kiemtrachinh WHERE thoigian >= '$start 11:00:00' AND thoigian <= '$start 13:00:00' AND ms LIKE 'S%'");
            $tongsinhvien_sang = mysql_num_rows($sql);
            $sql = mysql_query("SELECT ms FROM kiemtrachinh WHERE thoigian >= '$start 16:00:00' AND thoigian <= '$start 18:00:00' AND ms LIKE 'S%'");
            $tongsinhvien_chieu = mysql_num_rows($sql);
            $sql = mysql_query("SELECT ms FROM kiemtrachinh WHERE thoigian >= '$start 11:00:00' AND thoigian <= '$start 13:00:00' AND ms LIKE 'V%'");
            $tongkhach_sang = mysql_num_rows($sql);
            $sql = mysql_query("SELECT ms FROM kiemtrachinh WHERE thoigian >= '$start 16:00:00' AND thoigian <= '$start 18:00:00' AND ms LIKE 'V%'");
            $tongkhach_chieu = mysql_num_rows($sql);
            $sql = mysql_query("SELECT ms FROM kiemtrachinh WHERE thoigian >= '$start 11:00:00' AND thoigian <= '$start 13:00:00'");
            $tong_sang = mysql_num_rows($sql);
            $sql = mysql_query("SELECT ms FROM kiemtrachinh WHERE thoigian >= '$start 16:00:00' AND thoigian <= '$start 18:00:00'");
            $tong_chieu = mysql_num_rows($sql);
            $tongnhanvien_sang = $tong_sang - $tongsinhvien_chieu - $tongkhach_sang;
            $tongnhanvien_chieu = $tong_chieu - $tongsinhvien_chieu - $tongkhach_chieu;
            $tong=$tong_sang+$tong_chieu;
            $tongtatca_sang+=$tong_sang;
            $tongtatca_chieu+=$tong_chieu;
            $tongtatca_tong+=$tong;
          ?>
              <tr>
                  <td>&nbsp;<?php echo "<p>$start</p>";?></td>
                  <td>&nbsp;<?php echo"<p>- Sáng: $tongnhanvien_sang </p><p> - Chiều: $tongnhanvien_chieu</p>";?></td>
                  <td>&nbsp;<?php echo"<p>- Sáng: $tongkhach_sang </p><p> - Chiều: $tongkhach_chieu</p>";?></td>
                  <td>&nbsp;<?php echo"<p>- Sáng: $tongsinhvien_sang </p><p> - Chiều: $tongsinhvien_chieu</p>";?></td>
                  <td>&nbsp;<?php echo"<p>- Sáng: $tong_sang </p><p> - Chiều: $tong_chieu </p><p> - Tổng: $tong</p>"  ;?></td>
              </tr>
            <?php
              $start=strtotime($start)+86400;
              $start=date('Y-m-d',$start);
            }
            ?>
            </tbody>
            <tr>
            <td>
            - Tổng suất ăn:
            </td>
            <td colspan="4" ">
             - Buổi sáng: <?php echo $tongtatca_sang ?>
            <br>
            - Buổi chiều: <?php echo $tongtatca_chieu ?>
            <br>
            - Tất cả: <?php echo $tongtatca_tong ?>
           </td>
            </tr>

          </table>
          </div>
              <p></p>
        <?php

          }
          else
          {
            ?>
               <div>
            <table class="table table-stripedauto" border="1" style="border-collapse: collapse;">
            <thead>
              <tr>
                <td width="225" bgcolor="#999999"><strong>NGÀY</strong></td>
                <td width="225" bgcolor="#999999"><strong>SỐ LƯỢNG</strong></td>
                <td width="225" bgcolor="#999999"><strong>MÃ SỐ</strong></td>
                <td width="225" bgcolor="#999999"><strong>HỌ TÊN</strong></td>
                <td width="225" bgcolor="#999999"><strong>THỜI GIAN</strong></td>
              </tr>
            </thead>
            <tbody>
            <?php
            $tongtatca_sang=0;
            $tongtatca_chieu=0;
            $tongtatca_tong=0;

            while ((strtotime($end) - strtotime($start))>=0)
            {
            $sql1= mysql_query("SELECT ms FROM kiemtrachinh WHERE thoigian >= '$start 11:00:00' AND thoigian <= '$start 13:00:00' AND ms LIKE 'S%'");
            $tongsinhvien_sang = mysql_num_rows($sql1);
            $sql2 = mysql_query("SELECT ms FROM kiemtrachinh WHERE thoigian >= '$start 16:00:00' AND thoigian <= '$start 18:00:00' AND ms LIKE 'S%'");
            $tongsinhvien_chieu = mysql_num_rows($sql2);
            $sqlsinhvien= mysql_query("SELECT kiemtrachinh.ms,hoten,thoigian FROM kiemtrachinh INNER JOIN nhanvien ON kiemtrachinh.ms=nhanvien.ms WHERE thoigian >= '$start 11:00:00' AND thoigian <= '$start 20:59:00'");

            $sql3 = mysql_query("SELECT ms FROM kiemtrachinh WHERE thoigian >= '$start 11:00:00' AND thoigian <= '$start 13:00:00' AND ms LIKE 'V%'");
            $tongkhach_sang = mysql_num_rows($sql3);
            $sql4 = mysql_query("SELECT ms FROM kiemtrachinh WHERE thoigian >= '$start 16:00:00' AND thoigian <= '$start 18:00:00' AND ms LIKE 'V%'");
            $tongkhach_chieu = mysql_num_rows($sql4);
            $sql5 = mysql_query("SELECT ms FROM kiemtrachinh WHERE thoigian >= '$start 11:00:00' AND thoigian <= '$start 13:00:00'");
            $tong_sang = mysql_num_rows($sql5);
            $sql6 = mysql_query("SELECT ms FROM kiemtrachinh WHERE thoigian >= '$start 16:00:00' AND thoigian <= '$start 18:00:00'");
            $tong_chieu = mysql_num_rows($sql6);
            $tongnhanvien_sang = $tong_sang - $tongsinhvien_chieu - $tongkhach_sang;
            $tongnhanvien_chieu = $tong_chieu - $tongsinhvien_chieu - $tongkhach_chieu;
            $tong=$tong_sang+$tong_chieu;
             $tongtatca_sang+=$tong_sang;
            $tongtatca_chieu+=$tong_chieu;
            $tongtatca_tong+=$tong;
            $start_temp=0;
                while($array=mysql_fetch_array($sqlsinhvien))
                {

          ?>

              <tr>
                  <?php
                   if($start!=$start_temp)
                  {
                     ?>
                  <td>&nbsp;<?php echo "<p>$start</p>";?></td>
                  <td>&nbsp;<?php echo"- Sáng:<br> + Nhân viên: $tongnhanvien_sang <br> + Khách: $tongkhach_sang <br> + Sinh viên: $tongsinhvien_sang<br> - Chiều: <br> + Nhân viên: $tongnhanvien_chieu<br> + Khách: $tongkhach_chieu<br> + Sinh viên: $tongsinhvien_chieu";?></td>
                  <td>&nbsp;<?php echo $array[0];?></td>
                  <td>&nbsp;<?php echo $array[1];?></td>
                  <td>&nbsp;<?php echo $array[2]  ;?></td>
              </tr>
                  <?php
                  }
                  else
                  {
                      ?>
                      <td></td>
                      <td></td>
                      <td>&nbsp;<?php echo $array[0];?></td>
                  <td>&nbsp;<?php echo $array[1];?></td>
                  <td>&nbsp;<?php echo $array[2]  ;?></td>
              </tr>
                      <?php
                  }

            $start_temp=$start;
                }
              $start=strtotime($start)+86400;
              $start=date('Y-m-d',$start);
            }
            ?>
            </tbody>
            <tr>
            <td>
            - Tổng suất ăn:
            </td>
            <td colspan="4" ">
            - Buổi sáng: <?php echo $tongtatca_sang ?>
            <br>
            - Buổi chiều: <?php echo $tongtatca_chieu ?>
            <br>
            - Tất cả: <?php echo $tongtatca_tong ?>
            </td>
            </tr>

          </table>
          </div>
              <p></p>
        <?php
          }
        ?>
        <p style="text-align: right;">Ngày in: <?php echo date('Y-m-d H:i:s');?></p>