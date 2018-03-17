<?php

	include_once "C:\OSPanel\domains\localhost\SerovNet\GLOBAL_SEARCH\GS_Functions\GS_Get_DB.php";
	$res = Get_Peoples(3, "ov", $count);
	if ($count > 3) $count = 3;
	
	for ($i = 0; $i < $count; $i++)
	{	
		$Inf = $res->fetch_assoc();
		echo $Inf['Name']."<br>";
	}
	echo $count;
?>
