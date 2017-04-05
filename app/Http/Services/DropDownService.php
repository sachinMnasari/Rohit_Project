<?php
namespace App\Http\Services;
use App\Http\Services\Board;
use App\Http\Services\Classes;
use App\Http\Services\Field;
use App\Http\Services\Subject;
class DropDownService{
function DropDownService1($rows1){
	$Subjects1 = array();
	$Classes1 = array();
	$Fields1 = array();
	$Boards1 = array();

	$subject_name_var =null;
	$subject_ID_var =null;
	$board_name_var =null;
	$board_ID_var =null;
	$field_name_var =null;
	$field_ID_var =null;
	$class_name_var =null;
	$class_ID_var =null;
	$j=0;$k=0;$l=0;$m=0;
	$json = json_encode($rows1);
	$obj = json_decode($json);
	for ($i=0; $i < sizeof($obj); $i++) { 
			if($i==0){
				$board_name_var = $obj[$i]->Board_name;
				$board_ID_var = $obj[$i]->Board_id;
				$field_name_var = $obj[$i]->field_nm;
				$field_ID_var = $obj[$i]->Field_Id;
				$class_name_var = $obj[$i]->class_name;
				$class_ID_var = $obj[$i]->class_id;
				$subject_name_var = $obj[$i]->subject_name;
				$subject_ID_var = $obj[$i]->Subject_Id;
				 $s1 = new Subject;
				 $s1->Sub_Nm = $obj[$i]->subject_name;
				 $s1->sub_ID = $obj[$i]->Subject_Id;
				 $Subjects1[$j]=$s1;$j++;

			}else{
				if($board_name_var==$obj[$i]->Board_name && $field_name_var==$obj[$i]->field_nm && $class_name_var==$obj[$i]->class_name){
					$s1 = new Subject;
				 	$s1->Sub_Nm = $obj[$i]->subject_name;
					$s1->sub_ID = $obj[$i]->Subject_Id;
					$Subjects1[$j]=$s1;$j++;
					$subject_name_var = $obj[$i]->subject_name;
					$subject_ID_var = $obj[$i]->Subject_Id;
				}else{
					if($board_name_var==$obj[$i]->Board_name && $field_name_var==$obj[$i]->field_nm){
						$c1= new Classes;
						$c1->Class_ID = $class_ID_var;
						$c1->Class_nm = $class_name_var;
						$c1->Subjects = $Subjects1;
						$Classes1[$k] =$c1;$k++;
						$class_name_var = $obj[$i]->class_name;
						$class_ID_var = $obj[$i]->class_id;
						$s1 = new Subject;
						$s1->Sub_Nm = $obj[$i]->subject_name;
				 		$s1->sub_ID = $obj[$i]->Subject_Id;
				 		$Subjects1 = array();$j=0;
						$Subjects1[$j]=$s1;$j++;
						$subject_name_var = $obj[$i]->subject_name;
						$subject_ID_var = $obj[$i]->Subject_Id;
					}else{
						if($board_name_var==$obj[$i]->Board_name){
							$c1= new Classes;
							$c1->Class_ID = $class_ID_var;
							$c1->Class_nm = $class_name_var;
							$c1->Subjects = $Subjects1;
							$Classes1[$k] =$c1;$k++;
//------------------------------------------------------------------------------------							
							$f1 = new Field;
							$f1->Field_NM = $field_name_var;
							$f1->Field_ID = $field_ID_var;
							$f1->Classes = $Classes1;
							$Fields1[$l] = $f1;$l++;
							$field_name_var = $obj[$i]->field_nm;
							$field_ID_var = $obj[$i]->Field_Id;
							$class_name_var = $obj[$i]->class_name;
							$class_ID_var = $obj[$i]->class_id;
							$subject_name_var = $obj[$i]->subject_name;
							$subject_ID_var = $obj[$i]->Subject_Id;
							$s1 = new Subject;
							$s1->Sub_Nm = $obj[$i]->subject_name;
				 			$s1->sub_ID = $obj[$i]->Subject_Id;
				 			$Subjects1 = array();$j=0;
				 			$Classes1 =array();$k=0;
				 			$Subjects1[$j]=$s1;$j++;
						}else{
							$c1= new Classes;
							$c1->Class_ID = $class_ID_var;
							$c1->Class_nm = $class_name_var;
							$c1->Subjects = $Subjects1;
							$Classes1[$k] =$c1;$k++;
//------------------------------------------------------------------------							
							$f1 = new Field;
							$f1->Field_NM = $field_name_var;
							$f1->Field_ID = $field_ID_var;
							$f1->Classes = $Classes1;
							$Fields1[$l] = $f1;$l++;
//-------------------------------------------------------------------------							
							$b1 = new Board;
							$b1->Board_NM = $board_name_var;
							$b1->Board_ID = $board_ID_var;
							$b1->Fields = $Fields1;
							$Boards1[$m] = $b1;$m++;
							$board_name_var = $obj[$i]->Board_name;
							$board_ID_var = $obj[$i]->Board_id;
							$field_name_var = $obj[$i]->field_nm;
							$field_ID_var = $obj[$i]->Field_Id;
							$class_name_var = $obj[$i]->class_name;
							$class_ID_var = $obj[$i]->class_id;
							$subject_name_var = $obj[$i]->subject_name;
							$subject_ID_var = $obj[$i]->Subject_Id;
							$s1 = new Subject;
							$s1->Sub_Nm = $obj[$i]->subject_name;
				 			$s1->sub_ID = $obj[$i]->Subject_Id;
				 			$Subjects1 = array();$j=0;
				 			$Classes1 =array();$k=0;
				 			$Fields1 =array();$l=0;
				 			$Subjects1[$j]=$s1;$j++;				
						}
					}
				}
			}
		}
		IF ($i==sizeof($obj)){
				$c1= new Classes;
				$c1->Class_ID = $class_ID_var;
				$c1->Class_nm = $class_name_var;
				//echo $c1->Class_nm;
				$c1->Subjects = $Subjects1;
				$Classes1[$k] =$c1;$k++;
//------------------------------------------------------------------------							
				$f1 = new Field;
				$f1->Field_NM = $field_name_var;
				$f1->Field_ID = $field_ID_var;
				$f1->Classes = $Classes1;
				$Fields1[$l] = $f1;$l++;
//-------------------------------------------------------------------------							
				$b1 = new Board;
				$b1->Board_NM = $board_name_var;
				$b1->Board_ID = $board_ID_var;
				$b1->Fields = $Fields1;
				$Boards1[$m] = $b1;$m++;			
		}
		return $Boards1;
}
}
?>