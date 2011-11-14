function addNewNode(slid, cid, resp, id)
{
	var htmlSelect=document.getElementById(slid);

	/* eger secilen option'un "value" degeri "new*" ile basliyorsa sil */
	var i;
	for (i = htmlSelect.length - 1; i>=0; i--) {
		if (htmlSelect.options[i].selected && htmlSelect.options[i].value.search("new-") != -1) {
			htmlSelect.remove(i);
		}
	}

	// yenisini ekle
	var selectBoxOption = document.createElement("option");
	
	selectBoxOption.value = "new-" + resp + "-" + id;
	selectBoxOption.text  = "new-" + resp + "-" + id;
	selectBoxOption.selected = true;
	htmlSelect.add(selectBoxOption, null);
}

function addNewListItem(slid, cid){
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp = new XMLHttpRequest();
	} else {// code for IE6, IE5
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange = function() {
	  if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		var htmlSelect=document.getElementById(slid);
		var selectBoxOption = document.createElement("option");

		selectBoxOption.value = parseInt(xmlhttp.responseText);
		selectBoxOption.text = "yeni dugum";
		selectBoxOption.selected = true;
		htmlSelect.add(selectBoxOption, null);
	  }
	 }

	xmlhttp.open("GET","/public/js/getNoNodes.php?cid="+cid,true);
	xmlhttp.send();

	return true;
}

/*function getNoNodes(cid)
{
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp = new XMLHttpRequest();
	} else {// code for IE6, IE5
	  xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange = function() {
	  if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		document.getElementById("NoNodes2").setAttribute("value", xmlhttp.responseText);
	  }

	xmlhttp.open("GET","/public/js/getNoNodes.php?cid="+cid,true);
	xmlhttp.send();
}*/
