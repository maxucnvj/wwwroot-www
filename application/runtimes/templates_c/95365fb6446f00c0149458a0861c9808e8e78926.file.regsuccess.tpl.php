<?php /* Smarty version Smarty-3.1.21, created on 2015-05-26 06:10:01
         compiled from ".\templates\regsuccess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12747555c44a908fa76-06368873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95365fb6446f00c0149458a0861c9808e8e78926' => 
    array (
      0 => '.\\templates\\regsuccess.tpl',
      1 => 1432275607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12747555c44a908fa76-06368873',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_555c44a9100f18_38528341',
  'variables' => 
  array (
    'sysinfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555c44a9100f18_38528341')) {function content_555c44a9100f18_38528341($_smarty_tpl) {?><!doctype html>
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
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/static/jquery-1.11.0.min.js"><?php echo '</script'; ?>
>
<title>注册成功</title>
</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="pt40 pb40">
  <div class="wrap ze-ok">
    <div class="zc-tu">
      <img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/ze-cg.png" />恭喜您注册成功！
    </div>
    <div class="zc-btn pb40">
      <button class="btn-ck btn btn-success" type="button">云厨商城</button>
      <button class="btn-ck btn btn-primary ml30" type="button">个人中心</button>
    </div>
  </div>
</div>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/static/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
    $(function(){
        $('.zc-btn button').on('click',function(){
            if($(this).index() == 1){
                location.href = "<?php echo geturl('user|run');?>
";
            }else{
                location.href = "<?php echo geturl('product|run');?>
";
            }
        })
    })
<?php echo '</script'; ?>
>
</body>
</html>

























<?php }} ?>
