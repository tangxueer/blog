<?php
header("Content-Type: text/html;charset=utf-8");
class Blog_content extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
	/*发布博客前端页面*/
	function content_index()
	{
		$this->load->model('user_m');		
		$this->load->library('session');
		$data['session']=$this->session->userdata('uid');
		$data['uname']=$this->user_m->user_select_id($data['session']);	
		$this->load->view('blog_content_v',$data);				
	}
	/*发布博客后台数据库操作*/
	function addcontent()
	{
		$this->load->model('blog_m');
		$this->load->model('category_m');
		$arr=array('title'=>$_POST['title'],'content'=>$_POST['content'],'date'=>date("Y-m-d H:i:s"),'ca_name'=>$_POST['category']);
		$ca_arr=array('caname'=>$_POST['category']);	
		if($_POST['submit'])
		{
			$this->blog_m->insert($arr);
			$caname=$this->category_m->category_select_name($_POST['category']);
			if(!is_array($caname))//为即将发布的博客增加新分类
			{
				$this->category_m->category_insert($ca_arr);				
			}	
			$arow=$this->blog_m->affected_rows();
			$ca_arow=$this->category_m->affected_rows();
			if($arow=='1'&&$ca_arow=='1')
			{	//跳转至首页
				echo '
					<script language="javascript"> 
						alert("发布成功!"); 
						window.location.href="http://localhost/codeigniter/index.php/blog_index/index"; 
					</script> ';     
			}else
			{	//跳转至发布博客页面
				echo '
					<script language="javascript">
						alert("发布失败!请重试");
						window.location.href="http://localhost/codeigniter/index.php/blog_content/content_index";
					</script> ';
			}
		}				
	}	
}
?>