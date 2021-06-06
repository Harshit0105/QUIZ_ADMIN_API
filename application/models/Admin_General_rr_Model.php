<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Admin_General_rr_Model extends CI_Model {

	// rooms
    public function getAllRooms(){
          $this->db->select('room.*,users.*,standard.*,subject.*,unit.*');
        $this->db->from('room');
        $this->db->join('users', 'room.user_id = users.user_id');
        $this->db->join('standard', 'room.standard_id = standard.standard_id');
        $this->db->join('subject', 'room.subject_id = subject.subject_id');
        $this->db->join('unit', 'room.unit_id = unit.unit_id');
        $this->db->order_by("room.upcomingdate", "DESC");
        $query = $this->db->get();
        return $query->result();     
    }

    public function getSingleRoom($uid){
        $ret=$this->db->select('*')
        ->where('room_id',$uid)
        ->get('room');
        return $ret->result();
    }

    public function getById($uid){
        $ret=$this->db->select('*')
        ->where('roomID',$uid)
        ->get('room');
        return $ret->row();
    }

    public function deleteRoom($uid){
        $sql_query=$this->db->where('room_id', $uid)
        ->delete('room');
    }

    public function addTest($roomid,$userid,$s1,$s2,$u1,$status,$mcqId,$time,$date) {
        $data = array(
            'roomID' => $roomid,
            'user_id' => $userid,
            'standard_id' => $s1,
            'subject_id' => $s2,
            'unit_id' => $u1,
            'room_status' => $status,
            'timing'=>$time,
            'mcqids'=>$mcqId,
            'upcomingdate'=>$date
        );

        return $this->db->insert('room', $data);
    }

    public function editTest($rid,$s1,$s2,$u1,$status,$mcqId,$time,$date) {
        $data = array(                        
            'standard_id' => $s1,
            'subject_id' => $s2,
            'unit_id' => $u1,
            'room_status' => $status,
            'timing'=>$time,
            'mcqids'=>$mcqId,
            'upcomingdate'=>$date
        );

        $this->db->where('room_id',$rid);
        return $this->db->update('room', $data);
    }


    public function addRoom($roomid,$userid,$s1,$s2,$u1,$status,$timing) {
        $data = array(
            'roomID' => $roomid,
            'user_id' => $userid,
            'standard_id' => $s1,
            'subject_id' => $s2,
            'unit_id' => $u1,
            'room_status' => $status,
            'timing'=>$timing
        );

        return $this->db->insert('room', $data);
    }

    public function addJoin($roomid,$userid) {
        $data = array(
            'room_id' => $roomid,
            'user_id' => $userid
        );

        $this->db->insert('roomjoin', $data);
        return $this->db->select('*')->order_by('join_id',"desc")->limit(1)->get('roomjoin')->row();
    }

    public function editRoom($rid,$roomid,$s1,$s2,$u1,$status) {
         $data = array(
            'roomID' => $roomid,
            'standard_id' => $s1,
            'subject_id' => $s2,
            'unit_id' => $u1,
            'room_status' => $status
        );
        $this->db->where('room_id',$rid);
        return $this->db->update('room', $data);
    }


    // results
    public function getAllResults(){
        $this->db->select('results.*,users.*,room.*,standard.*,subject.*,unit.*');
        $this->db->from('results');
        $this->db->join('room', 'results.group_id = room.roomID');
        $this->db->join('users', 'results.user_id = users.user_id');
        $this->db->join('standard', 'results.standard_id = standard.standard_id');
        $this->db->join('subject', 'results.subject_id = subject.subject_id');
        $this->db->join('unit', 'results.unit_id = unit.unit_id');
        $query = $this->db->get();
        return $query->result();       
    }

    public function deleteResults($uid){
        $sql_query=$this->db->where('result_id', $uid)
        ->delete('results');
    }

    public function addResult($uid,$gid,$s1,$s2,$unitid,$tmcq,$cmcq) {
        $data = array(
            'user_id' => $uid,
            'group_id' => $gid,
            'standard_id' => $s1,
            'subject_id' => $s2,
            'unit_id' => $unitid,
            'total_mcq' => $tmcq,
            'correct_mcq' => $cmcq
        );
        return $this->db->insert('results', $data);
    }

    public function getUserResults($uid){
        $ret=$this->db->select('*')
        ->where('user_id',$uid)
        ->get('results');
        return $ret->result();
    }

    public function getUpcomingTestByStandard($uid){
        $ret=$this->db->select('*')
        ->where('standard_id',$uid)
        ->order_by("room.upcomingdate", "DESC")
        ->get('room');
        return $ret->result();
    }

}
