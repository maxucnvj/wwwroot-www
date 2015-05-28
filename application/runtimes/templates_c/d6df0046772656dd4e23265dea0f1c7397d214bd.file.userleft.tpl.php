<?php /* Smarty version Smarty-3.1.21, created on 2015-05-27 11:45:24
         compiled from ".\templates\userleft.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23429555db1863c1fa1-13151405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6df0046772656dd4e23265dea0f1c7397d214bd' => 
    array (
      0 => '.\\templates\\userleft.tpl',
      1 => 1432719922,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23429555db1863c1fa1-13151405',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_555db1863c5e27_18897628',
  'variables' => 
  array (
    'userinfo' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555db1863c5e27_18897628')) {function content_555db1863c5e27_18897628($_smarty_tpl) {?>      <div class="side-bar pull-left">
      <div class="title"><h5>个人中心</h5></div>
        <div class="head-img">
          <img src="<?php echo $_smarty_tpl->tpl_vars['userinfo']->value['picture'];?>
">
            <p class="text-44"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['nickname'];?>
</p>
            <p class="text-aa text-f12"><?php echo $_smarty_tpl->tpl_vars['userinfo']->value['integral'];?>
积分</p>
        </div>
        <ul class="side-nav">
          <li><a href="<?php echo geturl('user|run');?>
">我的订单</a></li> 
          <li><a href="#">账户中心</a></li> 
          <li><a href="#">个人资料</a></li> 
          <li><a href="<?php echo geturl('user|myaddress');?>
">我的地址管理</a></li>
          <li><a href="<?php echo geturl('user|changepaypass');?>
">修改支付密码</a></li>    
          <li><a href="#">我的代金券</a></li>  
          <li><a href="#">安全设置</a></li> 
          <li><a href="#">服务消息</a></li>
          <li><a href="#">意见反馈</a></li> 
        </ul>
    </div><?php }} ?>
