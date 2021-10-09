
function delLine(lineID,idthis){
    
    var url = "todolist-db.php?option=DelId&id="+lineID;
   // alert(url)
    //var htmlObj = $.ajax({url:url,async:false});
    var rsl = $.ajax({
        url: url,
        async:false
    });
    var rsl1 = rsl.responseText;
    //alert(rsl1)
    if(rsl1=="OK"){
        var row = idthis.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
    //alert(currentRow.id);
}
function enter(e, nextfield, prvfield) {
	evt = e || window.event;

	if(evt && evt.keyCode == 13){
		var fld = document.getElementById(nextfield);
		if (fld!=null) fld.focus();
		return false; 
	}else if(evt && evt.keyCode == 38){
		var fld = document.getElementById(prvfield);
 		if (fld!=null) fld.focus();
		return false; 
	}else {return true; } 
}
function popupDiv1(){
	var popup = document.createElement("div");
	popup.id="testpop1";
    //
    popup.style = "opacity: 0.2; position:absolute; width:100%; height:100%; top:0; left:0; text-align:center; border-radius: 10px;  box-shadow: 0px 0px 10px 0px black;";
    //popup.innerHTML="<div><a href='#' onClick='closepp();'>X</a></div> <br>HELLO sdvd wrhr hrh"
    popup.style.opacity = 0.2;
    document.body.appendChild(popup)
}
function popAddNew(){
    var todayDate = new Date().toISOString().slice(0, 10);
    //console.log(todayDate);
	popupDiv1();
	var popup = document.createElement("div");
	popup.id="testpop";
    
    popup.style = "position:absolute; width:50%; height:50%; top:25%; left:25%; text-align:center; border-radius: 10px; background:rgb(240,240,240); box-shadow: 0px 0px 10px 0px black;";
    var str = "<div><a href='#' onClick='closepp();'>X</a></div>";
    str += "<h1>ADD NEW</h1>";
    //str += "<div name=\"divkey\" style=\"width:90%;\" class='myLayersClassv'>";
    str += "<form name=\"frm1\" id=\"frm1\" onsubmit=\"return validateForm()\" method=\"POST\">";
    str += "<table border=0 width=\"90%\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\">";
    str += "<tr>";
    str += "    <td class=\"lbl\" width=50 align=\"right\">Date: </td>";
    str += "    <td><input type=\"text\" name=\"datepicker\" id=\"datepicker\" onKeydown=\"return enter(event,'task','datepicker')\"  size=7 value='"+todayDate+"'></td>";
    str += "</tr>";
    str += "<tr>";
    str += "    <td class=\"lbl\" width=50 align=\"right\">Task: </td>";
    str += "    <td><input type=\"text\" name=\"task\" id=\"task\" onKeydown=\"return enter(event,'','datepicker')\" size=60></td>";
    str += "</tr>"; 
    str += "</table>";
    str +="<button name='save' class=\"button button2\">SAVE</button>";
    str +="<button name='close' class=\"button button3\" onClick='return closepp();'>CLOSE</button>";
    str += "</form>";
    
   // str += "</div>";

    
    popup.innerHTML = str;
    document.body.appendChild(popup)
    document.getElementById("datepicker").select();
}
function validateForm(){
    
    var ddt = document.getElementById("datepicker").value;
    if(ddt=="") {
        alert("Please enter a date")
        document.getElementById("datepicker").focus();
        return false;
    }

    var des = document.getElementById("task").value;
    if(des=="") {
        alert("Please enter a Task")
        document.getElementById("task").focus();
        return false;
    }
}
function popEditNew(editID,idthis){
    
    //var todayDate = new Date().toISOString().slice(0, 10);
    //console.log(todayDate);
	popupDiv1();
	var popup = document.createElement("div");
	
    var row = idthis.parentNode.parentNode;
    var id = row.cells[0].innerHTML;
    //alert(id);
    var date = row.cells[1].innerHTML;
    var task = row.cells[2].innerHTML;
    popup.style = "position:absolute; width:50%; height:50%; top:25%; left:25%; text-align:center; border-radius: 10px; background:rgb(240,240,240); box-shadow: 0px 0px 10px 0px black;";
    

    var str = "<div><a href='#' onClick='closepp();'>X</a></div>";
    
    str += "<h1>EDIT RECORD</h1>";
    //str += "<div name=\"divkey\" style=\"width:90%;\" class='myLayersClassv'>";
    str += "<form name=\"frm1\" id=\"frm1\" onsubmit=\"return validateForm()\" method=\"POST\">";
    str += "<input type='hidden' name='id' value='"+id+"'>";
    str += "<table border=0 width=\"90%\" align=\"center\" cellpadding=\"3\" cellspacing=\"0\">";
    str += "<tr>";
    str += "    <td class=\"lbl\" width=50 align=\"right\">Date: </td>";
    str += "    <td><input type=\"text\" name=\"datepicker\" id=\"datepicker\" onKeydown=\"return enter(event,'task','datepicker')\"  size=7 value='"+date+"'></td>";
    str += "</tr>";
    str += "<tr>";
    str += "    <td class=\"lbl\" width=50 align=\"right\">Task: </td>";
    str += "    <td><input type=\"text\" name=\"task\" id=\"task\" onKeydown=\"return enter(event,'','datepicker')\" value='"+task+"' size=60></td>";
    str += "</tr>"; 
    str += "</table>";
    str +="<button name='edit' class=\"button button2\">EDIT</button>";
    str +="<button name='close' class=\"button button3\" onClick='return closepp();'>CLOSE</button>";
    str += "</form>";
    //alert(editID)
   // str += "</div>";
    
    
    popup.innerHTML = str;
    document.body.appendChild(popup)
    document.getElementById(datepicker).focus();
    return false;
}

function closepp(){
	//alert("OK")
	var popup = document.getElementById("testpop");
	popup.remove(popup)
	var popup1 = document.getElementById("testpop1");
	popup1.remove(popup1)
    return false;
}
function chgStatus(obj){
    var row = obj.parentNode.parentNode;
    var id = row.cells[0].innerHTML;
   // alert(id);
    //alert(obj.value)

    var url = "todolist-db.php?option=chgStatus&id="+id+"&status="+obj.value;
    var rsl = $.ajax({
        url: url,
        async:false
    });
    var rsl1 = rsl.responseText;
    //alert(rsl1)
    //if(rsl1=="OK"){
    //}

}