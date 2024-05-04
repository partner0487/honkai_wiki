<?php
include("db_conn.php");
?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>index.php</title>
	<style>
		body {
			margin: 0px;
			background-image: url('image/background.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-position: center;
			background-size: cover;
		}

		a {
			text-decoration: none;
			color: white;
			font-family: 微軟正黑體, 新細明體, 標楷體;
			font-weight: bold;
			font-size: 17px;
		}

		a:hover {
			text-decoration: none;
			color: white;
			font-family: 微軟正黑體, 新細明體, 標楷體;
			font-weight: bold;
			font-size: 17px;
		}

		.menu {
			position: fixed;
			width: 100%;
			height: 40px;
			background-color: dimgrey;
			z-index: 9999999;
		}

		.menu_css {
			float: left;
			width: 100%;
			height: inherit;
			overflow: hidden;
			font-family: 微軟正黑體, 新細明體, 標楷體;
			font-weight: bold;
			font-size: 17px;
			color: white;
			border-spacing: 0px;
		}

		.menu_css tr {
			display: block;
		}

		.menu_css td {
			height: 40px;
			padding: 0px 15px 0px 15px;
			white-space: nowrap;
		}

		.menu_css td:hover {
			background-color: black;
			transition: background-color 0.8s;
		}

		.content {
			position: relative;
			word-wrap: break-word;
			width: 100%;
			top: 40px;
		}

		li img {
			height: 95%;
			max-width: 100%;
		}
		.bx-wrapper .bx-prev {
			left: 10px;
			background: url(images/controls.png) no-repeat 0 -32px
		}

		.bx-wrapper .bx-prev:focus,
		.bx-wrapper .bx-prev:hover {
			background-position: 0 0
		}

		.bx-wrapper .bx-next {
			right: 10px;
			background: url(images/controls.png) no-repeat -43px -32px
		}

		.bx-wrapper .bx-next:focus,
		.bx-wrapper .bx-next:hover {
			background-position: -43px 0
		}

		.bx-wrapper .bx-controls-direction a {
			position: absolute;
			top: 50%;
			margin-top: -16px;
			outline: 0;
			width: 32px;
			height: 32px;
			text-indent: -9999px;
			z-index: 9999
		}
	</style>
	<script src="layout.css"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.bxslider.min.js"></script>
	<script>
		$(document).ready(function () {
			slider = $('.bxslider').bxSlider(
				{
					pagerCustom: '#bx-pager'
				}
			);
			slider.startAuto();
		});
	</script>
</head>

<body>
	<div class="menu">
		<table class="menu_css">
			<tr>
				<td>
					<a href="index.php">Home</a>
				</td>
				<td>
					<a href="light_cone.php">光錐</a>
				</td>
				<td>
					<a href="relics.php">儀器</a>
				</td>
				<td>
					<a href="role.php">角色</a>
				</td>
			</tr>
		</table>
	</div>
	<center>
		<div class="content">
			<div>
				<ul class="bxslider">
					<li><img src="image/1.png" /></li>
					<li><img src="image/2.png" /></li>
					<li><img src="image/3.png" /></li>
					<li><img src="image/4.png" /></li>
					<li><img src="image/5.png" /></li>
					<li><img src="image/6.png" /></li>
					<li><img src="image/7.png" /></li>
					<li><img src="image/8.png" /></li>
					<li><img src="image/9.png" /></li>
					<li><img src="image/10.png" /></li>
					<li><img src="image/11.png" /></li>
					<li><img src="image/12.png" /></li>
					<li><img src="image/13.png" /></li>
					<li><img src="image/14.png" /></li>
					<li><img src="image/15.png" /></li>
					<li><img src="image/16.png" /></li>
					<li><img src="image/17.png" /></li>
					<li><img src="image/18.png" /></li>
					<li><img src="image/19.png" /></li>
					<li><img src="image/20.png" /></li>
					<li><img src="image/21.png" /></li>
					<li><img src="image/22.png" /></li>
					<li><img src="image/23.png" /></li>
					<li><img src="image/24.png" /></li>
					<li><img src="image/25.png" /></li>
					<li><img src="image/26.png" /></li>
					<li><img src="image/27.png" /></li>
					<li><img src="image/28.png" /></li>
					<li><img src="image/29.png" /></li>
					<li><img src="image/30.png" /></li>
					<li><img src="image/31.png" /></li>
					<li><img src="image/32.png" /></li>
					<li><img src="image/33.png" /></li>
					<li><img src="image/34.png" /></li>
					<li><img src="image/35.png" /></li>
				</ul>
			</div>
		</div>
	</center>
</body>

</html>