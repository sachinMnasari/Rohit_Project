<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\DropdownModel;
use App\Http\Services\DropDownService;
use App\Http\Requests;

//include(app_path().'\Http\Models\DropdownModel.php');
// include('../Models/DropdownModel.php');
class DropdownController extends Controller
{
    function Board(){
	$abcd = new DropdownModel();
	$rows1 = array();
	$result = $abcd->getBoard();
		if ($result->num_rows > 0) {
   		 // output data of each row
  		  while($row = $result->fetch_assoc()) {
      		  $rows1[] =$row;
    	  }
		} 	
	echo json_encode($rows1);
 	}
    function Field(Request $req){
 	//$brd = $req['board'];
 	 $brd = $req->input('board');
 	//$brd = Input::get("board");
 	//$brd='CBSE BOARD';
 	$abcd = new DropdownModel();
 	$rows1 = array();
 	$result = $abcd->getField($brd);
 		if ($result->num_rows > 0) {
   		 // output data of each row
  		  while($row = $result->fetch_assoc()) {
      		  $rows1[] =$row;
    	  }
		} 	
	echo json_encode($rows1);
	}
	 function Class1(Request $req){
    $brd = $req->input('board');
    $fld = $req->input('field');
 	//$brd = $_GET["board"];
 	//$brd = 'MAHARASHTRA BOARD';
 	//$fld=$_GET["field"];
 	//$fld = 'SECONDARY';
 	$abcd = new DropdownModel();
 	$rows1 = array();
 	$result = $abcd->getClass($brd,$fld);
 		if ($result->num_rows > 0) {
   		 // output data of each row
  		  while($row = $result->fetch_assoc()) {
      		  $rows1[] =$row;
    	  }
		} 	
	echo json_encode($rows1);
 	}
 	function Subject1(Request $req){
    $brd = $req->input('board');
    $fld = $req->input('field');
    $sub = $req->input('class1');
 	//$brd=$_GET["board"];
 	//$fld=$_GET["field"];
 	//$sub=$_GET["class1"];
 	$abcd = new DropdownModel();
 	$rows1 = array();
 	$result = $abcd->getSubject($brd,$fld,$sub);
 		if ($result->num_rows > 0) {
   		 // output data of each row
  		  while($row = $result->fetch_assoc()) {
      		  $rows1[] =$row;
    	  }
		} 	
	echo json_encode($rows1);
 	}
  function All_Comb(){
  $abcd = new DropdownModel();
  $rows1 = array();
  $final_Comb = array();
  $rows1 = $abcd->getAllComb(); 
  $abcd = new DropDownService();
  $final_Comb  = $abcd->DropDownService1($rows1);
  echo json_encode($final_Comb);
  }
}
?>