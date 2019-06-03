<?php
include "../connection.php";
?>
<?php
$ms=$_POST['ms'];
$sql="SELECT ms FROM quanlyngoaile where ms='$ms'";
$query=mysql_query($sql);
$numrow=mysql_num_rows($query);
$dt_now =date('Y-m-d H:i:s');
$dt_trua=date('Y-m-d 12:00:00');
$dt_chieu=date('Y-m-d 16:45:00');
if ((strtotime($dt_now)<strtotime($dt_trua))||((strtotime($dt_now)>strtotime(date('Y-m-d 12:45:00')))&&(strtotime($dt_now)<strtotime($dt_chieu)))) $dieu_kien_thoi_gian =1;
else $dieu_kien_thoi_gian=0;
if (($numrow !=0)||($dieu_kien_thoi_gian==1))
echo '1';
else
echo '0';
?>