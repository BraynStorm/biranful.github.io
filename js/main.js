$(document).ready(function(){
	var noPading = $("#bodyCenter");
	var button = $(".buttons");
	var buttonsName = ["home","foo","temp","contact us", "about"];
	
	$("#bodyCenter>div:first-child").css("height",
	noPading.height()+
	parseInt(noPading.css("padding-top"))+
	parseInt(noPading.css("padding-bottom")));
	
	$("#bodyCenter>div:nth-child(2)").css("height",
	noPading.height()+
	parseInt(noPading.css("padding-top"))+
	parseInt(noPading.css("padding-bottom")));
	
	$.each(button, function(i,v){
		$('<div class="buttonLeft regularButton"></div><div class="buttonCenter regularButton"></div><div class="buttonRight regularButton"></div>').appendTo(v);
		$(v).find(":nth-child(2)").html(buttonsName[i]);
		
		
	});
	
	$(".buttons").width((parseInt($("#menuBar").width()) / $(".buttons").length)-9);
	$("#menuBar>div:last-child").width(parseInt($(".buttons").width())+2);
	$(".buttonCenter").width(parseInt($(".buttons").width())-41-parseInt($(".buttonLeft").width())*2);
	
	
	
	
});