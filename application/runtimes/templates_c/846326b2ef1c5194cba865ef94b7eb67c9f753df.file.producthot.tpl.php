<?php /* Smarty version Smarty-3.1.21, created on 2015-05-22 08:23:11
         compiled from ".\templates\producthot.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24278555e934310be98-66052335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '846326b2ef1c5194cba865ef94b7eb67c9f753df' => 
    array (
      0 => '.\\templates\\producthot.tpl',
      1 => 1432275576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24278555e934310be98-66052335',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_555e9343132fa5_86141144',
  'variables' => 
  array (
    'sysinfo' => 0,
    'tuijian' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555e9343132fa5_86141144')) {function content_555e9343132fa5_86141144($_smarty_tpl) {?><!doctype html>
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
<title>每日一爆</title>

</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="day-hot">
  <div class="wrap clearfix hot-sign">
    <div class="title"><input type="button" class="btn btn-info btn-hot bg-fe" value="每日一爆"></div>
    <img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/goods-hot.png" />
    <div class="details-hot f-r">
      <h4>商品名称商品名称商品名称</h4>
      <p class="text-f12 text-fb mb0"><span class="list-ys"></span>4.5</p>
      <div class="hr-f0 mt8 mb12"></div>
      <a href="#" class="btn btn-info bor-rd50">商品详情</a>
      <p class="text-idt mb0"><small>商品名称商品名称商品名称商品名称商品名称商品名称商品名称商品名称商品名称商品名称商品名称商品名称，商品名称商品名称商品名称。商品名称商品名称</small></p>
      <p class="text-idt"><small>商品名称商品名称商品名称商品名称商品名称商品名称商品名称商品名称商品名称商品名称商品名称商品名称，商品名称商品名称商品名称商品名称商品名称商品名称商
品名称商品名称商品名称商品。</small></p>
      <a href="#" class="btn btn-info bor-rd50">商品详情</a>
      <p class="text-idt mb0"><small>商品名称商品名称商品名称商品名称商品名称商品名称商品名称商品名称商品名称商品名称商品名称商品名称，商品名称商品名称商品名称。品名称商品名称商品名称商品名称商品名称商品名称，商品名称商品名称商品名称商品名称商品名称商品名称商品名称商品名称商品名称商品。</small></p>
      <div class="hr-f0 mt10"></div>
      <div class="piece-hot clearfix">
        <p class="text-line text-d8 text-f16 f-l">￥108.00</p>
        <p class="text-72 text-f36 ml20 f-l">￥98.00</p>
        <p class="snap-up mt12"><a href="#" class="btn btn-success">马上抢！</a></p>
      </div>
    </div>
  </div>
</div>

<div class="products-recommend wrap">
  <span class="bg-ff">精品推荐</span>
  <i></i>
</div>

<div class="wrap1">
     <ul class="good-list clearfix">
     <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tuijian']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
      <li>
        <img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['picture'];?>
" />
        <div class="good-item-detail clearfix">
            <div class="info">
                <h3 class="ell"><a href="<?php echo geturl('product|show','product_no',$_smarty_tpl->tpl_vars['v']->value['product_no']);?>
" target="_blank" class="text-36"><?php echo $_smarty_tpl->tpl_vars['v']->value['product_name'];?>
</a></h3>
                <p class="intr text-aa"><?php echo $_smarty_tpl->tpl_vars['v']->value['sales_name'];?>
</p>
                <div class="state clearfix">
                    <i class="star5"></i>
                    <span class="text-aa">已售<?php echo $_smarty_tpl->tpl_vars['v']->value['salequantity'];?>
</span>
                </div>
                <del class="btn-block pt5">超市价<span class="text-f14">¥<?php echo $_smarty_tpl->tpl_vars['v']->value['supermarket'];?>
</span></del>
            </div>
            <div class="tool">
                <span class="money text-primary pl25">¥<?php echo $_smarty_tpl->tpl_vars['v']->value['shopprice'];?>
</span>
                <a href="javascript:addtobuycart('<?php echo geturl('product|addbuycart');?>
','<?php echo $_smarty_tpl->tpl_vars['v']->value['product_no'];?>
',1);" class="btn btn-success mr25" title="加入购物车"><i class="icon-cart"></i></a>
            </div>
         </div>
      </li>
     <?php } ?>
  </ul>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/static/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/js/common.js"><?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
