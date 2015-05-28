<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<link href="{$sysinfo.statics}/static/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="{$sysinfo.statics}/css/base.css" rel="stylesheet" type="text/css" />
<link href="{$sysinfo.statics}/css/style.css" rel="stylesheet" type="text/css" />
<title>登录</title>

</head>

<body class="dl-bg">
<div class="wrap pt100">
  <div class="logo mb20"><a href="{$sysinfo.domian}" title="{$sysinfo.webname}"><img src="{$sysinfo.statics}/images/head-logo2.png" alt="{$sysinfo.webname}"></a></div>
  <div class="dl-con">
    <div class="dl-con-r">
      <div class="alert alert-error fade in mt15" id="_msg_wrong" style="display:none;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <span>错误提示</span>
      </div>
      <div class="mb15 text-f16">登录云厨<a class="a-01 f-r" href="{geturl('login|reg')}">立即注册</a></div>
      <div class="input-prepend">
        <span class="add-on ze-phone"></span>
        <input class="span13" id="_mobile" type="text" placeholder="请输入手机号码" value="{$mobile}">
      </div>
      <div class="input-prepend mt15">
        <span class="add-on paw-cof"></span>
        <input class="span13" id="_password" type="password" placeholder="请输入登录密码">
      </div>
      <label class="f-l"><input type="checkbox" id="_checkbox" {if $mobile}checked="checked"{/if} />记住我</label><a class="a-01 ml20" href="{geturl('login|getpass')}">忘记密码？</a>
      <div class="btn-box"><input class="btn btn-success" id="_login" type="button" value="立即登录"/></div>
      <div class="mt10"><a class=" text-right" href="#">无账号快速登录</a></div>
    </div>
  </div>
</div>

<script src="{$sysinfo.statics}/static/jquery-1.11.0.min.js"></script>
<script src="{$sysinfo.statics}/static/bootstrap/js/bootstrap.min.js"></script>
<script src="{$sysinfo.statics}/js/common.js"></script>
<script type="text/javascript">
	$(function(){
		//判断选中
		$('#_checkbox').on('click',function(){
			if($(this).attr('checked')){
				$(this).removeAttr("checked");
			}else{
				$(this).attr('checked',true);
			}
		})

		//点击登陆
		$('#_login').on('click',function(){
			if(!checkmobile($('#_mobile').val())){
				$('#_mobile').focus();
				$('#_msg_wrong').fadeIn(100,function(){
					setTimeout(function(){
						$('#_msg_wrong').fadeOut(100);
					},2000);
				}).find('span').html('手机号码格式不正确');
				return false;	
			}
			if($('#_password').val() == ''){
				$('#_password').focus();
				$('#_msg_wrong').fadeIn(100,function(){
					setTimeout(function(){
						$('#_msg_wrong').fadeOut(100);
					},2000);
				}).find('span').html('密码不能输入为空');
				return false;	
			}
			$('#_login').attr('disabled',true).val('登录中...');
			$.post("{geturl('login|sublogin')}",{
				'mobile':$('#_mobile').val(),
				'password':$('#_password').val(),
				'isremember':$('#_checkbox').attr("checked")?1:0
			},function(data){
				if(data.result){
					var backurl = '{$backurl}';
					if(backurl){
						location.href = backurl;
					}else{
						location.href = "{geturl('user|run')}";
					}
					return;
				}else{
					$('#_msg_wrong').fadeIn(100,function(){
					setTimeout(function(){
						$('#_msg_wrong').fadeOut(100);
					},2000);
					}).find('span').html(data.error.msg);
					$('#_login').removeAttr('disabled').val('立即登录');
				}
			},'json')
		})
	});
</script>
</body>
</html>