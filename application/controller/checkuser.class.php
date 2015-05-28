<?php
// +----------------------------------------------------------------------
// | 云厨电商  2015-5-18 上午11:50:20
// +----------------------------------------------------------------------
// | Copyright (c) 2015-2015 http://clofood.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: cnvj <1403729427@qq.com>
// +----------------------------------------------------------------------
require_once _FILEPATH.'controller/startrun.class.php';

class checkuser extends startrun{
   
    public function __construct(){
        parent::__construct();
        if(empty($_COOKIE[_PREFIX.'logininfo'])){
            header("Location:".geturl('login|run'));
            die;
        }
    }
}