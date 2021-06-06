<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Units extends CI_Controller {

function __construct(){
parent::__construct();
$this->load->model('Admin_General_ssu_Model');
if(! $this->session->userdata('adminid'))
redirect('/');
}

public function index()
{
	$this->session->set_flashdata('headerSection', 'Units');
	$allCat=$this->Admin_General_ssu_Model->getAllStandards();
	$allCat1=$this->Admin_General_ssu_Model->getAllSubjects();
	$allCat2=$this->Admin_General_ssu_Model->getAllUnits();	
	$this->load->view('units',["standards"=>$allCat,"subjects"=>$allCat1,"units"=>$allCat2]);
}

public function getSubjects(){
    $id=$this->input->post('stdId');
    $data=$this->Admin_General_ssu_Model->getSubjectsByStd($id);
    echo json_encode($data);
}

public function getUnits() {
	$allCat=$this->Admin_General_ssu_Model->getAllUnits();
	header('Content-Type: application/json');
    echo json_encode( $allCat );
}


public function addUnits() {
	$name=$this->input->post('unit');
	$standard=$this->input->post('standard');
	$subject=$this->input->post('subject');
	$this->Admin_General_ssu_Model->addUnits($name,$standard,$subject);
	redirect('admin/units');
}

public function updateUnits() {
	$name=$this->input->post('unit');
	$id=$this->input->post('unitId');
	$this->Admin_General_ssu_Model->editUnitName($id,$name);
	redirect('admin/units');
}

public function deleteUnits($id) {
	$this->Admin_General_ssu_Model->deleteUnits($id);
	$this->session->set_flashdata('success', 'Unit has been deleted.');
	redirect('admin/units');
}

public function addMcqs() {
	$this->load->model('Admin_General_mu_Model');
	$unit=$this->input->post('unit');
	$q=$this->input->post('question');
	$o1=$this->input->post('op1');
	$o2=$this->input->post('op2');
	$o3=$this->input->post('op3');
	$o4=$this->input->post('op4');
	$hint=$this->input->post('hint');
	$ansTemp=$this->input->post('answer');
	switch($ansTemp){
	    case "option_1":
	        $ans=$o1;
	        break;
        case "option_2":
	        $ans=$o2;
	        break;
        case "option_3":
	        $ans=$o3;
	        break;
        case "option_4":
	        $ans=$o4;
	        break;
	}
	$this->Admin_General_mu_Model->addMcq($unit,$q,$o1,$o2,$o3,$o4,$ans,$hint);
	redirect('admin/units');
}

public function editMcqs() {
	$this->load->model('Admin_General_mu_Model');
	$unit_id=$this->input->post('unitId');
	$unit=$this->input->post('unit');
	$q=$this->input->post('question');
	$o1=$this->input->post('op1');
	$o2=$this->input->post('op2');
	$o3=$this->input->post('op3');
	$o4=$this->input->post('op4');
	$hint=$this->input->post('hint');
	$ansTemp=$this->input->post('answer');
	switch($ansTemp){
	    case "option_1":
	        $ans=$o1;
	        break;
        case "option_2":
	        $ans=$o2;
	        break;
        case "option_3":
	        $ans=$o3;
	        break;
        case "option_4":
	        $ans=$o4;
	        break;
	}
	$this->Admin_General_mu_Model->editMcq($unit,$q,$o1,$o2,$o3,$o4,$ans,$hint);
	redirect('admin/units');
}

public function getMcqs($id) {
	$this->load->model('Admin_General_mu_Model');
	$unit = $this->Admin_General_ssu_Model->getSingleUnits($id);
	$mcq = $this->Admin_General_mu_Model->getSingleMcqs($id);
	$this->session->set_flashdata('headerSection', 'MCQs for '.$unit[0]->unit_name);
	$this->load->view('mcqs',["mcq"=>$mcq,"unit"=>$unit]);
}

public function deleteMcq($id) {
	$this->load->model('Admin_General_mu_Model');
	$this->Admin_General_mu_Model->deleteMcq($id);
	$this->session->set_flashdata('success', 'MCQ has been deleted.');
	redirect('admin/units');
}


public function addTutorials() {
	$unit_id=$this->input->post('unitId');
	$tut=$this->input->post('tut');
	$tut=trim($tut);
	$tut=stripslashes($tut);
	$tut=htmlspecialchars($tut);
	if($tut==="null" || $tut===""){
	    $this->Admin_General_ssu_Model->deleteTutorial($unit_id);
	}
	else{
	 $this->Admin_General_ssu_Model->addTutorial($unit_id,$tut);   
	}
	redirect('admin/units');
}
}	