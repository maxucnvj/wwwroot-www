<?php

/**
 * 错误页显示
 * @param unknown $msg
 * @param string $url
 * @param number $timeout
 */
function showerr($msg,$url='',$timeout = 3){
	echo $msg;
	die;
}

/**
 * 模板url处理
 */
function geturl(){
    $arg_list = func_get_args();
    $data = explode('|', $arg_list[0]);
    $params = '&';
    if(count($arg_list)>1){
        for($i=1;$i<count($arg_list);$i++){
            if($i%2 == 1){
                $params .= $arg_list[$i]."=";
            }else{
                $params .= $arg_list[$i]."&";
            }
        }
    }
    if(is_array($data)){       
        return "index.php?c=$data[0]&a=$data[1]".substr($params, 0,-1);
    }else{
        return "";
    }
}

/**
 * 判断是否是一个手机号码
 * @param string $mobile
 */
function ismobile($mobile){
    return preg_match('/^1[3,4,5,7,8][0-9]{9}$/', $mobile);
}

/**
 * 判断是否是一个验证码
 * @param string $code
 */
function iscode($code){
    return preg_match('/^[0-9]{6}$/', $code);
}
?>