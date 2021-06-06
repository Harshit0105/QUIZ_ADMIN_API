<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login extends CI_Controller {


public function index(){
$this->form_validation->set_rules('username','Username','required');
$this->form_validation->set_rules('password','Password','required');
    if($this->form_validation->run()){
        $username=$this->input->post('username');
        $password=$this->input->post('password');	
        $this->load->model('Admin_Login_Model');
        $validate=$this->Admin_Login_Model->validatelogin($username,$password);
        if($validate)
        {
            $this->session->set_userdata('adminid',$validate);
            // echo $validate;
            return redirect('/admin/dashboard');
        } 
        else{
            $this->session->set_flashdata('error', '<span style="color: red;" class="form-text">Invalid Credentials, Please try again.</span>');
            redirect('/');
        }
    }
    else {
        $this->load->view('/');
    }
}

//function for logout
public function logout(){
$this->session->unset_userdata('adid');
$this->session->sess_destroy();
return redirect('/');
}

}