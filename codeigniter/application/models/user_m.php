<?php
class User_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->db=$this->load->database('pdo://root:@127.0.0.1/blog?subdriver=mysql',TRUE);
	}
	
	function user_insert($arr)
	{
		return $this->db->insert('user',$arr);
	}
	
	function affected_rows()
	{
		return $this->db->affected_rows();
	}
		
	function user_update($id,$arr)
	{
		$this->db->where('uid',$id);
		$this->db->update('user',$arr);
	}
	
	function user_delete($id)
	{
		$this->db->where('uid',$id);
		$this->db->delete('user');
	}
	
	function user_select_name($uname)
	{
		$this->db->where('uname',$uname);
		$this->db->select('*');
		$query=$this->db->get('user');
		return $query->row_array();
	}	
	
	function user_select_id($id)
	{
		$this->db->where('uid',$id);
		$this->db->select('uname');
		$query=$this->db->get('user');
		return $query->row_array();
	}
	
	function user_select_nickname($id)
	{
		$this->db->where('uid',$id);
		$this->db->select('nickname');
		$query=$this->db->get('user');
		return $query->row_array();
	}
	
	function user_select_pass($id)
	{
		$this->db->where('uid',$id);
		$this->db->select('upass');
		$query=$this->db->get('user');
		return $query->row_array();
	}	
		
	function user_select_limit($num,$start)
	{
		$this->db->select('*');
		$this->db->limit($num,$start);
		$query=$this->db->get('user');
		return $query->result();
	}
	
	function user_select_allid()
	{
		$this->db->select('uid');
		return $this->db->count_all_results('user');
	}

	function user_select_all()
	{
		$this->db->select('*');
		$this->db->order_by('udate','DESC');
		$query=$this->db->get('user');
		return $query->result_array();
	}

}
?>