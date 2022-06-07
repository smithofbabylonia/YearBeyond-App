<?php
    session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Learner Attendance | Main</title>
		<link rel="shortcut icon" type="image/x-icon" href="https://images.squarespace-cdn.com/content/v1/5ee1e6d81062c920d7b26763/1600780862958-3K1VT4MGJX6T85SK2JM5/ke17ZwdGBToddI8pDm48kKB4wEioUjJ1etIxVoM-raNZw-zPPgdn4jUwVcJE1ZvWEtT5uBSRWt4vQZAgTJucoTqqXjS3CfNDSuuf31e0tVGMkAGiElGl72v-v2N-gWfY8ZqTkQJlXaA8cukiw95x02bSd6kfRtgWHgNMDgGnmDY/favicon.ico?format=100w"/>
		<link rel="stylesheet" type="text/css" href="../../../yearbeyond/src/deco.css"/>
		<script type="text/javascript" src="../../../yearbeyond/src/control.js"></script>
	
	</head>
	<body onload="sayHello();">
		<nav class="identify">
			<img src="../../../yearbeyond/src/img/banner.png" alt="Welcome">
			<ul>
				<li><a href="../../../yearbeyond/" id="dateTime">32/13/3021</a></li>
				<li><a href="#">Menu</a>
					<ul>
						<li><a href="http://yearbeyond.org">Yebo page</a></li>
                        <?php
                            if (isset($_SESSION["useruid"])) {
                                echo "<li><a href='../../../yearbeyond/modules/profile.php'>Profile</a></li>";
						        echo "<li><a href='../../../yearbeyond/modules/track.php'>Track</a></li>";
								echo "<li><a href='../../../yearbeyond/modules/notice.php'>Notice Board</a></li>";
								#echo "<li><a href='../../../yearbeyond/modules/chat.php'>Chat</a></li>";
						        echo "<li><a href='http://yearbeyond-yaspo.talentlms.com/'>Access LMS</a></li>";
						        echo "<li><a href='../../../yearbeyond/includes/logout.inc.php'>Logout</a></li>";
                            }else {
                                echo "<li><a href=\"signup.php\">Sign Up</a></li>";
						        echo "<li><a href=\"login.php\">Sign In</a></li>";
                            }
                        ?>
					</ul>
				</li>
			</ul>
		</nav>
		<div class="black"></div>