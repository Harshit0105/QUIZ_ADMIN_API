<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Admin_General_mu_Model extends CI_Model{

	// mcqs
    public function getAllMcq(){
        $query=$this->db->select('*')
        ->get('mcq');
        return $query->result();      
    }

    public function getSingleMcqs($uid){
        $ret=$this->db->select('*')
        ->where('unit_id',$uid)
        ->get('mcq');
        return $ret->result();
    }

    public function getSingleMcq($mcqid){
        $ret=$this->db->select('*')
        ->where('mcq_id',$mcqid)
        ->get('mcq');
        return $ret->result();
    }

    public function deleteMcq($uid){
        $sql_query=$this->db->where('mcq_id', $uid)
        ->delete('mcq');
    }

    public function addMcq($unit,$q,$o1,$o2,$o3,$o4,$ans,$hint) {
        $data = array(
            'question' => $q,
            'unit_id' => $unit,
            'option_1' => $o1,
            'option_2' => $o2,
            'option_3' => $o3,
            'option_4' => $o4,
            'answer' => $ans,
            'hint' => $hint,
        );

        return $this->db->insert('mcq', $data);
    }

    public function editMcq($id,$q,$o1,$o2,$o3,$o4,$ans,$hint) {
        $data = array(
            'question' => $q,
            'option_1' => $o1,
            'option_2' => $o2,
            'option_3' => $o3,
            'option_4' => $o4,
            'answer' => $ans,
            'hint' => $hint,
        );
        $this->db->where('mcq_id',$id);
        return $this->db->update('mcq', $data);
    }

    // users
    public function getAllUsers(){
        $query=$this->db->select('*')
        ->get('users');
        return $query->result();      
    }

    public function addUserWithImage($name,$email,$mobile,$image) {
        $data = array(
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile,
            'photo' => $image
        );
        $this->db->insert('users', $data);
        return $this->db->select('*')->order_by('user_id',"desc")->limit(1)->get('users')->row();
    }

    public function addUserWithoutImage($name,$email,$mobile) {
        $data = array(
            'name' => $name,
            'email' => $email,
            'mobile' => $mobile
        );
        $this->db->insert('users', $data);
        return $this->db->select('*')->order_by('user_id',"desc")->limit(1)->get('users')->row();
    }

}