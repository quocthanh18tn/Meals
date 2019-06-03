<?php
include "../../connection.php";
include "../../Library/PHPExcel.php";
if (($_POST['dongy'])==1)

{
  $select_time=$_POST['select_time'];
  $select_mode=$_POST['select_mode'];
  $start=$_POST['start'];
  $end=$_POST['end'];
?>
  <script>
    window.open('report_ajax_excel.php?select_time=<?php echo $select_time?>&select_mode=<?php echo $select_mode ?>&start=<?php echo $start ?>&end=<?php echo $end?>&dongy=1', '_blank');
  </script>
<?php
}
?>
<?php
if (($_GET['dongy'])==1)
{
{
  $select_time=$_GET['select_time'];
  $select_mode=$_GET['select_mode'];
  $start=$_GET['start'];
  $end=$_GET['end'];
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
    case 'this_day':
      $start =date('Y-m-d');
      $end =date('Y-m-d');
    default:
      break;
  }
          if ($select_mode=="normal")
    {
            $objExcel = new PHPExcel;
            $objExcel->setActiveSheetindex(0);
            $sheet = $objExcel -> getActiveSheet() ->setTitle('sheet1');
            $rowCount =1;
            $sheet ->setCellValue('A'.$rowCount,'Ngày bắt đầu');
            $sheet ->setCellValue('B'.$rowCount,'Ngày kết thúc');
            $rowCount =2;
            $sheet ->setCellValue('A'.$rowCount,$start);
            $sheet ->setCellValue('B'.$rowCount,$end);
            $rowCount=3;
            $sheet ->setCellValue('A'.$rowCount,'NGÀY');
            $sheet ->setCellValue('B'.$rowCount,'PHẦN ĂN CỦA NHÂN VIÊN');
            $sheet ->setCellValue('C'.$rowCount,'PHẦN ĂN CỦA KHÁCH');
            $sheet ->setCellValue('D'.$rowCount,'PHẦN ĂN CỦA SINH VIÊN');
            $sheet ->setCellValue('E'.$rowCount,'TỔNG CỘNG');
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
            $rowCount=$rowCount+1;

            $sheet ->setCellValue('A'.$rowCount,$start);
            $sheet ->setCellValue('B'.$rowCount,"Sáng: $tongnhanvien_sang");
            $sheet ->setCellValue('C'.$rowCount,"Sáng: $tongkhach_sang");
            $sheet ->setCellValue('D'.$rowCount,"Sáng: $tongsinhvien_sang");
            $sheet ->setCellValue('E'.$rowCount,"Sáng: $tong_sang");
            $rowCount=$rowCount+1;
            $sheet ->setCellValue('B'.$rowCount,"Chiều: $tongnhanvien_chieu");
            $sheet ->setCellValue('C'.$rowCount,"Chiều: $tongkhach_chieu");
            $sheet ->setCellValue('D'.$rowCount,"Chiều: $tongsinhvien_chieu");
            $sheet ->setCellValue('E'.$rowCount,"Chiều: $tong_chieu");
            $rowCount=$rowCount+1;
            $sheet ->setCellValue('E'.$rowCount,"Tổng: $tong");
              $start=strtotime($start)+86400;
              $start=date('Y-m-d',$start);
            }
            $rowCount=$rowCount+1;
            $sheet ->setCellValue('A'.$rowCount,"Tổng suất ăn:");
            $sheet ->setCellValue('B'.$rowCount,"Sáng: $tongtatca_sang");
            $sheet ->setCellValue('C'.$rowCount,"Chiều: $tongtatca_chieu");
            $sheet ->setCellValue('D'.$rowCount,"Tất cả: $tongtatca_tong");
            $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
            $filename = "Excel_Thong_thuong.xlsx";
            $objWriter -> save($filename);
            ob_end_clean();
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
            header('Content-Length: ' . filesize($filename));
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate');
            header('Pragma: no-cache');
            readfile($filename);
            ob_end_clean();
    }
    else
        {
            $objExcel = new PHPExcel;
            $objExcel->setActiveSheetindex(0);
            $sheet = $objExcel -> getActiveSheet() ->setTitle('sheet1');
            $rowCount =1;
            $sheet ->setCellValue('A'.$rowCount,'Ngày bắt đầu');
            $sheet ->setCellValue('B'.$rowCount,'Ngày kết thúc');
            $rowCount =2;
            $sheet ->setCellValue('A'.$rowCount,$start);
            $sheet ->setCellValue('B'.$rowCount,$end);
            $rowCount=3;
            $sheet ->setCellValue('A'.$rowCount,'NGÀY');
            $sheet ->setCellValue('B'.$rowCount,'SỐ LƯỢNG');
            $sheet ->setCellValue('C'.$rowCount,'CHI TIẾT');
            $tongtatca_sang=0;
            $tongtatca_chieu=0;
            $tongtatca_tong=0;

            while ((strtotime($end) - strtotime($start))>=0)
            {
            $sql1= mysql_query("SELECT ms FROM kiemtrachinh WHERE thoigian >= '$start 11:00:00' AND thoigian <= '$start 13:00:00' AND ms LIKE 'S%'");
            $tongsinhvien_sang = mysql_num_rows($sql1);
            $sql2 = mysql_query("SELECT ms FROM kiemtrachinh WHERE thoigian >= '$start 16:00:00' AND thoigian <= '$start 18:00:00' AND ms LIKE 'S%'");
            $tongsinhvien_chieu = mysql_num_rows($sql2);
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
            $rowCount=$rowCount+1;
            $rowtemp=$rowCount;
            $sql= mysql_query("SELECT kiemtrachinh.ms,hoten,thoigian FROM kiemtrachinh INNER JOIN nhanvien ON kiemtrachinh.ms=nhanvien.ms WHERE thoigian >= '$start 11:00:00' AND thoigian <= '$start 23:59:00' ORDER BY thoigian asc" );
            $sheet ->setCellValue('A'.$rowCount,$start);
            $sheet ->setCellValue('B'.$rowtemp,"Sáng:");
            $rowtemp=$rowtemp+1;
            $sheet ->setCellValue('B'.$rowtemp,"Nhân viên: $tongnhanvien_sang");
            $rowtemp=$rowtemp+1;
            $sheet ->setCellValue('B'.$rowtemp,"Khách: $tongkhach_sang");
            $rowtemp=$rowtemp+1;
            $sheet ->setCellValue('B'.$rowtemp,"Sinh viên: $tongsinhvien_sang");
            $rowtemp=$rowtemp+1;
            $sheet ->setCellValue('B'.$rowtemp,"Chiều:");
           $rowtemp=$rowtemp+1;
            $sheet ->setCellValue('B'.$rowtemp,"Nhân viên: $tongnhanvien_chieu");
            $rowtemp=$rowtemp+1;
            $sheet ->setCellValue('B'.$rowtemp,"Khách: $tongkhach_chieu");
            $rowtemp=$rowtemp+1;
            $sheet ->setCellValue('B'.$rowtemp,"Sinh viên: $tongsinhvien_chieu");
            $rowtemp=$rowtemp+1;
            $sheet ->setCellValue('B'.$rowtemp,"Tổng tất cả: $tong");
            $rowtemp=$rowtemp+1;
                $buoi_previus= "";
                $buoi='';
            $rowtemp=$rowCount;
                while($array=mysql_fetch_array($sql))
                {
                  $time=strtotime($array[2]);
                  $time=getdate($time);
                  $time_hours=$time['hours'];
                  $time_minus=$time['minutes'];
                  $time_total="$time_hours:$time_minus:00";
                  if (strtotime($time_total)>strtotime("13:00:00"))
                    $buoi="Chiều";
                  else
                    $buoi="Sáng";
                  if (($buoi=="Chiều") && ($buoi_previus=="Sáng"))
                  {
                  $sheet ->setCellValue('C'.$rowtemp,"TỔNG SÁNG: $tong_sang");
                  $rowtemp+=1;
                    // echo"<tr><td colspan='4' style='color:red;font-weight:bold;font-size:20px'>TỔNG SÁNG: $tong_sang</td></tr>";
                  }
                  $buoi_previus=$buoi;
                  $sheet ->setCellValue('C'.$rowtemp,"$array[0] ");
                  $sheet ->setCellValue('D'.$rowtemp,"$array[1]");
                  $sheet ->setCellValue('E'.$rowtemp,"$array[2]");
                  $sheet ->setCellValue('F'.$rowtemp,"$buoi");
                  $rowtemp=$rowtemp+1;
                 }
                 if ($tong_chieu!=0)
                  $sheet ->setCellValue('C'.$rowtemp,"TỔNG CHIỀU: $tong_chieu");
              $start=strtotime($start)+86400;
              $start=date('Y-m-d',$start);
              $rowCount=$rowtemp+1;
            }
            $sheet ->setCellValue('A'.$rowCount,"Tổng suất ăn:");
            $sheet ->setCellValue('B'.$rowCount,"Sáng: $tongtatca_sang");
            $sheet ->setCellValue('C'.$rowCount,"Chiều: $tongtatca_chieu");
            $sheet ->setCellValue('D'.$rowCount,"Tất cả: $tongtatca_tong");
            $objExcel->getActiveSheet()->mergeCells('C3:F3');
            $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
            $filename = "Excel_Chi_tiet.xlsx";
            $objWriter -> save($filename);
            ob_end_clean();
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
            header('Content-Length: ' . filesize($filename));
            header('Content-Transfer-Encoding: binary');
            header('Cache-Control: must-revalidate');
            header('Pragma: no-cache');
            readfile($filename);
            ob_end_clean();


          }
}
}
?>