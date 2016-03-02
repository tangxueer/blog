<?php
class Page extends CI_Controller
{
	function useradd()
	{
		$this->load->model('test_m');
		for($i=1;$i<=40;$i++)
		{
			$name='u'.$i;
			$arr=array('uname'=>$name,'upass'=>'123456');
			$this->test_m->user_insert($arr);
		}
	}
	
	function pagelist($id)
	{
		$this->load->model('test_m');
		$user=$this->test_m->user_select_all();
		
		$pageall=count($user);
		$pagenum=5;
		$config['total_rows']=$pageall;
		$config['per_page']=$pagenum;
		$config['num_links']=3;
		$config['base_url']="/codeigniter/index.php/page/pagelist";
		$config['use_page_numbers']=true;
		
		$this->load->library('pagination');
		$this->pagination->initialize($config);
		echo $this->pagination->create_links();
		
		echo "<br>";
		
		$id=$id?$id:1;
		$start=($id-1)*$pagenum;
		$list=$this->test_m->user_select_limit($pagenum,$start);
		var_dump($list);
		
	}
}
?>