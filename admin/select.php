<?php
	header("Content-Type: text/html; charset=utf-8");

	if ($_POST['submit']) {
		$_type = $_POST['small_sort1'].$_POST['small_sort2'];
		echo "<script language='javascript'>window.location.href='MicorClass.php?answer=c4&type=%$_type%'</script>";
	}
?>