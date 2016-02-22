<?php
header("Content-Type: text/html;charset=utf-8");
class Blog_view extends CI_Controller
{	
	/*博客具体内容页面*/
	function view($id)
	{
		$this->load->model('blog_m');
		$this->load->model('comment_m');
		$this->load->model('user_m');
		
		$data['single']=$this->blog_m->select($id);		
		
		/*显示评论数*/			
		$data['comment_row']=$this->comment_m->comment_count_id($data['single']['cid']);
		
		
		/*登录后才允许评论功能,验证用户是否已经登录*/
		$this->load->library('session');
		$data['session']=$this->session->userdata('uid');
		
		/*把用户评论存入后台数据库*/			
		$data['uname']=$this->user_m->user_select_id($data['session']);	
		$arr=array('c_content'=>$_POST['comment'],'c_name'=>$data['uname']['uname'],'c_date'=>date("Y-m-d H:i:s"),'c_id'=>$data['single']['cid']);	
		if($_POST['submit'])
		{
			$this->comment_m->comment_insert($arr);
			$this->blog_m->update_comment_num($id);//更新评论数
			
			$numarow=$this->blog_m->affected_rows();
			$arow=$this->comment_m->affected_rows();
			if($arow='1'&&$numarow='1')
			{
				echo '
				<script language="javascript"> 
					alert("评论发表成功!"); 
					window.location.href="http://localhost/codeigniter/index.php/blog_view/view/'.$data['single']['cid'].'";
				</script> ';   				
			}else
			{
				echo '
				<script language="javascript"> 
					alert("评论发表失败!请重试"); 
					window.location.href="http://localhost/codeigniter/index.php/blog_view/view/'.$data['single']['cid'].'";
				</script> ';   		
			}
		}
		
		/*显示此博客的所有评论*/
		$data['allcomment']=$this->comment_m->comment_select_join($data['single']['cid']);
				
		$this->load->view('blog_view_v',$data);		
	}
}
?>