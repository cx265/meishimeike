function goto_u1(){
	var page=document.getElementById("select").value;
	document.location.href="./users.php?answer=u1&page="+page;
}
function goto_u2(){
	var page=document.getElementById("select").value;
	document.location.href="./users.php?answer=u2&page="+page;
}
function goto_u3(){
  var page=document.getElementById("select").value;
  document.location.href="./users.php?answer=u3&page="+page;
}
function checkall(){
 	var checklist = document.getElementsByName("checkbox");
   	if(document.getElementById("allcheck").checked){
   		for(var i=0;i<checklist.length;i++){
      		checklist[i].checked = 1;
   		}
 	}else{
  		for(var j=0;j<checklist.length;j++){
     		checklist[j].checked = 0;
     	}
 	}
}