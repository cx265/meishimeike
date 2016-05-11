function check(){
    var myemail = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
    var mytelephone = /^1[3|4|5|8][0-9]\d{4,8}$/;
    if (niceform.username.value.length>4 || niceform.username.value.length<2)
    {
        alert("这是你的真实姓名吗？请正确填写真实姓名");
        niceform.username.focus();
        return false;
    }
    if (niceform.nickname.value.length<4 || niceform.nickname.value.length>20)
    {
        alert("用户名长度在4-20个字符之间");
        niceform.nickname.focus();
        return false;
    }
    if (!myemail.test(niceform.email.value))
    {
        alert("请正确填写邮箱格式");
        niceform.email.focus();
        return false;
    }
    if (!mytelephone.test(niceform.telephone.value)
    {
        alert("请正确填写手机");
        niceform.telephone.focus();
        return false;
    }
    if (isNaN(niceform.qq.value))
    {
        alert("请正确填写QQ");
        niceform.qq.focus();
        return false;
    }
    if (niceform.qq.value.length<6 || niceform.qq.value.length>12)
    {
        alert("请正确填写QQ");
        niceform.qq.focus();
        return false;
    }
    if (niceform.introduce.value=="")
    {
        alert("请填写个人介绍");
        niceform.introduce.focus();
        return false;
    }
    if (niceform.introduce.value.length>100)
    {
        alert("您的个人介绍太长了，个人介绍不超过100个字！");
        niceform.introduce.focus();
        return false;
    }
    return true;
}