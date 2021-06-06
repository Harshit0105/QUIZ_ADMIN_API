<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class User extends CI_Controller {

function __construct(){
parent::__construct();
$baseurl=base_url();
$this->load->model('Admin_General_mu_Model');
/*if(! $this->session->userdata('adminid'))
redirect('/');*/
}

public function index()
{
	$baseurl=base_url();
	echo $baseurl;
}

public function createUser() {
	$name=$this->input->post('name');
	$email=$this->input->post('email');
	$mobile=$this->input->post('mobile');
	if($name=="" || $email=="" || $mobile==""){
		$message = 'Invalid Data provided!!';    
    	$response = $this->createResponse(false,null,$message);
	}
	else{
		$path = './images/users/';

		if(!is_dir($path)) {
		mkdir($path,0755,TRUE);
		} 

		$config['encrypt_name'] = TRUE;
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 50000;
		$this->load->library('upload', $config);

		$response = "";

		if (empty($_FILES['photo']['name'])) {
			$res = $this->Admin_General_mu_Model->addUserWithoutImage($name,$email,$mobile);
			$response = $this->createResponse(true,$res,'User data');
		} else {
			if (!$this->upload->do_upload('photo')) {
				$error = array('error' => $this->upload->display_errors());
				$message = 'Invalid image! Size should be less than 5MB and format should be in jpg,png,jpeg.';    
				$response = $this->createResponse(false,null,$message);
			} else {
				$data = array('image_metadata' => $this->upload->data());
				$photo = $data['image_metadata']['file_name'];
				$baseurl=base_url();
				$res = $this->Admin_General_mu_Model->addUserWithImage($name,$email,$mobile,$baseurl.'images/users/'.$photo);
				$response = $this->createResponse(true,$res,'User data');

			}
		}
	}
	

	header('Content-Type: application/json');
    echo json_encode( $response );
}

public function createResponse($check,$data,$msg) {
	if($check) {
		return array('status' => 200, 'message' => $msg, 'data' => $data );
	} else {
		return array('status' => 400, 'message' => $msg, 'data' => $data );
	}
}

}	