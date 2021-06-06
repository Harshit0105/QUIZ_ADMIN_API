<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Utility extends CI_Controller {

function __construct(){
parent::__construct();
$baseurl=base_url();
$this->load->model('Admin_General_ssu_Model');
$this->load->model('Admin_General_mu_Model');
$this->load->model('Admin_General_rr_Model');
/*if(! $this->session->userdata('adminid'))
redirect('/');*/
}

public function index()
{
	$baseurl=base_url();
	echo $baseurl;
}

public function getStandards() {
	$allCat=$this->Admin_General_ssu_Model->getAllStandards();
	$response = $this->createResponse(true,$allCat,'Standard Data');
	header('Content-Type: application/json');
    echo json_encode( $response );
}

public function getSubjects() {
	$allCat=$this->Admin_General_ssu_Model->getAllSubjects();
	$response = $this->createResponse(true,$allCat,'Subjects Data');
	header('Content-Type: application/json');
    echo json_encode( $response );
}

public function getUnits() {
	$std =  $this->uri->segment(3);
  	$sub =  $this->uri->segment(4);
  	if(empty($std)) {
  		$response = $this->createResponse(false,null,'Please provide standard id.');
  	} else if (empty($sub)) {
		$response = $this->createResponse(false,null,'Please provide subject id.');
  	} else {
  		$allCat=$this->Admin_General_ssu_Model->getUnitsByIds($std,$sub);	
		$response = $this->createResponse(true,$allCat,'Unit Data');
  	}
	header('Content-Type: application/json');
    echo json_encode( $response );
}

public function getMcqs() {
	$id =  $this->uri->segment(3);	
	if(empty($id)) {
		$response = $this->createResponse(false,null,'Please provide unit id.');
	} else {
		$allCat=$this->Admin_General_mu_Model->getSingleMcqs($id);
		$response = $this->createResponse(true,$allCat,'Mcqs');
	}
	header('Content-Type: application/json');
    echo json_encode( $response );
}

public function submitAnswer() {
	$unitId=$this->input->post('unitId');
	$subjectId=$this->input->post('subjectId');
	$standardId=$this->input->post('standardId');
	$TotalMcq=$this->input->post('TotalMcq');
	$CorrectMcq=$this->input->post('CorrectMcq');
	$UserID=$this->input->post('UserID');
	$GroupID=$this->input->post('GroupID');	

	if(empty($unitId) || empty($subjectId) || empty($standardId) || empty($TotalMcq) || $CorrectMcq==NULL || empty($UserID)) {
		$response = $this->createResponse(false,null,'Please provide all the required details.');
	} else {
		$res = $this->Admin_General_rr_Model->addResult($UserID,$GroupID,$standardId,$subjectId,$unitId,$TotalMcq,$CorrectMcq);
		if($res) {
			$response = $this->createResponse(true,null,'Answere submitted successfully.');
		} else {
			$response = $this->createResponse(false,null,'Some error occured.');
		}
	}

	header('Content-Type: application/json');
    echo json_encode( $response );
}

public function createRoom() {
	$subjectId=$this->input->post('subjectId');
	$standardId=$this->input->post('standardId');
	$UserID=$this->input->post('UserID');
	$unitId=$this->input->post('unitId');
	$timing=$this->input->post('timing');
	$roomStatus = "STARTED";
	$roomCode = mt_rand(100000, 999999);
	
	if(empty($unitId) || empty($subjectId) || empty($standardId) || empty($UserID || empty($timing))) {
		$response = $this->createResponse(false,null,'Please provide all the required details.');
	} else {
		$res = $this->Admin_General_rr_Model->addRoom($roomCode,$UserID,$standardId,$subjectId,$unitId,$roomStatus,$timing);
		if($res) {
			$response = $this->createResponse(true,array('roomId' => $roomCode),'Room Created successfully.');
		} else {
			$response = $this->createResponse(false,null,'Some error occured.');
		}
	}

	header('Content-Type: application/json');
    echo json_encode( $response );
}

public function joinRoom() {
	$roomId=$this->input->post('roomId');
	$UserID=$this->input->post('UserID');
	if(empty($roomId) || empty($UserID)) {
		$response = $this->createResponse(false,null,'Please provide all the required details.');
	} else {
		$res = $this->Admin_General_rr_Model->addJoin($roomId,$UserID);
		if($res) {
			$response = $this->createResponse(true,array('joinId'=>$res->join_id,'roomId' => $roomId),'Room Joined successfully.');
		} else {
			$response = $this->createResponse(false,null,'Some error occured.');
		}
	}

	header('Content-Type: application/json');
    echo json_encode( $response );
}

public function getRoomMcq($id) {
	$id = $this->uri->segment(3);
	if(empty($id)) {
		$response = $this->createResponse(false,null,'Please provide room id.');
	} else {
		$allCat=$this->Admin_General_rr_Model->getById($id);
		$allCat1=$this->Admin_General_mu_Model->getSingleMcqs($allCat->unit_id);
		$temp=str_replace(array("[","]",'"'),"",$allCat->mcqids);		
		$mcqids=explode(",",$temp);
		// var_dump($mcqids);
		$mcqArray=array();
		foreach($allCat1 as $mcq){
			if(in_array($mcq->mcq_id,$mcqids)){
				array_push($mcqArray,$mcq);
			}
		}
		$response = $this->createResponse(true,$mcqArray,'Room Mcqs');
	}
	header('Content-Type: application/json');
    echo json_encode( $response );
}

public function createResponse($check,$data,$msg) {
	if($check) {
		return array('status' => 'success', 'responseCode' => 200, 'message' => $msg, 'data' => $data );
	} else {
		return array('status' => 'failed', 'responseCode' => 400, 'message' => $msg, 'data' => $data );
	}
}

public function getUserResults() {
	$id =  $this->uri->segment(3);	
	if(empty($id)) {
		$response = $this->createResponse(false,null,'Please provide user id.');
	} else {
		$allCat=$this->Admin_General_rr_Model->getUserResults($id);
		$response = $this->createResponse(true,$allCat,'Results');
	}
	header('Content-Type: application/json');
    echo json_encode( $response );
}

public function getTutorials() {
	$id =  $this->uri->segment(3);	
	if(empty($id)) {
		$response = $this->createResponse(false,null,'Please provide user id.');
	} else {
		$allCat=$this->Admin_General_ssu_Model->getTutorialByUnit($id);
		$response = $this->createResponse(true,$allCat,'Tutorial');
	}
	header('Content-Type: application/json');
    echo json_encode( $response );
}

public function getSubjectsByStandard() {
	$id =  $this->uri->segment(3);	
	if(empty($id)) {
		$response = $this->createResponse(false,null,'Please provide standard id.');
	} else {
		$allCat=$this->Admin_General_ssu_Model->getSubjectsByStd($id);
		$response = $this->createResponse(true,$allCat,'Subjects');
	}
	header('Content-Type: application/json');
    echo json_encode( $response );
}

public function getUpcomingTests() {
	$id =  $this->uri->segment(3);	
	if(empty($id)) {
		$response = $this->createResponse(false,null,'Please provide standard id.');
	} else {
		$allCat=$this->Admin_General_rr_Model->getUpcomingTestByStandard($id);
		$response = $this->createResponse(true,$allCat,'Tests');
	}
	header('Content-Type: application/json');
    echo json_encode( $response );
}

}	