function addRow(tableName) {

    var table = document.getElementsByName(tableName).item(0);
    //var table = document.getElementByID(tableName);

    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);

    var cell1 = row.insertCell(0);
    var element1 = document.createElement("input");
    element1.type = "checkbox";
    cell1.appendChild(element1);

    /*var cell2 = row.insertCell(1);
    cell2.innerHTML = rowCount + 1;

    var cell3 = row.insertCell(2);
    var element2 = document.createElement("input");
    element2.type = "text";
    cell3.appendChild(element2);*/

    var cell4 = row.insertCell(1);
    var element3 = document.getElementsByName("node_link[]").item(0).cloneNode(true);
    cell4.appendChild(element3);
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
	    rowCount--;
	    i--;
	}

    }
    }catch(e) {
	alert(e);
    }
}

