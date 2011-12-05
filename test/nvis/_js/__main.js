	// the custom data structure (_directedGraphCustom.js)
	var g = new DirectedGraph();
	
	// a variable to save existing graphs
	var graphs = new Array();
	
	// to be used if reseting graph then injecting content again
	var description = $("#canvas").html();

	// setting canvas size depending on your window actual size
	$("#canvas").css({height:(window.innerHeight-$("#form").height()-45)+"px",width:(window.innerWidth-38)+"px"});
	var canvasWidth = parseInt($("#canvas").css("width").slice(0,$("#canvas").css("width").length-2));
	var canvasHeight = parseInt($("#canvas").css("height").slice(0,$("#canvas").css("height").length-2));
	
	//edge flags
	var edgeFlag = {from:null,to:null,fromMenu:null,fromDelete:null,fromShortestPath:null};
	
	// input text focus manipulation
	$("#form > input:eq(1)").focusin(function(){
		$(this).val()=="Node" ? $(this).val("").css({"color":"black"}) : null;
	}).focusout(function(){
		$(this).val()=="" ? $(this).val("Node").css({"color":"#999"}) : null;
	});
	
	$("#form > input:eq(0)").focusin(function(){
		$(this).val()=="Untitled graph" ? $(this).val("").css({"color":"black"}) : null;
	}).focusout(function(){
		$(this).val()=="" ? $(this).val("Untitled graph").css({"color":"#999"}) : null;
	});	
	
	// flags for handling the buttons to be locked

	
	// switch for the button click events
	$("#form > a.button").click(function(){		
		key = $(this).html();
		switch(key){
			case "Dal":
			case "İlaç":
			case "Tahlil":
			case "Harita":
			case "Rapor":
				jPrompt("Düğüm adı","düğüm","Düğüm", function(r){
					if(r!="" && r!="düğüm") {
						if(!addNode(r + ":" + key))
							$.notifyBar({html:"Düğüm zaten var, ekleyemedim.",cls:"error"});
					}
				});
				break;
			case "Bağlar":
				if(g.nodes.length>0){
					var r = "<input type=\"hidden\" name = \"edges\" id=\"edges\"  value=\"";
					var matrix = g.getMatrix("weighted");
					for(var i=0;i<g.nodes.length;i++){
						for(var j=0;j<g.nodes.length;j++){
							if(typeof matrix[i][j] != "boolean")
								r+=matrix[i][j].toString();
							else if(matrix[i][j] == true)
								r+="1";
							else
								r+='0';
								
							if ( (j + 1) != g.nodes.length){	
								r+=',';
							}
						}
						if ( (i + 1) != g.nodes.length){	
							r+=';';
						}
					}
					r+='\">';
					
					alert(r);
					
					$("#edges").html(r);
				}
				else
					$.notifyBar({html:"The graph is empty<br/>Try adding some nodes first",cls:"error"});
			break;
			case "Düğümler":
				if(g.nodes.length>0){
					var r = "<input type=\"hidden\" name = \"nodes\" id=\"nodes\"  value=\"";

					for(var i=0; i < g.nodes.length; i++) {
						r += g.nodes[i];
						
						if ( (i + 1) != g.nodes.length){	
							r+=';';
						}
					}
					r+='\">';
			
					alert(r);

					$("#nodes").html(r);
				}
				else
					$.notifyBar({html:"The graph is empty<br/>Try adding some nodes first",cls:"error"});
			break;
			
			case "Uygulamayı yeniden başlat":
				if(g.nodes.length>0)
					jConfirm("All unsaved changes will be lost.<br/>Really reset?", "About to reset your graph", function(r){
						if(r){
							$("#canvas").fadeOut().delay(300).fadeIn();
							window.setTimeout(function(){
								$("#canvas").html(description);
							}, 300);
							g = new DirectedGraph();
						}
					});
				else
					$.notifyBar({html:"There's nothing to reset"});
			break;
			case "Yeniden çiz":
				if(g.nodes.length>0)
					plot();
				else
					$.notifyBar({html:"There's nothing to draw or redraw<br/>Try adding some nodes first"});
			break;
		}
	});
			
	/* Canvas and plotting functions */	

	// main plot function
	var plot = function(){
		$("#canvas").empty();
		var gr = new Graph();
		gr.addNodesFromArray(g.nodes);
		var arr = new Array();
		for(var i=0;i<g.edges.length;i++)
			for(var j=0;j<g.edges[i].targets.length;j++)
				if(typeof g.edges[i].targets[j] == "object")
					arr.push([g.edges[i].node,g.edges[i].targets[j][0],{directed:true,label:g.edges[i].targets[j][1]}])
				else
					arr.push([g.edges[i].node,g.edges[i].targets[j],{directed:true}]);
		gr.addEdgesFromArray(arr);
		var layouter = new Graph.Layout.Spring(gr);
		layouter.layout();
		var renderer = new Graph.Renderer.Raphael("canvas",gr,window.innerWidth-100,window.innerHeight-130);
		renderer.draw();
		bindEllipses();
	};
	
	// a binding function that is inserted each time the svg graph is redrawn
	var bindEllipses = function(){

		// bind ellipse for click (to complete addEdge or removeEdge functions)
		$("#canvas > svg > ellipse").bind("click",function(){
			if(edgeFlag.fromMenu){
				if(edgeFlag.from!=$(this).attr("id")){
					edgeFlag.to=$(this).attr("id");
					jPrompt("Link metnini giriniz<br/>Boş bırakırsanız öntanımlı değer atanır","link metni","Link Metni", function(r){
						if(r=="")
							r="k-e-y--12344992334"
						if(r){
							if(r!="k-e-y--12344992334"){
								if(parseFloat(r))
									tx=parseFloat(r);
								addEdge(edgeFlag.from,edgeFlag.to,r);
							}
							else
								addEdge(edgeFlag.from,edgeFlag.to);
							edgeFlag.from = null;
							edgeFlag.to = null;
							edgeFlag.fromMenu = null;
						}
						else{
							edgeFlag.from = null;
							edgeFlag.to = null;
							edgeFlag.fromMenu = null;
						}
					});
				}
				else
					$.notifyBar({html:"A node can't point to itself<br/>Click on another node to add a target<br/>If you wish to cancel press [escape]",cls:"error",delay:5000});
			}
			else if(edgeFlag.fromDelete){
				edgeFlag.to = $(this).attr("id");
				if(g.hasEdge(edgeFlag.from,edgeFlag.to))
					removeEdge(edgeFlag.from,edgeFlag.to);
				else
					$.notifyBar({html:"The edge from <span style='color:green'>" + edgeFlag.from + "</span> to <span style='color:green'>" + edgeFlag.to + "</span> doesn't exist",cls:"error"});
				edgeFlag.from=null;
				edgeFlag.to=null;
				edgeFlag.fromDelete=null;
			}
		});
		
		// bind ellipse for doubleclick (to perform the addEdge function)
		$("#canvas > svg > ellipse").bind("dblclick",function(){
			edgeFlag.from = $(this).attr("id");
			edgeFlag.fromMenu = true;
			$.notifyBar({html:"Şimdi hedef düğüme tıkla"});				
		});
		
		$('#canvas > svg > ellipse').bind('contextmenu',function(){
			displayMenu($(this).attr("id"), parseInt($(this).attr("cx")), parseInt($(this).attr("cy")));
			return false;
		});

		
		var displayMenu = function(node,x,y){
			$(".vmenu > div:eq(0) > span").html(node);
			$(".vmenu").css({
				"top":(y+30)+"px",
				"left":(x+70)+"px"
			}).fadeIn(200);
		};

		$("body").bind("click",function(){
			$(".vmenu").fadeOut(200);
		});

		$("#createEdge").bind("click",function(){
			edgeFlag.from=$(".vmenu > div:eq(0) > span").html();
			edgeFlag.fromMenu = true;
			$.notifyBar({html:"Şimdi hedef düğüme tıkla"});
			$(".vmenu").fadeOut(50);
		});
		
		$("#removeNode").bind("click",function(){
			var thisNode = $(".vmenu > div:eq(0) > span").html();
			if(g.hasEdgeFrom(thisNode)||g.hasEdgeTo(thisNode)){
				jConfirm("Bu düğüm silinirken aynı zamanda tüm bağları da silinecek<br/>Devam etmek istediğinizden emin misiniz?","Düğüm silmeyi onayla", function(r){
					if(r)
						removeNode(thisNode);
				});
			}
			else
				removeNode(thisNode);
			$(".vmenu").fadeOut(50);
		});
		
		$("#removeEdge").bind("click",function(){
			if(g.hasEdgeFrom($(".vmenu > div:eq(0) > span").html())){
				edgeFlag.fromDelete = true;
				edgeFlag.from=$(".vmenu > div:eq(0) > span").html();
				$.notifyBar({html:"Şimdi hedef düğüme tıkla"});
			}
			else
				$.notifyBar({html:"Bu düğüm herhangi bir düğümle bağlı değil",cls:"error"});
			$(".vmenu").fadeOut(50);
		});
		
		$("#canvas > svg > ellipse").css({"cursor":"pointer"});
		
	};

	var getCID = function(){
		return document.getElementById('cid').value;
	};

	var getNtitle = function(node){
		tmp = node.split(':');
		return tmp[0];
	};
	var getNtype = function(node){
		tmp = node.split(':');
		return tmp[1];
	};
	var getNID = function(node){
		// FIXME
		return 1;
	};

	// addNode
	var addNode = function(node){
		if(g.addNode(node)){
			plot();
			$.get('/a/ajax/add_node.php?cid=' + getCID() + '&ntype=' + getNtype(node) + '&title=' + getNtitle(node), function (data) {
				$.notifyBar({html:data});
				// FIXME: nodes[title][id] = data;
			});
			return true;
		}
		else
			return false;
	};
	
	// removeNode
	var removeNode = function(node){
		g.removeNode(node);
		plot();
		$.get('/a/ajax/remove_node.php?cid=' + getCID() + '&id=' + getNID(node), function (data) {
			$.notifyBar({html:data});
		});
	};
	
	// addEdge
	var addEdge = function(from,to,value){
		if(g.addEdge(from,to,value)) {
			plot();
			// AJAX: add_edge.php
		}
	};
	
	var removeEdge = function(from,to){
		if(g.removeEdge(from,to)) {
			plot();
			// AJAX: remove_edge.php
		}
	};
	
	// onResize function and variable
	var onResize = function(){
		$("#canvas").css({height:(window.innerHeight-$("#form").height()-45)+"px",width:(window.innerWidth-38)+"px"});
		if(g.nodes.length>0)
			plot();
	};
	var timer;
	// bind the window to listen for resize event
	$(window).resize(function(){
	   timer && clearTimeout(timer);
	   timer = setTimeout(onResize, 100);
	});
	
// experiment: web speech
var speak = function(value){
	if(value!=""&&value!="Node"){
		if(!addNode(value))
			$.notifyBar({html:"Node already exists, it wasn't added",cls:"error"});
		$("#form > input:eq(1)").val("").focus();
	}
};

var secret = function(value){
	$("#secret-text").append('"'+value +'" ');
};

$("#secret-close").bind("click",function(){
	$("#secret-text").empty();
	$("#secret").fadeOut(100);
});

// super experimental
var secretFlag = [false,false,false]
$(document).keydown(function(e){
	if(e.which==27){
		if(edgeFlag.fromMenu){
			edgeFlag.fromMenu=null;
			edgeFlag.from=null;
			edgeFlag.to=null;
			$.notifyBar({html:"Adding this edge was cancelled"});
		}
		else if(edgeFlag.fromDelete){
			edgeFlag.fromDelete=null;
			edgeFlag.from=null;
			edgeFlag.to=null;
			$.notifyBar({html:"Deleting edge was cancelled"});
		}
		else if($(".vmenu").is(":visible")){
			$(".vmenu").fadeOut();
		}
	}
	switch(e.which){
		case 17:
			secretFlag[0]=true;
		break;
		case 16:
			secretFlag[1]=true;
		break;
		case 83:
			secretFlag[2]=true;
		break;
	}
	if(secretFlag[0]&&secretFlag[1]&&secretFlag[2])
		$("#secret").fadeIn(2000);
}).keyup(function(e){
	switch(e.which){
		case 17:
			secretFlag[0]=false;
		break;
		case 16:
			secretFlag[1]=false;
		break;
		case 83:
			secretFlag[2]=false;
		break;
	}		
});

// initialize application
$(document).ready(function(){
	if(getCookie("graphsCookie")){
		graphs = JSON.parse(getCookie("graphsCookie"));
	}
	for(var i=0;i<graphs.length;i++)
		$("#form > select").append('<option>'+graphs[i]+'</option>');
	
	
	window.setTimeout(function(){
		$("#loading-overlay").fadeOut(400);
	},1500);
});
