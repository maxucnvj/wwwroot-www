      <div class="side-bar pull-left">
      <div class="title"><h5>个人中心</h5></div>
        <div class="head-img">
          <img src="{$userinfo.picture}">
            <p class="text-44">{$userinfo.nickname}</p>
            <p class="text-aa text-f12">{$userinfo.integral}积分</p>
        </div>
        <ul class="side-nav">
          <li><a href="{geturl('user|run')}">我的订单</a></li> 
          <li><a href="#">账户中心</a></li> 
          <li><a href="#">个人资料</a></li> 
          <li><a href="{geturl('user|myaddress')}">我的地址管理</a></li>
          <li><a href="{geturl('user|changepaypass')}">修改支付密码</a></li>    
          <li><a href="#">我的代金券</a></li>  
          <li><a href="#">安全设置</a></li> 
          <li><a href="#">服务消息</a></li>
          <li><a href="#">意见反馈</a></li> 
        </ul>
    </div>