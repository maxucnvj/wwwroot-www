<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<link href="{$sysinfo.statics}/static/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="{$sysinfo.statics}/css/base.css" rel="stylesheet" type="text/css" />
<link href="{$sysinfo.statics}/css/style.css" rel="stylesheet" type="text/css" />
<script src="{$sysinfo.statics}/static/jquery-1.11.0.min.js"></script>
<title>每日一爆</title>

</head>

<body>
{include file="header.tpl"}
<div class="day-hot">
  <div class="wrap clearfix hot-sign">
    <div class="title"><input type="button" class="btn btn-info btn-hot bg-fe" value="每日一爆"></div>
    <img src="{$sysinfo.statics}/images/goods-hot.png" />
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
     {foreach from=$tuijian item=v}
      <li>
        <img src="{$v.picture}" />
        <div class="good-item-detail clearfix">
            <div class="info">
                <h3 class="ell"><a href="{'product|show'|geturl:'product_no':$v.product_no}" target="_blank" class="text-36">{$v.product_name}</a></h3>
                <p class="intr text-aa">{$v.sales_name}</p>
                <div class="state clearfix">
                    <i class="star5"></i>
                    <span class="text-aa">已售{$v.salequantity}</span>
                </div>
                <del class="btn-block pt5">超市价<span class="text-f14">¥{$v.supermarket}</span></del>
            </div>
            <div class="tool">
                <span class="money text-primary pl25">¥{$v.shopprice}</span>
                <a href="javascript:addtobuycart('{geturl('product|addbuycart')}','{$v.product_no}',1);" class="btn btn-success mr25" title="加入购物车"><i class="icon-cart"></i></a>
            </div>
         </div>
      </li>
     {/foreach}
  </ul>
</div>

{include file="footer.tpl"}
<script src="{$sysinfo.statics}/static/bootstrap/js/bootstrap.min.js"></script>
<script src="{$sysinfo.statics}/js/common.js"></script>
</body>
</html>