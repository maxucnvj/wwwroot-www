<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<link href="{$sysinfo.statics}/static/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="{$sysinfo.statics}/css/base.css" rel="stylesheet" type="text/css" />
<link href="{$sysinfo.statics}/css/style.css" rel="stylesheet" type="text/css" />
<script src="{$sysinfo.statics}/static/jquery-1.11.0.min.js"></script>
<title>修改登录密码</title>

</head>

<body>

{include file='header.tpl'}
<div class="bg-ec pt30 pb30">
  <div class="wrap">
    <div class="zc-title pl400 bgt-2">修改支付密码</div>
    <div class="zc-f pt40 pb40">
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
        <div class="input-prepend">
        	<span class="add-on paw-new"></span>
        	<input class="span4" type="password" id="_password1" placeholder="请设置新的支付密码" />
        </div>
        <div class="input-prepend">
        	<span class="add-on paw-cof"></span>
        	<input class="span4" type="password" id="_password2" placeholder="请确认新的支付密码" />
        </div>
        密码长度至少6个字符，最多32个字符
        <div class="btn-box"><input class="btn btn-success" id="_update" type="button" value="确定修改"/></div>
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
<script type="text/javascript">
$(function(){
    //提交修改
    $('#_update').on('click',function(){
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
        //检查密码长度
        if($('#_password1').val().length<6 || $('#_password1').val().length>32){
            $('#_msg_wrong').fadeIn(100,function(){
                setTimeout(function(){
                    $('#_msg_wrong').fadeOut(100);
                },2000);
            }).find('span').html('密码长度至少6个字符，最多32个字符');
            return false;
        }
        //检查两次密码长度是否一样
        if($('#_password1').val() != $('#_password2').val()){
            $('#_msg_wrong').fadeIn(100,function(){
                setTimeout(function(){
                    $('#_msg_wrong').fadeOut(100);
                },2000);
            }).find('span').html('两次密码输入不一样');
            return false;
        }
        $(this).attr('disabled',true).val('修改中...');
        
        //发送数据
        $.post('{geturl("user|changepassword")}',{
            "mobile":$('#_mobile').val(),
            "code":$('#_code').val(),
            "password":$('#_password1').val()
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
                $('#_mobile').focus();
                $('#_msg_wrong').fadeIn(100,function(){
                    setTimeout(function(){
                        $('#_msg_wrong').fadeOut(100);
                    },2000);
                }).find('span').html(data.error.msg);
                $('#_update').removeAttr('disabled').val('确定修改');
                return;
            }
        },'json')
    })
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
            $.post('{geturl("login|getmobilepass")}',{
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