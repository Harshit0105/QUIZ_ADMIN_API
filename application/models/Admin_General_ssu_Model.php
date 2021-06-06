<?php 
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class Admin_General_ssu_Model extends CI_Model{

    // standards
	public function getAllStandards(){
        $query=$this->db->select('standard_id,standard')
        ->get('standard');
        return $query->result();      
    }

    public function getSingleStandard($uid){
        $ret=$this->db->select('standard_id,standard')
        ->where('standard_id',$uid)
        ->get('standard');
        return $ret->row();
    }

    public function deleteStandard($uid){
        $sql_query=$this->db->where('standard_id', $uid)
        ->delete('standard');
    }

    public function addStandard($std) {
        $data = array(
            'standard' => $std
        );

        return $this->db->insert('standard', $data);
    }
    
    public function updateStandard($id,$std) {
        $data = array(
            'standard_id' => $id,
            'standard' => $std
        );
       return $this->db->where('standard_id', $id)->update('standard', $data);
    }


    // subjects
    public function getAllSubjects(){
        
        
        // $query=$this->db->select('subject_id,subject_name')
        // ->get('subject');
        
        $this->db->select('subject.*,standard.standard');
        $this->db->from('subject');
        $this->db->join('standard', 'subject.standard_id = standard.standard_id');
        $query = $this->db->get();
        return $query->result();      
    }

    public function getSingleSubjects($uid){
        // $ret=$this->db->select('subject_id,subject_name')
        // ->where('subject_id',$uid)
        // ->get('subject');
        $this->db->select('subject.*,standard.standard');
        $this->db->from('subject');
        $this->db->join('standard', 'subject.standard_id = standard.standard_id');
        $this->db->where('subject.subject_id',$uid);
        $query = $this->db->get();
        return $query->result(); 
    }

    public function getSubjectsByStd($id){
        $response = array();
 
        $this->db->select('subject_id,subject_name');
        $this->db->where('standard_id', $id);
        $q = $this->db->get('subject');
        $response = $q->result_array();

        return $response;

    }
    public function deleteSubjects($uid){
        $sql_query=$this->db->where('subject_id', $uid)
        ->delete('subject');
    }

    public function addSubjects($std,$stdId) {
        $data = array(
            'standard_id'=>$stdId,
            'subject_name' => $std
        );
        
        return $this->db->insert('subject', $data);
    }
    
    public function updateSubjects($id,$std) {
        $data = array(
            'subject_name' => $std
        );
       return $this->db->where('subject_id', $id)->update('subject', $data);
    }


    // units
    public function getAllUnits(){
        $this->db->select('unit.*,subject.subject_name,standard.standard,tutorial.tut_id,tutorial.tutorial');
        $this->db->from('unit');
        $this->db->join('subject', 'unit.subject_id = subject.subject_id');
        $this->db->join('standard', 'unit.standard_id = standard.standard_id');
        $this->db->join('tutorial', 'unit.unit_id = tutorial.unit_id','left');
        $query = $this->db->get();
        return $query->result();      
    }

    public function getSingleUnits($uid){
        $this->db->select('unit.*,subject.subject_name,standard.standard');
        $this->db->from('unit');
        $this->db->join('subject', 'unit.subject_id = subject.subject_id');
        $this->db->join('standard', 'unit.standard_id = standard.standard_id');
        $this->db->where('unit.unit_id', $uid);
        $query = $this->db->get();
        return $query->result();  
    }

    public function getUnitsByIds($std,$sub) {

        $array = array('standard_id' => $std, 'subject_id' => $sub);
        $this->db->select('unit_id,unit_name');
        $this->db->from('unit');
        $this->db->where($array);
        $query = $this->db->get();
        return $query->result(); 
    }

    public function deleteUnits($uid){
        $sql_query=$this->db->where('unit_id', $uid)
        ->delete('unit');
    }

    public function addUnits($name,$sid,$ssid) {
        $data = array(
            'unit_name' => $name,
            'standard_id' => $sid,
            'subject_id' => $ssid
        );
        
        return $this->db->insert('unit', $data);
    }
    
    public function editUnitName($unitId,$name) {
        $data = array(
            'unit_name' => $name
        );
        $this->db->where('unit_id', $unitId);
        return $this->db->update('unit', $data);
    }

     public function editUnits($unitId,$name,$sid,$ssid) {
        $data = array(
            'unit_name' => $name,
            'standard_id' => $sid,
            'subject_id' => $ssid
        );
    $this->db->where('unit_id', $unitId);
    return $this->db->update('unit', $data);
    }


    public function deleteTutorial($unit_id){
        $sql_query=$this->db->where('unit_id', $unit_id)
        ->delete('tutorial');
    }
    public function addTutorial($u_id,$tut) {
        $data = array(
            'unit_id' => $u_id,
            'tutorial' => $tut
        );
        $res=$this->db->where('unit_id',$u_id)->get('tutorial');
        if($res->num_rows()>0){
            $this->db->where('unit_id',$u_id);
            return $this->db->update('tutorial', $data);
        }
        else{
            return $this->db->insert('tutorial', $data);    
        }
        
    }
    
    public function getTutorialByUnit($uid){
        $this->db->select('*');
        $this->db->from('tutorial');        
        $this->db->where('unit_id', $uid);
        $query = $this->db->get();
        return $query->result();  
    }
}