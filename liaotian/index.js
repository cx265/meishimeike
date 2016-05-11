function checkpost(){
	if (list.words.value.length>1000)
	{
		alert("内容不能大于500个字符！");
		list.words.focus();
		return false;
	}
	return true;
}