<?php
header("Content-Type:text/html;charset=utf-8");

defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller 
{
	function sayhello($name)
	{
		echo $name."hello world!";
	}
	
	function show()
	{
		$name="yoyo";
		@$count=file_get_contents('./num.txt');
		$count=$count?$count:0;
		
		$count++;
	
		$data=array('v_name'=>$name,'v_count'=>$count);
		
		$re=fopen('./num.txt','w');
		fwrite($re,$count);
		fclose($re);
		
		$this->load->view('test_view_foot.php',$data);
		$this->load->view('test_view.php');		
	}
}
?>
