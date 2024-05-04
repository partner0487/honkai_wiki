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
		<table class="menu_search">
			<tr>
				<td>
					<form method="post" action="light_cone.php">
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
				<h1>光錐</h1>
				<hr class="title_hr" style="background-image: linear-gradient(to right, red, #333, Gold);" />
				<br>
				<div
					style="text-align: left;font-family: &quot;Helvetica Neue&quot;,Helvetica,Arial,sans-serif;font-size: 15px;font-weight: bold;">
					總數量為:
					<?php
					if (isset($_POST["keyword"])) {
						$keyword = $_POST["keyword"];
						if ($keyword == '') {
							$keyword = '%';
						} else {
							$keyword = '%' . $keyword . '%';
						}
						$sql = "SELECT COUNT(*) FROM light_cone WHERE ID LIKE ? or name LIKE ? or path LIKE ? or description LIKE ? order by ID ";
						$stmt = $db->prepare($sql);
						$error = $stmt->execute(array($keyword, $keyword, $keyword, $keyword));

						if ($rowcount = $stmt->fetchColumn())
							echo $rowcount;
					} else {
						$sql = "SELECT COUNT(*) FROM light_cone";
						$stmt = $db->prepare($sql);
						$error = $stmt->execute();

						if ($rowcount = $stmt->fetchColumn())
							echo $rowcount;
					}
					?>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>光錐名</th>
							<th>命途</th>
							<th>光錐技能</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (isset($_POST["keyword"])) {
							$keyword = $_POST["keyword"];
							if ($keyword == '') {
								$keyword = '%';
							} else {
								$keyword = '%' . $keyword . '%';
							}
							$sql = "SELECT * FROM light_cone WHERE ID LIKE ? or name LIKE ? or path LIKE ? or description LIKE ? order by ID ";
							if ($stmt = $db->prepare($sql)) {
								$stmt->execute(array($keyword, $keyword, $keyword, $keyword));
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
										<td>
											<?php echo $rows[$count]['description']; ?>
										</td>
									</tr>

									<?php
								}
							}
						} else {
							$sql = "SELECT * FROM light_cone order by ID";
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
										<td>
											<?php echo $rows[$count]['description']; ?>
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
</body>

</html>