<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<link href="{$sysinfo.statics}/static/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="{$sysinfo.statics}/css/base.css" rel="stylesheet" type="text/css" />
<link href="{$sysinfo.statics}/css/style.css" rel="stylesheet" type="text/css" />
<script src="{$sysinfo.statics}/static/jquery-1.11.0.min.js"></script>
<title>个人中心－我的地址管理</title>

</head>

<body>
{include file="header.tpl"}
<div class="wrap ps-r clearfix">
    {include file="userleft.tpl"}
    <!--side end-->
    <div class="main-bar pull-right">
    	<div class="account-center">
            <p class="text-f18 pl38 pt30" id="addtitle">新增地址</p>
            <div class="address-add ml38" id="addressid" data-addressid = "">
              <form class="controls">
              	<div class="clearfix mb10">
                	<span>收货人姓名:</span><input class="span5" type="text" name="realname" placeholder="输入收货人姓名" />
                </div>
              	<div class="clearfix mb10">
                	<span>电话:</span><input class="span5" type="text" name="mobile" placeholder="输入11位手机号码" />
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
                <!--<label class="ml90"><input type="checkbox" />设为默认地址</label>-->
                </form>
                <p class=" text-center pb15"><input type="button" class="btn btn-success span2" id="_addresssave" value="保存"></p>
            </div>
        </div>
        <div class="account-center mt20" id="_addresslist">
            <div class="table"> 
              <ul class="table-title">
                <li class="li-wth1">收货人</li>
                <li class="li-wth2">收货地址</li>
                <li class="li-wth3">手机/电话</li>
                <li class="li-wth4">操作</li>
              </ul>
              {foreach from=$address  key=k item=v}
              <ul class="table-list bg-f{if $k%2 eq 0}f{else}c{/if}">
                <li class="li-wth1">{$v.realname}</li>
                <li class="li-wth2">{$v.province}{$v.city}{$v.district}{$v.street}{$v.village}{$v.address}</li>
                <li class="li-wth3">{$v.mobile}</li>
                <li class="li-wth4"  data-addressid="{$v.addressid}"><a href="javascript:;">编辑</a> | <a href="javascript:;">删除</a> {if $v.status eq 0}| <a href="javascript:;">设为默认</a>{/if}</li>
              </ul>
              {/foreach}  
            </div>
        </div>
    </div>
    <!--main end-->
</div>

<div class="wrap foot-banner">
  <div class="bnr-box1 bnr-foot">
    <a href="#" class="btn btn-primary btn-lg pull-right mt30">查看更多</a>
    <h4 class="">加碘盐</h4>
    <p class="">湖南盈成油脂是全国第一家开设产品溯源系统的油脂企业，从2004年建厂开设，从2004年建厂开设，致力大招。</p>
  </div>
</div>
{include file='footer.tpl'}
<script src="{$sysinfo.statics}/static/bootstrap/js/bootstrap.min.js"></script>
<script src="{$sysinfo.statics}/js/common.js"></script>
<script type="text/javascript">
    var __citys = [];
    
    $(function(){
      //提交数据
      $('#_addresssave').on('click',function(){
        if($('input[name="realname"]').val() == ''){
            $('input[name="realname"]').css('border-color',"#ff0000").focus();
            setTimeout(function(){
                    $('input[name="realname"]').css('border-color',"none");
                },2000);
            return;
        }
        if(!checkmobile($('input[name="mobile"]').val())){
            $('input[name="mobile"]').focus().css('border-color',"#ff0000");
            setTimeout(function(){
                    $('input[name="mobile"]').css('border-color',"none");
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
        var _savevillageid = '';
        var success = false;
        $.ajax({
          async:false,
          url:'{geturl("user|searchvillage")}',
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
        $(this).val('保存中..').attr('disabled',true);
        $.post("{geturl('user|savaaddress')}",{
          "realname":$('input[name="realname"]').val(),
          "mobile":$('input[name="mobile"]').val(),
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
          "addressid":$('#addressid').data('addressid'),
        },function(data){
              if(data.result){
                location.reload(); 
              }else{
                $(this).val('保存').removeAttr('disabled');
                alert(data.error.msg);
              }
        },'json')
      })

      //删除地址
      $('#_addresslist ul .li-wth4 a').on('click',function(){ //删除
        var addressid = $(this).closest('li').data('addressid');
        var delul = $(this).closest('ul');
        if($(this).index() == 1){
            $.post('{geturl("user|deladdress")}',{
              'addressid':addressid
            },function(data){
              if(data.result){
                delul.hide(200,function(){
                  delul.remove();
                });
              }else{
                alert(data.error.msg);
              }
            },'json')
        }else if($(this).index() == 2){ //默认
            $.post('{geturl("user|setaddress")}',{
              'addressid':addressid
            },function(data){
              if(data.result){
                location.reload(); 
              }else{
                alert(data.error.msg);
              }
            },'json')
        }else if($(this).index() == 0){
            $.post('{geturl("user|singleaddress")}',{
              'addressid':addressid
            },function(data){
              if(data.result){
                  $('#addressid').data('addressid',data.result.addressid);
                  $('input[name="realname"]').val(data.result.realname);
                  $('input[name="mobile"]').val(data.result.mobile);
                  $('input[name="address"]').val(data.result.address);
                  $('#_village').val(data.result.village);
                  $('#_province').append('<option value="'+data.result.provinceid+'" selected>'+data.result.province+'</option>');
                  $('#_city').append('<option value="'+data.result.cityid+'" selected>'+data.result.city+'</option>');
                  $('#_district').append('<option value="'+data.result.districtid+'" selected>'+data.result.district+'</option>');
                  $('#_street').append('<option value="'+data.result.streetid+'" selected>'+data.result.street+'</option>');
                  $('#addtitle').html('修改地址');
              }else{
                alert(data.error.msg);
              }
            },'json');
        }
      })

      //省选择
      $('#_province').change(function(){ 
        if($(this).children('option:selected').val()){
          $.post('{geturl("user|getarea")}',{
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
              $.post('{geturl("user|getarea")}',{
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
             $.post('{geturl("user|searchvillage")}',{
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
</script>
</body>
</html>