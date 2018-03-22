<?php
	/*
		Этот файл отвечает за глобальный поиск по всем категориям
	*/
	session_start();
	include_once "GS_Functions\GS_Get_DB.php";
	include_once "..\Help_Functions\Get_File_Names.php"; // для путей к аватаркам
	
	if (!isset($_REQUEST['local']))
		$_REQUEST['Local_Search_Line'] = $_REQUEST['Global_Search_Line'];

	$Peoples = Get_Peoples(3, $_REQUEST['Local_Search_Line'], $count_peoples);
	$Groups = Get_Groups(3, $_REQUEST['Local_Search_Line'], $count_groups);
	
?>
 <!doctype html>
 <html lang="ru-RU">
 <head>
 	<meta charset="UTF-8">
 	<title>My page</title>
	<link rel="stylesheet" href="css/global_search_page_style.css">
	<link rel="stylesheet" href="fonts/fonts.css">
	<link rel="stylesheet" href="fonts/rubik/rubik.css">
 </head>
 <body>
 	<header>
			<div class="header">
				<div class="subheader">
					<div class="logo"></div>
					<div class="search_block">
						<form action="GS_ALL.php" method = "POST">
							<div class="search_field">
									<input type="text" id="search_input" name="Global_Search_Line" class="placeholder_style" placeholder="Search...">
									<input type="image" id="search_button" name = "Global_Search_Button" src="images/search_button.png" alt="Search">
							</div>
						</form>
					</div>
					<div class="right_column">
						<div class="signOut_block">
							<form action="">
								<div class="signOut_a">
									<a class="right_top" href="..\Common_Buttons\Options_And_Exit\Options_And_Exit.php">Sign out</a>
								</div>
							</form>
						</div>
						<div class="options_block">
							<form action="">
								<div class="options_a">
									<a class="right_top" href="OPTIONS">Options</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
	</header>
	<div class="clear"></div>
	<div class="wrapper">
		<div class="leftSidebar">
			<ul class="left_sidebar_ul">
				<li>
					<div class="my_page">
						<a href="..\Page\MyPage\MyPage.php">
							My page
						</a>
					</div>
				</li>
				<li>
					<div class="my_friends">
						<a href="">
							My friends
						</a>
					</div>
				</li>
				<li>
					<div class="my_messages">
						<a href="">
							My messages
						</a>
					</div>
				</li>
				<li>
					<div class="my_news">
						<a href="">
							My news
						</a>
					</div>
				</li>
				<li>
					<div class="my_groups">
						<a href="">
							My groups
						</a>
					</div>
				</li>
			</ul>
		</div>
		
		<div class="search_block">
				<form action="GS_ALL.php" method = "POST">
					<div class="search_field">
							<?php
							if (isset($_REQUEST['Local_Search_Line']) && $_REQUEST['Local_Search_Line'] != "")
							{
							?>
							<input type="text" id="search_input" name = "Local_Search_Line" class="placeholder_style" placeholder="Search..." value = <?=$_REQUEST['Local_Search_Line']?>>
							<?php
							}
							else
							{
							?>
							<input type="text" id="search_input" name = "Local_Search_Line" class="placeholder_style" placeholder="Search...">	
							<?php
							}
							?>
							<input type = "hidden" name = "local" value = 1>
							<input type="image" name = "Local_Search_Button" id="search_button" src="images/search_button.png" alt="Search">
					</div>
				</form>
		</div>
		
		<div class="global_search_middle_content">
			<div class="search_friends_v1">								<!--	ЭТО ЕСЛИ 4 И БОЛЕЕ ДРУЗЕЙ  -->
				<div class="search_friends_link">
					<a id="search_friends_link" href="">People</a>
				</div>
				<div class="search_friends_block_v1">
					<table class="table">
						<tr>
						<?php
						if ($count_peoples == 0)
						{
							?>
								<b>Kiss my ass</b>
							<?php
						}
						else
						{
							for ($i = 0; $i < $count_peoples; $i++)
							{ 
								$person = $Peoples->fetch_assoc();
								$img_main_path = Get_Path_User_Avatar_by_id($person['id'],$person['img']);
								$img = "..\\".$img_main_path;
							?>
								<td>
									<div>
										<img src=<?=$img?> class="ava" alt="">
									</div>
									<a href="..\Page\Another_Page\Another_Page.php?id=<?=$person['id']?>&login=<?=$person['login']?>&name=<?=$person['Name']?>
									&lastname=<?=$person['LastName']?>&img=<?=$img_main_path?>" id="name" class="name"><?=$person['Name']?> <?=$person['LastName']?></a>
								</td>
							<?php 
							} 
						}
							?>
						</tr>
					</table>
				</div>
			</div>
			
			<div class="search_groups_v1">								
				<div class="search_groups_link">
					<a id="search_groups_link" href="">Groups</a>
				</div>
				<div class="search_groups_block_v1">
					<table class="table">
						<tr>
						<?php
						if ($count_groups == 0)
						{
							?>
								<b>Kiss my ass</b>
							<?php
						}
						else
						{
							for ($i = 0; $i < $count_groups; $i++)
							{ 
							$group = $Groups->fetch_assoc();
							$img = "..\\".Get_Path_Groups_Avatar_by_id($group['id'],$group['img']);
							?>
								<td>
									<div>
										<img src=<?=$img?> class="ava" alt="">
									</div>
									<a href="" class="name"><?=$group['Name']?> <?=$group['Count']?></a>
								</td>
							<?php
							}
						}
							?>
						</tr>
					</table>
				</div>
			</div>
			
		<!--	<div class="search_smth_block">
				<div class="profile_block">
					<img src="images/bg.jpg"  class="profile_photo" alt="">
					<div class="profile_name">
						<a href="#" class="profile_name_link">First name Last name</a>
					</div>
				</div>
			</div> -->
			
		</div>
		
		<div class="rightSidebar">
			<ul class="right_sidebar_ul">
				<li>
						<div class="search_all">
							<a href="">
								Search All
							</a>
						</div>
				</li>	
				<li>
						<div class="search_friends">
							<a href="GS_Peoples.php?Local_Search_Line=<?=$_REQUEST['Local_Search_Line']?>">
								People
							</a>
						</div>
				</li>
				<li>
					<div class="search_groups">
						<a href="GS_Groups.php?Local_Search_Line=<?=$_REQUEST['Local_Search_Line']?>">
							Groups
						</a>
					</div>
				</li>
			</ul>
		</div>
	</div>	
	
 </body>
 </html>