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
include "../../Library/PHPExcel.php";
include "../../connection.php";
include "../../include/header.php";
?>


<!-- code export sinh vien -->
<?php
if(isset($_POST['button1']))
{

  $objExcel = new PHPExcel;
  $objExcel->setActiveSheetindex(0);
  $sheet = $objExcel -> getActiveSheet() ->setTitle('sheet1');
  $rowCount =1;
  $sheet ->setCellValue('A'.$rowCount,'ID');
  $sheet ->setCellValue('B'.$rowCount,'Họ tên');
  $sheet ->setCellValue('C'.$rowCount,'Tên tổ chức');
  $sql=mysql_query("SELECT ms,hoten,tentochuc from nhanvien where ms like 'V%'");
  while($array=mysql_fetch_array($sql))
  {
    $ms=$array[0];
    $hoten=$array[1];
    $tentochuc=$array[2];
    // $result = mysql_query("SELECT mstu,mskhungtu FROM khungtu where mstu='$mstu'");
    // while($row = mysql_fetch_array($result))
      // {
        // $tenkhungtu=$row['tenkhungtu'];
        // $mskhungtu=$row['mskhungtu'];
        $rowCount++;
        $sheet ->setCellValue('A'.$rowCount,$ms);
        $sheet ->setCellValue('B'.$rowCount,$hoten);
        $sheet ->setCellValue('C'.$rowCount,$tentochuc);
        // $sheet ->setCellValue('D'.$rowCount,$row['tenkhungtu']);
        // $sheet ->setCellValue('E'.$rowCount,$row['mskhungtu']);

  }
  $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
  $filename = "ID-Khach.xlsx";
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
  echo "<script type='text/javascript'>alert('Export Success');
window.location='export.php';
</script>";
	}

?>
<?php
include "../../include/menubar_receptionist.php";
?>

</div>
 <form method="post" action="">
 				<br>
 				<br>
                <p style="text-align: center;font-size: 25px;font-weight: bold;">Xuất thông tin khách hàng</p>

                <input type = "submit" name="button1" value= "Xuất thông tin" class="btn btn-lg btn-primary" style="margin-left:42%;">
            </form>

      </body>
</html>
