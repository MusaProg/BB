<?php
	/*
		Этот файл отвечает за обработку нажатия и вывода в окно браузера
		"Домашнего блока"(т.е., моя страница, мои друзья и т.д., как в вк)
	*/
	if (isset($_REQUEST['Go_My_Page']))
	{
		header("Location: ..\..\Page\MyPage\MyPage.php");
	}
?>