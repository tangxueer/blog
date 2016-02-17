<?php
header("Content-Type: text/html;charset=utf-8");
class Blog_content_c extends CI_Controller
{
	/*发布博客前端页面*/
	function content_index()
	{
		$this->load->view('blog_content_v');					
	}
	/*发布博客后台数据库操作*/
	function addcontent()
	{
		$this->load->model('blog_m');

		$arr=array('title'=>$_POST['title'],'content'=>$_POST['content'],'date'=>date("Y-m-d"));
		if($_POST['submit'])
		{
			$insert=$this->blog_m->insert($arr);
			$arow=$this->blog_m->affected_rows();//影响条数
			if($arow='1')
			{	//跳转至首页
				echo '
				<script language="javascript"> 
					alert("发布成功!"); 
					window.location.href="http://localhost/codeigniter/index.php/blog_content_c/index"; 
				</script> ';     
			}else
			{	//跳转至发布博客页面
				echo '
				<script language="javascript">
					alert("发布失败!请重试");
					window.location.href="http://localhost/codeigniter/index.php/blog_content_c/content_index";
				</script> ';
			}
		}
				
	}
	
	
	/*主页*/
	function index($id)
	{
		/*分页系统*/
		$this->load->model('blog_m');
		$blog=$this->blog_m->select_all();
		
		$pageall=count($blog);
		$pagenum=10;
		$config['total_rows']=$pageall;
		$config['per_page']=$pagenum;
		$config['num_links']=3;
		$config['base_url']="/codeigniter/index.php/blog_content_c/index";
		$config['use_page_numbers']=true;
		
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		echo $this->pagination->create_links();
		
		echo "<br>";
		
		$id=$id?$id:1;
		$start=($id-1)*$pagenum;
		$data['list']=$this->blog_m->select_limit($pagenum,$start);
		$this->load->view('blog_index',$data);			
	}
	

	/*博客具体内容页面*/
	function view($id)
	{
		$this->load->model('blog_m');
		$data['single']=$this->blog_m->select($id);		
		
		/*登录后才允许评论功能,验证用户是否已经登录*/
		$this->load->library('session');
		$data['session']=$this->session->userdata('uid');

		
		/*把用户评论存入后台数据库(没做完)*/
		
		/*$this->load->model('user_m');
		$arr=array('');
		$this->user_m->insert($arr);	
		*/
		
		$this->load->view('blog_view',$data);		

		
		/*删除博客处理*/
		if($_POST['sub_del'])
		{
			$this->load->model('blog_m');
			echo '
			<script language="javascript">
				var del=confirm("确定要删除这条博客吗?");
				if(del==true)
				{	
					window.location.href="http://localhost/codeigniter/index.php/blog_content_c/index";
					'.$this->blog_m->delete($id).'			
				}
			</script> ';
		}

	}
	
	
	/*用户注册*/
	function register()
	{
		$this->load->view('blog_register');
		
		$this->load->model('user_m');		
		$arr=array('uname'=>$_POST['uname'],'upass'=>$_POST['upass']);
		if($_POST['submit'])
		{
			$this->user_m->user_insert($arr);
			$arow=$this->user_m->affected_rows();//影响条数
			if($arow='1')
			{	//跳转至登录页面
				echo '
				<script language="javascript"> 
					alert("注册成功!"); 
					window.location.href="http://localhost/codeigniter/index.php/blog_content_c/login"; 
				</script> ';     
			}else
			{	//跳转至注册页面
				echo '
				<script language="javascript">
					alert("注册失败!请重试");
					window.location.href="http://localhost/codeigniter/index.php/blog_content_c/register";
				</script> ';
			}		
		}
	}
	
	/*用户登录前端页面*/
	function login()
	{
		$this->load->view('blog_login');		
	}	
	/*用户登录后台数据库比对*/
	function checklogin()
	{
		$this->load->model('user_m');
		$user=$this->user_m->user_select($_POST['uname']);
		if($_POST['submit'])
		{
			if($user)
			{
				if($user[0]->upass==$_POST['upass'])
				{
					if($_POST['auto'])
					{	//开启session			
						$this->load->library('session');
						$arr=array('uid'=>$user[0]->uid);
						$this->session->set_userdata($arr);
						$this->session->userdata('uid');
					}
					echo '
						<script language="javascript">
							alert("登录成功!");
							window.location.href="http://localhost/codeigniter/index.php/blog_content_c/index";
						</script> ';
					
				}else
				{
					echo '
						<script language="javascript">
							alert("登录失败！请重试");
							window.location.href="http://localhost/codeigniter/index.php/blog_content_c/login";
						</script> ';
				}
			}else
			{
				echo '
						<script language="javascript">
							alert("该用户名不存在，请注册");
							window.location.href="http://localhost/codeigniter/index.php/blog_content_c/login";
						</script> ';					
			}	
		}		

	}
	

	/*用户退出登录*/
	function loginout()
	{
		$this->load->library('session');
		$this->session->unset_userdata('uid');
		echo'
			<script language="javascript">
				var out=confirm("您确定要退出吗？");
				if(out==true)
				{
					
				}
				window.location.href="http://localhost/codeigniter/index.php/blog_content_c/index";
			</script> ';		
	}
	
}
?>