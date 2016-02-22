<?php
header("Content-Type: text/html;charset=utf-8");
class Blog_login extends CI_Controller
{
	/*用户登录前端页面*/
	function login()
	{
		$this->load->view('blog_login_v');		
	}	
	/*用户登录后台数据库比对*/
	function checklogin()
	{
		$this->load->model('user_m');
		$user=$this->user_m->user_select_name($_POST['uname']);
		if($_POST['submit'])
		{
			if($user)
			{	
				if($user['upass']==md5($_POST['upass']))
				{
						//开启session			
						$this->load->library('session');
						$arr=array('uid'=>$user['uid']);
						$this->session->set_userdata($arr);
						$this->session->userdata('uid');
					echo '
						<script language="javascript">
							alert("登录成功!");
							window.location.href="http://localhost/codeigniter/index.php/blog_index/index";
						</script> ';				
				}else
				{
					echo '
						<script language="javascript">
							alert("密码不正确！请重试");
							window.location.href="http://localhost/codeigniter/index.php/blog_login/login";
						</script> ';
				}
			}else
			{
				echo '
						<script language="javascript">
							alert("该用户名不存在，请注册");
							window.location.href="http://localhost/codeigniter/index.php/blog_login/login";
						</script> ';					
			}	
		}		
	}
}
?>