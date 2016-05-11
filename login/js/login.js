function change(){
	var change=document.getElementById('change_pic');
	change.src="../admin/code.php?"+Math.random();
}
window.onload = function(){
    var textBox = document.getElementById("code");

    textBox.onkeyup = function(){
    this.value = this.value.toUpperCase();
    };
};
function checklogin(){
    if (login.username.value.length<2 || login.username.value.length>20)
    {
        alert("用户名长度在2-10个字符之间");
        login.username.focus();
        return false;
    }
    if (login.password.value.length<5 || login.password.value.length>16)
    {
        alert("密码长度须在5-16个字符之间");
        login.password.focus();
        return false;
    }
    return true;
}