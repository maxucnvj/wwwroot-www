<?php /* Smarty version Smarty-3.1.21, created on 2015-05-25 13:32:29
         compiled from ".\templates\myaddress.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5615555dae23adb1b9-94373493%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e598903ce78e226ad1f404903897e92de617bea' => 
    array (
      0 => '.\\templates\\myaddress.tpl',
      1 => 1432553547,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5615555dae23adb1b9-94373493',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21',
  'unifunc' => 'content_555dae23b67bd4_10458808',
  'variables' => 
  array (
    'sysinfo' => 0,
    'country' => 0,
    'v' => 0,
    'address' => 0,
    'k' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_555dae23b67bd4_10458808')) {function content_555dae23b67bd4_10458808($_smarty_tpl) {?><!doctype html>
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
<title>个人中心－我的地址管理</title>

</head>

<body>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="wrap ps-r clearfix">
    <?php echo $_smarty_tpl->getSubTemplate ("userleft.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
                       <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['country']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
                       <option value="<?php echo $_smarty_tpl->tpl_vars['v']->value['provinceid'];?>
"><?php echo $_smarty_tpl->tpl_vars['v']->value['province'];?>
</option>
                       <?php } ?>
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
              <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['address']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
              <ul class="table-list bg-f<?php if ($_smarty_tpl->tpl_vars['k']->value%2==0) {?>f<?php } else { ?>c<?php }?>">
                <li class="li-wth1"><?php echo $_smarty_tpl->tpl_vars['v']->value['realname'];?>
</li>
                <li class="li-wth2"><?php echo $_smarty_tpl->tpl_vars['v']->value['province'];
echo $_smarty_tpl->tpl_vars['v']->value['city'];
echo $_smarty_tpl->tpl_vars['v']->value['district'];
echo $_smarty_tpl->tpl_vars['v']->value['street'];
echo $_smarty_tpl->tpl_vars['v']->value['village'];
echo $_smarty_tpl->tpl_vars['v']->value['address'];?>
</li>
                <li class="li-wth3"><?php echo $_smarty_tpl->tpl_vars['v']->value['mobile'];?>
</li>
                <li class="li-wth4"  data-addressid="<?php echo $_smarty_tpl->tpl_vars['v']->value['addressid'];?>
"><a href="javascript:;">编辑</a> | <a href="javascript:;">删除</a> <?php if ($_smarty_tpl->tpl_vars['v']->value['status']==0) {?>| <a href="javascript:;">设为默认</a><?php }?></li>
              </ul>
              <?php } ?>  
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
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
          url:'<?php echo geturl("user|searchvillage");?>
',
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
        $.post("<?php echo geturl('user|savaaddress');?>
",{
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
            $.post('<?php echo geturl("user|deladdress");?>
',{
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
            $.post('<?php echo geturl("user|setaddress");?>
',{
              'addressid':addressid
            },function(data){
              if(data.result){
                location.reload(); 
              }else{
                alert(data.error.msg);
              }
            },'json')
        }else if($(this).index() == 0){
            $.post('<?php echo geturl("user|singleaddress");?>
',{
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
          $.post('<?php echo geturl("user|getarea");?>
',{
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
              $.post('<?php echo geturl("user|getarea");?>
',{
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
             $.post('<?php echo geturl("user|searchvillage");?>
',{
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
<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
