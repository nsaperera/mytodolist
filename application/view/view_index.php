<html>
<head>
<title>Simple TODO List</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel='stylesheet' href='css/mystyle.css' />
<style type="text/css">
input[type=text] {
	color: #000000; 
	border: 1px solid #d6d3ce; 
	background-color: #fbedbb;
	border-style:inset;
	border-color:336699;
	#color:FFFFFF;
}
</style>
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">-->
<!--  <link rel="stylesheet" href="/resources/demos/style.css">-->

<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/myjs.js"></script>
<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
  <script>
  //$( function() {
  //  $( "#datepicker" ).datepicker();
  //});
  function chgColor(tbRow, txtColor){ 
	tbRow.style.backgroundColor = txtColor;
}
  </script>
</head>
<br><br><br>
<body style="width:90%;margin:4 auto;" onload="//document.frm1.task.select();">


<h1>TODO LIST</h1>

    <div class='myLayersClassv'>
        <button class="button button2" onClick="popAddNew();">ADD NEW</button>
        <form name="frm1" id="frm1" method="POST">
        &nbsp;Filter Tasks: 
        <?php
            $selpending = "";
            if($this->objTask->seloption=="1") $selpending = "selected";
            $seldone = "";
            if($this->objTask->seloption=="0") $seldone = "selected";
        ?>
        <select name="seloption" id="seloption" onchange="this.form.submit()">
            <option value="all">ALL Tasks</option>
            <option value="1" <?php echo $selpending;?>>Pending Task</option>
            <option value="0" <?php echo $seldone;?>>Done List</option>
        </select>
        </form>
						<table id='lintbl' border='5' width='100%' align='center' cellpadding='5' cellspacing='0' 
								style='font-size:14px; border-collapse: collapse;'>
							<tr class='lbl'>
							<th width='5px' align='center'>ID</th>
							<th width='18%' align='center'>DATE</th>
							<th width='40%' align='center'>TASK</th>
							<th width='18%' align='center'>ACTIVE</th>
							<th width='18%' align='center'>ACTION</th></tr>
        
            <?php 
            $yesterday = date('Y-m-d',strtotime("-1 days"));
            $tomarrow = date('Y-m-d',strtotime("+1 days"));
            $str_tomarrow="";
            $str_today="";
            $str_yesterday="";
            $str_later="";
            foreach ($data["tasks"] as $task):
                $date = date('Y-m-d');
                if($task->task_ddt==$tomarrow && $str_tomarrow=="") {
                    $str_tomarrow = "<tr><td colspan=5><h1>TOMARROW</h1></td>";
                    echo $str_tomarrow;
                }
                if($task->task_ddt==$date && $str_today=="") {
                    $str_today = "<tr><td colspan=5><h1>TODAY</h1></td>";
                    echo $str_today;
                }
                if($task->task_ddt==$yesterday && $str_yesterday=="") {
                    $str_yesterday = "<tr><td colspan=5><h1>YESTERDAY</h1></td>";
                    echo $str_yesterday;
                }
                if($task->task_ddt<$yesterday && $str_later=="") {
                    $str_later = "<tr><td colspan=5><h1>PAST</h1></td>";
                    echo $str_later;
                }
                //$selActive = "";
                $selDone = "";
                if($task->task_active==0) $selDone = "selected";
                //else $selDone = "selected";

                echo "<tr class='a1' onmouseover=\"chgColor(this, '#FFA07A');\" onmouseout=\"chgColor(this, '#EEEEEE');\">
						<td align='center'>".$task->task_id."</td>
                        <td>".$task->task_ddt."</td>
                        <td align='left'>".$task->task_des."</td>
                        <td>
                            <select name='lineTaskStatus' id='lineTaskStatus' onchange='chgStatus(this)'>
                                <option value='1'>Active</option>
                                <option value='0' $selDone>Done</option>
                            </select>
                        </td>
						<td align='right'>
                            <button class='button_sm button2' onClick=\"return popEditNew(".$task->task_id.",this)\">EDIT</button>
                            <button class='button_sm button3' onClick=\"delLine(".$task->task_id.",this)\">DELETE</button></td></tr>";
            endforeach?>
                        </table>
                        
    </div>



