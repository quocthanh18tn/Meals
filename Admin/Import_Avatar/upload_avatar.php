<?php

if (isset($_POST) && !empty($_FILES['file'])) {
	$ms = $_POST['ms'];
    $duoi = explode('.', $_FILES['file']['name']); // tách chuỗi khi gặp dấu .
    $duoi = $duoi[(count($duoi) - 1)]; //lấy ra đuôi file
    // Kiểm tra xem có phải file ảnh không
    if ($duoi === 'jpg' || $duoi === 'png' || $duoi === 'gif'|| $duoi === 'jpeg') {
    	if (file_exists('../../Images/' .$ms.'.jpg'))//xóa ảnh cũ
    		unlink('../../Images/' .$ms.'.jpg');
        // tiến hành upload
        if (move_uploaded_file($_FILES['file']['tmp_name'], '../../Images/' . $_FILES['file']['name'])) {
            // Nếu thành công
          rename('../../Images/' .$_FILES['file']['name'],'../../Images/' . $ms.'.jpg');//đổi tên file lại
	         $files = glob('../../temp_Images/*'); // get all file names
				foreach($files as $file){ // iterate files
				  if(is_file($file))
				    unlink($file); // delete file
				}
          copy('../../Images/' . $ms.'.jpg','../../temp_Images/'. $ms.'.jpg');
          echo "<script>alert('Thành công!!!')</script>";
        } else { // nếu không thành công
            echo "<script>alert('Thất bại, vui lòng thử lại!!!')</script>"; // in ra thông báo
        }
    } else { // nếu không phải file ảnh
        die('Chỉ được upload ảnh'); // in ra thông báo
    }
} else {
    die('Lock'); // nếu không phải post method
}
?>