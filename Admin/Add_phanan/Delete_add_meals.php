<?php
include "../../connection.php";

?>

<?php
	$id=$_POST['id'];
    $date=$_POST['date'];
    $mode=$_POST['mode'];
    if ($mode=='1')
    {
      $sql2="DELETE  FROM kiemtrachinh where ms='$id' and thoigian like '$date%'and thoigian<='$date 12:45:00'";
      $sql1="DELETE  FROM kiemtraphu where ms='$id' and thoigian like '$date%'and thoigian<='$date 12:45:00'";
    }
    elseif ($mode=='2')
    {
      $sql2="DELETE  FROM kiemtrachinh where ms='$id' and thoigian like '$date%'and thoigian<='$date 17:15:00' and thoigian>='$date 16:45:00'";
      $sql1="DELETE  FROM kiemtraphu where ms='$id' and thoigian like '$date%'and thoigian<='$date 17:15:00' and thoigian>='$date 16:45:00'";
    }
  mysql_query($sql1);
  mysql_query($sql2);
   if ($mode=='1')
    {
      $sql="SELECT ms,thoigian FROM kiemtrachinh where ms='$id' and thoigian like '$date%'and thoigian<='$date 12:45:00'";
    }
    elseif ($mode=='2')
    {
      $sql="SELECT ms,thoigian FROM kiemtrachinh where ms='$id' and thoigian like '$date%'and thoigian<='$date 17:15:00' and thoigian>='$date 16:45:00'";
    }
    $query=mysql_query($sql);
    $num=mysql_num_rows($query);
    if ($num==0) echo 1;
    else echo 0;
 ?>