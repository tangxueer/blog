<?php
header("Content-Type: text/html;charset=utf-8");
class Blog_category extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
	/*显示此分类的所有博客页面*/
	function category($caname,$id)
	{
		$this->load->model('blog_m');
		$this->load->model('category_m');
		$this->load->model('user_m');
		
		$ca_name=urldecode($caname);
		$cablog=$this->blog_m->select_join($ca_name);
		
		/*分页系统*/
		$pageall=count($cablog);
		$pagenum=10;
		$config['total_rows']=$pageall;
		$config['per_page']=$pagenum;
		$config['num_links']=3;
		$config['base_url']="/codeigniter/index.php/blog_category/category/".$ca_name;
		$config['use_page_numbers']=true;
		
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$this->pagination->create_links();

		
		$id=$id?$id:1;
		$start=($id-1)*$pagenum;
		$data['list']=$this->blog_m->select_limit_join($ca_name,$pagenum,$start);
		
		/*登录后显示用户名与退出键*/
		$this->load->library('session');
		$data['session']=$this->session->userdata('uid');
		
		$data['uname']=$this->user_m->user_select_id($data['session']);	
	
		/*博客分类目录*/
		$data['allcaname']=$this->category_m->category_select_allname();
		
		$this->load->view('blog_category_v',$data);	
	}
}
?>