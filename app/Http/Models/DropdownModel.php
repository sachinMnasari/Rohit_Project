<?php
   namespace App\Http\Models;


 Class DropdownModel{
   var $pk;
   var $board_id;
   var $board_name;
   var $field_id;
   var $field_nm;
   var $class_id;
   var $class_name;
   var $subject_id;
   var $subject_name;
	 
   function getBoard(){
   		$link =  mysqli_connect('localhost:3306','root','root','rohit_tutorials'); 
   		if (!$link) { 
			die('Could not connect to MySQL: ' . mysql_error()); 
		} 
   		//$rows1 = array();
	 	$result = $link -> query("SELECT distinct board_ID,Board_Name from subject_temp;");
	 	mysqli_close($link);
	 	return $result;
   }
   function getField($brd){
   		$board_name=$brd;
   		$link =  mysqli_connect('localhost:3306','root','root','rohit_tutorials'); 
   		if (!$link) { 
			die('Could not connect to MySQL: ' . mysql_error()); 
		} 
   		$result = $link -> query("select distinct field_ID,Field_nm from subject_temp where board_name='".$board_name."'");
   		mysqli_close($link);
   		return $result;
   }
  function getClass($brd,$fld){
   		$board_name=$brd;
   		$field_nm=$fld;
   		$link =  mysqli_connect('localhost:3306','root','root','rohit_tutorials'); 
   		if (!$link) { 
			die('Could not connect to MySQL: ' . mysql_error()); 
		} 
   		$result = $link -> query("select distinct Class_ID,Class_Name from subject_temp where board_name='".$board_name."'and field_nm='".$field_nm."'");
   		mysqli_close($link);
   		return $result;
   }
   function getSubject($brd,$fld,$sub){
   		$board_name=$brd;
   		$field_nm=$fld;
   		$subject_name =$sub; 
   		$link =  mysqli_connect('localhost:3306','root','root','rohit_tutorials'); 
   		if (!$link) { 
			die('Could not connect to MySQL: ' . mysql_error()); 
		} 
   		$result = $link -> query("select Distinct Subject_ID,subject_name from subject_temp where board_name='".$board_name."'and field_nm='".$field_nm."'and class_name='".$subject_name."'");
   		mysqli_close($link);
   		return $result;
   }
}
?>