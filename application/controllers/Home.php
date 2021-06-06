<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Home extends CI_Controller {
function __construct(){
parent::__construct();
if( $this->session->userdata('adid'))
redirect('admin/dashboard');
}
public function index()
{
$this->load->view('home');
}

}	