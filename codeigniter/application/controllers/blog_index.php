<?php
/*博主的用户名指定为admin,密码为admin*/
header("Content-Type: text/html;charset=utf-8");
class Blog_index extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
	/*主页*/
	function index($id)
	{
	
		$this->load->model('blog_m');
		$this->load->model('user_m');
		$this->load->model('category_m');
		
		/*分页系统*/
		$blog=$this->blog_m->select_all();
		
		$pageall=count($blog);
		$pagenum=10;
		$config['total_rows']=$pageall;
		$config['per_page']=$pagenum;
		$config['num_links']=3;
		$config['base_url']="/codeigniter/index.php/blog_index/index";
		$config['use_page_numbers']=true;
		
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		$this->pagination->create_links();

		
		$id=$id?$id:1;
		$start=($id-1)*$pagenum;
		$data['list']=$this->blog_m->select_limit($pagenum,$start);
		
		/*登录后显示用户名与退出键*/
		/*若博主登录，则显示后台管理系统与发布博客页面的链接*/	
		$this->load->library('session');
		$data['session']=$this->session->userdata('uid');	
		$data['uname']=$this->user_m->user_select_id($data['session']);	
	
		/*博客分类目录*/		
		$data['allcaname']=$this->category_m->category_select_allname();
		
		$this->load->view('blog_index_v',$data);					
	}
}
?>