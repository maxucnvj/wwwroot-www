<?php
// +----------------------------------------------------------------------
// | 云厨电商  2015-5-22 上午10:21:15
// +----------------------------------------------------------------------
// | Copyright (c) 2015-2015 http://clofood.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: cnvj <1403729427@qq.com>
// +----------------------------------------------------------------------
require_once _FILEPATH.'controller/startrun.class.php';
/**
 * 产品页面类
 * @author Administrator
 *
 */
class product extends startrun{
    
    //每日一爆
    public function hot(){
        try {
             $tuijian = $this->m->get('Products.search',array('category'=>1,'pagelist'=>4));
             $this->tpl->assign('tuijian',$tuijian['datalist']);
             $this->tpl->display('producthot.tpl');  
        } catch (Exception $e) {
            showerr($e->getMessage());
            die;
        }  
    }
    
    //向购物车添加商品
    public function addbuycart(){
        try {
            if(empty($_POST['product_no']) || empty($_POST['quantity'])){
                throw new Exception('参数不足');
            }
            if(empty($_COOKIE[_PREFIX.'logininfo'])){//没有登录
                $buycart = array();
                if(isset($_COOKIE['buycart']) && $_COOKIE['buycart'] != ''){ //取本地购物车
                    $buycart = json_decode($_COOKIE['buycart'],true);
                }
                $inbuycart = false; //是否存在于购物车
                if(isset($buycart['datalist'])){
                    $loaclbuycart = array();
                    foreach ($buycart['datalist'] as $v){
                        if($v['product_no'] == $_POST['product_no']){
                            $v['quantity'] += intval($_POST['quantity']);                           
                            $inbuycart = true;
                        }
                        $loaclbuycart['datalist'][] = $v;
                    }
                    $buycart = $loaclbuycart;
                }
                if(!$inbuycart){
                    $v = $this->m->get('Products.info',array('product_no'=>$_POST['product_no']));
                    if(!$v){
                        throw new Exception('商品不存在');
                    }
                    $buycart['datalist'][] = array(
                        'product_no' => $_POST['product_no'],
                        'picture' => $v['picture'],
				        'product_name' => $v['product_name'],
                        'sales_name' => $v['sales_name'],
				        'shopprice'    => $v['shopprice'],
				        'quantity'     => intval($_POST['quantity'])
                    );                   
                }
                setcookie('buycart',json_encode($buycart),time()+3600*24*365*10);                
            }else{//已经登录
                $result = $this->m->put('Accountinfo.addbuycart',array('userid'=>self::$info['id'],'product_no'=>$_POST['product_no'],'quantity'=>$_POST['quantity']));
                $buycart = $this->m->get('Accountinfo.buycart',array('userid'=>self::$info['id']));
            }
            echo json_encode(array('error'=>null,'result'=>array('status'=>1,'datalist'=>$buycart)));
        } catch (Exception $e) {
            echo json_encode(array('error'=>array('msg'=>$e->getMessage()),'result'=>null));
        } 
    }
    
    //删除购物车中的商品
    public function unsetbuycart(){
        try {
            if(empty($_POST['product_no'])){
                throw new Exception('参数错误');
            }
            $savebuycart = array();  
            if(isset(self::$info['id'])){
                $buycart = $this->m->put('Accountinfo.unsetbuycart',array('userid'=>self::$info['id'],'product_no'=>$_POST['product_no']));
            }else{
                if(isset($_COOKIE['buycart']) && $_COOKIE['buycart'] != ''){
                    $buycart = $_COOKIE['buycart'];
                    foreach (json_decode($buycart,true) as $v){
                        if(!in_array($v['product_no'],explode(',', $_POST['product_no']))){
                            $savebuycart[] = $v;
                        }
                    }
                    setcookie('buycart',json_encode($savebuycart),time()+3600*24*365*10);
                }
            }
            echo json_encode(array('error'=>null,'result'=>array('status'=>1)));
        } catch (Exception $e) {
            echo json_encode(array('error'=>array('msg'=>$e->getMessage()),'result'=>null));
        }
    }
    
    //显示购物车商品
    public function showcart(){
        try {
        	$buycart = json_encode(array());
			if(isset(self::$info['id'])){
				$buycart = $this->m->get('Accountinfo.buycart',array('userid'=>self::$info['id']));
				$buycart = json_encode($buycart['datalist'],JSON_UNESCAPED_UNICODE);
			}else{
				if(isset($_COOKIE['buycart']) && $_COOKIE['buycart'] != ''){
				    $buycart = $_COOKIE['buycart'];
				}
			}
			echo json_encode(array('error'=>null,'result'=>$buycart));
        } catch (Exception $e) {
            echo json_encode(array('error'=>array('msg'=>$e->getMessage()),'result'=>null));
        }
    }
    
    //增加减少购物车数量
    public function buycartquantity(){
        try {
            if(empty($_POST['product_no']) || empty($_POST['quantity'])){
                throw new Exception('参数错误');
            }
            $savebuycart = array();
            if(isset(self::$info['id'])){
                $buycart = $this->m->put('Accountinfo.updatebuycart',array('userid'=>self::$info['id'],'product_no'=>$_POST['product_no'],'quantity'=>intval($_POST['quantity'])));
            }else{
                if(isset($_COOKIE['buycart']) && $_COOKIE['buycart'] != ''){
                    $buycart = $_COOKIE['buycart'];
                    foreach (json_decode($buycart,true)['datalist'] as $v){
                        if($v['product_no'] == $_POST['product_no']){
                            $v['quantity'] = intval($_POST['quantity']);
                        }
                        $savebuycart['datalist'][] = $v;
                    }
                    setcookie('buycart',json_encode($savebuycart),time()+3600*24*365*10);
                }
            }
            echo json_encode(array('error'=>null,'result'=>array('status'=>1)));
        } catch (Exception $e) {
            echo json_encode(array('error'=>array('msg'=>$e->getMessage()),'result'=>null));
        }
    }
    
    //结算
    public function gobuy(){
        try {
            if(empty($_GET['productid'])){
                throw new Exception('还没有选择任何商品');
            }
            $login = isset(self::$info['id'])?true:false;
        	if($login){//已经登录
				$buycart = $this->m->get('Accountinfo.buycart',array('userid'=>self::$info['id']));
				$buycart = $buycart['datalist'];
			}else{
				if(isset($_COOKIE['buycart']) && $_COOKIE['buycart'] != ''){
				    $buycart = json_decode($_COOKIE['buycart'],true);
				    $buycart = $buycart['datalist'];
				}
			}
			if(!is_array($buycart)){
			    throw new Exception('购物车里没有任何商品');
			}
			
			//初始化省
			$country = $this->m->get('Publics.getareainfo',array('name'=>'country','areaid'=>86));
			$this->tpl->assign('country',$country['datalist']['country']);
			
			//取页面UUID
			$uuid = $this->m->get('Publics.creatuuid');
			$this->tpl->assign('uuid',$uuid);
			
			//要购买的商品
			$goods = array();
			$productid = explode(',', $_GET['productid']);
			foreach ($buycart as $v){
			    if($_GET['productid'] == 'allbuycart'){
			        $goods[$v['product_no']] = intval($v['quantity']);
			    }else{
			        if(in_array($v['product_no'],$productid)){
			            $goods[$v['product_no']] = intval($v['quantity']);
			        }
			    }
			}			
			$productinfo = $this->m->get('Products.infomore',array('product_no'=>implode(',',array_keys($goods))));
			$buygoods = array();
			$buygood = '';
			$totalpri = 0;
			foreach ($productinfo['datalist'] as $v){
			    $buygoods[] = array(
			        'picture' => $v['picture'],
			        'product_no' => $v['product_no'],
			        'product_name' => $v['product_name'],
			        'sales_name' => $v['sales_name'],
			        'shopprice'  => $v['shopprice'],
			        'quantity'   => $goods[$v['product_no']],
			        'totalprice' => round($goods[$v['product_no']]*$v['shopprice'],2)
			    );
			    $totalpri += round($goods[$v['product_no']]*$v['shopprice'],2);
			    $buygood .= $v['product_no'].",";
			}
			$this->tpl->assign('good',substr($buygood, 0,-1));
            $this->tpl->assign('goods',$buygoods);
            $this->tpl->assign('totalprice',number_format($totalpri,2));
            
            //配送时间
            $week = [' 星期天',' 星期一',' 星期二',' 星期三',' 星期四',' 星期五',' 星期六'];
            $data = array();
            $data['days'][] = date('Y-m-d').$week[date('w')];
            $data['days'][] = date('Y-m-d',strtotime("+1 day")).$week[date('w',strtotime("+1 day"))];
            $data['days'][] = date('Y-m-d',strtotime("+2 day")).$week[date('w',strtotime("+2 day"))];
            $data['times'][] = '不限时间';
            $data['times'][] = '09：00 - 18：00';
            $data['times'][] = '18：00 - 23：00';
            $data['times'][] = '06：00 - 09：00';
            $this->tpl->assign('sendtimes',$data);
            
            if($login){
                $address = $this->m->get('Accountinfo.address',array('userid'=>self::$info['id']));
                $this->tpl->assign('address',$address['datalist']);
                $money = $this->m->get('Accountinfo.getusermoney',array('userid'=>self::$info['id']));
                $this->tpl->assign('money',$money['money']);
            }

            $this->tpl->display($login?'logingobuy.tpl':'gobuy.tpl');
        } catch (Exception $e) {
            showerr($e->getMessage());
            die;
        }        
    }
    
    //购物车
    public function buycart(){
        $this->tpl->display('buycart.tpl');
    }
}
?>