<?php
class Comment_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->db=$this->load->database('pdo://root:@127.0.0.1/blog?subdriver=mysql',TRUE);
	}
	
	/*记录该条博客下评论总条数*/
	function comment_count_id($id)
	{
		$this->db->where('c_id',$id);
		return $this->db->count_all_results('comment');
	}
	
	function comment_insert($arr)
	{
		return $this->db->insert('comment',$arr);
	}
	
	function affected_rows()
	{
		return $this->db->affected_rows();
	}
		
	function comment_update($id,$arr)
	{
		$this->db->where('uid',$id);
		$this->db->update('comment',$arr);
	}
	
	function comment_delete($id)
	{
		$this->db->where('uid',$id);
		$this->db->delete('comment');
	}
	
	function comment_select($uname)
	{
		$this->db->where('uname',$uname);
		$this->db->select('*');
		$query=$this->db->get('comment');
		return $query->result();
	}
	
	function comment_select_num()
	{
		$this->db->select('c_id');
		$query=$this->db->get('comment');
		return $query->result_array();
	}
	
	function comment_select_id($id)
	{
		$this->db->where('uid',$id);
		$this->db->select('uname');
		$query=$this->db->get('comment');
		return $query->row_array();
	}
		
	function comment_select_join($id)
	{	
		$this->db->where('c_id',$id);
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->join('content','content.cid = comment.c_id');
		$query=$this->db->get();
		return $query->result_array();		
	}


}
?>