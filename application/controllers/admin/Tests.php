<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Tests extends CI_Controller {

function __construct(){
parent::__construct();
$this->load->model('Admin_General_ssu_Model');
$this->load->model('Admin_General_mu_Model');
$this->load->model('Admin_General_rr_Model');
if(! $this->session->userdata('adminid'))
redirect('/');
}

public function index()
{
	$this->session->set_flashdata('headerSection', 'Tests');
    $allCat=$this->Admin_General_ssu_Model->getAllStandards();
	$this->load->view('tests',["standards"=>$allCat]);
}

public function getSubjects(){
    $id=$this->input->post('stdId');
    $data=$this->Admin_General_ssu_Model->getSubjectsByStd($id);
    echo json_encode($data);
}

public function getTest(){
    $id=$this->input->post('roomId');
    $data=$this->Admin_General_rr_Model->getSingleRoom($id);
    echo json_encode($data);
}

public function getUnits(){
    $id1=$this->input->post('stdId');
    $id2=$this->input->post('subId');
    $data=$this->Admin_General_ssu_Model->getUnitsByIds($id1,$id2);
    echo json_encode($data);
}

public function getMCQs(){
    $uid=$this->input->post('unitId');    
    $data=$this->Admin_General_mu_Model->getSingleMcqs($uid);
    echo json_encode($data);
}

public function getMCQ(){
    $uid=$this->input->post('mcqId');    
    $data=$this->Admin_General_mu_Model->getSingleMcq($uid);
    echo json_encode($data);
}


public function getAllTests() {
	$this->load->model('Admin_General_rr_Model');
	$allCat=$this->Admin_General_rr_Model->getAllRooms();
	header('Content-Type: application/json');
    echo json_encode( $allCat );
}

public function deleteRoom($id) {
	$this->load->model('Admin_General_rr_Model');
	$this->Admin_General_rr_Model->deleteRoom($id);
	$this->session->set_flashdata('success', 'Room has been deleted.');
	redirect('admin/rooms');
}

public function addTests() {
	$unit=$this->input->post('unit');
	$standard=$this->input->post('standard');
	$subject=$this->input->post('subject');
    $time=$this->input->post('time');
    $date=$this->input->post('date');
    $mcqId=$this->input->post('mcqIDs');    
    $mcqString="[";
    if($mcqId!=""){
        for($i=0;$i<count($mcqId);$i++){
            if($i==count($mcqId)-1){
                $mcqString.='"'.(string) $mcqId[$i].'"';
            }
            else{
                $mcqString.='"'.(string) $mcqId[$i].'",';
            }
        }   
     }
    $mcqString.="]";
    $randomid = mt_rand(100000,999999);      
    // var_dump($mcqString) ;    
    $roomId=$this->input->post('room_id');    
    if($roomId==""){
        // echo "Add TEst";
        $this->Admin_General_rr_Model->addTest($randomid,1,$standard,$subject,$unit,"STARTED",$mcqString,$time,$date);
    }
    else{
        // echo "Edit TEst";
        $this->Admin_General_rr_Model->editTest($roomId,$standard,$subject,$unit,"STARTED",$mcqString,$time,$date);
    }
    
	redirect('admin/tests');
}

}	