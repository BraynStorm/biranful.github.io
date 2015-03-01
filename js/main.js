var buttonsName = [];
$(document).ready(function(){
	var noPading = $("#bodyCenter");
	var button;
	
	$.ajax({
		url:"main.php",
		type: "GET",
		data: {cmd: "requestpages"},
		accept:"application/json",
		success: function(msg){
			var ime = JSON.parse(msg);
			$.each(ime, function(i,v){
				buttonsName[i] = v;
				$("<div class='buttons'></div>").appendTo($("#menuBar"));

			});
			button = $(".buttons");
			init();
		}
		
	});
	

	function init(){
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
		
		$(".buttons").width( (parseInt($("#menuBar").width())) / $(".buttons").length  - $(".buttons").length * 7);
		
		
		$(".buttonCenter").width( parseInt($(".buttons").width()) - 41 - parseInt($(".buttonLeft").width()) * 2);
		//$("#menuBar>div:last-child .buttonCenter").width(parseInt($(".buttons").width())-46-parseInt($(".buttonLeft").width())*2);
		//$(".buttonCenter").width(parseInt($(".buttons").width())-50-parseInt($(".buttonLeft").width())*2);

		
		//button:hover
		var timeout;
		button.hover(function(){
			$.each($(this).children(), function(i,v){
				$(v).removeClass("regularButton activeButton").addClass("hoverButton");				
			});
			timeout = setTimeout(function(){
				$("#tooltip").css("display", "block");
			},1000); // <-- change the timeout !!
			for(var i = 0; i < buttonsName.length; i++){
				if(buttonsName[i].name===$(this).find(".buttonCenter").html()){
					$("#tooltip").html(buttonsName[i].tooltip);
				}
				
			}
			
		},function(){
			$.each($(this).children(), function(i,v){
				$(v).removeClass("hoverButton activeButton").addClass("regularButton");			
			});
			clearTimeout(timeout);
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
					//window.location.href=buttonsName[i].link;
				}
			}
			
		});
		$(document.body).mousemove(function(){
			var coords = "X coords: " + event.clientX + ", Y coords: " + event.clientY;
			//console.log(coords);
		});

	}
});