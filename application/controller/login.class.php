<?php
// +----------------------------------------------------------------------
// | 云厨电商  2015-5-18 上午9:44:42
// +----------------------------------------------------------------------
// | Copyright (c) 2015-2015 http://clofood.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: cnvj <1403729427@qq.com>
// +----------------------------------------------------------------------
require_once _FILEPATH.'controller/startrun.class.php';
/**
 * 登录注册页
 * @author Administrator
 *
 */
class login extends startrun{
    
    //登录页面
    public function run(){
        if(!empty($_COOKIE[_PREFIX.'logininfo'])){
           header("Location:".geturl('user|run'));
           die;
        }
        if(isset($_COOKIE[_PREFIX.'mobile']) && $_COOKIE[_PREFIX.'mobile'] != ''){
            $this->tpl->assign('mobile',$_COOKIE[_PREFIX.'mobile'],time()+3600*24*365);
        }else{
            $this->tpl->assign('mobile',null);
        }
        if(isset($_GET['backurl']) && $_GET['backurl'] != ''){
            $this->tpl->assign('backurl',urldecode($_GET['backurl']));
        }else{
            $this->tpl->assign('backurl',null);
        }
        $this->tpl->display('login.tpl');
    }
    
    //注册页面
    public function reg(){
        if(isset($_GET['backurl']) && $_GET['backurl'] != ''){
            $this->tpl->assign('backurl',urldecode($_GET['backurl']));
        }else{
            $this->tpl->assign('backurl',null);
        }        
        $this->tpl->display('reg.tpl');
    }
    
    //执行注册
    public function regin(){
        try{
            if(empty($_POST['mobile']) || !ismobile($_POST['mobile'])){
                throw new Exception('手机号码格式不正确');
            }
            if(empty($_POST['code']) || !iscode($_POST['code'])){
                throw new Exception('验证码错误');
            }
            $login = $this->m->put('Account.reg',array('mobile'=>$_POST['mobile'],'code'=>$_POST['code']));
            if($login['id']){
                $config = unserialize(_CONFIG);
                $login = $this->m->pskencode(json_encode($login));
                $login = setcookie(_PREFIX.'logininfo',$login,time()+3600*24);
                if($login){
                    echo json_encode(array('error'=>null,'result'=>array('status'=>1)));
                }else{
                    throw new Exception('必须开启cookie才能登陆');
                }
            }else{
                throw new Exception('系统错误，没有登录成功');
            }
        }catch (Exception $e){
            echo json_encode(array('error'=>array('msg'=>$e->getMessage()),'result'=>null));
        }
    }
    
    //发送验证码
    public function sendmobile(){
        try{
            if(empty($_POST['mobile']) || !ismobile($_POST['mobile'])){
                throw new Exception('手机号码格式不正确');
            }
            $result = $this->m->put('Account.regcode',array('mobile'=>$_POST['mobile'],'isreg'=>1));
            echo json_encode(array('error'=>null,'result'=>array('status'=>1)));
        }catch (Exception $e){
            echo json_encode(array('error'=>array('msg'=>$e->getMessage()),'result'=>null));
        }
    }
    
    //发送验证码
    public function sendmobile2(){
        try{
            if(empty($_POST['mobile']) || !ismobile($_POST['mobile'])){
                throw new Exception('手机号码格式不正确');
            }
            $result = $this->m->put('Account.regcode',array('mobile'=>$_POST['mobile'],'isreg'=>2));
            echo json_encode(array('error'=>null,'result'=>array('status'=>1)));
        }catch (Exception $e){
            echo json_encode(array('error'=>array('msg'=>$e->getMessage()),'result'=>null));
        }
    }
    
    //找回修改密码验证码发送
    public function getmobilepass(){
        try{
            if(empty($_POST['mobile']) || !ismobile($_POST['mobile'])){
                throw new Exception('手机号码格式不正确');
            }
            $result = $this->m->put('Account.regcode',array('mobile'=>$_POST['mobile'],'isreg'=>0));
            echo json_encode(array('error'=>null,'result'=>array('status'=>1)));
        }catch (Exception $e){
            echo json_encode(array('error'=>array('msg'=>$e->getMessage()),'result'=>null));
        } 
    }
    
    //修改密码
    public function changepassword(){
        try{
            if(empty($_POST['mobile']) || !ismobile($_POST['mobile'])){
                throw new Exception('手机号码格式不正确');
            }
            if(empty($_POST['code']) || !iscode($_POST['code'])){
                throw new Exception('验证码错误');
            }
            if(empty($_POST['password'])){
                throw new Exception('密码输入不能为空');
            }
            $result = $this->m->put('Account.getpassword',array('mobile'=>$_POST['mobile'],'code'=>$_POST['code'],'password'=>$_POST['password']));
            echo json_encode(array('error'=>null,'result'=>array('status'=>1)));
        }catch (Exception $e){
            echo json_encode(array('error'=>array('msg'=>$e->getMessage()),'result'=>null));
        }
    }
    
    //注册成功
    public function regsuccess(){
        $this->tpl->display('regsuccess.tpl');
    }
    
    //注册成功
    public function loginout(){
        setcookie(_PREFIX.'logininfo',null,time()-1);
        header("Location:".geturl('login|run'));
    }
    
    //修改找回密码
    public function getpass(){
        if(isset($_GET['backurl']) && $_GET['backurl'] != ''){
            $this->tpl->assign('backurl',urldecode($_GET['backurl']));
        }else{
            $this->tpl->assign('backurl',null);
        }
        $this->tpl->display('getpass.tpl');
    }
    
    //登录帐号
    public function sublogin(){
        try {
            if(empty($_POST['mobile']) || !ismobile($_POST['mobile'])){
                throw new Exception('手机号码格式不正确');
            }
            if(empty($_POST['password'])){
                throw new Exception('密码输入不能为空');
            }
            if($_POST['isremember'] == 1){
                setcookie(_PREFIX.'mobile',$_POST['mobile']);
            }else{
                setcookie(_PREFIX.'mobile',null);
            }
            $login = $this->m->get('Account.login',array('mobile'=>$_POST['mobile'],'password'=>$_POST['password']));
            if($login['id']){
                $config = unserialize(_CONFIG);
                $login = $this->m->pskencode(json_encode($login));
                $login = setcookie(_PREFIX.'logininfo',$login,time()+3600*24);
                if($login){
                  echo json_encode(array('error'=>null,'result'=>array('status'=>1)));
                }else{
                  throw new Exception('必须开启cookie才能登陆');
                }
            }else{
                throw new Exception('系统错误，没有登录成功');
            }
        } catch (Exception $e) {
            echo json_encode(array('error'=>array('msg'=>$e->getMessage()),'result'=>null));
        }
    }
}