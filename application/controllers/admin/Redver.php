<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class redver extends CI_Controller {
function __construct(){
parent::__construct();
if(! $this->session->userdata('adid'))
redirect('/');
}
	
public function index(){
	$this->session->set_flashdata('headerSection', 'Advertisements');
	$this->load->view('redver');	
}


public function getRedver() {
	$this->load->model('Admin_Advertise_Model');
	$allCat=$this->Admin_Advertise_Model->getAllAdvertise();
	header('Content-Type: application/json');
    echo json_encode( $allCat );
}

public function addRedver() {
	$link=$this->input->post('link');

	$config['encrypt_name'] = TRUE;
	$config['upload_path'] = './images/red/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size'] = 50000;
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('adBanner')) {
        $error = array('error' => $this->upload->display_errors());
    	$this->session->set_flashdata('error', 'Invalid image type or size, please upload accordingly.');    
     } else {
        $data = array('image_metadata' => $this->upload->data());
		$banner = $data['image_metadata']['file_name'];
		$this->load->model('Admin_Advertise_Model');
		$this->session->set_flashdata('success', 'Advertisement uploaded successfully.');
		$this->Admin_Advertise_Model->addAdvertise($banner,$link);
     }

	redirect('redver');
}

public function deleteRedver($id) {
	$this->load->model('Admin_Advertise_Model');
	$this->Admin_Advertise_Model->deleteAdvertise($id);
	$this->session->set_flashdata('success', 'Advertisement has been deleted.');
	redirect('redver');
}

public function updateRedver() {
	$link=$this->input->post('link');
	$id=$this->input->post('id');
	$this->load->model('Admin_Advertise_Model');

	$config['encrypt_name'] = TRUE;
	$config['upload_path'] = './images/red/';
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size'] = 50000;
    $this->load->library('upload', $config);

    if (empty($_FILES['adBannerEdit']['name'])) {
    	$this->session->set_flashdata('success', 'Advertisement edited successfully.');
		$this->Admin_Advertise_Model->editAdvertise1($id,$link);
	} else {
		if (!$this->upload->do_upload('adBannerEdit')) {
       		
       		$error = array('error' => $this->upload->display_errors());
       		$this->session->set_flashdata('error', 'Invalid image type or size, please upload accordingly.');    
    		
	     } else {
	        $data = array('image_metadata' => $this->upload->data());
			$banner = $data['image_metadata']['file_name'];
			
			$this->session->set_flashdata('success', 'Advertisement edited successfully.');
			$this->Admin_Advertise_Model->editAdvertise($id,$banner,$link);
	     }
	}

	redirect('redver');
}

}