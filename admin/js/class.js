function goto_c1(){
    var page=document.getElementById("select").value;
    document.location.href="./MicorClass.php?answer=c1&page="+page;
}
function goto_c4(){
    var type=document.getElementById("type_hide").value;
    var page=document.getElementById("select").value;
    document.location.href="./MicorClass.php?answer=c4&type="+type+"&page="+page;
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
