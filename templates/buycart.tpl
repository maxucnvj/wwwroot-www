
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<link href="{$sysinfo.statics}/static/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="{$sysinfo.statics}/css/base.css" rel="stylesheet" type="text/css" />
<script src="{$sysinfo.statics}/static/jquery-1.11.0.min.js"></script>
<title>我的购物车</title>

</head>

<body>
{include file="header.tpl"}

<div class="wrap">
    <div class="cart-con">
        <div class="cart-head"><img src="{$sysinfo.statics}/images/shoplist.png" alt="购物车"><span>购物车</span></div>
        <div class="cart-th clearfix">
              <div class="span2 text-center">商品</div>
              <div class="span5 pl38 text-right">单价</div>
              <div class="span2 pl15 text-right">数量</div>
              <div class="span2 pl15 text-center">价格</div>
        </div>
       <ul class="list-group" id="__gouwuchelist">
{$total=0}{$totalquantity=0}
                        {foreach $buycart as $k=>$v}
                            <li class="bg-f{if $k%2 eq 0}1{else}c{/if}" data-productid="{$v.product_no}">
                                <div class="del"><input type="checkbox" name="subBox"></div>
                                <div class="img"><a href="{'product|show'|geturl:'product_no':$v.product_no}" title="{$v.product_name}"><img src="{$v.picture}"></a></div>
                                <div class="count"><span class="text-primary">¥{$v.shopprice*$v.quantity|number_format:2}</span></div>
                                <div class="num"><a href="javascript:;" title="减">-</a><input type="text" value="{$v.quantity}" disabled data-singleprice = "{$v.shopprice}"><a href="javascript:;" title="加">+</a></div>
                                <div class="s-count"><span class="text-44">¥{$v.shopprice}</span></div>
                                <div class="title ell"><a href="{'product|show'|geturl:'product_no':$v.product_no}">{$v.product_name}</a></div>
                                <div class="info ell">{$v.sales_name}</div>
                            </li>{$total=$total+$v.shopprice*$v.quantity}{$totalquantity=$totalquantity+$v.quantity}
                        {/foreach}  
      </ul>
      <div class="cart-ft bor-rd2">
          <div class="del checkbox" id="_delselect"><input type="checkbox" id="checkAll"><span class="text-f16 ml10">全选</span><a href="javascript:;" class="ml40 text-44 text-f16">删除选中商品</a></div>
          <div class="btns" id="_tobuy"><a href="javascript:;" class="btn btn-success btn-lg">结 算</a></div>
          <div class="sum"><span class="mr30 text-44">已选商品<i class="text-red" id="_jian">0</i>件</span><span class="text-44">合计</span><em class="text-red" id="_money">¥0.00</em></div>
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
<script type="text/javascript">
    var _gouwu = $('#_downprice');
    $(function(){
        $('#__gouwuchelist .num a').on('click',function(){
          var _tatolquantity = $('#_downprice').data('quantity');
          var _price = 0;          
          if($(this).html() == '-'){
              var _thisquantity = $(this).next('input').val();
              if(_thisquantity <= 1){
                  return;
              }
              $(this).next('input').val(Number(_thisquantity)-1);                            
              _price = -Number($(this).next('input').data('singleprice'));
              _tatolquantity = Number(_tatolquantity)-1; 
          }else{
              var _thisquantity = $(this).prev('input').val();
              $(this).prev('input').val(Number(_thisquantity)+1);
              _price = Number($(this).prev('input').data('singleprice'));
              _thisquantity = Number(_thisquantity)+1;
              _tatolquantity = Number(_tatolquantity)+1;  
          }
          $('#_gouwuche').html('购物车（'+_tatolquantity+'）');
          _gouwu.data('quantity',_tatolquantity);
          var _selectid = $(this).closest('li');
          var _totalprice = parseFloat($('#_downprice').html().replace('¥',''))+_price;
          var _countsingeprice = parseFloat(_selectid.find('.count span').html().replace('¥',''))+_price;
          _selectid.find('.count span').html('¥'+_countsingeprice.toFixed(2));
          $('#_upprice').html('¥'+_totalprice.toFixed(2));
          $('#_downprice').html('¥'+_totalprice.toFixed(2)); 
          var _product_no = _selectid.data('productid');
          $.post('{geturl("product|buycartquantity")}',{
                'product_no':_product_no,
                'quantity':_thisquantity
          },function(data){
              jieshuangtotal();
          },'json')
      })

       $("#checkAll").on('click',function() {
            var isChecked = $(this).prop("checked");
            $("input[name='subBox']").prop("checked", isChecked);
            jieshuangtotal();
        });
        var $subBox = $("#__gouwuchelist input[name='subBox']");
        $subBox.on('click',function(){
            $("#checkAll").attr("checked",$subBox.length == $("#__gouwuchelist input[name='subBox']:checked").length ? true : false);
            jieshuangtotal();
        });

        //删除选定
        $('#_delselect').find('a').on('click',function(){
            var pro_no = [];
            $("#__gouwuchelist input[name='subBox']").each(function(i){
                if($(this).prop("checked")){
                    pro_no.push($("#__gouwuchelist li").eq(i).data('productid'));
                }
            })
            pro_no = pro_no.join(',');

           $.post('{geturl("product|unsetbuycart")}',{
                'product_no':pro_no
           },function(data){
                $("#__gouwuchelist input[name='subBox']").each(function(i){
                    if($(this).prop("checked")){
                        $(this).closest('li').fadeIn(500).hide(500,function(){
                            $(this).closest('li').remove();
                        })
                    }
                })
                jieshuangtotal();
          },'json')
        })

        //结算
        $('#_tobuy').on('click',function(){
           var _jieshuanquan = [];
           $("#__gouwuchelist input[name='subBox']").each(function(i){
                if($(this).prop("checked")){
                   _jieshuanquan.push($(this).closest('li').data('productid'));
                }
           })
           if(_jieshuanquan != ""){
              window.location.href = "{'product|gobuy'|geturl:"productid="}"+_jieshuanquan;
           }else{
              alert('您还没有选择任何商品');
           }
        })
    })


    function jieshuangtotal(){
        var tt_tt = 0;
        var tt_price = 0;
        $("#__gouwuchelist input[name='subBox']").each(function(i){
            if($(this).prop("checked")){
                tt_tt++;
                tt_price = tt_price+parseFloat($("#__gouwuchelist li").eq(i).find('.count span').html().replace('¥',''));
            }
        })
        $('#_jian').html(tt_tt);
        $('#_money').html('¥'+tt_price.toFixed(2));
    }
</script>
{include file="footer.tpl"}
<script src="{$sysinfo.statics}/static/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>