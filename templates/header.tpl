<div class="top bg-ec">
	<div class="wrap clearfix">
    	<div class="nav">
        	<div class="wel">欢迎来到云厨商城！</div>
            <ul>
            	<li class="active"><a href="{geturl('login|run')}">请登录</a></li>
            	<li><a href="{geturl('login|reg')}">免费注册</a></li>
            	<li><a href="{geturl('user|message')}">消息<!--<em class="text-red">0</em>--></a></li>
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
        <div class="logo"><a href="{$sysinfo.domian}" title="云厨商城"><img src="{$sysinfo.statics}/images/head-logo.png" alt="云厨商城"></a></div>
        <div class="nav">
            <ul class="">
                <li class="active"><a href="{$sysinfo.domian}">首 页<i></i></a></li>
                <li><a href="{geturl('product|run')}">云厨商城<i></i></a></li>
                <li><a href="{geturl('user|run')}">个人中心<i></i></a></li>
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
                        <ul class="list-group" id="_gouwuchelist">{$total=0}{$totalquantity=0}
                        {foreach $buycart as $k=>$v}
                            <li class="bg-f{if $k%2 eq 0}1{else}c{/if}" data-productid="{$v.product_no}">
                                <div class="del"><a href="javascript:;" title="删除"><i class="icon-trash"></i></a></div>
                                <div class="img"><a href="{'product|show'|geturl:'product_no':$v.product_no}" title="{$v.product_name}"><img src="{$v.picture}"></a></div>
                                <div class="count"><span class="text-primary">¥{$v.shopprice*$v.quantity|number_format:2}</span></div>
                                <div class="num"><a href="javascript:;" title="减">-</a><input type="text" value="{$v.quantity}" disabled data-singleprice = "{$v.shopprice}"><a href="javascript:;" title="加">+</a></div>
                                <div class="title ell"><a href="{'product|show'|geturl:'product_no':$v.product_no}">{$v.product_name}</a></div>
                                <div class="info ell">{$v.sales_name}</div>
                            </li>{$total=$total+$v.shopprice*$v.quantity}{$totalquantity=$totalquantity+$v.quantity}
                        {/foreach}        
                        </ul>
                        <div class="mini-cart-ft">
                            <div class="btns"><a href="{geturl('product|buycart')}" class="btn btn-primary mr10">查看全部</a><a href="{'product|gobuy'|geturl:'productid':'allbuycart'}" class="btn btn-success">结算</a></div>
                            <div class="sum"><span class="text-44">总计：</span><em class="text-primary" id="_downprice" data-quantity="{$totalquantity}">¥{$total}</em></div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="http://download.clofood.com/" class="down"><i class="icon-download"></i></a>
        </div>
    </div>
</div>
</div>