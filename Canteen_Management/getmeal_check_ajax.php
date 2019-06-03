<?php
include "../connection.php";
?>
<?php
if (isset($_POST['ms']))
{
	$ms = $_POST['ms'];
	$kiemtra_in_hoa=substr($ms,0,1);
	$day = date('Y-m-d');
	$sql_check_status_nhanvien="SELECT * from nhanvien_khongnhanphanan where ms='$ms' and  (lydo ='3' or ngay='$day')";
	$query=mysql_query($sql_check_status_nhanvien);
	$num_check_status=mysql_num_rows($query);
	if ($kiemtra_in_hoa=='s'||$kiemtra_in_hoa=='v') //do database không phân biệt được hoa, thường
		{
			$trangthai_code=4;
			$trangthai = "KHÔNG TÌM THẤY THÔNG TIN CỦA BẠN";
		}

	else if ( $num_check_status>0)
		{
			$check_date=mysql_fetch_array($query);
			$loai=$check_date['lydo'];
			$date=$check_date['ngay'];
			if ($loai==3)
			{
				$trangthai_code=4;
				$trangthai = "NHÂN VIÊN $ms ĐÃ NGHỈ VIỆC TẠI CÔNG TY";
			}
			else if (strtotime($date)==strtotime($day))
			{
				$trangthai_code=4;
				$trangthai = "NHÂN VIÊN $ms KHÔNG THỂ NHẬN PHẦN ĂN";
			}
		}
	else

	{
		$ngoaile = $_POST['ngoaile'];
		$dt =date('Y-m-d H:i:s');
		$day = date('Y-m-d');
		$sql = mysql_query("SELECT * FROM nhanvien WHERE ms ='$ms'");

	 	if (mysql_num_rows($sql)==1)
			{
				$tt = mysql_fetch_array($sql);
				$hoten=$tt['hoten'];
				$maloai=$tt['maloai'];
				$ngaybatdau=$tt['start'];
				$ngayketthuc=$tt['finish'];
				if ($maloai!='1')//kiem tra khach va sinh vien con thoi gian hay khong
				{
					 if((strtotime($ngayketthuc)-strtotime(date('Y-m-d')))>=0) $flag = 1;
					 else
					 {
					 	$flag=0;
					 	$trangthai_code=5;
					 	$trangthai="MÃ QR ĐÃ HẾT HẠN SỬ DỤNG";
					 }
				}
				else $flag = 1;//neu ma so loai khac 1 thi luon luon cho nhan phan an
				if ($flag==1)
				{
					if (((strtotime($dt)-strtotime(date('Y-m-d 12:00:00')))>=0)&&((strtotime($dt)-strtotime(date('Y-m-d 12:45:00')))<=0))
						{

							$sql = mysql_query("SELECT * FROM kiemtraphu WHERE ms ='$ms' AND thoigian >='$day 12:00:00' AND thoigian <= '$day 12:45:00'");
							if (mysql_num_rows($sql)==0||$ngoaile==1)
							{
								$sql = mysql_query("INSERT INTO kiemtraphu (ms,thoigian) VALUES ('$ms','$dt')");
								$sql = mysql_query("INSERT INTO kiemtrachinh (ms,thoigian) VALUES ('$ms','$dt')");
								$trangthai = "NHẬN PHẦN ĂN THÀNH CÔNG";
								$trangthai_code = 1;

							}
							else {$trangthai = "BẠN ĐÃ NHẬN PHẦN ĂN RỒI";$trangthai_code = 2;};

						}
					elseif (((strtotime($dt)-strtotime(date('Y-m-d 16:45:00')))>=0)&&((strtotime($dt)-strtotime(date('Y-m-d 17:15:00')))<=0))
						{
							$sql = mysql_query("SELECT * FROM kiemtraphu WHERE ms ='$ms' AND thoigian >='$day 16:45:00' AND thoigian <= '$day 17:15:00'");
							if (mysql_num_rows($sql)==0||$ngoaile==1)
							{
								$sql = mysql_query("INSERT INTO kiemtraphu (ms,thoigian) VALUES ('$ms','$dt')");
								$sql = mysql_query("INSERT INTO kiemtrachinh (ms,thoigian) VALUES ('$ms','$dt')");
								$trangthai = "NHẬN PHẦN ĂN THÀNH CÔNG";
								$trangthai_code = 1;

							}
							else {$trangthai = "BẠN ĐÃ NHẬN PHẦN ĂN RỒI";$trangthai_code = 2;};
						}
					else {$trangthai = "CHƯA ĐẾN GIỜ NHẬN PHẦN ĂN";$trangthai_code = 3;}
				}
			}
		else {$trangthai = "KHÔNG TÌM THẤY THÔNG TIN CỦA BẠN";$trangthai_code = 4;}
		//kiem tra so phan an da duoc phat
		if (((strtotime($dt)-strtotime(date('Y-m-d 12:00:00')))>=0)&&((strtotime($dt)-strtotime(date('Y-m-d 12:45:00')))<=0))
			{

				$sql = mysql_query("SELECT * FROM kiemtraphu WHERE thoigian >='$day 12:00:00' AND thoigian <= '$day 12:45:00'");
				$tong_phan_an = mysql_num_rows($sql);
			}
		elseif (((strtotime($dt)-strtotime(date('Y-m-d 16:45:00')))>=0)&&((strtotime($dt)-strtotime(date('Y-m-d 17:15:00')))<=0))
			{
				$sql = mysql_query("SELECT * FROM kiemtraphu WHERE thoigian >='$day 16:45:00' AND thoigian <= '$day 17:15:00'");
				$tong_phan_an = mysql_num_rows($sql);
			}
		else $tong_phan_an = 0;
	}
}
?>


<fieldset style="clear: left;<?php if ($trangthai_code==2||$trangthai_code==4||$trangthai_code==5) echo 'background-color: red;';?>">
			<p style="text-align: right;font-size: 20px;font-weight: bold;">Thời gian quét: <?php echo date('Y-m-d H:i:s');?></p>
	    	<p style="text-align: center;">
		    	<img style="border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 150px;" src='../Images/<?php
	                          if (file_exists("../Images/" .$ms.".jpg")) 
	                            echo "$ms.jpg";
	                          else echo "none.jpg";
	                          ?>'>
            </p>
            <h2>THÔNG TIN</h2>
            <br>	    	
	    		<div>
	    			<div style="width: 20%; float:left;"><input type="text" class="form-control" value="ID:" readonly></input></div>
					<div style="width: 80%; float:left;"><input type="text" class="form-control"  name="msnv" readonly value="<?php if(isset($_POST['ms'])&& $trangthai_code!=4) echo $ms; ?>"></input></div>
				</div>
				<div>
		            <div style="width: 20%; float:left;"><input type="text" class="form-control" value="TÊN:" readonly></input></div>
		          	<div style="width: 80%; float:left;"><input type="text" class="form-control"  name="hoten" readonly value="<?php if(isset($_POST['ms'])&& $trangthai_code!=4) echo $hoten ?>"></input></div>
		        </div>
				<div>
	    			<div style="width: 20%; float:left;"><input type="text" class="form-control" value="TRẠNG THÁI:" readonly></input></div>
					<div style="width: 80%; float:left;">
						<input type="text" class="form-control" readonly name ="status" value="<?php if(isset($_POST['ms'])) echo $trangthai; ?>" style="<?php
					if($trangthai_code==1) echo "background-color: green;color: black;";
					if($trangthai_code==2||$trangthai_code==4||$trangthai_code==5) echo "color: black;";
					if($trangthai_code==3) echo "background-color: yellow;color: black;";
					?>"></input></div>
				</div>
				<br>
    	</fieldset>
    	<h2 style="text-align: center;font-weight: bold;"><?php if ($tong_phan_an!=0) echo "TỔNG SỐ PHẦN ĂN ĐÃ ĐƯỢC PHÁT: $tong_phan_an"?></h2>
    	<?php if(isset($_POST['ms']))
    			{
					if($trangthai_code==1)
						{
						 	echo "<script>sound = new Audio();
							    sound.type= 'audio/mpeg';
							    sound.src='audio/success.wav';
							    sound.play();</script>";
						}
					if($trangthai_code==2||$trangthai_code==4||$trangthai_code==5)
						{
						 	echo "<script>sound = new Audio();
							    sound.type= 'audio/mpeg';
							    sound.src='audio/error.wav';
							    sound.play();</script>";
						}
					if($trangthai_code==3)
						{
							echo "<script>sound = new Audio();
							    sound.type= 'audio/mpeg';
							    sound.src='audio/error.wav';
							    sound.play();</script>";
						}
				}
		?>
