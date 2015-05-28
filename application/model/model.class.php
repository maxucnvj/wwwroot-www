<?php
require_once _FILEPATH.'libs/Prpcrypt.class.php';
class model{
	/**
	 * 定义接口配置信息
	 * @var Array
	 */
	private static $appconfig;
	
	/**
	 * 定义配置信息
	 * @var Array
	 */
	public static $config;
	
	//初始化数据接口
	public function __construct(){
		$config = unserialize(_CONFIG);
		self::$appconfig = $config['appconfig'];
		self::$config = $config;
	}
	
	/**
	 * 获取服务器数据
	 * @param string $action 方法
	 * @param array $data 参数
	 */
	public static function get($action,$data=array()){
		$data = array_merge(array('mobilecode'=>session_id(),'random'=>self::getRandomStr()),$data);
		$url = self::$appconfig['server'].'?mm='.$action.'&appid='.self::$appconfig['appid'];
		$params = self::greatparams($data);
		$res = self::curl($url,$params);
		return self::deparams($res);
	}
	
	/**
	 * 向服务器发送数据
	 * @param string $action 方法
	 * @param array $data 参数
	 */
	public static function put($action,$data=array()){
		$data = array_merge(array('mobilecode'=>session_id(),'random'=>self::getRandomStr()),$data);
		$url = self::$appconfig['server'].'?mm='.$action.'&appid='.self::$appconfig['appid'];
		$params = self::greatparams($data);
		$res = self::curl($url,$params);
		return self::deparams($res);
	}
	
	/**
	 * 加密一个字符串
	 * @param string $string 要加解的字符串
	 */
	public static function pskencode($string){
	    if($string == ""){
	        throw new Exception('要加密的内容不能为空');
	    }
	    $prpcrypt = new Prpcrypt(self::$appconfig['appkey']);
	    return $prpcrypt->encrypt($string, self::$appconfig['appid']);
	}
	
	/**
	 * 解密一个字符串
	 * @param string $string 要解密的字符串
	 */
	public static function pskdecode($string){
	    if($string == ""){
	        throw new Exception('要解密的内容不能为空');
	    }
	    $prpcrypt = new Prpcrypt(self::$appconfig['appkey']);
	    return $prpcrypt->decrypt($string, self::$appconfig['appkey']);
	}
	
	/**
	 * 解析返回来的信息
	 * @param string $string
	 */
	private static function deparams($string){
		$data = json_decode($string,true);
		if(!$data['result']){
		    if($data['error']['msg'] == "登录信息出错"){
		         setcookie(_PREFIX.'logininfo',null,time()-1);
                 header("Location:".geturl('login|run'));
		    }
			throw new Exception($data['error']['msg'], $data['error']['code']);
		}
		switch (self::$appconfig['status']){
			case 0: //加密
				$prpcrypt = new Prpcrypt(self::$appconfig['appkey']);
				$jsonstring = $prpcrypt->decrypt($data['result'], self::$appconfig['appkey']);
				break;
			default: //没有任何操作
				$jsonstring = $data['result'];
				break;
		}
		$array = json_decode($jsonstring,true);
		if(is_array($array)){
			return $array;
		}else{
			throw new Exception('服务器没有正确的返回，请联系管理员');
		}
	}
	
	/**
	 * 重构提交参数
	 * @param array $data
	 * @return string
	 */
	private static function greatparams($data){
		$jsonstring = json_encode($data,JSON_UNESCAPED_UNICODE);
		switch (self::$appconfig['status']){
			case 0: //加密
				$prpcrypt = new Prpcrypt(self::$appconfig['appkey']);
				$params = 'data='.urlencode($prpcrypt->encrypt($jsonstring, self::$appconfig['appid']));
				break;
			case 1: //签名
				$params = 'data='.$jsonstring.'&sign='.md5($jsonstring.self::$appconfig['appkey']);
				break;
			default: //没有任何操作
				$params = 'data='.$jsonstring;
				break;
		}
		return $params;
	}

	/**
	 * curl提交
	 *
	 * @param string $url 提交地址        	
	 * @param string $params 提交参数       	
	 * @param number $ispost 是否以POST提交  默认是     	
	 * @param number $isssl 是否是https 默认否       	
	 */
	private static function curl($url, $params = FALSE, $ispost = 1, $isssl = 0) {
		$ch = curl_init ();		
		curl_setopt ( $ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0 );
		curl_setopt ( $ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
		curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 30 );
		if ($isssl) {
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, false );
		}
		curl_setopt ( $ch, CURLOPT_TIMEOUT, 30 );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		if ($ispost) {
			curl_setopt ( $ch, CURLOPT_POST, true );
			curl_setopt ( $ch, CURLOPT_POSTFIELDS, $params );
			curl_setopt ( $ch, CURLOPT_URL, $url );
		} else {
			if ($params) {
				curl_setopt ( $ch, CURLOPT_URL, $url . '?' . $params );
			} else {
				curl_setopt ( $ch, CURLOPT_URL, $url );
			}
		}
		$response = curl_exec ( $ch );
		if ($response === FALSE) {
			throw new Exception("curl Error: " . curl_error ( $ch ));
		}
		curl_close ( $ch );
		return $response;
	}
	
	/**
	 * 随机生成16位字符串
	 * @return string 生成的字符串
	 */
	private static function getRandomStr()
	{
	
		$str = "";
		$str_pol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
		$max = strlen($str_pol) - 1;
		for ($i = 0; $i < 16; $i++) {
			$str .= $str_pol[mt_rand(0, $max)];
		}
		return $str;
	}
}
?>