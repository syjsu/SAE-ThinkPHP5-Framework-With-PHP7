<?php

namespace app\controller;

class Index
{
    public function index($name = '小小酥')
    {
        return view('base/base',['name'=>$name]);
    }

    public function hello($name = 'World')
    {
        return 'Hello,' . $name . '!';
    }

     public function acg($name = 'World')
    {
        return 'acg,' . $name . '!';
    }
}
