
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
      <div class="account-center">
            <div class="clearfix">
        <span class="text-f18 pl25 pt25 f-l">送货信息</span>
        <a class="btn-address mt20 mr20" href="{geturl('login|run')}">已注册，直接去登录结算</a>
      </div>
            <div class="address-add ml25">
              <form class="controls">
                <div class="clearfix mb10">
                  <span>姓名:</span><input class="span5" type="text" name="realname" placeholder="输入收货人姓名" />
                </div>
                <div class="clearfix mb10">
                    <span>地址：</span><select class="span2" id="_province">
                      <option value="">请选择省份</option>
                       {foreach from=$country item=v}
                       <option value="{$v.provinceid}">{$v.province}</option>
                       {/foreach}
                     </select>
                     <select class="span2" id="_city">
                       <option>请选择城市</option>
                     </select>
                     <select class="span2" id="_district">
                       <option>请选择所在区</option>
                     </select>
                </div>
                <div class="clearfix mb10">
                     <span></span><select class="span2" id="_street">
                       <option>请选择所在街道</option>
                     </select>
                </div>
                <div class="clearfix mb10 user-basic pl30">
                  <div class="dropdown">
                      <input class="dropdown-toggle" id="_village" disabled type="text" placeholder="请输入小区名">
                      <ul class="dropdown-menu" id="_showvillage">
                      </ul>
                  </div>
                  <input class="span2" type="text" name="address" placeholder="请输入门牌号">
                </div>
                <div class="clearfix mb10">
                  <span>电话:</span><input class="span5" type="text" id="_mobile" placeholder="输入11位手机号码" />
                    <span></span><input class="span3 mr20 mb0" id="_code" type="text" placeholder="短信验证码" />
                    <button class="btn btn-success mb10" id="_sendmobile" type="button">获取短信验证码</button>
                </div>
              </form>
            </div>
      </div>
      <div class="mt10" style="width:50%; margin-left:115px; padding:none;">
      <div class="alert alert-error fade in mt15" id="_msg_wrong" style="display:none;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span style="100%;">错误提示</span>
      </div>
      </div>
      <div class="mt60 clearfix">
        <p class="f-r mr20">总金额：<strong class="text-f24 text-74">￥{$totalprice}</strong></p>
      </div>
      <div class="hr-dd ml25"></div>
      <div class="mt60 clearfix">
        <p class="ml25 f-l">支付方式：</p>
        <div class="ml40 f-l">
          <label class="mb15"><input type="radio" name="payselect" value="zhifubao" checked="checked" /><img src="{$sysinfo.statics}/images/zhi.png" /> 支付宝</label>
          <label class="mb15"><input type="radio" name="payselect" value="weixinzhifu" /><img src="{$sysinfo.statics}/images/weixin.png" /> 微信支付</label>
        </div>
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
      //提交订单
      $('#_createorder').on('click',function(){
        if($('input[name="realname"]').val() == ''){
            $('input[name="realname"]').css('border-color',"#ff0000").focus();
            setTimeout(function(){
                    $('input[name="realname"]').css('border-color',"none");
                },2000);
            return;
        }
        if(!checkmobile($('#_mobile').val())){
            $('#_mobile').focus().css('border-color',"#ff0000");
            setTimeout(function(){
                    $('#_mobile').css('border-color',"none");
                },2000);
            return;
        }
        if(Number($('#_province').val()) <= 0){
            $('#_province').css('border-color',"#ff0000");
            setTimeout(function(){
                $('#_province').css('border-color',"none");
            },2000);
            return;
        }
        if(Number($('#_city').val()) <= 0){
            $('#_city').css('border-color',"#ff0000");
            setTimeout(function(){
                $('#_city').css('border-color',"none");
            },2000);
            return;
        }
        if(Number($('#_street').val()) <= 0){
            $('#_street').css('border-color',"#ff0000");
            setTimeout(function(){
                $('#_street').css('border-color',"none");
            },2000);
            return;
        }
        if($('#_village').val() == ''){
            $('#_village').css('border-color',"#ff0000");
            setTimeout(function(){
                $('#_village').css('border-color',"none");
            },2000);
            return;
        }
        if($('input[name="address"]').val() == ''){
            $('input[name="address"]').focus().css('border-color',"#ff0000");
            setTimeout(function(){
                    $('input[name="address"]').css('border-color',"none");
                },2000);
            return;
        }
        if(!checkcode($('#_code').val())){
            $('#_code').css('border-color',"#ff0000");
            setTimeout(function(){
                $('#_code').css('border-color',"none");
            },2000);
            return;
        }

        var _savevillageid = '';
        var success = false;
        $.ajax({
          async:false,
          url:'{geturl("publics|searchvillage")}',
          type:"POST",
          data:{
            "streetid":$('#_street').val(),
            "villagename":$('#_village').val(),
            "precision":1
          },
          dataType:"json",
          success:function(data){
                if(data.length == 0){
                    success = true;
                }else{
                  _savevillageid = data[0]['villageid'];
                }
        }
        });

        if(success){
          $('#_village').css('border-color',"#ff0000");
          setTimeout(function(){
              $('#_village').css('border-color',"none");
          },2000);
          return;
        }

        $(this).html('提交中..').attr('disabled',true);

        $.post("{geturl('publics|createorder')}",{
          "realname":$('input[name="realname"]').val(),
          "mobile":$('#_mobile').val(),
          "code":$('#_code').val(),
          "province":$("#_province").find('option:selected').text(),
          "city":$("#_city").find('option:selected').text(),
          "district":$("#_district").find('option:selected').text(),
          "provinceid":$("#_province").val(),
          "cityid":$("#_city").val(),
          "districtid":$("#_district").val(),
          "streetid":$("#_street").val(),
          "street":$("#_street").find('option:selected').text(),
          "villageid":_savevillageid,
          "village":$('#_village').val(),
          "address":$('input[name="address"]').val(),
          "uuid":"{$uuid.uuid}",
          "sendtime":$('#select1').val()+' '+$('#select2').val(),
          "remark":$('#_remark').val(),
          "product_no":"{$good}",
          "payfor":$(':radio[name="payselect"]:checked').val()
        },function(data){
              if(data.result){
                //TODO
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

      //取手机验证码
      $('#_sendmobile').on('click',function(){
          if(!checkmobile($('#_mobile').val())){
            $('#_mobile').focus();
            $('#_msg_wrong').fadeIn(100,function(){
              setTimeout(function(){
                $('#_msg_wrong').fadeOut(100);
              },2000);
            }).find('span').html('手机号码格式不正确');
            return false; 
          }
          $('#_sendmobile').removeClass('btn-success').addClass('btn-info').attr('disabled',true).html('<span style="font-size:12px;">正在发送中..</span>');
          $.post('{geturl("login|sendmobile2")}',{
            "mobile":$('#_mobile').val()  
          },function(data){
            if(data.result){
              timeload();
            }else{
              $('#_mobile').focus();
              $('#_msg_wrong').fadeIn(100,function(){
                setTimeout(function(){
                  $('#_msg_wrong').fadeOut(100);
                },2000);
              }).find('span').html(data.error.msg);
              $('#_sendmobile').removeClass('btn-info').addClass('btn-success').removeAttr('disabled').html('获取短信验证码');
              return;
            }
          },'json')
      })

      //省选择
      $('#_province').change(function(){ 
        if($(this).children('option:selected').val()){
          $.post('{geturl("publics|getarea")}',{
              "name":"province",
              "areaid":$(this).children('option:selected').val()
          },function(data){
              if(data.length > 0){
                  var $select = $('#_city');
                  var $selectdistrict = $('#_district');
                  $('#_city option').remove();
                  $('#_district option').remove();
                  __citys = [];  
                  for (var i = 0; i < data.length; i++) {
                      __citys.push([data[i]['districts']]);
                      $select.append('<option value="'+data[i]['cityid']+'">'+data[i]['city']+'</option>');
                      if(i==0 && data[i]['districts'].length > 0){
                          $selectdistrict.append('<option value="">请选择所在区</option>'); 
                          for (var b = 0; b < data[i]['districts'].length; b++) {
                            $selectdistrict.append('<option value="'+data[i]['districts'][b]['districtid']+'">'+data[i]['districts'][b]['district']+'</option>'); 
                          }
                      }
                  };
              }
          },'json')
        }
      })

      //市选择
      $('#_city').change(function(){
          var index = $(this).children('option:selected').index();
          var $selectdistrict = $('#_district');
          $('#_district option').remove();
          $selectdistrict.append('<option value="">请选择所在区</option>'); 
          for (var b = 0; b < __citys[index][0].length; b++) {
             $selectdistrict.append('<option value="'+__citys[index][0][b]['districtid']+'">'+__citys[index][0][b]['district']+'</option>'); 
          } 
      })

      //区选择
      $('#_district').change(function(){
          var districtid = $(this).children('option:selected').val();
          var $selectdistrict = $('#_street');
          if(districtid){
              $('#_street option').remove();
              $.post('{geturl("publics|getarea")}',{
              "name":"district",
              "areaid":$(this).children('option:selected').val()
              },function(data){
              if(data[0]['street'].length > 0){
                  $selectdistrict.append('<option value="">请选择所在街道</option>'); 
                  for (var b = 0; b < data[0]['street'].length; b++) {
                     $selectdistrict.append('<option value="'+data[0]['street'][b]['streetid']+'">'+data[0]['street'][b]['street']+'</option>'); 
                  }  
              }
          },'json')
          }
      })


      //区选择
      $('#_street').change(function(){
          var districtid = $(this).children('option:selected').val();
          var $selectdistrict = $('#_street');
          if(districtid){
             $('#_village').removeAttr('disabled'); 
          }
      })   

      //搜索小区
      var village = '';
      $('#_village').keyup(function(){
          if($(this).val() != village){
             village = $(this).val();
             var selectopen = $(this).closest('div');
             $.post('{geturl("publics|searchvillage")}',{
                "streetid":$('#_street').val(),
                "villagename":village
             },function(data){
                $('#_showvillage').html('');
                selectopen.addClass('open');
                if(data.length>0){
                    for (var i = data.length - 1; i >= 0; i--) {
                      $('#_showvillage').append('<li><a href="javascript:;" data-villageid="'+data[i]['villageid']+'">'+data[i]['villagename']+'</a></li>');
                    };
                }
                //下拉选择
                $('#_showvillage li').on('click',function(){
                  var _selectvillage = $(this).closest('ul');
                  var _selectvillagename = $(this).find('a').html();
                  var _selectvillageid = $(this).find('a').data('villageid');
                  selectopen.removeClass('open');
                  $('#_village').val(_selectvillagename);
                }) 
             },'json')
          }
      })
 })

  //倒计时发送
  function timeload(){
    var backtime = 60;
    var int=self.setInterval(function(){
      backtime--;
      if(backtime < 0){
        $('#_sendmobile').removeClass('btn-info').addClass('btn-success').removeAttr('disabled').html('获取短信验证码');
        window.clearInterval(int);
      }else{
        $('#_sendmobile').html('<span style="font-size:12px;">'+backtime+'秒后重新发</span>')
      }     
    },1000);
  }   
</script>
</body>
</html>