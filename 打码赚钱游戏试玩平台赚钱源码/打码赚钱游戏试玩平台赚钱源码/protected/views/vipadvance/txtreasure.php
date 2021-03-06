<?php echo TITBB; ?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" ></meta>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>个人中心—提现管理—申请提现—<?php echo TIT; ?>官方网站</title>
        <meta name="keywords" content="/" />
        <meta name="description" content="/" />
        <link rel="shortcut icon" href="/Favicon.ico" type="image/x-icon"/>
        <link href="/style/vip/public.css" rel="stylesheet" type="text/css" />
        <link href="/style/vip/inside.css" rel="stylesheet" type="text/css" />
        <script src="/scripts/vip/jQuery.v1.8.3.js"></script>
        <script src="/scripts/vip/public.js"></script>
        <style type="text/css">
            .hover3{border-top:4px solid #70a0f1; height:36px; line-height:36px; background:#4b6289;}
            .hover20{background: url("<?php echo IMG_URL ?>vip/img/public_db _menu_left _j.png") no-repeat scroll right center #fff; color: #cc3d12;width:171px;}
        </style>
        <script type="text/javascript">
            //兑换成功提示框
            function close() {
                $("#msgsuc").hide();
                location.href = '<?php echo SITE_URL ?>vipadvance/detail';
            }

            window.onload = function() {
                var msg = $('#msg').val();
                if (msg == "success") {
                    $("#msgsuc").show();
                }
            }
        </script>
    </head>
    <body>
        <!--头部-->
        <?php include_once("./protected/views/vipdesign/header.php"); ?>
        <!--主体-->
        <div class="main clearfix">
            <!--导航-->
            <?php include_once("./protected/views/vipdesign/navicat.php"); ?>
            <div class="public_db clearfix">
                <!--左菜单-->
                <?php include_once("left.php") ?>
                <?php $info = System::model()->findByPk(1); ?>
                <!--右内容-->
                <div class="cont prizes">
                    <!--标题注释-->
                    <div class="tit">
                        <p class="p_1">
                            <span class="zhu_1">提示：您当前<i class="red_1"><?php echo number_format(intval($hlbnum)); ?>元宝</i>,最多可提现<i class="red_1"><?php
                                    echo number_format(intval($hlbnum / 10000));
                                    ?>元！</i>
                            </span>
                        </p>
                    </div>
                    <!--切换-->
                    <div class="switch clearfix" style=" margin-top:10px;">
                        <ul class="ul_2 clearfix">
                            <li ><a href="<?php echo SITE_URL ?>vipadvance/txalipay">支付宝提现</a></li>
                            <li class="hover" style="border-left:1px solid #bdbcbd;"><a href="<?php echo SITE_URL ?>vipadvance/txtreasure">财付通提现</a></li>
                            <li><a href="<?php echo SITE_URL ?>vipadvance/txbank">银行卡提现</a></li>
                        </ul>
                    </div>
                    <?php
                    if (Yii::app()->user->hasFlash('msg')) {
                        ?>
                        <input type="hidden" value="<?php echo Yii::app()->user->getFlash('msg') ?>" id="msg" />
                    <?php } ?>
                    <?php
                    $tx_info = Tx::model()->findBySql("select * from {{tx}} where mem_id=" . $mem [ "id"] . " and starts='待支付'" );
                    if (empty($tx_info)) {
                    if (!empty($mem["jy_pwd"])) {
                    if (!empty($tresure_info)) {
                    $form = $this->beginWidget('CActiveForm', array('id' => 'dhform'));
                    ?>
                    <div class="alipay clearfix">
                        <input type="hidden" value="<?php echo $mem['id']; ?>"  name="Tx[mem_id]"/>
                        <input type="hidden" value="<?php echo $tresure_info["account"]; ?>" name="Tx[account]"/>
                        <input type="hidden" value="<?php echo $tresure_info["name"]; ?>"  name="Tx[name]"/>
                        <ul class="ul_1 clearfix">
                            <li class="clearfix">
                                <span class="name">财付通账号：</span>
                                <span class="text_1">
                                    <input type="text" class="sframe inp_1"  value="<?php echo $tresure_info["account"]; ?>"   disabled="disabled" />
                                </span>
                            </li>
                            <li class="clearfix">
                                <span class="name">财付通姓名：</span>
                                <span class="text_1">
                                    <input type="text" class="sframe inp_1" value="<?php echo $tresure_info["name"]; ?>"   disabled="disabled" />
                                </span>
                            </li>
                            <li class="clearfix" id="con_tow_1">
                                <span class="name">提现金额：</span>
                                <span class="text_1">
                                    <input type="text" class="sframe inp_1"  id="Tx_applymoney" name="Tx[applymoney]" />
                                </span>
                                <span class="zs"><i>*</i>提现金额最低为2元</span>
                            </li>
                            <li class="tishi" style="display:block;"><?php echo $form->error($tx_model, 'applymoney'); ?></li>
                            <li class="clearfix">
                                <span class="name">交易密码：</span>
                                <span class="text_1">
                                    <?php echo $form->passwordField($tx_model, 'jy_pwd', array( 'class' =>  'sframe inp_2')); ?>
                                </span>
                                <span class="zs"><i>*</i>、交易密码</span>
                            </li>
                            <li class="tishi" style="display:block;"><?php echo $form->error($tx_model, 'jy_pwd'); ?></li>
                                    <li  class="clearfix">
                                        <a class="button_2 ann_3" href="javascript:document.getElementById('dhform').submit();">确定</a>
                                        <span class="z">
                                            提现大于  <?php echo $info['money'] ?>元（包含<?php echo $info['money'] ?>元）免手续费、小于<?php echo $info['money'] ?> 元
                                    每笔手续<?php echo $info['fee'] ?>元手续费。
                                </span>
                            </li>
                        </ul>
                    </div>
                    <?php $this->endWidget(); ?>
                    <!--说明-->
                    <div class="explain clearfix">
                        <div class="tit_1">
                            <p class="p_1"><i><?php echo $mem['mem_name']; ?></i>，您好！</p>
                            <p class="p_2">您已经同意了本站的<a href="<?php echo SITE_URL; ?>index/txxieyi" target="_blank" style="color:red;">提现协议</a>，可以申请提现！</p>
                        </div>
                        <div class="text">
                            <p>提现须知： </p>
                            <p class="red">1.元宝最小提现金额2元（20,000元宝）；金券最小提现金额20元（2000金券）</p>
                            <p>2.支付宝、财付通申请提现大于20元（包含20元）免手续费、小于20元每笔0.5元手续费。银行卡提现免手续费。用户首次提现免手续费！</p>
                            <p>3.提现前请确认自己的收款账号无误，我们只支付一次，支付后由于收款账号问题造成的资金退回、冻结、消失本站概不负责。</p>
                            <p class="chu">重磅推出：元宝单笔提现金额<i class="red">满100元送2元、满300元送6元、满600元送13元、满800元送18元、满1000元送24元</i>。小积累大收入！</p>
                            <p>注：用户首次提现任意金额免手续费，以后按正常方式进行！</p>
                        </div>
                    </div>
                    <?php } else { ?>
                    <span>您还没有绑定财付通,不能用财付通提现!</span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo SITE_URL ?>vipadvance/treasure" ><span style="color:red">立即绑定财付通</span></a>
                    <?php } ?>
                    <?php
                    } else {
                    ?>
                    <span>设置交易密码后才能提现!</span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo SITE_URL ?>vipindex/fourthly" target="_blank"><span style="color:red">立即设置交易密码</span></a>
                    <?php
                    }
                    } else {
                    ?>
                    您<span style="color:red;"> <?php echo $tx_info["create_time"]; ?></span>使用<?php
                    if ($tx_info["way"] == 1) {
                    echo "支付宝";
                    } else if ($tx_info["way"] == 2) {
                    echo "财付通";
                    } else {
                    echo "银行";
                    }
                    ?>提现的<span style="color:red;"> <?php echo $tx_info["applymoney"]; ?></span>元正在处理中，不能再次申请提现！我们将在24小时之内处理您的提现申请！      
                    <?php } ?>
                </div>
            </div>
            <?php
            if (!empty($ad_info)) {
            foreach ($ad_info as $ad) {
            ?>
            <a class="advertising_1" href="<?php echo $ad['url']; ?>">
                <img src="/uploads/img/ad/<?php echo $ad['img']; ?>">
            </a>
            <?php
            }
                    }
            ?>
        </div>
        <!--底部1-->
        <?php include_once("./protected/views/vipdesign/footer.php"); ?>
        <?php include_once("./protected/views/vipdesign/kefu.php") ?>
        <!--申请提现成功弹出框-->
        <div class="eject_db4" style="display:none" id="msgsuc">
            <!--申请提现成功弹出框背景-->
            <div class="eject_bk3" style="display:block"></div>
            <!--申请提现成功弹出框-->
            <div class="eject3" style="display:b lock">
                <div class="eject1_tit">提现成功！</div>
                <div class="eject1_text3 clearfix">
                    我们将会在24小时之内处理，请注意查收哦！
                </div>
                <div class="eject1_button clearfix">
                    <a href="javascript:close();" class="eject1_ann">确认</a>
                </div>
            </div>
        </div>
    </body>
</html>
