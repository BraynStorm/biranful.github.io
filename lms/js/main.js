$(document).ready(function(){
	var noPading = $("#bodyCenter");
	var button = $(".buttons");
	var image = $(".images");
	var buttonsName = [
		{name:"Начало",link:"index.php"},
		{name:"Бижута",link:"jewelry.php"},
		{name:"Аксесоари",link:"#"},
		{name:"Информация",link:"information.php"},
		{name:"Контакти",link:"#"}
	];
	
	$.ajax({
		
		url:"cmd.php?cmd=sendADozen",
		success: function(result){
			result = JSON.parse(result);
			//return goods information
			$.each(result, function(i,v){
				$('<div class="article"><img class="images" src="goods/'+ v.id +'.jpg" /><div class="articleTitle">'+v.articleTitle+'</div></div>').appendTo($("#jewelryContent"));
				//fix - image on load
				$("#jewelryContent>div:last-child>.images").on('load',function(){
					afterImageLoad($(this));
				});
			});
			//image :HOVER
			$(".images").hover(function(){
					$.each($(this), function(i,v){
						$(v).addClass("imagesHover");				
					});
		
				},function(){
						$.each($(this), function(i,v){
							$(v).removeClass("imagesHover");		
						});
			});
			$(".images").on('mouseup',function(){
				event.preventDefault();
				var THIS = $(this);
				var x = THIS.attr("src").split(".");
				window.location.href="goods.php?id="+(x[0].substr(6));
				
			});
			//GOODS PRICE MARGIN-TOP
			$(".goodsPrice").css("margin-top",$(".goodsDescription").height() + 34);
		}
		
	});
	
	//$("#purchaseOrderGOODS").css("margin-top"),$(".goodsImages").height() + $(".goodsName").height() + 24 + 60);
    

	//stylize buttons
	$.each(button, function(i,v){
		$('<div class="buttonLeft regularButton"></div><div class="buttonCenter regularButton"></div><div class="buttonRight regularButton"></div>').appendTo(v);
		$(v).find(":nth-child(2)").html(buttonsName[i].name);
	});
	
	$(".buttons").width((parseInt($("#menuBar").width()) / $(".buttons").length)-0.89);

	//$(".buttonCenter").width(parseInt($(".buttons").width())-41-parseInt($(".buttonLeft").width())*2)a;
	//$("#menuBar>div:last-child .buttonCenter").width(parseInt($(".buttons").width())-41-parseInt($(".buttonLeft").width())*2);
	
	//button:hover
	var timeout;
	button.hover(function(){
		$.each($(this).children(), function(i,v){
			$(v).addClass("buttonHover");				
		});
		timeout = setTimeout(function(){
			$("#tooltip").css("display", "block");
		},1000);
		for(var i = 0; i < buttonsName.length; i++){
			if(buttonsName[i].name===$(this).find(".buttonCenter").html()){
				$("#tooltip").html(buttonsName[i].link);
			}
			
		}
		
	},function(){
		$.each($(this).children(), function(i,v){
			$(v).removeClass("buttonHover");		
		});
		clearTimeout(timeout);
		$("#tooltip").css("display", "none")
	});
	//tooltip
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
	
	
});

function afterImageLoad(img){
	img.css("margin-left",(img.parent().width() - img.width()) / 2 );
}