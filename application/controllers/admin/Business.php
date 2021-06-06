<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class business extends CI_Controller {
function __construct(){
parent::__construct();
if(! $this->session->userdata('adid'))
redirect('/');
}
	
public function index(){
	$this->load->model('Admin_Category_Model');
	$allCat=$this->Admin_Category_Model->getAllCategories();
	$this->session->set_flashdata('headerSection', 'Businesses');
	$this->load->view('business',["categories"=>$allCat]);	

}


public function getBusinesses() {
	$this->load->model('Admin_Business_Model');
	$allCat=$this->Admin_Business_Model->getAllBusinesses();
	header('Content-Type: application/json');
    echo json_encode( $allCat );
}

public function addBusiness() {
	$name=$this->input->post('name');
	$website=$this->input->post('website');
	$category=$this->input->post('category');
	$description=$this->input->post('description');
	$path = './images/business/thumbnail/';

	if(!is_dir($path)) {
      mkdir($path,0755,TRUE);
    } 

	$config['encrypt_name'] = TRUE;
	$config['upload_path'] = $path;
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size'] = 50000;
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('thumbnail')) {
        $error = array('error' => $this->upload->display_errors());
    	$this->session->set_flashdata('error', 'Invalid image type or size, please upload accordingly.');    
     } else {
        $data = array('image_metadata' => $this->upload->data());
		$thumbnail = $data['image_metadata']['file_name'];
		$this->load->model('Admin_Business_Model');
		$this->Admin_Business_Model->addBusiness($name,$description,$website,$thumbnail,$category);
		$this->session->set_flashdata('success', 'Business added successfully.');
     }
	
	redirect('business');
	
}

public function editBusiness($id) {
	$this->load->model('Admin_Business_Model');
	$allCat=$this->Admin_Business_Model->getSingleBusiness($id);
	$banners=$this->Admin_Business_Model->getBusinessBanners($id);
	$this->load->model('Admin_Category_Model');
	$allCat1=$this->Admin_Category_Model->getAllCategories();
	$this->session->set_flashdata('headerSection', 'Business / Edit Business');
	$this->load->view('/editbusiness',["business"=>$allCat,"categories"=>$allCat1,"banners"=>$banners]);
}

public function deleteBusiness($id) {
	$this->load->model('Admin_Business_Model');
	$this->Admin_Business_Model->deleteBusiness($id);
	$this->Admin_Business_Model->deleteAllBusinessBanners($id);
	$this->session->set_flashdata('success', 'Business has been deleted.');
	redirect('business');
}

public function updateBusiness() {

	$id=$this->input->post('id');
	$name=$this->input->post('name');
	$website=$this->input->post('website');
	$category=$this->input->post('category');
	$description=$this->input->post('description');
	$path = './images/business/thumbnail/';

	$this->load->model('Admin_Business_Model');

	if(!is_dir($path)) {
      mkdir($path,0755,TRUE);
    } 

	$config['encrypt_name'] = TRUE;
	$config['upload_path'] = $path;
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size'] = 50000;
    $this->load->library('upload', $config);

    if (empty($_FILES['thumbnail']['name'])) {
    	$this->session->set_flashdata('success', 'Business updated.');
		$this->Admin_Business_Model->editBusiness1($id,$name,$description,$website,$category);
	} else {
		if (!$this->upload->do_upload('thumbnail')) {
        	$error = array('error' => $this->upload->display_errors());
    		$this->session->set_flashdata('error', 'Invalid image type or size, please upload accordingly.');    
	     } else {
	        $data = array('image_metadata' => $this->upload->data());
			$thumbnail = $data['image_metadata']['file_name'];
			
			$this->Admin_Business_Model->editBusiness($id,$name,$description,$website,$thumbnail,$category);
			$this->session->set_flashdata('success', 'Business updated.');
	     }
	}
	
	redirect('business');

}

public function addBusinessBanners() {
	$id=$this->input->post('id');
	$path = './images/business/'.$id.'/';

	if(!is_dir($path)) {
      mkdir($path,0755,TRUE);
    } 

	$config['encrypt_name'] = TRUE;
	$config['upload_path'] = $path;
    $config['allowed_types'] = 'gif|jpg|png|jpeg';
    $config['max_size'] = 50000;
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('businessImage')) {
        $error = array('error' => $this->upload->display_errors());
    	$this->session->set_flashdata('error', 'Invalid image type or size, please upload accordingly.');    
     } else {
        $data = array('image_metadata' => $this->upload->data());
		$image = $data['image_metadata']['file_name'];
		$this->load->model('Admin_Business_Model');
		$this->Admin_Business_Model->addBusinessBanners($id,$image);
		$this->session->set_flashdata('success', 'Banner added successfully.');
     }
	
	redirect('business/editbusiness/'.$id);
}

public function deleteBusinessBanners($id) {
	$this->load->model('Admin_Business_Model');
	$this->Admin_Business_Model->deleteBusinessBanners($id);
	$this->session->set_flashdata('success', 'A banner has been deleted.');
	redirect('business');
}

}