<?php
	function Get()
	{
		$Users_DB = new mysqli("localhost", "root", "", "Users_Main_Information");
		$result = $Users_DB->query("SELECT `id` FROM `Information` WHERE `id` > 1
		Limit 2");
		return $result;
	}
?>