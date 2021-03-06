<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/www/wwwroot/feichangpeizi/application/index/view/ucenter/mobile/payment.html";i:1540271982;}*/ ?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>金龙策略</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="/public/static/home/css/mui.min.css" rel="stylesheet" />
		<link href="/public/static/home/css/moblie/payment.css" rel="stylesheet" />
	</head>
<!--个人中心-充值-->
	<body class="payment_body">    
		<header class="mui-bar mui-bar-nav">
		    <a class="red_back mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		    <h1 class="mui-title">账户充值</h1>
		</header>
		<div class="mui-content">
		    <p class="payType">选择充值方式</p>
			<ul class="mui-table-view">
			    <li class="mui-table-view-cell mui-media">
			        <a href="/ucenter/quick_pay.html">
			            <img class="yl mui-media-object mui-pull-left" src="/public/static/home/img/moblie/yl.png">
			            <div class="mui-media-body">
			               网银支付
			                <p class="mui-ellipsis">快速安全，24小时支付</p>
			            </div>
			        </a>
			    </li>
			    <li class="mui-table-view-cell mui-media">
			        <a href="/ucenter/re_tip.html">
			            <img class="zfb mui-media-object mui-pull-left" src="/public/static/home/img/moblie/zfb.png">
			            <div class="mui-media-body">
			                支付宝支付
			                <p class="mui-ellipsis">快速安全，24小时支付</p>
			            </div>
			        </a>
			    <!---</li>
			     <li class="mui-table-view-cell mui-media">
			        <a href="/ucenter/wechatpay.html">
			            <img class="zfb mui-media-object mui-pull-left" src="/public/static/home/img/moblie/wx.png">
			            <div class="mui-media-body">
			                微信支付
			                <p class="mui-ellipsis">快速安全，24小时支付</p>
			            </div>
			        </a>
			    </li>
			</ul>
		</div>
		
		
	
		
		<!---js---->
		<script src="/public/static/home/js/moblie/mui.min.js"></script>
		<script type="text/javascript">
			mui.init({
				swipeBack: true //启用右滑关闭功能
			})
		</script>
	</body>
</html>