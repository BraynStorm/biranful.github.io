$(document).ready(function(){
	var noPading = $("#bodyCenter");
	
	
	$("#bodyCenter>div:first-child").css("height",
	noPading.height()+
	parseInt(noPading.css("padding-top"))+
	parseInt(noPading.css("padding-bottom")));
	
	$("#bodyCenter>div:nth-child(2)").css("height",
	noPading.height()+
	parseInt(noPading.css("padding-top"))+
	parseInt(noPading.css("padding-bottom")));
	
	
	
	
	
	
});