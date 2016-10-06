<?php

class StuAction extends Action{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        require_once DIR_VIEW.'header.php';
        echo "请输入你的相关信息";
        require_once DIR_VIEW.'footer.php';
    }

    public function info($username,$password){
        require_once DIR_VIEW.'header.php';

        function curl($url,$post_data){
            //初始化
            $curl = curl_init();
            //设置抓取的url
            curl_setopt($curl, CURLOPT_URL, $url);
            //设置头文件的信息作为数据流输出
            curl_setopt($curl, CURLOPT_HEADER, 1);
            //设置获取的信息以文件流的形式返回，而不是直接输出。
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            //设置post方式提交
            curl_setopt($curl, CURLOPT_POST, 1);
            //设置post数据
            curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
            //执行命令
            $data = curl_exec($curl);
            //关闭URL请求
            curl_close($curl);
            //显示获得的数据
            return $data;
        }

        $url = "http://gdpuwbl.sinaapp.com/jwc/show_1.php";
        $post_data = array(
            "username" => $username,
            "password" => $password,
            "type" => "false"
        );

        include WEBROOT."/public/FetchURL/simple_html_dom.php";



//        echo '<link rel="stylesheet" type="text/css" href="http://gdpuwbl.sinaapp.com/css/weui.min.css?v=6">';

        $text= curl($url,$post_data);

        var_dump($text);
        
        //       $html = str_get_html($text);

        //       var_dump( $html->find('table'));

        require_once DIR_VIEW.'footer.php';

    }
}

?>