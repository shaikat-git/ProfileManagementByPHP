<?php
	@session_start();
	require_once('dbcon.php');	
	isGet();
	
	
	function saveMe($arg){			
			return addslashes(htmlspecialchars(trim($arg)));	
	}
	
	function checkLogin(){
		if(!isset($_SESSION['login']) && $_SESSION['login'] != 'Done' && !isset($_SESSION['name'])){
			header('Location: login.php');
			exit;
		}
	}
	
	function isGet(){
		if($_SERVER['REQUEST_METHOD'] == 'GET' && basename($_SERVER['REQUEST_URI'])=='functions.php'){
			header('Location: index.php');
			exit;	
		}
	}
	
	
	function isEmpty($data, $fillwith = '----------'){
	
		if(empty($data)){			
			return $fillwith;		
		}
		
		return $data;
	}
	
	
	function addMsg($msg = ""){			
			if(!empty($msg)){
				$_SESSION['msg'] .= $msg ."<br/>";
			}	
	}
	
	function readMsg(){
		if(!empty($_SESSION['msg'])){
			$x =  $_SESSION['msg'];
			$_SESSION['msg']="";
			return $x;
		}
		return false;	
	}
	
	
	 function findByField($what,$table,$field,$val){
				
			$val_list = array();
	 
			$qr = mysql_query("SELECT $what FROM $table WHERE $field = '$val' ");
			if(mysql_num_rows($qr) > 0){
				
				while($data = mysql_fetch_assoc($qr)){
					$val_list[] = $data[$what];
				}				
			}			
			return $val_list;
	 }
	 
	 function findCourse($id){
		$list = array();
		$qr = mysql_query("SELECT nick 
					FROM choice ch, courses co
					WHERE ch.c_id = co.sn 
					AND ch.u_id = $id");
					
		if(mysql_num_rows($qr) > 0){
			while($data = mysql_fetch_assoc($qr)){
				$list[] = $data['nick'];
			}			
		}
		
		return implode(', ',$list);
	 }
	
	
	
	// function to upload a file;
	function uploadFile($file,$expected_ext,$expected_size,$upload_dir){
	
		$upload_errors = array(
		
		UPLOAD_ERR_OK 			=> "No errors.",
		UPLOAD_ERR_INI_SIZE  	=> "Larger than upload_max_filesize.",
		UPLOAD_ERR_FORM_SIZE 	=> "Larger than form MAX_FILE_SIZE.",
		UPLOAD_ERR_PARTIAL 		=> "Partial upload.",
		UPLOAD_ERR_NO_FILE 		=> "No file.",
		UPLOAD_ERR_NO_TMP_DIR   => "No temporary directory.",
		UPLOAD_ERR_CANT_WRITE   => "Can't write to disk.",
		UPLOAD_ERR_EXTENSION 	=> "File upload stopped by extension."
		);
	
		$problem = "";
		
		@mkdir($upload_dir,0777);
		
		$name 	= $file['name'];
		$tmp 	= $file['tmp_name'];
		$error	= $file['error'];
		$size 	= $file['size'];
		
		//$expected_ext = array('jpg','jpeg','png');
		$expected_size = ($expected_size*1024);
		
		$x = explode('.',strtolower($name));
		$ext = strtolower(array_pop($x));
		
		if($error == 4){		
			$problem .= $upload_errors[$error]."<br>";
		}else{

			if($error != 0){
				$problem .= $upload_errors[$error]."<br>";
			}	
			if(!in_array($ext,$expected_ext)){			
				$problem .= "We do expect ".implode(', ',$expected_ext)." extentions only <br/>";
			}
			
			if($size > $expected_size){
				$problem .= "File Should be less than or equal to ".($expected_size/1024)."KB";
			}
		}
		
		
		$final_name = time()."_nhipp_38.".$ext;
		$path = $upload_dir."/".$final_name;
		
		if(empty($problem)){
			if(move_uploaded_file($tmp,$path)){
				return $final_name;
			}else{
				$problem .= "Unable to move file to upload directory";
			}
		}
		
		addMsg($problem);
		
		return false;
	}
	

?>