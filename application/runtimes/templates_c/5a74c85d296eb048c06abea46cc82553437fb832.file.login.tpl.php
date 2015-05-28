<?php /* Smarty version Smarty-3.1.21, created on 2015-05-18 05:47:02
         compiled from ".\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:283165559460b239897-40252676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a74c85d296eb048c06abea46cc82553437fb832' => 
    array (
      0 => '.\\templates\\login.tpl',
      1 => 1431920820,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '283165559460b239897-40252676',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5559460b2f50c5_09798614',
  'variables' => 
  array (
    'sysinfo' => 0,
    'mobile' => 0,
    'backurl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5559460b2f50c5_09798614')) {function content_5559460b2f50c5_09798614($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<link href="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/static/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/css/base.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/css/style.css" rel="stylesheet" type="text/css" />
<title>登录</title>

</head>

<body class="dl-bg">
<div class="wrap pt100">
  <div class="logo mb20"><a href="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['domian'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['webname'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/head-logo2.png" alt="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['webname'];?>
"></a></div>
  <div class="dl-con">
    <div class="dl-con-r">
      <div class="alert alert-error fade in mt15" id="_msg_wrong" style="display:none;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <span>错误提示</span>
      </div>
      <div class="mb15 text-f16">登录云厨<a class="a-01 f-r" href="<?php echo geturl('login|reg');?>
">立即注册</a></div>
      <div class="input-prepend">
        <span class="add-on ze-phone"></span>
        <input class="span13" id="_mobile" type="text" placeholder="请输入手机号码" value="<?php echo $_smarty_tpl->tpl_vars['mobile']->value;?>
">
      </div>
      <div class="input-prepend mt15">
        <span class="add-on paw-cof"></span>
        <input class="span13" id="_password" type="password" placeholder="请输入登录密码">
      </div>
      <label class="f-l"><input type="checkbox" id="_checkbox" <?php if ($_smarty_tpl->tpl_vars['mobile']->value) {?>checked="checked"<?php }?> />记住我</label><a class="a-01 ml20" href="<?php echo geturl('login|getpass');?>
">忘记密码？</a>
      <div class="btn-box"><input class="btn btn-success" id="_login" type="button" value="立即登录"/></div>
      <div class="mt10"><a class=" text-right" href="#">无账号快速登录</a></div>
    </div>
  </div>
</div>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/static/jquery-1.11.0.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/static/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/js/common.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
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
			$.post("<?php echo geturl('login|sublogin');?>
",{
				'mobile':$('#_mobile').val(),
				'password':$('#_password').val(),
				'isremember':$('#_checkbox').attr("checked")?1:0
			},function(data){
				if(data.result){
					var backurl = '<?php echo $_smarty_tpl->tpl_vars['backurl']->value;?>
';
					if(backurl){
						location.href = backurl;
					}else{
						location.href = "<?php echo geturl('user|run');?>
";
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
<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
