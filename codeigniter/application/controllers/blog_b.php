<?php
header("Content-Type: text/html;charset=utf-8");
class Blog_b extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
	/*管理博客页面*/
	function b_blog()
	{
		$this->load->model('user_m');
		$this->load->library('session');
		$data['session']=$this->session->userdata('uid');
		$data['name']=$this->user_m->user_select_id($data['session']);	
		
		$this->load->model('blog_m');
		$data['allid']=$this->blog_m->select_allid();
		$data['blog']=$this->blog_m->select_all();
		$this->load->view('blog_b_blog_v',$data);	
	}
	
	/*删除博客处理*/
	function delete_blog($id)
	{			
		if($_POST['sub_del'])
		{
			$this->load->model('blog_m');
			$name=$this->blog_m->select_id($id);
			$this->blog_m->delete($id);
			
			$ca_name=$name['ca_name'];
			$this->load->model('category_m');	
			$this->category_m->category_canamedelete($ca_name);
			
			echo '
			<script language="javascript">		
				window.location.href="http://localhost/codeigniter/index.php/blog_b/b_blog";
			</script> ';			
		}
	}
	
	/*更改博客分类处理*/
	function ca_change($id)
	{
		$this->load->model('blog_m');
		$this->load->model('category_m');
		
		$arr=array('ca_name'=>$_POST['category']);
		$ca_arr=array('caname'=>$_POST['category']);
		if($_POST['sub_ch'])
		{
			$this->blog_m->update($id,$arr);
			
			$caname=$this->category_m->category_select_name($_POST['category']);
			if(!is_array($caname))//若所填分类为新分类，则在分类表中插入新数据
			{
				$this->category_m->category_insert($ca_arr);				
			}	
			$arow=$this->blog_m->affected_rows();
			$ca_arow=$this->category_m->affected_rows();
			if($arow=='1'&&$ca_arow=='1')
			{	
				echo '
					<script language="javascript"> 
						window.location.href="http://localhost/codeigniter/index.php/blog_b/b_blog"; 
					</script> ';     
			}
		}
	}
	
	
	/*管理评论页面*/
	function b_comment()
	{
		$this->load->model('user_m');
		$this->load->library('session');
		$data['session']=$this->session->userdata('uid');
		$data['name']=$this->user_m->user_select_id($data['session']);	
		$this->load->model('comment_m');
		$data['allid']=$this->comment_m->comment_select_allid();
		$data['comment']=$this->comment_m->comment_select_all();
		$this->load->view('blog_b_comment_v',$data);	
	}
	
	/*删除评论处理*/
	function delete_comment($id)
	{
		if($_POST['sub_del'])
		{
			$this->load->model('comment_m');
			$this->comment_m->comment_delete($id);
			echo '
			<script language="javascript">		
				window.location.href="http://localhost/codeigniter/index.php/blog_b/b_comment";
			</script> ';			
		}
	}
	
	/*更改评论处理*/
	function change_comment($id)
	{
		$this->load->model('comment_m');
		$arr=array('c_content'=>$_POST['comment']);
		if($_POST['sub_ch'])
		{
			$this->comment_m->comment_update($id,$arr);
			
			$arow=$this->comment_m->affected_rows();
			if($arow=='1')
			{	
				echo '
					<script language="javascript"> 
						window.location.href="http://localhost/codeigniter/index.php/blog_b/b_comment"; 
					</script> ';     
			}
		}
	}
	
	/*管理用户页面*/
	function b_user()
	{
		$this->load->model('user_m');		
		$this->load->library('session');
		$data['session']=$this->session->userdata('uid');
		$data['name']=$this->user_m->user_select_id($data['session']);	
		$this->load->model('user_m');
		$data['allid']=$this->user_m->user_select_allid();
		$data['user']=$this->user_m->user_select_all();
		$this->load->view('blog_b_user_v',$data);	
	}
	
	/*删除用户处理*/
	function delete_user($id)
	{
		if($_POST['sub_del'])
		{
			$this->load->model('user_m');
			$this->user_m->user_delete($id);
			echo '
			<script language="javascript">		
				window.location.href="http://localhost/codeigniter/index.php/blog_b/b_user";
			</script> ';			
		}
	}
}




?>