<?php
	session_start();
	require_once('dbcon.php');
	require_once('functions.php');
	checkLogin();
	isGet();	
	
	
	if(isset($_POST['edit'])){		
		$eid = (int)$_POST['edit_id'];		
		$qr = mysql_query("SELECT * FROM info WHERE Id = '$eid'");		
		$edit_info = mysql_fetch_assoc($qr);	
	}
	
	//print_r($edit_info);

?>


<form method="post" action="process.php" enctype="multipart/form-data">
<input type="hidden" name="update_id" value="<?php echo $edit_info['Id'];?>">
<input type="hidden" name="old_img" value="<?php echo $edit_info['Image'];?>">
	<p>
		<label>Full Name 
		<input type="text" name="name" value="<?php echo $edit_info['Name'];?>" placeholder="Full Name" required>
		</label>
	</p>
	
	<p>
		<label>Email 
		<input type="email" name="email" value="<?php echo $edit_info['Email'];?>" placeholder="Email" required>
		</label>
	</p>
	
	<p>
		<label>User Name 
		<input type="text" name="user" value="<?php echo $edit_info['User'];?>" placeholder="User Name" required>
		</label>
	</p>
	
	<p>
		<label>Password 
		<input type="password" name="pass" value="" placeholder="Password" required>
		</label>
	</p>
	
	<p>
		<label>Course Name 
		<select name="course[]" multiple>
			<option value="">Select One</option>
			<?php
			$selected_course = findByField('c_id','choice','u_id',$edit_info['Id']);
			$qr = mysql_query("SELECT * FROM courses ORDER BY nick");				

			$op="";
			while($data = mysql_fetch_assoc($qr)){				
				$op .= "<option ";
				$op .= (in_array( $data['sn'],$selected_course))?'selected':'';				
				$op .= " value='".$data['sn']."'>".$data['nick']."</option>";
			}
			echo $op;
			?>
			
			
			
			
		</select>
		
		
		
		</label>
	</p>
	
	<p>Section
		<?php			
			$sec =  $edit_info['Section'];
			$seclist = explode(',',$sec);			
		?>
		<label>	<input <?php echo (in_array('Design',$seclist))?'checked':'' ?> type="checkbox" name="section[]" value="Design"> Design	</label>
		<label>	<input <?php echo (in_array('Development',$seclist))?'checked':'' ?> type="checkbox" name="section[]" value="Development"> Development	</label>
	</p>
	
	<p>Shift
		<label>	<input <?php echo ($edit_info['Shift'] == "Morning")? 'checked':'' ?>  type="radio" name="shift" value="Morning"> Morning	</label>
		<label>	<input <?php echo ($edit_info['Shift'] == "Day")? 'checked':'' ?> type="radio" name="shift" value="Day"> Day	</label>
		<label>	<input <?php echo ($edit_info['Shift'] == "Evening")? 'checked':'' ?> type="radio" name="shift" value="Evening"> Evening	</label>
	</p>
	
	<p>
		<label>Choose An Image 
			<input type="file" name="myfile" >
		</label>
	</p>
	
	<p>More Information:
	<textarea name="more"><?php echo $edit_info['More'];?></textarea>
	</p>
	
	<input type="submit" name="update" value="Update">
	<input type="reset" name="reset" value="Reset">

</form>



<hr>
<h4>Hi, <?php echo $_SESSION['name']?> [ <a href="logout.php">Log Out</a>]</h4>
<a href="index.php">View Data</a>









