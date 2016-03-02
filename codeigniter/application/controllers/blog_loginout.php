<?php
header("Content-Type: text/html;charset=utf-8");
class Blog_loginout extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
	/*用户退出登录*/
	function loginout()
	{
		$this->load->library('session');
		$this->session->unset_userdata('uid');
		echo'
			<script language="javascript">
				alert("成功退出");
				window.location.href="http://localhost/codeigniter/index.php/blog_index/index";
			</script> ';		
	}
}
?>