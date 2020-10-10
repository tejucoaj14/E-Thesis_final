<?php
include 'DBConn.php';

// if (isset($_POST['search'])) {
	$keyword = "%{$_POST['search']}%";
	$department = $_POST['filter'];
	$order = $_POST['sort'];

	if($order == 'date_of_research'){
		$ord = 'desc';
	}
	else {
		$ord = 'asc';
	}

	// check check check
	if ($keyword != "" && $department != 'all' && $order != 'all') {
		$stmt = $conn->prepare("SELECT research_code, thesis_title, author, place_of_study, date_of_research FROM research_files WHERE department = '$department' AND thesis_title LIKE ? OR author LIKE ? OR tags LIKE ? ORDER BY $order $ord");

		$stmt->bind_param("sss", $keyword, $keyword, $keyword);

		$stmt->execute();

		$result = $stmt->get_result();

		while ($row = mysqli_fetch_array($result)) {
			?>
			<tr data-toggle="tooltip" data-placement="bottom" title="<?php echo $row['thesis_title']; ?>">
				<td width=><?php echo $row['thesis_title']; ?></td>
				<td><?php echo $row['author']; ?></td>
				<td><?php echo $row['place_of_study']; ?></td>
				<td><?php echo $row['date_of_research']; ?></td>
				<td><a href="research_info.php?research_code=<?php echo $row['research_code']; ?>">View</a></td>
			</tr>
			<?php
		}
	}

	// x check check
	elseif ($keyword == "" && $department != 'all' && $order != 'all') {
		$showStudiesQuery = "SELECT research_code, thesis_title, author, place_of_study, date_of_research FROM research_files WHERE department = '$department' ORDER BY $order $ord";
		$result = mysqli_query($conn,$showStudiesQuery);
		while ($row = mysqli_fetch_array($result)) {
			?>
			<tr  data-toggle="tooltip" data-placement="bottom" title="<?php echo $row['thesis_title']; ?>">
				<td width=><?php echo $row['thesis_title']; ?></td>
				<td><?php echo $row['author']; ?></td>
				<td><?php echo $row['place_of_study']; ?></td>
				<td><?php echo $row['date_of_research']; ?></td>
				<td><a href="research_info.php?research_code=<?php echo $row['research_code']; ?>">View</a></td>
			</tr>
			<?php
		}
	}

	// check x x
	elseif ($keyword != "" && $department == 'all' && $order == 'all') {

	 	$stmt = $conn->prepare("SELECT research_code, thesis_title, author, place_of_study, DATE_FORMAT(date_of_research, '%M %d %Y') as date_of_research FROM research_files WHERE thesis_title LIKE ? OR author = ? OR tags LIKE ?");
		$stmt->bind_param("sss", $keyword, $keyword, $keyword);

		$stmt->execute();

		$result = $stmt->get_result();

		while ($row = mysqli_fetch_array($result)) {
			?>
			<tr data-toggle="tooltip" data-placement="bottom" title="<?php echo $row['thesis_title']; ?>">
				<td width=><?php echo $row['thesis_title']; ?></td>
				<td><?php echo $row['author']; ?></td>
				<td><?php echo $row['place_of_study']; ?></td>
				<td><?php echo $row['date_of_research']; ?></td>
				<td><a href="research_info.php?research_code=<?php echo $row['research_code']; ?>">View</a></td>
			</tr>
			<?php
		}
	}

	// check x check
	elseif ($keyword != "" && $department == 'all' && $order != 'all') {
		$stmt = $conn->prepare("SELECT research_code, thesis_title, author, place_of_study, DATE_FORMAT(date_of_research, '%M %d %Y') as date_of_research FROM research_files WHERE thesis_title LIKE ? OR author LIKE ? OR tags LIKE ? ORDER by $order $ord");

		$stmt->bind_param("sss", $keyword, $keyword, $keyword);

		$stmt->execute();

		$result = $stmt->get_result();

		while ($row = mysqli_fetch_array($result)) {
			?>
			<tr data-toggle="tooltip" data-placement="bottom" title="<?php echo $row['thesis_title']; ?>">
				<td width=><?php echo $row['thesis_title']; ?></td>
				<td><?php echo $row['author']; ?></td>
				<td><?php echo $row['place_of_study']; ?></td>
				<td><?php echo $row['date_of_research']; ?></td>
				<td><a href="research_info.php?research_code=<?php echo $row['research_code']; ?>">View</a></td>
			</tr>
			<?php
		}
	}

	// x x x
	elseif ($keyword == "" && $department == 'all' && $order == 'all') {
		$showStudiesQuery = "SELECT research_code, thesis_title, author, place_of_study, DATE_FORMAT(date_of_research, '%M %d %Y') as date_of_research FROM research_files";
		$result = mysqli_query($conn,$showStudiesQuery);
		while ($row = mysqli_fetch_array($result)) {
			?>
			<tr data-toggle="tooltip" data-placement="bottom" title="<?php echo $row['thesis_title']; ?>">
				<td width=><?php echo $row['thesis_title']; ?></td>
				<td><?php echo $row['author']; ?></td>
				<td><?php echo $row['place_of_study']; ?></td>
				<td><?php echo $row['date_of_research']; ?></td>
				<td><a href="research_info.php?research_code=<?php echo $row['research_code']; ?>">View</a></td>
			</tr>
			<?php
		}
	}


	// x check x
	elseif ($keyword == "" && $department != 'all' && $order == 'all') {
		$showStudiesQuery = "SELECT research_code, thesis_title, author, place_of_study, DATE_FORMAT(date_of_research, '%M %d %Y') as date_of_research FROM research_files WHERE department = '$department'";
		$result = mysqli_query($conn,$showStudiesQuery);
		while ($row = mysqli_fetch_array($result)) {
			?>
			<tr data-toggle="tooltip" data-placement="bottom" title="<?php echo $row['thesis_title']; ?>">
				<td width=><?php echo $row['thesis_title']; ?></td>
				<td><?php echo $row['author']; ?></td>
				<td><?php echo $row['place_of_study']; ?></td>
				<td><?php echo $row['date_of_research']; ?></td>
				<td><a href="research_info.php?research_code=<?php echo $row['research_code']; ?>">View</a></td>
			</tr>
			<?php
		}
	}

	// check check x
	elseif ($keyword != "" && $department != 'all' && $order == 'all') {
		$stmt = $conn->prepare("SELECT research_code, thesis_title, author, place_of_study, DATE_FORMAT(date_of_research, '%M %d %Y') as date_of_research FROM research_files WHERE (thesis_title LIKE ? OR author LIKE ? OR tags LIKE ?) AND department = '$department'");

		$stmt->bind_param("sss", $keyword, $keyword, $keyword);

		$stmt->execute();

		$result = $stmt->get_result();

		while ($row = mysqli_fetch_array($result)) {
			?>
			<tr data-toggle="tooltip" data-placement="bottom" title="<?php echo $row['thesis_title']; ?>">
				<td width=><?php echo $row['thesis_title']; ?></td>
				<td><?php echo $row['author']; ?></td>
				<td><?php echo $row['place_of_study']; ?></td>
				<td><?php echo $row['date_of_research']; ?></td>
				<td><a href="research_info.php?research_code=<?php echo $row['research_code']; ?>">View</a></td>
			</tr>
			<?php
		}
	}
	// x x check
	elseif ($keyword == "" && $department == 'all' && $order != 'all') {

		$showStudiesQuery = "SELECT research_code, thesis_title, author, place_of_study, DATE_FORMAT(date_of_research, '%M %d %Y') as date_of_research FROM research_files ORDER BY $order $ord";
		$result = mysqli_query($conn,$showStudiesQuery);
		while ($row = mysqli_fetch_array($result)) {
			?>
			<tr data-toggle="tooltip" data-placement="bottom" title="<?php echo $row['thesis_title']; ?>">
				<td width=><?php echo $row['thesis_title']; ?></td>
				<td><?php echo $row['author']; ?></td>
				<td><?php echo $row['place_of_study']; ?></td>
				<td><?php echo $row['date_of_research']; ?></td>
				<td><a href="research_info.php?research_code=<?php echo $row['research_code']; ?>">View</a></td>
			</tr>
			<?php
		}
	}

	else {
		$showStudiesQuery = "SELECT research_code, thesis_title, author, place_of_study, DATE_FORMAT(date_of_research, '%M %d %Y') as date_of_research FROM research_files";
		$result = mysqli_query($conn,$showStudiesQuery);
		while ($row = mysqli_fetch_array($result)) {
			?>
			<tr data-toggle="tooltip" data-placement="bottom" title="<?php echo $row['thesis_title']; ?>">
				<td><?php echo $row['thesis_title']; ?></td>
				<td><?php echo $row['author']; ?></td>
				<td><?php echo $row['place_of_study']; ?></td>
				<td><?php echo $row['date_of_research']; ?></td>
				<td><a href="research_info.php?research_code=<?php echo $row['research_code']; ?>">View</a></td>
			</tr>
			<?php
		}
	}
// }
?>
