<?php
	class CheckAction extends Action{

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

require_once DIR_VIEW.'header.php';
echo '
		<h3>验证码测试案例</h3>
		<br>
		<form method="post" action="http://littlesmallsu.applinzi.com/public/geetest/VerifyLoginServlet.php">

			<div class="box">
				<label>邮箱：</label>
				<input type="text" name="email" value="syjsu@qq.com"/>
			</div>

			<div class="box">
				<label>密码：</label>
				<input type="password" name="password" value="123456"/>
			</div>

			<br>
			<div class="box" id="div_geetest_lib">
			<div id="captcha"></div>
			<script src="http://static.geetest.com/static/tools/gt.js"></script>
			<script>
			    var handler = function (captchaObj) {
			         // 将验证码加到id为captcha的元素里
			         captchaObj.appendTo("#captcha");
			     };
			    $.ajax({
			        // 获取id，challenge，success（是否启用failback）
			        url: "http://littlesmallsu.applinzi.com/public/geetest/StartCaptchaServlet.php?rand="+Math.round(Math.random()*100),
			        type: "get",
			        dataType: "json", // 使用jsonp格式
			        success: function (data) {
			            // 使用initGeetest接口
			            // 参数1：配置参数，与创建Geetest实例时接受的参数一致
			            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
			            initGeetest({
			                gt: data.gt,
			                challenge: data.challenge,
			                product: "embed", // 产品形式
			                offline: !data.success
			            }, handler);
			        }
			    });
			</script>
			</div>

			<br>
			<div class="box">
				<button class="btn btn-default" id="submit_button">确认</button>
			</div>
		</form>
	</div>

';

 require_once DIR_VIEW.'footer.php';

		}
	}
?>