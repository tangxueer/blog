<?php
/*
如果博主想要自己发表一篇新博客，在url上写localhost/codeigniter/index.php/blog_content_c/content_index即可
*/
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
		
		/*登录后显示用户名与退出键*/
		$this->load->library('session');
		$data['session']=$this->session->userdata('uid');
		$this->load->model('user_m');
		$data['uname']=$this->user_m->user_select_id($data['session']);	
	
		$this->load->view('blog_index',$data);					
	}
	

	/*博客具体内容页面*/
	function view($id)
	{
		$this->load->model('blog_m');
		$data['single']=$this->blog_m->select($id);		
		
		/*显示评论数*/
		$this->load->model('comment_m');		
		$data['comment_row']=$this->comment_m->comment_count_id($data['single']['cid']);
		
		
		/*登录后才允许评论功能,验证用户是否已经登录*/
		$this->load->library('session');
		$data['session']=$this->session->userdata('uid');

		
		/*把用户评论存入后台数据库*/		
		$this->load->model('user_m');
		$data['uname']=$this->user_m->user_select_id($data['session']);	
		$this->load->model('comment_m');
		$arr=array('c_content'=>$_POST['comment'],'c_name'=>$data['uname']['uname'],'c_date'=>date("Y-m-d"),'c_id'=>$data['single']['cid']);	
		if($_POST['submit'])
		{
			$result=$this->comment_m->comment_insert($arr);
			$arow=$this->comment_m->affected_rows();
			if($arow='1')
			{
				echo '
				<script language="javascript"> 
					alert("评论发表成功!"); 
					window.location.href="http://localhost/codeigniter/index.php/blog_content_c/view/'.$data['single']['cid'].'";
				</script> ';   				
			}else
			{
				echo '
				<script language="javascript"> 
					alert("评论发表失败!请重试"); 
					window.location.href="http://localhost/codeigniter/index.php/blog_content_c/view/'.$data['single']['cid'].'";
				</script> ';   		
			}
		}
		
		/*显示此博客的所有评论*/
		$data['allcomment']=$this->comment_m->comment_select_join($data['single']['cid']);
		
		
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
		$arr=array('uname'=>$_POST['uname'],'upass'=>md5($_POST['upass']));		
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
				if($user[0]->upass==md5($_POST['upass']))
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
							alert("密码不正确！请重试");
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
	
	/*用户个人中心*/
	function user($id)
	{

		$this->load->library('session');
		$data['uid']=$this->session->userdata('uid');
		$id=$data['uid'];
		$this->load->model('user_m');
		$data['uname']=$this->user_m->user_select_id($id);	
		$name=$data['uname']['uname'];
		
		/*上传头像(未完成)*/
		
		$config['upload_path']='D://wamp/wamp/www/codeigniter/application/views/upload_head';
		$config['allowed_types']='jpg|png';
		$config['max_size']='1024*1024';	
		$config['file_name']=$name.$data['i'].'.jpg';

		
		$this->load->library('upload',$config);
		if($this->upload->do_upload('userfile'))
		{
			++$data['i'];
			$data=array('upload_data'=>$this->upload->data());
			var_dump($data);
		}else
		{
			$error=array('error'=>$this->upload->display_errors());
			var_dump($error);
		}
		
			
		$this->load->view('blog_user',$data);
	}
	
}
?>