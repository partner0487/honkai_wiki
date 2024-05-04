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
		function ChangeContent(ID) {
			document.getElementById("ID").value = ID;
			document.getElementById("mfrom").action = "role.php";
			document.getElementById("mfrom").submit();
		}

		function UpdateContent() {
			document.getElementById("ID").value = document.getElementById("ID").value;
			document.getElementById("name").value = document.getElementById("name").value;
			document.getElementById("path").value = document.getElementById("path").value;
			document.getElementById("type").value = document.getElementById("type").value;
			document.getElementById("relics_name").value = document.getElementById("relics_name").value;
			document.getElementById("mfrom").action = "role_mdysave.php";
			document.getElementById("mfrom").submit();
		}

		function DeleteContent(ID) {
			document.getElementById("ID").value = ID;
			document.getElementById("mfrom").action = "role_delsave.php";
			document.getElementById("mfrom").submit();
		}

		function InsertContent() {
			document.getElementById("mfrom").action = "role_add.php";
			document.getElementById("mfrom").submit();
		}
	</script>
</head>

<body>
	<form id="mfrom" method="post" action="role.php">
		<input type="hidden" id="ID" name="ID" value="<?php echo isset($_POST["ID"]) ? $_POST["ID"] : "" ?>">
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
			<table class="menu_search">
				<tr>
					<td>
						<form method="post" action="role.php">
							Search
							<input type="text" id="keyword" name="keyword" value="" placeholder="輸入搜尋關鍵字" />
							<input type="submit" class="send" value="🔍">
						</form>
					</td>
				</tr>
			</table>
		</div>
		<center>
			<div class="content">
				<div class="inner_content">
					<h1>角色</h1>
					<hr class="title_hr"
						style="background-image: linear-gradient(to right, SpringGreen, DarkGreen, Cyan);" />
					<br>
					<div
						style="text-align: left;font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size: 15px;font-weight: bold;">
						總數量為:
						<?php
						if (isset($_POST["ID"]) && !empty($_POST["ID"])) {
							$ID = $_POST["ID"];

							$sql = "SELECT COUNT(*)
								FROM role r
								WHERE ID = ? ";
							$stmt = $db->prepare($sql);
							$error = $stmt->execute(array($ID));

							if ($rowcount = $stmt->fetchColumn())
								echo $rowcount;
						} else if (isset($_POST["keyword"])) {
							$keyword = $_POST["keyword"];
							if ($keyword == '') {
								$keyword = '%';
							} else {
								$keyword = '%' . $keyword . '%';
							}
							$sql = "SELECT COUNT(*) FROM role WHERE ID LIKE ? or name LIKE ? or path LIKE ? or type LIKE ? or relics_id LIKE ?";
							$stmt = $db->prepare($sql);
							$error = $stmt->execute(array($keyword, $keyword, $keyword, $keyword, $keyword));

							if ($rowcount = $stmt->fetchColumn())
								echo $rowcount;
						} else {
							$sql = "SELECT COUNT(*) FROM role";
							$stmt = $db->prepare($sql);
							$error = $stmt->execute();

							if ($rowcount = $stmt->fetchColumn())
								echo $rowcount;
						}
						?>
						<input type="button" value="新增" onclick="InsertContent();">
					</div>
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>角色名</th>
								<th>命途</th>
								<th>屬性</th>
								<th>推薦儀器</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if (isset($_POST["ID"]) && !empty($_POST["ID"])) {
								$ID = $_POST["ID"];

								$sql = "SELECT r.ID, r.name, r.path, r.type, r.relics_id, relics.name as relics_name
								FROM role r
								JOIN relics ON r.relics_id = relics.relics_id
								WHERE ID = ? ";
								if ($stmt = $db->prepare($sql)) {
									$stmt->execute(array($ID));
									if ($result = $stmt->fetch()) {
										?>
										<tr>
											<th scope="row">
												<a class="btn btn-default" role="button" onclick="UpdateContent();">更新</a>
											</th>
											<td>
												<input type="text" id="name" name="name" value="<?php echo $result['name']; ?>"
													style="width:100%;" />
											</td>
											<td>
												<input type="text" id="path" name="path" value="<?php echo $result['path']; ?>"
													style="width:100%;" />
											</td>
											<td>
												<input type="text" id="type" name="type" value="<?php echo $result['type']; ?>"
													style="width:100%;" />
											</td>
											<td>
												<input type="text" id="relics_name" name="relics_name"
													value="<?php echo $result['relics_id']; ?>" style="width:100%;" />
											</td>
										</tr>
										<?php
									}
								}
							} else if (isset($_POST["keyword"])) {
								$keyword = $_POST["keyword"];
								if ($keyword == '') {
									$keyword = '%';
								} else {
									$keyword = '%' . $keyword . '%';
								}
								$sql = "SELECT r.ID, r.name, r.path, r.type, relics.name as relics_name
							FROM role r
							JOIN relics ON r.relics_id = relics.relics_id
							WHERE r.ID LIKE ? or r.name LIKE ? or r.path LIKE ? or r.type LIKE ? or relics.name LIKE ? 
							ORDER BY ID ";
								if ($stmt = $db->prepare($sql)) {
									$stmt->execute(array($keyword, $keyword, $keyword, $keyword, $keyword));
									for ($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++) {

										?>
											<tr>
												<th nowrap="nowrap" scope="row">
												<?php echo $rows[$count]['ID']; ?>
												</th>
												<td nowrap="nowrap">
												<?php echo $rows[$count]['name']; ?>
												</td>
												<td nowrap="nowrap">
												<?php echo $rows[$count]['path']; ?>
												</td>
												<td nowrap="nowrap">
												<?php echo $rows[$count]['type']; ?>
												</td>
												<td nowrap="nowrap">
												<?php echo $rows[$count]['relics_name']; ?>
												</td>
											</tr>

										<?php
									}
								}
							} else {
								$sql = "SELECT role.ID, role.name, role.path, role.type, relics.name as relics_name
							FROM role 
							JOIN relics ON role.relics_id = relics.relics_id
							ORDER BY ID ";
								if ($stmt = $db->prepare($sql)) {
									$stmt->execute();
									for ($rows = $stmt->fetchAll(), $count = 0; $count < count($rows); $count++) {
										?>
											<tr>
												<th nowrap="nowrap" scope="row">
												<?php echo $rows[$count]['ID']; ?>
												</th>
												<td nowrap="nowrap">
												<?php echo $rows[$count]['name']; ?>
												</td>
												<td nowrap="nowrap">
												<?php echo $rows[$count]['path']; ?>
												</td>
												<td nowrap="nowrap">
												<?php echo $rows[$count]['type']; ?>
												</td>
												<td nowrap="nowrap">
												<?php echo $rows[$count]['relics_name']; ?>
												</td>
												<td nowrap="nowrap" style="width:30px;">
													<input type="button" value="編輯"
														onclick="ChangeContent('<?php echo $rows[$count]['ID']; ?>');">
													<hr>
													<input type="button" value="刪除"
														onclick="DeleteContent('<?php echo $rows[$count]['ID']; ?>');">
												</td>
											</tr>
										<?php
									}
								}
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</center>
	</form>
</body>

</html>