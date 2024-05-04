<?php
include("db_conn.php");
?>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>index.php</title>
	<link type="text/css" rel="stylesheet" href="layout.css">
	<link type="text/css" rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.css">
	<link type="text/css" rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
	<script>
		function InsertContent() {
			document.getElementById("ID").value = document.getElementById("ID").value;
			document.getElementById("name").value = document.getElementById("name").value;
			document.getElementById("path").value = document.getElementById("path").value;
			document.getElementById("type").value = document.getElementById("type").value;
			document.getElementById("relics_name").value = document.getElementById("relics_name").value;
			document.getElementById("mfrom").action = "role_addsave.php";
			document.getElementById("mfrom").submit();
		}
	</script>
</head>

<body>
	<form id="mfrom" method="post" action="role.php">
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
				<div class="inner_content">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>ID</th>
								<th>角色名</th>
								<th>命途</th>
								<th>屬性</th>
								<th>推薦儀器</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th scope="row"><a class="btn btn-default" role="button"
										onclick="InsertContent();">新增</a></th>
								<td><input type="text" id="ID" name="ID" value="" style="width:100%;" /></td>
								<td><input type="text" id="name" name="name" value="" style="width:100%;" /></td>
								<td><input type="text" id="path" name="path" value="" style="width:100%;" /></td>
								<td><input type="text" id="type" name="type" value="" style="width:100%;" /></td>
								<td><input type="text" id="relics_name" name="relics_name" value=""
										style="width:100%;" /></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</center>
	</form>
</body>

</html>