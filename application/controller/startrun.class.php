<?php
require_once _FILEPATH.'libs/Smarty/Smarty.class.php';
class startrun{
	public $tpl;
	public $m;
	public static $info;
	
	//初始化运行 加载公用配置
	public function __construct(){
		spl_autoload_register(function ($class) {
			include_once _FILEPATH.'model/' . $class . '.class.php';
		});
		$smarty = new Smarty();
		$smarty->setCompileDir(_FILEPATH."runtimes/templates_c/"); #设置新的编译目录
		$smarty->setConfigDir(_FILEPATH."runtimes/configs/"); #设置新的配置目录
		$smarty->setCacheDir(_FILEPATH."runtimes/cache/"); #设置新的缓存目录
		$model = new model();
		if(isset($_COOKIE[_PREFIX.'logininfo']) && $_COOKIE[_PREFIX.'logininfo'] !=''){//判断用户登陆信息
		  $userinfo = json_decode($model->pskdecode($_COOKIE[_PREFIX.'logininfo']),true);
            $userinfo['picture'] = $userinfo['picture']?:'/public/images/_pic/01.png';
            $userinfo['nickname'] = $userinfo['nickname']?:'未设置';
            $smarty->assign('userinfo',$userinfo);
            self::$info = $userinfo;
		}else{
		    $smarty->assign('userinfo',null);
		}

		try { //加载购物车
		    $buycart = array();
			if(isset($userinfo['id'])){
				$buycart = $model->get('Accountinfo.buycart',array('userid'=>$userinfo['id']));
				$buycart = $buycart['datalist'];
			}else{
				if(isset($_COOKIE['buycart']) && $_COOKIE['buycart'] != ''){
				    $buycart = json_decode($_COOKIE['buycart'],true);
				    $buycart = $buycart['datalist'];
				}
			}
			$smarty->assign('buycart',$buycart);
		} catch (Exception $e) {
			showerr($e->getMessage());
		}
		
		//系统配置信息
		$sysinfo = [
		    'statics'     => 'http://www.clofood.com/public',
		    'domian'      => 'http://www.clofood.com',
		    'webname'     => '云厨电商'
		];
		$smarty->assign('sysinfo',$sysinfo);
		//配置信息结束
		$this->m = $model;		
		$this->tpl = $smarty;
	}	
}
?>