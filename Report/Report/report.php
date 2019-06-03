<?php
include "../../connection.php";
?>
<?php
include "../../include/header.php";
include "../../include/menubar_report.php";

?>
	<script type="text/javascript">
        function In_Content(strid)
        {
            var prtContent = document.getElementById(strid);
            var WinPrint = window.open('','','resizable=1,letf=0,top=0,width=1000,height=1000');
            WinPrint.document.write(prtContent.innerHTML);
            WinPrint.document.close();
            WinPrint.focus();
            WinPrint.print();
        }


         $(document).ready(function()
         {
            $("#show").click(function(){
                var select_time =$("#select_time").val();
                var select_mode =$("#select_mode").val();
                var start = $("#start").val();
                var end = $("#end").val();

                $.post("report_ajax.php", {select_time:select_time,select_mode:select_mode,start:start,end:end}, function(data){$("#display").html(data);})

            })


            $("#select_time").change(function(){
               var mode = $("#select_time").val();
               if (mode=="start_end")
                {
                  document.getElementById("start").style.display="block";
                  document.getElementById("end").style.display="block";
                  document.getElementById("label_start").style.display="block";
                  document.getElementById("label_end").style.display="block";
                }
               else
                {
                  document.getElementById("start").style.display="none";
                  document.getElementById("end").style.display="none";
                  document.getElementById("label_start").style.display="none";
                  document.getElementById("label_end").style.display="none";
                }

            })
        })

	</script>

<br>

    <table>
        <head>
        <tr>
            <th>
            <div>
                <div><label for="select_time">Chọn thời gian</label></div>
                <div>
                  <select id="select_time" class="form-control">
                      <option value="this_day">Ngày hiện tại</option>
                      <option value="this_week">Tuần hiện tại</option>
                      <option value="this_month">Tháng hiện tại</option>
                      <option value="start_end">Ngày bắt đầu/Ngày kết thúc</option>
                  </select>
                </div>
            </div>
            </th>
            <th>
            <div>
                <div><label for="start" id ="label_start" style="display: none;">Ngày bắt đầu</label></div>
                <div><input type="date" id="start" class="form-control" style="display: none;"></input></div>
            </div>
            </th>
            <th>
            <div>
                <div><label for="end" id ="label_end" style="display: none;">Ngày kết thúc</label></div>
                <div><input type="date" id="end" class="form-control" style="display: none;"></input></div>
            </div>
            </th>
            <th>
            <div>
                <div><label for="select_mode">Chọn chế độ</label></div>
                <div>
                  <select id="select_mode" class="form-control">
                      <option value="normal">Thông thường</option>
                      <option value="detail">Chi tiết</option>
                  </select>
                </div>
            </div>
            </th>
            <th>
                <input type="button" id="show" value="LẤY BÁO CÁO" class="btn btn-primary" style="margin-top: 29px;">
            </th>
        </tr>
        </head>
        </table>
        <br>
        <br>
       <form method="post" action="">
        <div id="display"></div>
      </form>

</body>
</html>

