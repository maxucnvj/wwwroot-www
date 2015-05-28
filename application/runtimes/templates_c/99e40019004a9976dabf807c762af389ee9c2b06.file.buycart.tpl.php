<?php /* Smarty version Smarty-3.1.21, created on 2015-05-25 05:49:28
         compiled from ".\templates\buycart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7810555eeaf0da5c06-82460458%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '99e40019004a9976dabf807c762af389ee9c2b06' => 
    array (
      0 => '.\\templates\\buycart.tpl',
      1 => 1432525765,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7810555eeaf0da5c06-82460458',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_555eeaf0e03810_96603239',
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
<?php if ($_valid && !is_callable('content_555eeaf0e03810_96603239')) {function content_555eeaf0e03810_96603239($_smarty_tpl) {?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<link href="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/static/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/css/base.css" rel="stylesheet" type="text/css" />
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/static/jquery-1.11.0.min.js"><?php echo '</script'; ?>
>
<title>我的购物车</title>

</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="wrap">
    <div class="cart-con">
        <div class="cart-head"><img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/shoplist.png" alt="购物车"><span>购物车</span></div>
        <div class="cart-th clearfix">
              <div class="span2 text-center">商品</div>
              <div class="span5 pl38 text-right">单价</div>
              <div class="span2 pl15 text-right">数量</div>
              <div class="span2 pl15 text-center">价格</div>
        </div>
       <ul class="list-group" id="__gouwuchelist">
<?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable(0, null, 0);
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
                                <div class="del"><input type="checkbox" name="subBox"></div>
                                <div class="img"><a href="<?php echo geturl('product|show','product_no',$_smarty_tpl->tpl_vars['v']->value['product_no']);?>
" title="<?php echo $_smarty_tpl->tpl_vars['v']->value['product_name'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['picture'];?>
"></a></div>
                                <div class="count"><span class="text-primary">¥<?php echo $_smarty_tpl->tpl_vars['v']->value['shopprice']*number_format($_smarty_tpl->tpl_vars['v']->value['quantity'],2);?>
</span></div>
                                <div class="num"><a href="javascript:;" title="减">-</a><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['v']->value['quantity'];?>
" disabled data-singleprice = "<?php echo $_smarty_tpl->tpl_vars['v']->value['shopprice'];?>
"><a href="javascript:;" title="加">+</a></div>
                                <div class="s-count"><span class="text-44">¥<?php echo $_smarty_tpl->tpl_vars['v']->value['shopprice'];?>
</span></div>
                                <div class="title ell"><a href="<?php echo geturl('product|show','product_no',$_smarty_tpl->tpl_vars['v']->value['product_no']);?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['product_name'];?>
</a></div>
                                <div class="info ell"><?php echo $_smarty_tpl->tpl_vars['v']->value['sales_name'];?>
</div>
                            </li><?php $_smarty_tpl->tpl_vars['total'] = new Smarty_variable($_smarty_tpl->tpl_vars['total']->value+$_smarty_tpl->tpl_vars['v']->value['shopprice']*$_smarty_tpl->tpl_vars['v']->value['quantity'], null, 0);
$_smarty_tpl->tpl_vars['totalquantity'] = new Smarty_variable($_smarty_tpl->tpl_vars['totalquantity']->value+$_smarty_tpl->tpl_vars['v']->value['quantity'], null, 0);?>
                        <?php } ?>  
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
<?php echo '<script'; ?>
 type="text/javascript">
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
          $.post('<?php echo geturl("product|buycartquantity");?>
',{
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

           $.post('<?php echo geturl("product|unsetbuycart");?>
',{
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
              window.location.href = "<?php echo geturl('product|gobuy',"productid=");?>
"+_jieshuanquan;
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
<?php echo '</script'; ?>
>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/static/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
