<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class category extends CI_Controller {
function __construct(){
parent::__construct();
if(! $this->session->userdata('adid'))
redirect('/');
}
	
public function index(){
	$this->session->set_flashdata('headerSection', 'Categories');
	$this->load->view('category');	
}

public function getCategories() {
	$this->load->model('Admin_Category_Model');
	$allCat=$this->Admin_Category_Model->getAllCategories();
	header('Content-Type: application/json');
    echo json_encode( $allCat );
}

public function addCategory() {
	$name=$this->input->post('name');
	$this->load->model('Admin_Category_Model');
	$this->Admin_Category_Model->addCategory($name);
	redirect('category');
}

public function deleteCategory($id) {
	$this->load->model('Admin_Category_Model');
	$this->Admin_Category_Model->deleteCategory($id);
	$this->session->set_flashdata('success', 'Category has been deleted.');
	redirect('category');
}

public function updateCategory() {
	$name=$this->input->post('name');
	$id=$this->input->post('id');
	$this->load->model('Admin_Category_Model');
	$this->Admin_Category_Model->editCategory($id,$name);
	redirect('category');
}

}