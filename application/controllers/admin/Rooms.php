<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Rooms extends CI_Controller {

function __construct(){
parent::__construct();

if(! $this->session->userdata('adminid'))
redirect('/');
}

public function index()
{
	$this->session->set_flashdata('headerSection', 'Rooms');
	$this->load->view('rooms');
}

public function getAllRooms() {
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

}	