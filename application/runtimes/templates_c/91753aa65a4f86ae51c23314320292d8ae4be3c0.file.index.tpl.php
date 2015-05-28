<?php /* Smarty version Smarty-3.1.21, created on 2015-05-22 08:20:34
         compiled from ".\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59065555dcffa58584-69939911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91753aa65a4f86ae51c23314320292d8ae4be3c0' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1432275520,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59065555dcffa58584-69939911',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5555dcffb00525_76657507',
  'variables' => 
  array (
    'sysinfo' => 0,
    'category' => 0,
    'i' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5555dcffb00525_76657507')) {function content_5555dcffb00525_76657507($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<link href="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/static/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/css/base.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/css/index.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/static/jquery-1.11.0.min.js"><?php echo '</script'; ?>
>
<title><?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['webname'];?>
</title>

</head>
<body>
<?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="index-search">
	<div class="wrap">
    	<div class="center-box clearfix">
        	<div class="address">【长沙】</div>
            <div class="search">
            	<label>商品</label>
                <input type="text" class="txt" placeholder="输入商品名称" >
                <a href="#" class="search-btn"><i class="icon-search"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="index-slide">
    <div id="myCarousel" class="carousel wrap">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
      </ol>
      <!-- Carousel items -->
      <div class="carousel-inner">
        <div class="active item" style="background:url(<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/_pic/slide-pic5.png) no-repeat 640px bottom;">
            <div class="bnr-box1 span7">
                <h5>盈成绿色食品</h5>
                <h4>双低非转基因压榨菜籽油</h4>
                <p>湖南盈成油脂是全国第一家开设产品溯源系统的油脂企业，从2004年建厂开设，从2004年建厂开设，致力大招。</p>
                <a href="javascript:;" class="btn btn-info btn-lg">查看更多</a><span class="money">¥128.00</span>
            </div>
        </div>
        <div class="item" style="background:url(<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/_pic/slide-pic4.png) no-repeat 50px bottom;">
            <div class="bnr-box1 span5 pull-right">
                <h5>新鲜绿色食品</h5>
                <h4>绿色有机蔬菜</h4>
                <p>湖南盈成油脂是全国第一家开设产品溯源系统的油脂企业，从2004年建厂开设，从2004年建厂开设，致力大招。</p>
                <a href="javascript:;" class="btn btn-info btn-lg">查看更多</a><span class="money">¥128.00</span>
            </div>
        </div>
        <div class="item" style="background:url(<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/_pic/slide-pic3.png) no-repeat 70px bottom;">
            <div class="bnr-box1 span6 pull-right">
                <h4 class="text-right">加碘盐</h4>
                <p class="text-right">湖南盈成油脂是全国第一家开设产品溯源系统的油脂企业，从2004年建厂开设，从2004年建厂开设，致力大招。</p>
                <a href="javascript:;" class="btn btn-info btn-lg pull-right">查看更多</a>
            </div>
        </div>
        <div class="item" style="background:url(<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/_pic/slide-pic2.png) no-repeat right bottom;">
            <div class="bnr-box1 span5">
                <h5>百年传承</h5>
                <h4>雨前西湖龙井茶</h4>
                <p>湖南盈成油脂是全国第一家开设产品溯源系统的油脂企业，从2004年建厂开设，从2004年建厂开设，致力大招。</p>
                <a href="javascript:;" class="btn btn-info btn-lg">查看更多</a>
            </div>
        </div>
        <div class="item" style="background:url(<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/_pic/slide-pic1.png) no-repeat 90px bottom;">
            <div class="bnr-box1 span6 pull-right">
                <h5>百年传承</h5>
                <h4>酿一村两年纯酿荫油</h4>
                <p>湖南盈成油脂是全国第一家开设产品溯源系统的油脂类企业 在如今食品安全从2004年建厂开始，致力于打，造中国油菜籽第一 在如今食</p>
                <a href="javascript:;" class="btn btn-info btn-lg">查看更多</a>
            </div>
        </div>
      </div>
      <!-- Carousel nav -->
      <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>
</div>
<div class="index-sort clearfix">
    <?php  $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["v"]->_loop = false;
 $_smarty_tpl->tpl_vars["i"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["cate"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->key => $_smarty_tpl->tpl_vars["v"]->value) {
$_smarty_tpl->tpl_vars["v"]->_loop = true;
 $_smarty_tpl->tpl_vars["i"]->value = $_smarty_tpl->tpl_vars["v"]->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["cate"]['index']++;
?>
        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['cate']['index']<8) {?>
    	<div class="index-sort-item">
        	<img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/indx-s0<?php echo $_smarty_tpl->tpl_vars['i']->value+1;?>
.png">
            <a href="<?php echo geturl('product|list','categoryid',$_smarty_tpl->tpl_vars['v']->value['id']);?>
" class="cover">
            	<span><?php echo $_smarty_tpl->tpl_vars['v']->value['category_name'];?>
</span>
            </a>
        </div>
        <?php }?>
    <?php } ?>
</div>
<div class="index-sort2">
	<a href="<?php echo geturl('product|hot');?>
" class="index-sort2-a mr5"><i></i></a>
	<a href="<?php echo geturl('product|new');?>
" class="index-sort2-b mr5"><i></i></a>
	<a href="<?php echo geturl('product|bill');?>
" class="index-sort2-c"><i></i></a>
</div>
<div class="index-sort3">
	<div class="index-title">
    	<img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/indx-pic2.png">
    	<span class="bg-ff">精致生活</span><i></i>
    </div>
    <ul class="list">
        <?php  $_smarty_tpl->tpl_vars["v"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["v"]->_loop = false;
 $_smarty_tpl->tpl_vars["i"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['category']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["cate"]['index']=-1;
foreach ($_from as $_smarty_tpl->tpl_vars["v"]->key => $_smarty_tpl->tpl_vars["v"]->value) {
$_smarty_tpl->tpl_vars["v"]->_loop = true;
 $_smarty_tpl->tpl_vars["i"]->value = $_smarty_tpl->tpl_vars["v"]->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["cate"]['index']++;
?>
        <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['cate']['index']>7) {?>
        <li class="item">
            <div class="img"><span><i class="icon-<?php if ($_smarty_tpl->tpl_vars['v']->value['category_name']=='小支酒水') {?>wine<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['category_name']=='海鲜干货') {?>fish<?php } elseif ($_smarty_tpl->tpl_vars['v']->value['category_name']=='营养保健') {?>leaf<?php } else { ?>break<?php }?>"></i></span></div>
            <h4><?php echo $_smarty_tpl->tpl_vars['v']->value['category_name'];?>
</h4>
            <p><?php echo $_smarty_tpl->tpl_vars['v']->value['info'];?>
</p>
            <a href="<?php echo geturl('product|list','categoryid',$_smarty_tpl->tpl_vars['v']->value['id']);?>
" class="btn btn-success">查看更多</a>
        </li>
        <?php }?>
    <?php } ?>
    </ul>
</div>
<div class="index-banner">
	<div class="wrap clearfix">
    	<div class="con">
        	<h4>一杯新茶醉春风</h4>
            <h3>私享●雅韵清香铁观音</h3>
            <div class="clearfix">
            	<p class="pull-right span4 text-aa">湖南盈成油脂是全国第一家开设产品溯源系统的油脂企业，在如今食品安全危机籽产品。</p>
            	<a href="javascript:;" class="btn btn-primary btn-lg">查看更多</a>
            </div>
        </div>
    </div>
</div>
<div class="index-sort4">
	<div class="wrap">
        <div class="index-title">
            <img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/indx-pic3.png">
            <span class="bg-f4">精品推荐</span><i></i>
        </div>
        <!--con start-->
        <div class="con"  id="masonry">
        	<div class="item">
            	<a href="#" title=""><img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/_pic/02.png"></a>
                <div class="good-item-detail clearfix">
                	<h3><a href="#">商品名称商品称</a></h3>
                    <p class="intr">商品介绍商品介绍商品介绍商品介绍商品介绍商品介绍商品介绍</p>
                    <div class="state clearfix">
                    	<i class="star5"></i>
                        <span>已售107</span>
                    </div>
                    <div class="pl10 pr10 pt10">
                        <span class="money text-primary">¥2980</span>
                        <del>¥3980</del>
                        <a href="#" class="btn btn-success" title="加入购物车"><i class="icon-cart"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
            	<a href="#" title=""><img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/_pic/slide-pic1.png"></a>
                <div class="good-item-detail clearfix">
                	<h3><a href="#">商品名称商品名称商称商品名称</a></h3>
                    <p class="intr">商品介绍商品介绍商品介绍商品介绍商品介绍商品介绍商品介绍</p>
                    <div class="state clearfix">
                    	<i class="star4"></i>
                        <span>已售107</span>
                    </div>
                    <div class="pl10 pr10 pt10">
                        <span class="money text-primary">¥2980</span>
                        <del>¥3980</del>
                        <a href="#" class="btn btn-success" title="加入购物车"><i class="icon-cart"></i></a>
                    </div>
                </div>
            </div>
        	<div class="item">
            	<a href="#" title=""><img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/_pic/01.png"></a>
                <div class="good-item-detail clearfix">
                	<h3><a href="#">商商品名称商品名称</a></h3>
                    <p class="intr">商品介绍商品介绍商品介绍商品介绍商品介绍商品介绍商品介绍</p>
                    <div class="state clearfix">
                    	<i class="star3"></i>
                        <span>已售107</span>
                    </div>
                    <div class="pl10 pr10 pt10">
                        <span class="money text-primary">¥2980</span>
                        <del>¥3980</del>
                        <a href="#" class="btn btn-success" title="加入购物车"><i class="icon-cart"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
            	<a href="#" title=""><img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/_pic/03.png"></a>
                <div class="good-item-detail clearfix">
                	<h3><a href="#">商品名称商品名称商称商品名称</a></h3>
                    <p class="intr">商品介绍商品介绍商品介绍商品介绍商品介绍商品介绍商品介绍</p>
                    <div class="state clearfix">
                    	<i class="star2"></i>
                        <span>已售107</span>
                    </div>
                    <div class="pl10 pr10 pt10">
                        <span class="money text-primary">¥2980</span>
                        <del>¥3980</del>
                        <a href="#" class="btn btn-success" title="加入购物车"><i class="icon-cart"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
            	<a href="#" title=""><img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/_pic/slide-pic1.png"></a>
                <div class="good-item-detail clearfix">
                	<h3><a href="#">商品名称商品名称商品名称商品名称商品名称商品名称</a></h3>
                    <p class="intr">商品介绍商品介绍商品介绍商品介绍商品介绍商品介绍商品介绍</p>
                    <div class="state clearfix">
                    	<i class="star1"></i>
                        <span>已售107</span>
                    </div>
                    <div class="pl10 pr10 pt10">
                        <span class="money text-primary">¥2980</span>
                        <del>¥3980</del>
                        <a href="#" class="btn btn-success" title="加入购物车"><i class="icon-cart"></i></a>
                    </div>
                </div>
            </div>
        	<div class="item">
            	<a href="#" title=""><img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/_pic/03.png"></a>
                <div class="good-item-detail clearfix">
                	<h3><a href="#">商品名称商品名称商品名称商品名称商品名称商品名称</a></h3>
                    <p class="intr">商品介绍商品介绍商品介绍商品介绍商品介绍商品介绍商品介绍</p>
                    <div class="state clearfix">
                    	<i class="star0"></i>
                        <span>已售107</span>
                    </div>
                    <div class="pl10 pr10 pt10">
                        <span class="money text-primary">¥2980</span>
                        <del>¥3980</del>
                        <a href="#" class="btn btn-success" title="加入购物车"><i class="icon-cart"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
            	<a href="#" title=""><img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/_pic/02.png"></a>
                <div class="good-item-detail clearfix">
                	<h3><a href="#">商品名称商品名称商品名称商品名称商品名称商品名称</a></h3>
                    <p class="intr">商品介绍商品介绍商品介绍商品介绍商品介绍商品介绍商品介绍</p>
                    <div class="state clearfix">
                    	<i class="star5"></i>
                        <span>已售107</span>
                    </div>
                    <div class="pl10 pr10 pt10">
                        <span class="money text-primary">¥2980</span>
                        <del>¥3980</del>
                        <a href="#" class="btn btn-success" title="加入购物车"><i class="icon-cart"></i></a>
                    </div>
                </div>
            </div>
        	<div class="item">
            	<a href="#" title=""><img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/_pic/03.png"></a>
                <div class="good-item-detail clearfix">
                	<h3><a href="#">商品名称商品名称商品名称商品名称商品名称商品名称</a></h3>
                    <p class="intr">商品介绍商品介绍商品介绍商品介绍商品介绍商品介绍商品介绍</p>
                    <div class="state clearfix">
                    	<i class="star5"></i>
                        <span>已售107</span>
                    </div>
                    <div class="pl10 pr10 pt10">
                        <span class="money text-primary">¥2980</span>
                        <del>¥3980</del>
                        <a href="#" class="btn btn-success" title="加入购物车"><i class="icon-cart"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!--con end-->
    </div>
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/static/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/static/masonry-docs.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
$(function() {
    var $container = $('#masonry');
    $container.imagesLoaded(function() {
        $container.masonry({
                itemSelector: '.item',
                gutter: 0,
                isAnimated: false
            });
     });
})
<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
