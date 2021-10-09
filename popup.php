<script>
function ss1(){
	var popup = document.createElement("div");
	 popup.id="testpop1";
    //
    popup.style = "opacity: 0.2; position:absolute; width:100%; height:100%; top:0; left:0; text-align:center; border-radius: 10px;  box-shadow: 0px 0px 10px 0px black;";
    //popup.innerHTML="<div><a href='#' onClick='closepp();'>X</a></div> <br>HELLO sdvd wrhr hrh"
    popup.style.opacity = 0.2;
    document.body.appendChild(popup)
}
function ss(){
	ss1();
	var popup = document.createElement("div");
	 popup.id="testpop";
    
    popup.style = "position:absolute; width:50%; height:50%; top:25%; left:25%; text-align:center; border-radius: 10px; background:rgb(240,240,240); box-shadow: 0px 0px 10px 0px black;";
    popup.innerHTML="<div><a href='#' onClick='closepp();'>X</a></div> <br>HELLO sdvd wrhr hrh"
    document.body.appendChild(popup)
}

function closepp(){
	//alert("OK")
	var popup = document.getElementById("testpop");
	popup.remove(popup)
	var popup1 = document.getElementById("testpop1");
	popup1.remove(popup1)
}
</script>
<body>
wefeargerg
<input type=button onclick="ss();">
</body>
