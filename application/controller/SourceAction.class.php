<?php
	class SourceAction extends Action {

		public function __construct(){
			parent::__construct();
		}

		public function __call($url,$value)
		{
			require_once DIR_VIEW.'password.php';
		}

		public function index(){

			//简单加密
			require_once DIR_VIEW.'password.php';

			require_once DIR_VIEW.'header.php';
			echo "<p>以下是本服务器的实时源码</p>";
			function dirtree($path=WEBROOT) {
				echo "<ul>";
				$d = dir($path);
				while(false !== ($v = $d->read())) {
					if($v == "." or $v == "..")
					continue;
					$file = $d->path."/".$v;
					if(is_dir($file)){
					echo " <li style='background:#f7f7f7;margin:6px;'><span class='glyphicon glyphicon-folder-open' aria-hidden='true'></span> &nbsp <b>$v</b></li>";
					dirtree($file);
					}else{
					$file_name = str_replace('/','-',$file);
					echo "<li><a href='/source/show/$file_name' target='_blank'>$v</a></li>";
					}
				}
				$d->close();
				echo "</ul>";
			}

			dirtree();

			require_once DIR_VIEW.'footer.php';
		}

		function show($file_name){
			require_once DIR_VIEW.'header.php';
			echo "<p>以下是文件".$file_name."的实时源码</p>";
			echo '<div class="jumbotron">';
			highlight_file(urldecode(str_replace('-','/',$file_name)));
			echo '</div>';
			require_once DIR_VIEW.'footer.php';
		}
	}
?>