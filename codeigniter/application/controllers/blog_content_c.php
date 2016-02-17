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
		$this->load->view('blog_view',$data);		
		
		/*删除处理*/
		if($_POST['submit'])
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
}
?>