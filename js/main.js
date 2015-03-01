$(document).ready(function(){
	var noPading = $("#bodyCenter");
	var button = $(".buttons");
	var buttonsName = [
		{name:"home",link:"http://stackoverflow.com"},
		{name:"foo",link:"https://www.youtube.com/watch?v=nq5Jr_iZsLQ"},
		{name:"temp",link:"http://leagueoflegends.wikia.com/wiki/Tryndamere/SkinsTrivia"},
		{name:"contact us",link:"http://api.jquery.com/mouseup/"},
		{name:"about",link:"https://www.google.bg/?gfe_rd=cr&ei=vTvyVIC3CMqDVICxgYgF"}
	];
	
	
	//trying to fix ACTIVE DRAG button 
	var butHomePosition = $("#menuBar>div:nth-child(3)").position();
	console.log(butHomePosition.left - 10);
	// did NOT WORK
	
	
	
    
	
	//stylize left border of the bodyCenter
	$("#bodyCenter>div:first-child").css("height",
	noPading.height()+
	parseInt(noPading.css("padding-top"))+
	parseInt(noPading.css("padding-bottom")));
	
	//stylize right border of the bodyCenter
	$("#bodyCenter>div:nth-child(2)").css("height",
	noPading.height()+
	parseInt(noPading.css("padding-top"))+
	parseInt(noPading.css("padding-bottom")));
	
	//stylize buttons
	$.each(button, function(i,v){
		$('<div class="buttonLeft regularButton"></div><div class="buttonCenter regularButton"></div><div class="buttonRight regularButton"></div>').appendTo(v);
		$(v).find(":nth-child(2)").html(buttonsName[i].name);
	});
	
	$(".buttons").width((parseInt($("#menuBar").width()) / $(".buttons").length)-9);
	$(".buttonCenter").width(parseInt($(".buttons").width())-41-parseInt($(".buttonLeft").width())*2);
	$("#menuBar>div:last-child .buttonCenter").width(parseInt($(".buttons").width())-41-parseInt($(".buttonLeft").width())*2);
	
	//button:hover
	button.hover(function(){
		$.each($(this).children(), function(i,v){
			$(v).removeClass("regularButton activeButton").addClass("hoverButton");				
		});
		setTimeout(function(){
			$("#tooltip").css("display", "block");
		},1000);
		for(var i = 0; i < buttonsName.length; i++){
			if(buttonsName[i].name===$(this).find(".buttonCenter").html()){
				$("#tooltip").html(buttonsName[i].link);
			}
			
		}
		
	},function(){
		$.each($(this).children(), function(i,v){
			$(v).removeClass("hoverButton activeButton").addClass("regularButton");			
		});
		$("#tooltip").css("display", "none")
	});
		
	$(document.body).mousemove(function(){
		var x = event.clientX;
		var y = event.clientY;
		$("#tooltip").css({
			top: y + 15,
			left: x + 20
		});
	});
	//button:active
	button.on('mousedown',function(){
		event.preventDefault();
		$.each($(this).children(), function(i,v){
			$(v).removeClass("hoverButton regularButton").addClass("activeButton");
		});	
	}).on('mouseup',function(){
		event.preventDefault();
		$.each($(this).children(), function(i,v){
			$(v).removeClass("activeButton regularButton").addClass("hoverButton");
		});	
		for(var i = 0; i < buttonsName.length; i++){
			if(buttonsName[i].name===$(this).find(".buttonCenter").html()){
				window.location.href=buttonsName[i].link;
			}
		}
		
	});
	$(document.body).mousemove(function(){
		var coords = "X coords: " + event.clientX + ", Y coords: " + event.clientY;
		//console.log(coords);
	});
	
	
});