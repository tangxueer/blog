<?php
header("Content-Type: text/html;charset=utf-8");
class Blog_register extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
/*用户注册*/
	function register()
	{		
		$this->load->model('user_m');	
		
		$arr=array('uname'=>$_POST['uname'],'upass'=>md5($_POST['upass']),'udate'=>date("Y-m-d H:i:s"));		
		$lenname=strlen($_POST['uname']);
		$lenpass=strlen($_POST['upass']);
				
		$arrname=$this->user_m->user_select_name($_POST['uname']);
		if(!is_array($arrname))//防止用户名重复
		{	
			if($_POST['submit'])
			{	
				if($_POST['uname']!='')
				{									
					if($_POST['upass']!='')
					{
						if($lenname>2&&$lenname<17)
						{
							if($lenpass>2)
							{
								$this->user_m->user_insert($arr);
								$arow=$this->user_m->affected_rows();//影响条数
								if($arow='1')
								{	//跳转至登录页面
									echo '
										<script language="javascript"> 
											alert("注册成功!"); 
											window.location.href="http://localhost/codeigniter/index.php/blog_login/login"; 
										</script> ';     
								}else
								{	//跳转至注册页面
									echo '
										<script language="javascript">
											alert("注册失败!请重试");
											window.location.href="http://localhost/codeigniter/index.php/blog_register/register";
										</script> ';
								}
							}else
							{
								echo '
								<script language="javascript">
									alert("密码不得少于3个字符");
									window.location.href="http://localhost/codeigniter/index.php/blog_register/register";
								</script> ';
							}
						}else
						{
							echo '
							<script language="javascript">
								alert("用户名需在3到16位字符内");
								window.location.href="http://localhost/codeigniter/index.php/blog_register/register";
							</script> ';
						}
					}else
					{
						echo '
							<script language="javascript">
								alert("密码不能为空");
								window.location.href="http://localhost/codeigniter/index.php/blog_register/register";
							</script> ';
					}
				}else
				{
					echo '
					<script language="javascript">
						alert("用户名不能为空");
						window.location.href="http://localhost/codeigniter/index.php/blog_register/register";
					</script> ';
				}
			}	
		}else
		{
			echo '
				<script language="javascript">
					alert("该用户名已被注册，请重新输入");
					window.location.href="http://localhost/codeigniter/index.php/blog_register/register";
				</script> ';
		}
		
		$this->load->view('blog_register_v');
	}
}
?>