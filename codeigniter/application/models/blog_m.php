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
	
	function update_comment_num($id)
	{
		/*更新评论数*/
		$this->db->where('cid',$id);
		$this->db->set('comment_num','comment_num+1',FALSE);	
		$this->db->update('content');
	}
	
	function delete($id)
	{
		$this->db->where('cid',$id);
		$this->db->delete('content');
	}

	function select($id)
	{	
		/*更新点击数*/
		$this->db->where('cid',$id);
		$this->db->set('hit','hit+1',FALSE);	
		$this->db->update('content');
		
		$this->db->where('cid',$id);
		$this->db->select('*');
		$query=$this->db->get('content');
		return $query->row_array();
	}
	
	
	function select_all()
	{
		$this->db->select('*');
		$this->db->order_by('date','DESC');
		$query=$this->db->get('content');
		return $query->result_array();
	}
	
	function select_id($id)
	{
		$this->db->where('cid',$id);
		$this->db->select('*');
		$query=$this->db->get('content');
		return $query->row_array();
	}
	
	function select_allid()
	{
		$this->db->select('cid');
		return $this->db->count_all_results('content');
	}
	

		
	function select_limit($num,$start)
	{
		$this->db->select('*');
		$this->db->order_by('date','DESC');
		$this->db->limit($num,$start);
		$query=$this->db->get('content');
		return $query->result_array();
	}
	
	function select_join($caname)
	{
		$this->db->where('ca_name',$caname);
		$this->db->select('*');
		$this->db->from('content');
		$this->db->join('category','category.caname=content.ca_name');
		$query=$this->db->get();
		return $query->result_array();	
	}
	
	function select_limit_join($caname,$num,$start)
	{
		$this->db->where('ca_name',$caname);
		$this->db->select('*');
		$this->db->order_by('date','DESC');
		$this->db->limit($num,$start);
		$this->db->join('category','category.caname=content.ca_name');
		$query=$this->db->get('content');
		return $query->result_array();
	}
}
?>