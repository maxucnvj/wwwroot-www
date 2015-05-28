<?php
// +----------------------------------------------------------------------
// | 云厨电商  2015-5-26 下午4:11:30
// +----------------------------------------------------------------------
// | Copyright (c) 2015-2015 http://clofood.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: cnvj <1403729427@qq.com>
// +----------------------------------------------------------------------
require_once _FILEPATH.'controller/startrun.class.php';


class publics extends startrun{
    
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
    
    //创建订单
    public function createorder(){
        try {
            $data = $_POST;
            $login = isset(self::$info['id'])?true:false;
            if($login){//已经登录
                $buycart = $this->m->get('Accountinfo.buycart',array('userid'=>self::$info['id']));
                $buycart = $buycart['datalist'];
                $address = $this->m->get('Accountinfo.singleaddress',array('userid'=>self::$info['id'],'addressid'=>$data['addressid']));
                $arrayuser = array(
                    'userid' => self::$info['id']
                );
            }else{
                if(isset($_COOKIE['buycart']) && $_COOKIE['buycart'] != ''){
                    $buycart = json_decode($_COOKIE['buycart'],true);
                    $buycart = $buycart['datalist'];
                }
                $address = array(
                    'realname' => $data['realname'],
                    'mobile'   => $data['mobile'],
                    'provinceid' => $data['provinceid'],
                    'province' => $data['province'],
                    'cityid' => $data['cityid'],
                    'city' => $data['city'],
                    'districtid' => $data['districtid'],
                    'discrict' => $data['district'],
                    'street' => $data['street'],
                    'streetid' => $data['streetid'],
                    'villageid' => $data['villageid'],
                    'village' => $data['village'],
                    'address' => $data['address']
                );
                $arrayuser = array(
                    'mobile' => $data['mobile'],
                    'code'   => $data['code'],
                );
            }
            if(!is_array($buycart)){
                throw new Exception('购物车里没有任何商品');
            }
            //要购买的商品
            $goods = array();
            $productid = explode(',', $data['product_no']);
            foreach ($buycart as $v){
                    if(in_array($v['product_no'],$productid)){
                        $goods[$v['product_no']] = intval($v['quantity']);
                    }
            }
            $productinfo = $this->m->get('Products.infomore',array('product_no'=>implode(',',array_keys($goods))));
            $buygoods = array();
            $totalprice = 0;
            foreach ($productinfo['datalist'] as $v){
                $buygoods[$v['id']] = $goods[$v['product_no']];
                $totalprice += round($goods[$v['product_no']]*$v['shopprice'],2);
            }
            if($login){
                if($data['payfor'] == 'balance'){
                    $arrayuser = array_merge($arrayuser,array(
                        'paypassword' => $data['paypassword'],
                        'balance' => $totalprice
                    ));
                }
            }
            $array = array(
                'product'=> json_encode($buygoods),
                'sendtime'=> $data['sendtime'],
                'postage' => 0.00,
                'remark'  => $data['remark'],
                'integral'=> 0,
                'uuid' => $data['uuid'],
                'payprice' => ($data['payfor'] == 'balance')?0:$totalprice,
                'orderprice'=> $totalprice,
                'addressinfo'=> json_encode($address,JSON_UNESCAPED_UNICODE)
            );
            $order = $this->m->put('Order.createorder',array_merge($arrayuser,$array));
            echo json_encode(array('error'=>null,'result'=>array('status'=>1)),JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            echo json_encode(array('error'=>array('msg'=>$e->getMessage()),'result'=>null));
        }              
    }
}