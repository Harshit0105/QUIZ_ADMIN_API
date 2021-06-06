<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
class Admin_Dashboard_Model extends CI_Model {

function __construct(){
parent::__construct();
if(! $this->session->userdata('adminid'))
redirect('/');
}

public function getTotalUsers(){
$query=$this->db->select('user_id')   
                 ->get('users');
return  $query->num_rows();
}

public function getTotalResults(){
$query2=$this->db->select('result_id')
                 ->get('results');
return  $query2->num_rows();
}

public function getTotalRooms(){
$query3=$this->db->select('room_id')
                 ->get('room');
return  $query3->num_rows();
}
}
