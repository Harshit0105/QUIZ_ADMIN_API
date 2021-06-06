<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Subjects extends CI_Controller {

function __construct(){
parent::__construct();
$this->load->model('Admin_General_ssu_Model');
if(! $this->session->userdata('adminid'))
redirect('/');
}

public function index()
{
	$this->session->set_flashdata('headerSection', 'Subjects');
	$allCat=$this->Admin_General_ssu_Model->getAllStandards();
	$this->load->view('subjects',["standards"=>$allCat]);
}

public function getSubjects() {
	$allCat=$this->Admin_General_ssu_Model->getAllSubjects();
	header('Content-Type: application/json');
    echo json_encode( $allCat );
}


public function addSubjects() {
    $sId=$this->input->post('standard');
	$name=$this->input->post('subject');
	$this->Admin_General_ssu_Model->addSubjects($name,$sId);
	redirect('admin/subjects');
}

public function updateSubjects() {
    $id=$this->input->post('subId');
	$name=$this->input->post('subject');
	$this->Admin_General_ssu_Model->updateSubjects($id,$name);
	redirect('admin/subjects');
}

public function deleteSubjects($id) {
	$this->Admin_General_ssu_Model->deleteSubjects($id);
	$this->session->set_flashdata('success', 'Subject has been deleted.');
	redirect('admin/subjects');
}

}	