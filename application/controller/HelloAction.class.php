<?php
	class HelloAction extends Action{

		//构造器
		public function __construct(){
			parent::__construct();
		}

		//调用
		public function __call($url,$value)
		{
			var_dump($_REQUEST);
		}

		//路由
		public function index(){
			$welcome = "Hello welcome to YunPHP For SAE";
			$this->assign('welcome',$welcome);
			$this->display('hello/index.php');
		}
	}
?>