<?php
	/*
		Этот файл отвечает за глобальный поиск по людям
	*/
	session_start();
	include_once "GS_Functions\GS_Get_DB.php";
	include_once "..\Help_Functions\Get_File_Names.php"; // для путей к аватаркам
	$N = 15;
	$_SESSION['GS_People']['Border'] = isset($_SESSION['GS_People']['Border']) ? $_SESSION['GS_People']['Border'] : $N;
	if (isset($_REQUEST['Continue_Show']))
	{
		$_SESSION['GS_People']['Border'] += $N;
		unset($_REQUEST['Continue_Show']);
	}
	if (isset($_REQUEST['Hide']))
	{
		$_SESSION['GS_People']['Border'] = $N;
		unset($_REQUEST['Hide']);
	}
	$Peoples = Get_Peoples($_SESSION['GS_People']['Border'], $_REQUEST['Local_Search_Line'], $count_peoples);
	//$count_peoples -= $_SESSION['GS_People']['Border']; /// показывает, сколько людей еще не выведено, но находятся в зоне поиска в БД
	if ($count_peoples > $_SESSION['GS_People']['Border'])
		$count_peoples = $_SESSION['GS_People']['Border'];
?>
<!doctype html>
 <html lang="ru-RU">
 <head>
 	<meta charset="UTF-8">
 	<title>Search</title>
	<link rel="stylesheet" href="css/people&group_search.css">
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
									<a class="right_top" href="SIGN_OUT">Sign out</a>
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
		
		<div class="people_group_search_middle_content">
		
			<div class="search_smth_link">
				<p id="people">People</p>
			</div>
		
				<form action="">
					<div class="search_field_large">
							<?php
							if (isset($_REQUEST['Local_Search_Line']) && $_REQUEST['Local_Search_Line'] != "")
							{
							?>
							<input type="text" id="search_input_large" name="Local_Search_Line" class="placeholder_style" placeholder="Search..." value = <?=$_REQUEST['Local_Search_Line']?>>
							<?php
							}
							else
							{
							?>
							<input type="text" id="search_input_large" name="Local_Search_Line" class="placeholder_style" placeholder="Search...">
							<?php
							}
							?>
							<input type="image" id="search_button_large" name = "Local_Search_Button" src="images/search_button.png" alt="Search">
					</div>
				</form>
	
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
							<div class="profile_block">
								<img src=<?=$img?>  class="profile_photo" alt="">
								<div class="profile_name">
									<div class="sub1">
									<a href="..\Page\Another_Page\Another_Page.php?id=<?=$person['id']?>&login=<?=$person['login']?>&name=<?=$person['Name']?>
									&lastname=<?=$person['LastName']?>&img=<?=$img_main_path?>" class="profile_name_link"><?=$person['Name']?> <?=$person['LastName']?></a>
									<div class="add_friend"><a href="#">Add friend</a></div>
									</div>
								</div>
							</div>
							<?php
							}
						}
							?>
			<?php
				if ($count_peoples != 0)
				{
			?>
			<a href = "GS_Peoples.php?Continue_Show=1&Local_Search_Line=<?=$_REQUEST['Local_Search_Line']?>">More</a>
			<?php
				}
				else
				{
			?>
			<a href = "GS_Peoples.php?Hide=1&Local_Search_Line=<?=$_REQUEST['Local_Search_Line']?>">Hide</a>
			<?php
				}
			?>
		</div>
		
		<div class="rightSidebar">
			<ul class="right_sidebar_ul">
				<li>
						<div class="search_all">
							<a href="GS_ALL.php?local=1&Local_Search_Line=<?=$_REQUEST['Local_Search_Line']?>">
								Search All
							</a>
						</div>
				</li>	
				<li>
						<div class="search_friends">
							<a href="">
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