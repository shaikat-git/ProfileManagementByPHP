<?php
	session_start();	
	require_once('dbcon.php');
	require_once('functions.php');
	checkLogin();
	
	$sql = "SELECT * FROM info";
	$qr = mysql_query($sql);
	
	//echo "<pre>";
	//print_r(mysql_fetch_row($qr));
	//print_r(mysql_fetch_array($qr));
	//print_r(mysql_fetch_assoc($qr));
	//echo "</pre>";
	
	
	
	$tbl = "<table border='1' cellpadding='5' cellspacing='0'>";
	$tbl .= "<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>User</th>
				<th>Course</th>
				<th>Section</th>
				<th>Shift</th>
				<th>More</th>
				<th>Images</th>
				<th>Action</th>
			</tr>";
	
	$i = 1;
	while($data = mysql_fetch_assoc($qr)){
		
		$img = isEmpty($data['Image'],'demo.png');
		
		//echo $data['Name'];
		$tbl .= "<tr>";
			$tbl .= "<td>".($i++)."</td>";
			$tbl .= "<td>".isEmpty($data['Name'])."</td>";
			$tbl .= "<td>".isEmpty($data['Email'])."</td>";
			$tbl .= "<td>".isEmpty($data['User'])."</td>";			
			$tbl .= "<td>".isEmpty(findCourse($data['Id']),' +++ ')."</td>";
			$tbl .= "<td>".isEmpty($data['Section'])."</td>";
			$tbl .= "<td>".isEmpty($data['Shift'])."</td>";			
			$tbl .= "<td>".isEmpty($data['More'])."</td>";
			$tbl .= "<td><img src='upload/".$img."' width='150'></td>";
			$tbl .= "<td>";
			$tbl .= '<form action="process.php" method="post" onsubmit="return confirm(\'Are you sure?\')">
						<input type="hidden" name="del_id" value="'.$data['Id'].'">
						<input type="submit" name="delete" value="Delete">
					</form>';
					
			$tbl .= '<form action="edit.php" method="post" onsubmit="return confirm(\'Are you sure?\')">
						<input type="hidden" name="edit_id" value="'.$data['Id'].'">
						<input type="submit" name="edit" value="Edit">
					</form>';
					
			$tbl .= "</td>";
		$tbl .= "</tr>";
	}
	
	$tbl .= "</table>";
	
	
	echo $tbl;

	//echo '<pre>';
	//print_r($_SERVER);
	//echo '</pre>';

	echo readMsg();

?>
<hr>
<h4>Hi, <?php echo $_SESSION['name']?> [ <a href="logout.php">Log Out</a>]</h4>
<a href="input.php">Add New</a>










