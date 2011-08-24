function addNewListItem(slid){
	var htmlSelect=document.getElementById(slid);

	var selectBoxOption = document.createElement("option");
	selectBoxOption.value = "yeni";
	selectBoxOption.text = "yeni dugum";
	selectBoxOption.selected = true;
	htmlSelect.add(selectBoxOption, null);

	return true;
}
