<?php
include "../connection.php";
?>

<?php
// session_start();
// if(isset($_SESSION['id_administration'])){
// echo "<script> var flag_login_admin=1;</script>";
// }
// else
// echo "<script> var flag_login_admin=0;</script>";

?>

<!DOCTYPE HTML>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Get Meal</title>
	<link rel="stylesheet" href="../Library/bootstrap-4.0.0-dist/css/bootstrap.min.css">
  	<link rel="stylesheet" href="../Library/w3.css">
  	<script src="../Library/sweetalert.min.js"></script>
  	<script src="../Library/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script>
		
		$(document).ready(function(){
		    $("#xacnhan").click(function(){
		     	var ms = $("#nhap_qrcode").val();
			  	var check = $("#check").val();
				$.ajax({
				url: 'getmeal_check_ajax_ngoaile.php',
				dataType: 'text',
				type: 'POST',
				data: {ms: ms},
				success: function( data){
					//kiem tra neu la truong hop ngoai le thi cho submit 
					//co 2 truong hop ngoai le:
					//-chua den gio an
					//-ma so cua quan ly cap cao duoc khai bao trong database thi duoc quet nhieu lan
					var ngoaile=data;
					
						if (ms != check || ngoaile=='1')
			   	{
			     	$.post("getmeal_check_ajax.php", {ms:ms,ngoaile:ngoaile}, function(data){$("#info").html(data);})
			     	if(ngoaile!='1') $("#check").val(ms);
			     	else $("#check").val("");
			     	$("#nhap_qrcode").val("");
			     	$("#nhap_qrcode").focus();
			  	}

			  	else
			  	{
			  		$("#nhap_qrcode").val("");
		     		$("#nhap_qrcode").focus();
			  	}
				},
				error: function (jqXHR, exception) {
			        var msg = '';
			        if (jqXHR.status === 0) {
			           	document.getElementById("info").innerHTML ="<p style='text-align: center;font-size: 50px;color:red;'>RỚT MẠNG, VUI LÒNG KIỂM TRA KẾT NỐI!!!</p>";
			              $("#nhap_qrcode").val("");
			     		  $("#nhap_qrcode").focus();
			        } else if (jqXHR.status == 404) {
			            msg = 'Requested page not found. [404]';
			            $('#info').html(msg);
			        } else if (jqXHR.status == 500) {
			            msg = 'Internal Server Error [500].';
			            $('#info').html(msg);
			        } else if (exception === 'parsererror') {
			            msg = 'Requested JSON parse failed.';
			            $('#info').html(msg);
			        } else if (exception === 'timeout') {
			            msg = 'Time out error.';
			            $('#info').html(msg);
			        } else if (exception === 'abort') {
			            msg = 'Ajax request aborted.';
			            $('#info').html(msg);
			        } else {
			            msg = 'Uncaught Error.\n' + jqXHR.responseText;
			            $('#info').html(msg);
			        }
			        
			    }
		}); // close ajax
		    });
		    $(document).keypress(function(event){
			  var keycode = (event.keyCode ? event.keyCode : event.which);
			  if (keycode == '13')
			  {
			   var ms = $("#nhap_qrcode").val();
			   var check = $("#check").val();
			   $.ajax({
				url: 'getmeal_check_ajax_ngoaile.php',
				dataType: 'text',
				type: 'POST',
				data: {ms: ms},
				success: function( data){
					//kiem tra neu la truong hop ngoai le thi cho submit 
					//co 2 truong hop ngoai le:
					//-chua den gio an
					//-ma so cua quan ly cap cao duoc khai bao trong database thi duoc quet nhieu lan
					var ngoaile=data;
					
						if (ms != check ||ngoaile=='1')
			   	{
			     	$.post("getmeal_check_ajax.php", {ms:ms,ngoaile:ngoaile}, function(data){$("#info").html(data);})
			     	if(ngoaile!='1') $("#check").val(ms);
			     	else $("#check").val("");
			     	$("#nhap_qrcode").val("");
			     	$("#nhap_qrcode").focus();
			  	}
			  	else
			  	{
			  		$("#nhap_qrcode").val("");
		     		$("#nhap_qrcode").focus();
			  	}
				},
				error: function (jqXHR, exception) {
			        var msg = '';
			        if (jqXHR.status === 0) {
			           	document.getElementById("info").innerHTML ="<p style='text-align: center;font-size: 50px;color:red;'>RỚT MẠNG, VUI LÒNG KIỂM TRA KẾT NỐI!!!</p>";
			              $("#nhap_qrcode").val("");
			     		  $("#nhap_qrcode").focus();
			        } else if (jqXHR.status == 404) {
			            msg = 'Requested page not found. [404]';
			            $('#info').html(msg);
			        } else if (jqXHR.status == 500) {
			            msg = 'Internal Server Error [500].';
			            $('#info').html(msg);
			        } else if (exception === 'parsererror') {
			            msg = 'Requested JSON parse failed.';
			            $('#info').html(msg);
			        } else if (exception === 'timeout') {
			            msg = 'Time out error.';
			            $('#info').html(msg);
			        } else if (exception === 'abort') {
			            msg = 'Ajax request aborted.';
			            $('#info').html(msg);
			        } else {
			            msg = 'Uncaught Error.\n' + jqXHR.responseText;
			            $('#info').html(msg);
			        }
			        
			    }
		}); // close ajax
			  }
			  //khong cho phep nhap tu ban phim
			  //else if(flag_login_admin==0)
			  else
			  	{
			  		setTimeout(function(){
			     		// if($("#nhap_qrcode").val().length <4)
					     	$("#nhap_qrcode").val("");
			     	},200);
			  		
			  	}

			});
			//jQuery(document).on('paste', function(e){ alert('pasting!') });
			$("#nhap_qrcode").bind('paste', function() {
			    location.reload();
			});	
			$(document).mouseup(function() {
				  $("#nhap_qrcode").focus();
				});

		});

</script>
	<style type="text/css">
body {
    font-family: helvetica;
}
form div{
   margin-bottom: 25px ;
}

fieldset {
	border:  1px solid #999;
	border-radius: 8px;
	box-shadow: 0 0 10px #999;
}
h1{
  text-align: center;
  font-weight: bold;
  font-size: 40px;
  background: lightblue;
}
h2{
  text-align: left;
  font-weight: bold;
  font-size: 30px;
  height: 30px;
  padding: 10px;
}

legend {
	font-size: 22px;
	font-weight: bold;
}
#webcodecam-canvas, #scanned-img {
    background-color: #2d2d2d;
}
.form-control
	{
		font-size: 20px;
		font-weight: bold;
	}

	</style>
</head>
<body>
    	<div>
    		<h1 id="ten">GIÁM SÁT PHẦN ĂN</h1>
    	</div>
    	<div>
			<div style="width: 20%; float:left;"><input type="text" class="form-control" name="nhap_qrcode" id="nhap_qrcode" autofocus placeholder="Nhập mã QR..." style="font-size: 17px;"></div>
			<input type="button" name="xacnhan" style="float: left;" id="xacnhan" value="XÁC NHẬN" class="btn btn-primary">
			<input type="text" name="check"  id="check" style="display: none;">
			<p style="text-align: right;margin-top: 2%;"><a href="../index.php"  id="lib-thanh-logout" style="color: green;font-size: 25px;margin-right: 1%;text-decoration: underline;">Trang chính</a></p>
    	</div>
    	<br>
    	<br>

    <div id ="info"></div>

</body>
</html>

