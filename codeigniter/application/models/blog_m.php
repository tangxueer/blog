<?php
class Blog_m extends CI_Model
{
	
	function __construct()
	{	
		parent::__construct();
		$this->db=$this->load->database('pdo://root:@127.0.0.1/blog?subdriver=mysql',TRUE);
	}
	
	function insert($arr)
	{
		return $this->db->insert('content',$arr);
	}
	
	function affected_rows()
	{
		return $this->db->affected_rows();
	}
	
	function update($id,$arr)
	{
		$this->db->where('cid',$id);
		$this->db->update('content',$arr);
	}
	
	function delete($id)
	{
		$this->db->where('cid',$id);
		$this->db->delete('content');
	}
	
	function select($id)
	{
		$this->db->where('cid',$id);
		$this->db->select('*');
		$query=$this->db->get('content');
		return $query->result_array();
	}
	
		
	function select_all()
	{
		$this->db->select('*');
		$this->db->order_by('date','DESC');
		$query=$this->db->get('content');
		return $query->result_array();
	}
	
		
	function select_limit($num,$start)
	{
		$this->db->select('*');
		$this->db->order_by('date','DESC');
		$this->db->limit($num,$start);
		$query=$this->db->get('content');
		return $query->result_array();
	}
}
?>