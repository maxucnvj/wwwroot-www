
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<link href="{$sysinfo.statics}/static/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="{$sysinfo.statics}/css/base.css" rel="stylesheet" type="text/css" />
<link href="{$sysinfo.statics}/css/style.css" rel="stylesheet" type="text/css" />
<script src="{$sysinfo.statics}/static/jquery-1.11.0.min.js"></script>
<title>我的购物车</title>

</head>

<body>
{include file="header.tpl"}

<div class="wrap clearfix pay-bill">
    <div class="mini-cart-con pull-left">
        <div class="cart-head"><img src="{$sysinfo.statics}/images/shoplist.png" alt="购物车"><span>商品清单</span></div>
        <div class="cart-th clearfix">
          <div class="span1 text-center">商品</div>
          <div class="span1 ml50 pl30 text-right">单价</div>
          <div class="span1 pl5 text-right">数量</div>
          <div class="span1 pl5 text-center">价格</div>
        </div>
        <ul class="list-group">
            {foreach from=$goods item=v key=k}

            <li class="bg-f{if $k%2 eq 0}f{else}c{/if}" data-prodcutno="{$v.product_no}">
                <div class="img"><a href="{'product|show'|geturl:'product_no':$v.product_no}" title="{$v.product_name}"><img src="{$v.picture}"></a></div>
                <div class="count"><span class="text-primary">¥{$v.shopprice}</span></div>
                <div class="num" style="text-align:center">{$v.quantity}</div>
                <div class="s-count"><span class="text-44">¥{$v.totalprice}</span></div>
                <div class="title ell"><a href="{'product|show'|geturl:'product_no':$v.product_no}">{$v.product_name}</a></div>
                <div class="info ell">{$v.sales_name}</div>
            </li>
            {/foreach}
        </ul>
        <div class="cart-ft bor-rd2">
          <div class=" mt10">
              <span class="mr10">配送时间</span>
                <select id="select1" name="select1">
                  {foreach from=$sendtimes.days item=v}
                  <option value="{$v}">{$v}</option>
                  {/foreach}
                </select>
                <select id="select2" name="select2" class="ml70">
                  {foreach from=$sendtimes.times item=v}
                  <option value="{$v}">{$v}</option>
                  {/foreach}
                </select>
            </div>
            <span class="mr40">留言</span><input type="text" class="mt10 span4" id="_remark">
        </div>
    </div>
    <div class="pull-right pay-bill-info">
      <div class="clearfix">
        <span class="text-f18 pl25 pt25 f-l">送货信息</span>
        <a href="{geturl('user|myaddress')}" class="btn-address mt20 mr20">管理收货地址</a>
      </div>
      <div class="pl25 mt10">
        <p>收货人信息：</p>
        <div class="address-box clearfix" id="_addressselect">
        {foreach from=$address item=v key=k}
          <dl class="address {if $k%2 eq 0}f-l{else}f-r mr20{/if}{if $k eq 0} active{/if}" data-addressid="{$v.addressid}" data-select="{if $k eq 0}1{else}0{/if}">
            <dt>{$v.realname}</dt>
            <dd>{$v.mobile}<br>{$v.province}{$v.city}{$v.district}{$v.street}{$v.village}{$v.address}</dd>
            <i></i>
          </dl>
          {/foreach}
        </div>
      </div>
            <div class="mt10" style="width:50%; margin-left:115px; padding:none;">
      <div class="alert alert-error fade in mt15" id="_msg_wrong" style="display:none;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span style="100%;">错误提示</span>
      </div>
      </div>
      <div class="mt100 clearfix">
        <p class="f-r mr20">总金额：<strong class="text-f24 text-74">￥{$totalprice}</strong></p>
      </div>
      <div class="hr-dd ml25"></div>
      <div class="mt60 clearfix">
        <p class="ml25 f-l">支付方式：</p>
        <ul class="ml40 f-l">
          {if $money < $totalprice}
          <li class="mb15">
            <p class="text-aa"><input type="radio"  disabled/><img src="{$sysinfo.statics}/images/clofood.png" /> 云厨现金支付<span class="ml20">账户余额：{$money}云币</span></p>
            <a href="#" class="btn btn-primary ml30">余额不足，请充值</a>
          </li>
          {else}
          <li class="mb15">
            <p><input type="radio" name="payselect" value="balance" checked="checked" /><img src="{$sysinfo.statics}/images/clofood-a.png" /> 云厨现金支付<span class="ml20">账户余额：{$money}云币</span></p>
            <p class="ml30"><input type="password" class="span2" name="paypassword" placeholder="输入密码"></p>
          </li>
          {/if}
          <li class="mb15"><input type="radio" name="payselect" value="zhifubao" {if $money < $totalprice}checked="checked"{/if} /><img src="{$sysinfo.statics}/images/zhi.png" /> 支付宝</li>
          <li class="mb15"><input type="radio" name="payselect" value="weixinzhifu" /><img src="{$sysinfo.statics}/images/weixin.png" /> 微信支付</li>
        </ul>
      </div>
      <div class="mt60 mb40 clearfix">
        <p class="f-r mr20"><button class="submit-btn btn btn-primary" id="_createorder" type="button">提交订单</button></p>
      </div>
    </div>
</div>

<div class="wrap foot-banner">
  <div class="bnr-box1 bnr-foot">
    <a href="#" class="btn btn-primary btn-lg pull-right mt30">查看更多</a>
    <h4 class="">加碘盐</h4>
    <p class="">湖南盈成油脂是全国第一家开设产品溯源系统的油脂企业，从2004年建厂开设，从2004年建厂开设，致力大招。</p>
  </div>
</div>
{include file="footer.tpl"}
<script src="{$sysinfo.statics}/static/bootstrap/js/bootstrap.min.js"></script>
<script src="{$sysinfo.statics}/js/common.js"></script>
<script type="text/javascript">
 $(function(){

      $('#_addressselect dl').on('click',function(){
          $('#_addressselect dl').removeClass('active');
          $('#_addressselect dl').data('select',0);
          $(this).addClass('active');
          $(this).data('select',1);
      })

      //提交订单
      $('#_createorder').on('click',function(){
        var _payselect = $(':radio[name="payselect"]:checked').val();
        if(_payselect == 'balance' && $('input[name="paypassword"]').val() == ''){
            $('input[name="paypassword"]').css('border-color',"#ff0000").focus();
            setTimeout(function(){
                    $('input[name="paypassword"]').css('border-color',"none");
                },2000);
            return;
        }
        var _addressid = '';
        $('#_addressselect dl').each(function(){
            if($(this).data('select') == 1){
                _addressid = $(this).data('addressid');
            }
        })


        

        $(this).html('提交中..').attr('disabled',true);

        $.post("{geturl('publics|createorder')}",{
          "addressid":_addressid,
          "uuid":"{$uuid.uuid}",
          "sendtime":$('#select1').val()+' '+$('#select2').val(),
          "remark":$('#_remark').val(),
          "product_no":"{$good}",
          "payfor":$(':radio[name="payselect"]:checked').val(),
          "paypassword":$('input[name="paypassword"]').val()
        },function(data){
              if(data.result){
                //TODO
                alert('提交成功');
              }else{
                $(this).html('提交订单').removeAttr('disabled');
                $('#_msg_wrong').fadeIn(100,function(){
                  setTimeout(function(){
                    $('#_msg_wrong').fadeOut(100);
                  },2000);
                }).find('span').html(data.error.msg);
              }
        },'json')

      })      
 })
</script>
</body>
</html>