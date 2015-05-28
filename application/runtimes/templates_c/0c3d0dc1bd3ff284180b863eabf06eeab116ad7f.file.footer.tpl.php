<?php /* Smarty version Smarty-3.1.21, created on 2015-05-22 10:06:50
         compiled from ".\templates\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22457555c230d307047-35386518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c3d0dc1bd3ff284180b863eabf06eeab116ad7f' => 
    array (
      0 => '.\\templates\\footer.tpl',
      1 => 1432282008,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22457555c230d307047-35386518',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_555c230d30aec4_18721977',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555c230d30aec4_18721977')) {function content_555c230d30aec4_18721977($_smarty_tpl) {?><div class="footer">
  <div class="footer-box1"></div>
  <div class="footer-box2">
      <div class="wrap">
        <ul class="link">
            <li><a href="<?php echo geturl('singlepage|about');?>
" target="_blank">关于我们</a></li>
            <li><a href="<?php echo geturl('singlepage|jobs');?>
" target="_blank">英才招聘</a></li>
            <li><a href="<?php echo geturl('singlepage|contact');?>
" target="_blank">联系我们</a></li>
        </ul>
        <p class="text-aa">湘ICP备06014709号-3|版权所有©长沙云厨电子商务有限责任公司   电话：0731-88515777  |  Cop</p>
      </div>
  </div>
</div>
<?php echo '<script'; ?>
 type="text/javascript">
  $(function(){
      var _gouwu = $('#_downprice');
      $('#_gouwuche').html('购物车（'+_gouwu.data('quantity')+'）');
      $('#_upprice').html(_gouwu.html());
      $('#_gouwuchelist .del').find('a').on('click',function(){
          var _selectid = $(this).closest('li'); 
          $.post('<?php echo geturl("product|unsetbuycart");?>
',{
                'product_no':_selectid.data('productid')
          },function(data){
                var _totalprice = parseFloat($('#_downprice').html().replace('¥',''))-parseFloat(_selectid.find('.count span').html().replace('¥',''));
                $('#_upprice').html('¥'+_totalprice.toFixed(2));
                _gouwu.html('¥'+_totalprice.toFixed(2));
                _gouwu.data('quantity',Number(_gouwu.data('quantity'))-Number(_selectid.find('.num input').val()));
                $('#_gouwuche').html('购物车（'+_gouwu.data('quantity')+'）');              
               _selectid.remove(); 
          },'json')
      })

      $('#_gouwuchelist .num a').on('click',function(){
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
          $('#_upprice').html('¥'+_totalprice.toFixed(2));
          $('#_downprice').html('¥'+_totalprice.toFixed(2)); 
          var _product_no = _selectid.data('productid');
          $.post('<?php echo geturl("product|buycartquantity");?>
',{
                'product_no':_product_no,
                'quantity':_thisquantity
          },function(data){
              //TODO
          },'json')
      })
  })
<?php echo '</script'; ?>
><?php }} ?>
