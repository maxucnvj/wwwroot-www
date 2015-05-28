<?php /* Smarty version Smarty-3.1.21, created on 2015-05-25 06:07:14
         compiled from ".\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28685555c22ce8159b8-20684602%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '34fbecc464e8c65bbc957afe3f4ef1e830d01669' => 
    array (
      0 => '.\\templates\\header.tpl',
      1 => 1432526832,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28685555c22ce8159b8-20684602',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_555c22ce819833_91300974',
  'variables' => 
  array (
    'sysinfo' => 0,
    'buycart' => 0,
    'k' => 0,
    'v' => 0,
    'total' => 0,
    'totalquantity' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555c22ce819833_91300974')) {function content_555c22ce819833_91300974($_smarty_tpl) {?><div class="top bg-ec">
	<div class="wrap clearfix">
    	<div class="nav">
        	<div class="wel">欢迎来到云厨商城！</div>
            <ul>
            	<li class="active"><a href="<?php echo geturl('login|run');?>
">请登录</a></li>
            	<li><a href="<?php echo geturl('login|reg');?>
">免费注册</a></li>
            	<li><a href="<?php echo geturl('user|message');?>
">消息<!--<em class="text-red">0</em>--></a></li>
            </ul>
        </div>
        <div class="contact-info">
        	<span class="pr15"><i class="icon-envelope mr5"></i><a href="mailto:service@clofood.com">service@clofood.com</a></span>
            <span><i class="icon-phone mr5"></i>400-097-8877</span>
        </div>
    </div>
</div>
<div class="header">
    <div class="wrap clearfix">
        <div class="logo"><a href="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['domian'];?>
" title="云厨商城"><img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/head-logo.png" alt="云厨商城"></a></div>
        <div class="nav">
            <ul class="">
                <li class="active"><a href="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['domian'];?>
">首 页<i></i></a></li>
                <li><a href="<?php echo geturl('product|run');?>
">云厨商城<i></i></a></li>
                <li><a href="<?php echo geturl('user|run');?>
">个人中心<i></i></a></li>
            </ul>
        </div>
        <div class="quick-menu">
            <div class="mini-cart">
                <a class="mini-cart-btn" data-toggle="collapse" href="#mini-card" aria-expanded="false" aria-controls="mini-card">
                    <span class="circle-cart"></span>
                    <span id="_gouwuche">购物车（*）</span>
                    <p class="text-yel" id="_upprice">¥***</p>
                </a>
                <div class="mini-cart-con collapse" id="mini-card">
                    <i class="icon-triangle-top ico"></i>
                    <div class="cart-bg">
                        <ul class="list-group" id="_gouwuchelist"><?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable(0, null, 0);
$_smarty_tpl->tpl_vars['totalquantity'] = new Smarty_variable(0, null, 0);?>
                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['buycart']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                            <li class="bg-f<?php if ($_smarty_tpl->tpl_vars['k']->value%2==0) {?>1<?php } else { ?>c<?php }?>" data-productid="<?php echo $_smarty_tpl->tpl_vars['v']->value['product_no'];?>
">
                                <div class="del"><a href="javascript:;" title="删除"><i class="icon-trash"></i></a></div>
                                <div class="img"><a href="<?php echo geturl('product|show','product_no',$_smarty_tpl->tpl_vars['v']->value['product_no']);?>
" title="<?php echo $_smarty_tpl->tpl_vars['v']->value['product_name'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['picture'];?>
"></a></div>
                                <div class="count"><span class="text-primary">¥<?php echo $_smarty_tpl->tpl_vars['v']->value['shopprice']*number_format($_smarty_tpl->tpl_vars['v']->value['quantity'],2);?>
</span></div>
                                <div class="num"><a href="javascript:;" title="减">-</a><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['quantity'];?>
" disabled data-singleprice = "<?php echo $_smarty_tpl->tpl_vars['v']->value['shopprice'];?>
"><a href="javascript:;" title="加">+</a></div>
                                <div class="title ell"><a href="<?php echo geturl('product|show','product_no',$_smarty_tpl->tpl_vars['v']->value['product_no']);?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['product_name'];?>
</a></div>
                                <div class="info ell"><?php echo $_smarty_tpl->tpl_vars['v']->value['sales_name'];?>
</div>
                            </li><?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['v']->value['shopprice']*$_smarty_tpl->tpl_vars['v']->value['quantity'], null, 0);
$_smarty_tpl->tpl_vars['totalquantity'] = new Smarty_variable($_smarty_tpl->tpl_vars['totalquantity']->value+$_smarty_tpl->tpl_vars['v']->value['quantity'], null, 0);?>
                        <?php } ?>        
                        </ul>
                        <div class="mini-cart-ft">
                            <div class="btns"><a href="<?php echo geturl('product|buycart');?>
" class="btn btn-primary mr10">查看全部</a><a href="<?php echo geturl('product|gobuy','productid','allbuycart');?>
" class="btn btn-success">结算</a></div>
                            <div class="sum"><span class="text-44">总计：</span><em class="text-primary" id="_downprice" data-quantity="<?php echo $_smarty_tpl->tpl_vars['totalquantity']->value;?>
">¥<?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</em></div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="http://download.clofood.com/" class="down"><i class="icon-download"></i></a>
        </div>
    </div>
</div>
</div><?php }} ?>
