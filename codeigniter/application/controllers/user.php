<?php
header("Content-Type:text/html;charset=utf-8");
class User extends CI_Controller
{
	function insert()
	{
		$this->load->model('test_m');
		
		$arr=array('uname'=>'ul','upass'=>'1234');
		
		$this->test_m->user_insert($arr);
		
	}
	
	function update()
	{
		$this->load->model('test_m');
		
		$arr=array('uname'=>'u2','upass'=>'123456671');
		
		$this->test_m->user_update(1,$arr);
	}
	
	function delete()
	{
		$this->load->model('test_m');

		$this->test_m->user_delete(3);
	}
	
	function select()
	{
		$this->load->model('test_m');

		$user=$this->test_m->user_select(2);
		
		//var_dump($user);
		
		echo $user[0]->uid;//$user是一个对象
	}
	
}
?>