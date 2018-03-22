<?php
	/*
		Этот файл отвечает за глобальный поиск по людям
	*/
	session_start();
	$N = 15;
	$_SESSION['GS']['Border'] = isset($_SESSION['GS']['Border']) ? $_SESSION['GS']['Border'] : 0;
	$_SESSION['GS']['Border'] += $N;
	
?>
<!doctype html>
 <html lang="ru-RU">
 <head>
 	<meta charset="UTF-8">
 	<title>My page</title>
	<link rel="stylesheet" href="people&group_search.css">
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
									<input type="text" id="search_input" name = "Global_Search_Line" class="placeholder_style" placeholder="Search...">
									<input type="image" name = "Global_Search_Button"id="search_button" src="images/search_button.png" value="Search">
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
		
		<div class="people_group_search_middle_content">
					<div class="search_smth_link">
						<a id="search_smth_link" href="">People</a>
					</div>
				<div class="profile_block">
					<img src="images/bg.jpg"  class="profile_photo" alt="">
					<div class="profile_name">
						<div class="sub1">
							<a href="#" class="profile_name_link">First name Last name</a>
						</div>
					</div>
				</div>
				<div class="profile_block">
						<img src="images/222.jpg"  class="profile_photo" alt="">
					<div class="profile_name">
						<div class="sub1">
							<a href="#" class="profile_name_link">First name Last name</a>
						</div>
					</div>
				</div>
		</div>
		
		<div class="rightSidebar">
			<ul class="right_sidebar_ul">
				<li>
						<div class="search_all">
							<a href="GS_ALL.php">
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
						<a href="GS_Groups.php">
							Groups
						</a>
					</div>
				</li>
			</ul>
		</div>
	</div>	
	</div>	
	
	
	
 </body>
 </html>