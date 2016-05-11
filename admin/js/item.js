function cont_show(){
    var a=document.getElementById("cont_box");
    a.className="cont_box_";
    $("#show").ready(function(){
    	$("#show").unbind( "click" ).removeAttr('onclick').click(function(){
    		var b=document.getElementById("cont_box");
    		b.className="cont_box";
    			$("#show").attr('onclick', '').bind('click',function(){cont_show();
    			});
    	});
	});
}