<?php


class Index{
	public function __construct(){
		parent::__construct();
	}

	public function __call($url,$value)
	{
		var_dump($_REQUEST);
		if (isset($_REQUEST['title']) && isset($_REQUEST['content'])) {
			$k = new SaeKV();
			$ret = $k->init();
			$res = $k->set("article_".$_REQUEST['title'],$_REQUEST['content']);
			var_dump($res);
		}
		if ($_REQUEST['action'] == 'del') {
			$k = new SaeKV();
			$ret = $k->init();
			$res = $k->delete($_REQUEST['title']);
			var_dump($res);
		}
	}

	public function index(){
		return "hello world";
		/*
		include DIR_PUBLIC.'markdown/parsedown.php';
		require_once DIR_VIEW.'header.php';
		$k = new SaeKV();
		$Parsedown = new Parsedown();
		$ret = $k->init();
		$res = $k->pkrget("article_",100);
		echo '<div><div class="row">';
		foreach ($res as $key => $value) {
			echo '
		<div class="col-sm-6 col-md-4">
		<div class="container">
		<div class="panel panel-default">
		<div class="panel-heading">'.preg_replace("/[article_]+/i","",$key).'</div>
		<div class="panel-body">'.$Parsedown->text($value).'</div>
		</div>
		</div>
		</div>
			';
		}
		echo '</div></div>';
		require_once DIR_VIEW.'footer.php';*/
	}

	public function send(){
		require_once DIR_VIEW.'password.php';
		require_once DIR_VIEW.'header.php';
		echo '
		<form method="get" enctype="text/plain">
		<h3>发送信息</h3>
		标题：<br />
		<input type="text" name="title" value="请输入你的标题"">
		<br />
		内容：<br />
		<input type="text" name="content" value="请输入你的内容">
		<br />
		<input type="submit" value="发送">
		</form>
		';

		$k = new SaeKV();
		$ret = $k->init();
		$res = $k->pkrget("article_",100);
		echo '<div><div class="row">';
		foreach ($res as $key => $value) {
			echo '
		<div class="col-sm-6 col-md-4">
		<div class="container">
		<div class="panel panel-default">
		<div class="panel-heading">'.$key.'</div>
		<div class="panel-body">'.$value.'</div>

		<form method="get" enctype="text/plain">
		<input type="hidden" name="action" value="del">
		<input type="hidden" name="title" value="'.$key.'">
		<input type="submit" value="删除">
		</form>

		</div>
		</div>
		</div>
			';
		}
		echo '</div></div>';
		require_once DIR_VIEW.'footer.php';
	}
}

?>