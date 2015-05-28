<div class="footer">
  <div class="footer-box1"></div>
  <div class="footer-box2">
      <div class="wrap">
        <ul class="link">
            <li><a href="{geturl('singlepage|about')}" target="_blank">关于我们</a></li>
            <li><a href="{geturl('singlepage|jobs')}" target="_blank">英才招聘</a></li>
            <li><a href="{geturl('singlepage|contact')}" target="_blank">联系我们</a></li>
        </ul>
        <p class="text-aa">湘ICP备06014709号-3|版权所有©长沙云厨电子商务有限责任公司   电话：0731-88515777  |  Cop</p>
      </div>
  </div>
</div>
<script type="text/javascript">
  $(function(){
      var _gouwu = $('#_downprice');
      $('#_gouwuche').html('购物车（'+_gouwu.data('quantity')+'）');
      $('#_upprice').html(_gouwu.html());
      $('#_gouwuchelist .del').find('a').on('click',function(){
          var _selectid = $(this).closest('li'); 
          $.post('{geturl("product|unsetbuycart")}',{
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
          $.post('{geturl("product|buycartquantity")}',{
                'product_no':_product_no,
                'quantity':_thisquantity
          },function(data){
              //TODO
          },'json')
      })
  })
</script>