<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Dashboard extends CI_Controller {

function __construct(){
parent::__construct();
if(! $this->session->userdata('adminid'))
redirect('/');
}

public function index()
{
    
	$this->load->model('Admin_Dashboard_Model');
	$users=$this->Admin_Dashboard_Model->getTotalUsers();
	$results=$this->Admin_Dashboard_Model->getTotalResults();
	$rooms=$this->Admin_Dashboard_Model->getTotalRooms();
	$this->session->set_flashdata('headerSection', 'Dashboard');
	$this->load->view('dashboard',['users'=>$users,'results'=>$results,'rooms'=>$rooms]);
}

}	