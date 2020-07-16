window.onload = function(){
	initLinkEdit();
};
function enableEdit(e){
	var parentElement = this.parentElement;
	while( !(parentElement.classList.contains("linha")) ){
		parentElement = parentElement.parentElement;
	};
	var inputName = parentElement.querySelector(".nameEdit");
	var inputShortCode = parentElement.querySelector(".shortcodeEdit");
	var inputCode = parentElement.querySelector(".codeEdit");
	var inputNameDisplay = parentElement.querySelector(".namedisplay");
	var buttonEdit = parentElement.querySelector(".buttonEdit");
	var rowActions = parentElement.querySelector(".row-actions");
	
	inputName.style.display = "block";
	inputShortCode.style.display = "none";
	inputCode.style.display = "block";
	inputNameDisplay.style.display = "none";
	buttonEdit.style.display = "block";
	rowActions.style.display = "none";
}
function enableTrash(e){
	e.preventDefault();
	var parentElement = this.parentElement;
	while( !(parentElement.classList.contains("linha")) ){
		parentElement = parentElement.parentElement;
	};
	var msgOnClick = this.getAttribute('msgOnClick');
	var confirme = confirm(msgOnClick);
	if(confirme){
		parentElement.querySelector(".inputAction").value = "trash";
		parentElement.querySelector("form").submit();
	}
	
}
function enableCancel(e){
	e.preventDefault();
	var parentElement = this.parentElement;
	while( !(parentElement.classList.contains("linha")) ){
		parentElement = parentElement.parentElement;
	};
	var msgOnClick = this.getAttribute('msgOnClick');
	var confirme = confirm(msgOnClick);
	if(confirme){
		
	var inputName = parentElement.querySelector(".nameEdit");
	var inputShortCode = parentElement.querySelector(".shortcodeEdit");
	var inputCode = parentElement.querySelector(".codeEdit");
	var inputNameDisplay = parentElement.querySelector(".namedisplay");
	var buttonEdit = parentElement.querySelector(".buttonEdit");
	var rowActions = parentElement.querySelector(".row-actions");
	
	inputName.style.display = "none";
	inputShortCode.style.display = "block";
	inputCode.style.display = "none";
	inputNameDisplay.style.display = "block";
	buttonEdit.style.display = "none";
	rowActions.style.display = "block";
	}
}
function selectLangOnSelect(){
	if( this.getAttribute("selected") ) return;
	var elementoPai = this.parentElement;
	while( !(elementoPai.localName == "form") ){
		elementoPai = elementoPai.parentElement;
	};
	elementoPai.submit();
}

function selectPostsPerPageOnSelect(){
	if( this.getAttribute("selected") ) return;
	var elementoPai = this.parentElement;
	while( !(elementoPai.localName == "form") ){
		elementoPai = elementoPai.parentElement;
	};
	elementoPai.submit();
}
function initLinkEdit(){
	//botao de edição
	var editLinks = document.querySelectorAll(".editLinks");
	for (var index = 0; index < editLinks.length; index++) {
		editLinks[index].onclick = enableEdit;
		
	}
	//botao de exclusao
	var trashLinks = document.querySelectorAll(".trashLinks");
	for (var index = 0; index < trashLinks.length; index++) {
		trashLinks[index].onclick = enableTrash;
		
	}
	//botao de cancelar
	var cancelButton = document.querySelectorAll(".cancelButton");
	for (var index = 0; index < cancelButton.length; index++) {
		cancelButton[index].onclick = enableCancel;
		
	}

	var selectlang = document.querySelector("select#lang");
	selectlang.onchange = selectLangOnSelect;

	var selectPostPerPage = document.querySelector("select#ppp");
	selectPostPerPage.onchange = selectPostsPerPageOnSelect;
	
}