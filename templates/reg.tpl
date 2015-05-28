<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<link href="{$sysinfo.statics}/static/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="{$sysinfo.statics}/css/base.css" rel="stylesheet" type="text/css" />
<link href="{$sysinfo.statics}/css/style.css" rel="stylesheet" type="text/css" />
<script src="{$sysinfo.statics}/static/jquery-1.11.0.min.js"></script>
<title>注册</title>

</head>

<body>
{include file='header.tpl'}
<div class="bg-ec pt30 pb30">
  <div class="wrap">
    <div class="zc-title pl400 bgt-2">用户注册</div>
    <div class="zc-f pt64 pb20">
      <form>
        <div class="input-prepend">
        	<span class="add-on ze-phone"></span>
        	<input class="span4" type="text" id="_mobile" placeholder="请输入手机号码" />
        </div>
        <div class="input-prepend">
        	<span class="add-on ze-num"></span>
        	<input class="span2" type="text" id="_code" placeholder="请输验证码" />
            <button class="btn btn-success" id="_sendmobile" type="button">获取验证码</button>
            <!--<button class="btn btn-info" disabled type="button">56秒后重新发送</button>-->
        </div>
        注册成功后，云厨会短信发送随机密码至您的手机，敬请查收。<br/><br/>
        <div class="checkbox"><input type="checkbox" id="cr"/><label for="cr">我已阅读并接受 <a href="javascript:;">云厨用户协议</a></label></div>
        
        <div class="btn-box"><input class="btn btn-success" id="_regnow" type="button" value="立即注册"/></div>
        <div class="alert alert-error fade in mt15" id="_msg_wrong" style="display:none;">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <span>错误提示</span>
        </div>
      </form>
    </div>
  </div>
</div>
{include file='footer.tpl'}
<script src="{$sysinfo.statics}/static/bootstrap/js/bootstrap.min.js"></script>
<script src="{$sysinfo.statics}/js/common.js"></script>
<script>
$(function(){
	//点击发送验证码按钮
	$('#_sendmobile').on('click',function(){
			if(!checkmobile($('#_mobile').val())){
				$('#_mobile').focus();
				$('#_msg_wrong').fadeIn(100,function(){
					setTimeout(function(){
						$('#_msg_wrong').fadeOut(100);
					},2000);
				}).find('span').html('手机号码格式不正确');
				return false;	
			}
			$('#_sendmobile').removeClass('btn-success').addClass('btn-info').attr('disabled',true).html('<span style="font-size:12px;">正在发送中..</span>');
			$.post('{geturl("login|sendmobile")}',{
				"mobile":$('#_mobile').val()	
			},function(data){
				if(data.result){
					timeload();
				}else{
					$('#_mobile').focus();
					$('#_msg_wrong').fadeIn(100,function(){
						setTimeout(function(){
							$('#_msg_wrong').fadeOut(100);
						},2000);
					}).find('span').html(data.error.msg);
					$('#_sendmobile').removeClass('btn-info').addClass('btn-success').removeAttr('disabled').html('获取验证码');
					return;
				}
			},'json')
	})

	//判断选中
	$('#cr').on('click',function(){
		if($(this).attr('checked')){
			$(this).removeAttr("checked");
		}else{
			$(this).attr('checked',true);
		}
	})

	//开始注册
	$('#_regnow').on('click',function(){
		//检查手机
		if(!checkmobile($('#_mobile').val())){
			$('#_mobile').focus();
			$('#_msg_wrong').fadeIn(100,function(){
				setTimeout(function(){
					$('#_msg_wrong').fadeOut(100);
				},2000);
			}).find('span').html('手机号码格式不正确');
			return false;	
		}
		//检查验证码
		if(!checkcode($('#_code').val())){
			$('#_code').focus();
			$('#_msg_wrong').fadeIn(100,function(){
				setTimeout(function(){
					$('#_msg_wrong').fadeOut(100);
				},2000);
			}).find('span').html('验证码不正确');
			return false;	
		}
		//检查是否同意协议
		if(!$('#cr').attr('checked')){
			$('#_msg_wrong').fadeIn(100,function(){
				setTimeout(function(){
					$('#_msg_wrong').fadeOut(100);
				},2000);
			}).find('span').html('必须先同意用户协议');
			return false;
		}
		$(this).attr('disabled',true).val('正在注册中...');
		//发送数据
		$.post('{geturl("login|regin")}',{
			"mobile":$('#_mobile').val(),
			"code":$('#_code').val(),
		},function(data){
			if(data.result){
				var backurl = '{$backurl}';
				if(backurl){
					location.href = backurl;
				}else{
					location.href = "{geturl('login|regsuccess')}";
				}
				return;
			}else{
				$('#_mobile').focus();
				$('#_msg_wrong').fadeIn(100,function(){
					setTimeout(function(){
						$('#_msg_wrong').fadeOut(100);
					},2000);
				}).find('span').html(data.error.msg);
				$('#_regnow').removeAttr('disabled').val('立即注册');
				return;
			}
		},'json')
	})


	//倒计时发送
	function timeload(){
		var backtime = 60;
		var int=self.setInterval(function(){
			backtime--;
			if(backtime < 0){
				$('#_sendmobile').removeClass('btn-info').addClass('btn-success').removeAttr('disabled').html('获取验证码');
				window.clearInterval(int);
			}else{
				$('#_sendmobile').html('<span style="font-size:12px;">'+backtime+'秒后重新发</span>')
			}			
		},1000);
	}
})
</script>

</body>
</html>