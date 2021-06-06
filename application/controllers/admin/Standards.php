<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Standards extends CI_Controller {

function __construct(){
parent::__construct();
$this->load->model('Admin_General_ssu_Model');
if(! $this->session->userdata('adminid'))
redirect('/');
}

public function index()
{
	$this->session->set_flashdata('headerSection', 'Standards');
	$this->load->view('standards');
}

public function getStandards() {
	$allCat=$this->Admin_General_ssu_Model->getAllStandards();
	header('Content-Type: application/json');
    echo json_encode( $allCat );
}

public function updateStandards(){
    $id=$this->input->post('stdId');
    $name=$this->input->post('standard');
	$this->Admin_General_ssu_Model->updateStandard($id,$name);
	redirect('admin/standards');
}

public function addStandards() {
	$name=$this->input->post('standard');
	$this->Admin_General_ssu_Model->addStandard($name);
	redirect('admin/standards');
}

public function deleteStandards($id) {
	$this->Admin_General_ssu_Model->deleteStandard($id);
	$this->session->set_flashdata('success', 'Standard has been deleted.');
	redirect('admin/standards');
}

}	