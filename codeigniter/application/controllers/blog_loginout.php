<?php
header("Content-Type: text/html;charset=utf-8");
class Blog_loginout extends CI_Controller
{
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
				window.location.href="http://localhost/codeigniter/index.php/blog_index/index";
			</script> ';		
	}
}
?>