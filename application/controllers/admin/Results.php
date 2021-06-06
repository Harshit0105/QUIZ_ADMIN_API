<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Results extends CI_Controller {

function __construct(){
parent::__construct();

if(! $this->session->userdata('adminid'))
redirect('/');
}

public function index()
{
	$this->session->set_flashdata('headerSection', 'Results');
	$this->load->view('results');
}

public function getAllResults() {
	$this->load->model('Admin_General_rr_Model');
	$allCat=$this->Admin_General_rr_Model->getAllResults();
	header('Content-Type: application/json');
    echo json_encode( $allCat );
}

public function deleteResult($id) {
	$this->load->model('Admin_General_rr_Model');
	$this->Admin_General_rr_Model->deleteResults($id);
	$this->session->set_flashdata('success', 'Result has been deleted.');
	redirect('admin/results');
}

}	