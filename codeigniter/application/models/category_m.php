<?php
class Category_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->db=$this->load->database('pdo://root:@127.0.0.1/blog?subdriver=mysql',TRUE);
	}
	
	function category_insert($arr)
	{
		return $this->db->insert('category',$arr);
	}
	
	function affected_rows()
	{
		return $this->db->affected_rows();
	}
		
	function category_update($id,$arr)
	{
		$this->db->where('uid',$id);
		$this->db->update('category',$arr);
	}
	
	function category_delete($id)
	{
		$this->db->where('uid',$id);
		$this->db->delete('category');
	}
	
	function category_canamedelete($ca_name)
	{
		$this->db->where('caname',$ca_name);
		$this->db->delete('category');
	}
	
	function category_select()
	{
		$this->db->select('*');
		$query=$this->db->get('category');
		return $query->result_array();
	}
	
	function category_select_id($id)
	{
		$this->db->where('caid',$id);
		$this->db->select('caname');
		$query=$this->db->get('category');
		return $query->row_array();
	}
	
	function category_select_join($id)
	{	
		$this->db->where('caid',$id);
		$this->db->select('*');
		$this->db->from('category');
		$this->db->join('content','content.cid = category.content_id');
		$query=$this->db->get();
		return $query->result_array();		
	}

	function category_select_name($caname)
	{
		$this->db->where('caname',$caname);
		$this->db->select('*');
		$query=$this->db->get('category');
		return $query->row_array();
	}
	
	function category_select_allname()
	{
		$this->db->select('caname');
		$query=$this->db->get('category');
		return $query->result_array();
	}
		
}
?>