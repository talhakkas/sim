function addRow(tableName) {
	var eNofBs = document.getElementById('nofbs');
	var nons = parseInt(eNofBs.value) + 1;
	eNofBs.setAttribute('value', nons);

	var table = document.getElementsByName(tableName).item(0);
	//var table = document.getElementByID(tableName);

	var rowCount = table.rows.length;

	// chk + textarea
	var row1 = table.insertRow(rowCount);

	var cell11 = row1.insertCell(0);
	var chk = document.createElement("input");
	cell11.setAttribute('class', 'label');
	chk.type = "checkbox";
	cell11.appendChild(chk);
	cell11.appendChild(document.createTextNode('Dal'));

	var cell12 = row1.insertCell(1);
	var txtarea = document.createElement("textarea");
	var chkIA = document.createElement('input');
	var txtIA = document.createElement('input');
	cell12.setAttribute('class', 'field');
	cell12.setAttribute('id', 'dal' + nons + 'field');

	txtarea.setAttribute('name', 'link_text[]');
	cell12.appendChild(txtarea);
	cell12.appendChild(document.createElement('br'));

	chkIA.setAttribute('type', 'checkbox');
	chkIA.setAttribute('name', 'chkIA[]');
	chkIA.setAttribute('id',   'chkIA' + nons);
	chkIA.setAttribute('value', nons);
	chkIA.setAttribute('checked', 'true');
	chkIA.setAttribute('onclick', "toggle(this, 'IA" + nons + "')");
	cell12.appendChild(chkIA);
	cell12.appendChild(document.createTextNode('Kullanıcı girdisi istiyor musun?'));
	cell12.appendChild(document.createElement('br'));

	txtIA.setAttribute('type', 'text');
	txtIA.setAttribute('name', 'IA[]');
	txtIA.setAttribute('id',   'IA' + nons);
	txtIA.setAttribute('style', 'visibility:visible;');
	cell12.appendChild(txtIA);

	// select
	var row2 = table.insertRow(rowCount+1);
	
	var cell21 = row2.insertCell(0);
	var im = document.createElement('img');
	cell21.setAttribute('class', 'label');
	im.setAttribute('src', '/public/img/sol-ok.png');
	im.setAttribute('width', '25');
	cell21.appendChild(im);

	var cell22 = row2.insertCell(1);
	var slct = document.getElementsByName("node_link[]").item(0).cloneNode(true);
	var btn = document.createElement('input');

	var cid = document.getElementById('cid').getAttribute('value');

	cell22.setAttribute('class', 'select');

	slct.setAttribute('id', 'select' + nons);
	cell22.appendChild(slct); 

	btn.setAttribute('type', 'button');
	btn.setAttribute('value', 'Yeni Düğüm');
	btn.setAttribute('onclick', "javascript:addNewListItem('select" + nons + "', " + cid + ");");
	cell22.appendChild(btn); 
}

function deleteRow(tableName) {
    try {
    var table = document.getElementsByName(tableName).item(0);
    //var table = document.getElementByID(tableName);
    var rowCount = table.rows.length;

    for(var i=0; i<rowCount; i++) {
	var row = table.rows[i];
	var chkbox = row.cells[0].childNodes[0];
	if(null != chkbox && true == chkbox.checked) {
	    table.deleteRow(i);
	    table.deleteRow(i);
	    rowCount--;
	    rowCount--;
	    i--;
	    i--;
	}

    }
    }catch(e) {
	alert(e);
    }
}

