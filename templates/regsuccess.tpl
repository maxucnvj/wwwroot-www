<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
<link href="{$sysinfo.statics}/static/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="{$sysinfo.statics}/css/base.css" rel="stylesheet" type="text/css" />
<link href="{$sysinfo.statics}/css/style.css" rel="stylesheet" type="text/css" />
<script src="{$sysinfo.statics}/static/jquery-1.11.0.min.js"></script>
<title>注册成功</title>
</head>
<body>
{include file='header.tpl'}
<div class="pt40 pb40">
  <div class="wrap ze-ok">
    <div class="zc-tu">
      <img src="{$sysinfo.statics}/images/ze-cg.png" />恭喜您注册成功！
    </div>
    <div class="zc-btn pb40">
      <button class="btn-ck btn btn-success" type="button">云厨商城</button>
      <button class="btn-ck btn btn-primary ml30" type="button">个人中心</button>
    </div>
  </div>
</div>
<script src="{$sysinfo.statics}/static/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(function(){
        $('.zc-btn button').on('click',function(){
            if($(this).index() == 1){
                location.href = "{geturl('user|run')}";
            }else{
                location.href = "{geturl('product|run')}";
            }
        })
    })
</script>
</body>
</html>

























