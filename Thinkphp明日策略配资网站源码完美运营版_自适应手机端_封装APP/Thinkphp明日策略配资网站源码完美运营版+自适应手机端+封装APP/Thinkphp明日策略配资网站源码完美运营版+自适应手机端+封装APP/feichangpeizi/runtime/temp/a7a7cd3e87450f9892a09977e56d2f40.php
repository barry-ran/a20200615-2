<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/www/wwwroot/feichangpeizi/application/index/view/ucenter/mobile/home.html";i:1540755698;}*/ ?>
<!doctype html>
<html style="height: 100%;">
  
<head>
	<meta charset="UTF-8">
	<title>金龙策略</title>
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<link href="/public/static/home/css/mui.min.css" rel="stylesheet" />
		<link href="/public/static/home/css/moblie/person.css" rel="stylesheet" />
	</head>
<!--个人中心-->
	<body style="height: 100%;display: inline-block;width: 100%;">
		<div class="bg" style="min-height: 100%;margin-bottom: -50px;">
			<header class="person_header mui-bar mui-bar-nav">
			    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			    <h1 class="mui-title">我的</h1>
			</header>
			<div class="person_content mui-content" style="min-height: 100%;">
			    <div class="per_top mui-text-center">
			    	<form name="user_head" id="user_head">
						<input type="file" name="headImg" id="img_upload" multiple="multiple" />
						<div class="img_download">
							<img src="<?php echo (isset($member['headImg']) && ($member['headImg'] !== '')?$member['headImg']:'/public/static/home/img/user.png'); ?>" id="headImg">
						</div>
					</form>
			    	<!--<img src="/public/static/home/img/moblie/name.png"/>-->
			    	<p class="username"><?php echo $_SESSION['member']['username']; ?></p>
			    	<p>账户余额(元):<span id="balance"><?php echo $member['usableSum']; ?></span></p>
			    	<div class="top_btn">
			    		<a href="/ucenter/payment.html" type="button" class="mui-btn  mui-btn-block">充值</a>
			    		<a href="/ucenter/withdraw.html" type="button" class="mui-btn  mui-btn-block">提现</a>
			    	</div>
			    </div>
			    <ul class="mui-table-view">
		        <li class="mui-table-view-cell">
		            <a href="/ucenter/index.html" class="mui-navigate-right">
		                资金明细   
		            </a>
		        </li>
		        <li class="mui-table-view-cell">
		            <a href="/ucenter/user_info.html" class="mui-navigate-right">
		                 实名认证
		            </a>
		        </li>
		         <li class="mui-table-view-cell">
		            <a href="/ucenter/bankcards.html" class="mui-navigate-right" id="aaa">
		                 银行卡管理
		            </a>
		        </li>
                    <li class="mui-table-view-cell">
		            <a href="/protocol_1.html" class="mui-navigate-right" id="aaa">
		                 资费标准
		            </a>
                  </li>
                    <li class="mui-table-view-cell">
		            <a href="/protocol_2.html" class="mui-navigate-right" id="aaa">
		                 合作协议
		            </a>
                  </li>
                    <li class="mui-table-view-cell">
		            <a href="/protocol_3.html" class="mui-navigate-right" id="aaa">
		                 服务协议
		            </a>
                  </li>
		     
		        </li>
		        <li class="mui-table-view-cell mui-text-center li_last">
		            <a href="/index/index/logout.html" style="color: #F5191D;" id="loginbtn">
		                 退出登录
		            </a>
		        </li>
		        
		    </ul>
			</div>
		</div>
		<nav class="ml_tab mui-bar mui-bar-tab">
			    <a class="mui-tab-item" href="/index.html">
			        <span class="mui-icon mui-icon-home"></span>
			        <span class="mui-tab-label">首页</span>
			    </a>
			    <a class="mui-tab-item" href="/buy.html">
			        <span class="mui-icon mui-icon-phone"></span>
			        <span class="mui-tab-label">A股点买</span>
			    </a>
			    <a class="mui-tab-item mui-active" href="/ucenter/home.html">
			        <span class="mui-icon mui-icon-email"></span>
			        <span class="mui-tab-label" id="abc">我的</span>
			    </a>
			</nav>
		   	<!--<a href="/index/index/logout.html" type="button" class="login_out mui-btn mui-btn-block">退出登录</a>-->

		<!---js---->
		<script src="/public/static/libs/jquery-2.2.0/jquery-2.2.0.min.js"></script>
		<script src="/public/static/home/js/moblie/jquery.ajaxfileupload.js"></script>
		<script src="/public/static/home/js/moblie/mui.min.js"></script>
		<!--<script src="/public/static/home/js/moblie/person.js"></script>-->
		<script type="text/javascript">
			mui.init({
				swipeBack: true //启用右滑关闭功能
			})
			//选项卡
			 mui('body').on('tap', 'a', function() {
	                    var data_href = this.getAttribute("data-href");
	                    var href = this.getAttribute("href");
	                    var url=data_href;
	                    if(!url||url==''){
	                        url=href;
	                    }
	                    if(url != null){
             	      window.location.href = url;
                   }
                   else{
                     var browser = api.require('webBrowser');
                            browser.historyBack(
                              function(ret, err) {
                                  if (!ret.status) {
                                      api.closeWin();
                                  }
                              }
                            );
                   }
	         });
		/**
		 * 上传头像
		 */
        $('#img_upload').AjaxFileUpload({
			//处理文件上传操作的服务器端地址
			action: '/index/index/doImgUpload',
			onComplete: function(filename, resp) { //服务器响应成功时的处理函数
				if(resp.code == '0') {
					$('#headImg').attr('src', resp.data);
					var params = {};
					params['headImg'] = resp.data;
					$.post("/index/ucenter/savePeopleImg", params, function(data) {
						if(data.code == '0') {
							mui.toast("修改成功");
						} else {
							mui.alert(data.msg);
						}
					}, 'json');
				} else {
					mui.alert(resp.msg );
				}
			}
		});

//			console.log(window.innerHeight + window.scrollY - $("nav").outerHeight())
//			$('nav').css({'position': 'absolute','top':top })
//			function bodyHeight(height){
//					$('body').css({'height':height});
//					$('body').css({'height':'600px'});
//					$('#aaa').css({'color':'pink'})
//					var top=window.innerHeight + window.scrollY - $("nav").outerHeight()
//					$('nav').css({'position': 'absolute','top':top })
//			}

		</script>
	</body>
</html>