<?php /* Smarty version Smarty-3.1.21, created on 2015-05-27 11:43:03
         compiled from ".\templates\logingobuy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4687556581815024e7-44361165%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a1b1092f4a21b69989e3b19d400e77390d02476' => 
    array (
      0 => '.\\templates\\logingobuy.tpl',
      1 => 1432719779,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4687556581815024e7-44361165',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_5565818176f704_93775441',
  'variables' => 
  array (
    'sysinfo' => 0,
    'goods' => 0,
    'k' => 0,
    'v' => 0,
    'sendtimes' => 0,
    'address' => 0,
    'totalprice' => 0,
    'money' => 0,
    'uuid' => 0,
    'good' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5565818176f704_93775441')) {function content_5565818176f704_93775441($_smarty_tpl) {?>
<!doctype html>
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
<title>我的购物车</title>

</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="wrap clearfix pay-bill">
    <div class="mini-cart-con pull-left">
        <div class="cart-head"><img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/shoplist.png" alt="购物车"><span>商品清单</span></div>
        <div class="cart-th clearfix">
          <div class="span1 text-center">商品</div>
          <div class="span1 ml50 pl30 text-right">单价</div>
          <div class="span1 pl5 text-right">数量</div>
          <div class="span1 pl5 text-center">价格</div>
        </div>
        <ul class="list-group">
            <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['goods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>

            <li class="bg-f<?php if ($_smarty_tpl->tpl_vars['k']->value%2==0) {?>f<?php } else { ?>c<?php }?>" data-prodcutno="<?php echo $_smarty_tpl->tpl_vars['v']->value['product_no'];?>
">
                <div class="img"><a href="<?php echo geturl('product|show','product_no',$_smarty_tpl->tpl_vars['v']->value['product_no']);?>
" title="<?php echo $_smarty_tpl->tpl_vars['v']->value['product_name'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['v']->value['picture'];?>
"></a></div>
                <div class="count"><span class="text-primary">¥<?php echo $_smarty_tpl->tpl_vars['v']->value['shopprice'];?>
</span></div>
                <div class="num" style="text-align:center"><?php echo $_smarty_tpl->tpl_vars['v']->value['quantity'];?>
</div>
                <div class="s-count"><span class="text-44">¥<?php echo $_smarty_tpl->tpl_vars['v']->value['totalprice'];?>
</span></div>
                <div class="title ell"><a href="<?php echo geturl('product|show','product_no',$_smarty_tpl->tpl_vars['v']->value['product_no']);?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['product_name'];?>
</a></div>
                <div class="info ell"><?php echo $_smarty_tpl->tpl_vars['v']->value['sales_name'];?>
</div>
            </li>
            <?php } ?>
        </ul>
        <div class="cart-ft bor-rd2">
          <div class=" mt10">
              <span class="mr10">配送时间</span>
                <select id="select1" name="select1">
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sendtimes']->value['days']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
                  <?php } ?>
                </select>
                <select id="select2" name="select2" class="ml70">
                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sendtimes']->value['times']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                  <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</option>
                  <?php } ?>
                </select>
            </div>
            <span class="mr40">留言</span><input type="text" class="mt10 span4" id="_remark">
        </div>
    </div>
    <div class="pull-right pay-bill-info">
      <div class="clearfix">
        <span class="text-f18 pl25 pt25 f-l">送货信息</span>
        <a href="<?php echo geturl('user|myaddress');?>
" class="btn-address mt20 mr20">管理收货地址</a>
      </div>
      <div class="pl25 mt10">
        <p>收货人信息：</p>
        <div class="address-box clearfix" id="_addressselect">
        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['address']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
          <dl class="address <?php if ($_smarty_tpl->tpl_vars['k']->value%2==0) {?>f-l<?php } else { ?>f-r mr20<?php }
if ($_smarty_tpl->tpl_vars['k']->value==0) {?> active<?php }?>" data-addressid="<?php echo $_smarty_tpl->tpl_vars['v']->value['addressid'];?>
" data-select="<?php if ($_smarty_tpl->tpl_vars['k']->value==0) {?>1<?php } else { ?>0<?php }?>">
            <dt><?php echo $_smarty_tpl->tpl_vars['v']->value['realname'];?>
</dt>
            <dd><?php echo $_smarty_tpl->tpl_vars['v']->value['mobile'];?>
<br><?php echo $_smarty_tpl->tpl_vars['v']->value['province'];
echo $_smarty_tpl->tpl_vars['v']->value['city'];
echo $_smarty_tpl->tpl_vars['v']->value['district'];
echo $_smarty_tpl->tpl_vars['v']->value['street'];
echo $_smarty_tpl->tpl_vars['v']->value['village'];
echo $_smarty_tpl->tpl_vars['v']->value['address'];?>
</dd>
            <i></i>
          </dl>
          <?php } ?>
        </div>
      </div>
            <div class="mt10" style="width:50%; margin-left:115px; padding:none;">
      <div class="alert alert-error fade in mt15" id="_msg_wrong" style="display:none;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span style="100%;">错误提示</span>
      </div>
      </div>
      <div class="mt100 clearfix">
        <p class="f-r mr20">总金额：<strong class="text-f24 text-74">￥<?php echo $_smarty_tpl->tpl_vars['totalprice']->value;?>
</strong></p>
      </div>
      <div class="hr-dd ml25"></div>
      <div class="mt60 clearfix">
        <p class="ml25 f-l">支付方式：</p>
        <ul class="ml40 f-l">
          <?php if ($_smarty_tpl->tpl_vars['money']->value<$_smarty_tpl->tpl_vars['totalprice']->value) {?>
          <li class="mb15">
            <p class="text-aa"><input type="radio"  disabled/><img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/clofood.png" /> 云厨现金支付<span class="ml20">账户余额：<?php echo $_smarty_tpl->tpl_vars['money']->value;?>
云币</span></p>
            <a href="#" class="btn btn-primary ml30">余额不足，请充值</a>
          </li>
          <?php } else { ?>
          <li class="mb15">
            <p><input type="radio" name="payselect" value="balance" checked="checked" /><img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/clofood-a.png" /> 云厨现金支付<span class="ml20">账户余额：<?php echo $_smarty_tpl->tpl_vars['money']->value;?>
云币</span></p>
            <p class="ml30"><input type="password" class="span2" name="paypassword" placeholder="输入密码"></p>
          </li>
          <?php }?>
          <li class="mb15"><input type="radio" name="payselect" value="zhifubao" <?php if ($_smarty_tpl->tpl_vars['money']->value<$_smarty_tpl->tpl_vars['totalprice']->value) {?>checked="checked"<?php }?> /><img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/zhi.png" /> 支付宝</li>
          <li class="mb15"><input type="radio" name="payselect" value="weixinzhifu" /><img src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/images/weixin.png" /> 微信支付</li>
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
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/static/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['sysinfo']->value['statics'];?>
/js/common.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
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

        $.post("<?php echo geturl('publics|createorder');?>
",{
          "addressid":_addressid,
          "uuid":"<?php echo $_smarty_tpl->tpl_vars['uuid']->value['uuid'];?>
",
          "sendtime":$('#select1').val()+' '+$('#select2').val(),
          "remark":$('#_remark').val(),
          "product_no":"<?php echo $_smarty_tpl->tpl_vars['good']->value;?>
",
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
<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
