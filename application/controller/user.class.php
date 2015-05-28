<?php
// +----------------------------------------------------------------------
// | 云厨电商  2015-5-18 上午11:48:38
// +----------------------------------------------------------------------
// | Copyright (c) 2015-2015 http://clofood.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: cnvj <1403729427@qq.com>
// +----------------------------------------------------------------------
require_once _FILEPATH.'controller/checkuser.class.php';

class user extends checkuser{
    
    public function run(){
        $this->tpl->display('myaddress.tpl');
    }
    
    //我的地址管理
    public function myaddress(){
        $country = $this->m->get('Publics.getareainfo',array('name'=>'country','areaid'=>86));
        $address = $this->m->get('Accountinfo.address',array('userid'=>self::$info['id']));
        $this->tpl->assign('address',$address['datalist']);
        //var_dump($address);die;
        $this->tpl->assign('country',$country['datalist']['country']);
        $this->tpl->display('myaddress.tpl');
    }
    
    //删除地址
    public function deladdress(){
        try{
            if(empty($_POST['addressid'])){
                throw new Exception('错误的参数');
            }
            $result = $this->m->put('Delete.deladdress',array('userid'=>self::$info['id'],'addressid'=>$_POST['addressid']));
            echo json_encode(array('error'=>null,'result'=>array('status'=>1)));
        }catch (Exception $e){
            echo json_encode(array('error'=>array('msg'=>$e->getMessage()),'result'=>null));
        }
    }
    
    //设置成为默认地址
    public function setaddress(){
        try{
            if(empty($_POST['addressid'])){
                throw new Exception('错误的参数');
            }
            $result = $this->m->put('Update.updateaddress',array('userid'=>self::$info['id'],'addressid'=>$_POST['addressid']));
            echo json_encode(array('error'=>null,'result'=>array('status'=>1)));
        }catch (Exception $e){
            echo json_encode(array('error'=>array('msg'=>$e->getMessage()),'result'=>null));
        }
    }
    
    //取地址信息
    public function getarea(){
       if(isset($_POST['name']) && isset($_POST['areaid'])){
           $province = $this->m->get('Publics.getareainfo',array('name'=>$_POST['name'],'areaid'=>$_POST['areaid']));
           echo json_encode($province['datalist'][$_POST['name']],JSON_UNESCAPED_UNICODE);
       } 
    }
    
    //查找小区
    public function searchvillage(){
        if(isset($_POST['streetid']) && isset($_POST['villagename']) && $_POST['streetid']!='' && $_POST['villagename']!=''){
            $result = $this->m->get('Publics.getvillage',array('streetid'=>$_POST['streetid'],'villagename'=>$_POST['villagename']));
            echo json_encode($result['datalist'],JSON_UNESCAPED_UNICODE);
        }
    }
    
    //修改支付密码
    public function changepaypass(){
        if(isset($_GET['backurl']) && $_GET['backurl'] != ''){
            $this->tpl->assign('backurl',urldecode($_GET['backurl']));
        }else{
            $this->tpl->assign('backurl',null);
        }
        $this->tpl->display('chanagepaypass.tpl');
    }
    
    //保存修改收货地址
    public function savaaddress(){
        try {
            $this->m->put('Insert.addaddress',array_merge($_POST,array('userid'=>self::$info['id'])));
            echo json_encode(array('error'=>null,'result'=>array('status'=>1)));
        } catch (Exception $e) {
            echo json_encode(array('error'=>array('msg'=>$e->getMessage()),'result'=>null));
        }
    }
    
    //取用户单个的收货地址
    public function singleaddress(){
        try {
            if(intval($_POST['addressid']) <= 0){
                throw new Exception('收货地址ID不存在');
            }
            $res = $this->m->get('Accountinfo.singleaddress',array('userid'=>self::$info['id'],'addressid'=>$_POST['addressid']));
            echo json_encode(array('error'=>null,'result'=>$res));
        } catch (Exception $e) {
            echo json_encode(array('error'=>array('msg'=>$e->getMessage()),'result'=>null));
        }
    }
    
    //提交修改支付密码
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
            $result = $this->m->put('Account.getpaypassword',array('mobile'=>$_POST['mobile'],'code'=>$_POST['code'],'paypassword'=>$_POST['password']));
            echo json_encode(array('error'=>null,'result'=>array('status'=>1)));
        }catch (Exception $e){
            echo json_encode(array('error'=>array('msg'=>$e->getMessage()),'result'=>null));
        }
    }
    
}