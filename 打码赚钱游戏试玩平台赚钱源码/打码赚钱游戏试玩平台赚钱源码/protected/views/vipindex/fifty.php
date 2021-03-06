<?php echo TITBB; ?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>绑定支付方式-<?php echo TIT; ?>官方网站</title>
        <meta name="keywords" content="\" />
              <meta name="description" content="\" />
              <link rel="shortcut icon" href="/Favicon.ico" type="image/x-icon"/>
            <link href="/style/vip/info.css" rel="stylesheet" type="text/css" />
            <script src="/scripts/vip/jQuery.v1.8.3.js"></script>
            <script src="/scripts/vip/info.js"></script>
            <style type="text/css">
                div .errorMessage{color:red;}
            </style>
            <script type="text/javascript">
                window.onload = function() {
                    var type = '<?php echo $type ?>';
                    if (type == "") {
                        $("#con_two_1").show();
                        $("#con_two_2").hide();
                        $("#con_two_2").hide();
                    } else if (type == 2) {
                        $("#con_two_2").show();
                        $("#con_two_1").hide();
                        $("#con_two_3").hide();
                    } else if (type == 3) {
                        $("#con_two_3").show();
                        $("#con_two_1").hide();
                        $("#con_two_2").hide();
                    }
                }
            </script>
    </head>
    <body>
        <!--头部-->
        <?php include_once("./protected/views/vipdesign/header.php") ?>
        <div class="main clearfix">
            <!--导航-->
            <?php include_once("./protected/views/vipdesign/navicat.php") ?>
            <?php $system_info = System::model()->findByPk(1) ?>
            <div class="db">
                <!--步骤-->
                <div class="list_1">
                    <div class="step step_4"></div>
                    <ul class="step_text clearfix">
                        <li>
                            <p class="p_1">完善个人资料</p>
                            <p class="p_2"><?php echo $system_info["first"]; ?>元宝</p>
                        </li>

                        <li>
                            <p class="p_1">验证邮箱</p>
                            <p class="p_2"><?php echo $system_info["thirdly"]; ?>元宝</p>
                        </li>
                        <li>
                            <p class="p_1">设置交易密码</p>
                            <p class="p_2"><?php echo $system_info["fourthly"]; ?>元宝</p>
                        </li>
                        <li>
                            <p class="p_1">绑定支付方式</p>
                            <p class="p_2"><?php echo $system_info["fifty"]; ?>元宝</p>
                        </li>
                        <li>
                            <p class="p_1">绑定手机号</p>
                            <p class="p_2"><?php echo $system_info["second"]; ?>元宝</p>
                        </li>						
						
                    </ul>
                </div>
                <!--内容-->
                <div class="content">
                    <div class="tit">
                        <span class="s">04&nbsp;</span>
                        <span class="t">绑定支付方式奖励</span>
                        <span class="h"><?php echo $system_info["fifty"]; ?>元宝</span>
                    </div>
                    <div class="cont">
                        <ul class="prompt">
                            <li>需要<i class="red">至少绑定一种支付方式</i>，否则将无法使用“申请提现”功能。</li>
                            <li>以下资料绑定后，可以在<i class="red">会员中心进行更改绑定设置</i>。</li>
                        </ul>
                        <div class="methods clearfix">
                            <span <?php
                            if (empty($type)) {
                                echo "class='hover'";
                            }
                            ?> id="two1" onclick="setTab('two', 1, 3)">绑定支付宝<i class="ico"></i></span>
                            <!--<span  <?php
                            if ($type == 2) {
                                echo "class='hover'";
                            }
                            ?> id="two2" onclick="setTab('two', 2, 3)">绑定财付通<i class="ico"></i></span>
                            <span  <?php
                            if ($type == 3) {
                                echo "class='hover'";
                            }
                            ?>  id="two3" onclick="setTab('two', 3, 3)">绑定银行卡<i class="ico"></i></span>-->
                        </div>
                        <?php
                        $form1 = $this->beginWidget('CActiveForm', array('id' => 'alipay'));
                        ?>
                        <ul class="input_k clearfix" id="con_two_1">
                            <li class="li_1 clearfix">
                                <span class="name">姓名：</span>
                                <span class="sr">
                                    <?php echo $form1->textField($memalipay_model, 'name', array('class' => 'sframe sframe_1')); ?>
                                </span>
                                <?php $name = $memalipay_model->getError("name"); ?>
                                <span class="zs <?php
                                if (!empty($name)) {
                                    echo "red";
                                }
                                ?>"><i>*&nbsp;</i>
                                          <?php
                                          if (!empty($name)) {
                                              echo $name;
                                          } else {
                                              echo "请务必填写您的真实姓名";
                                          }
                                          ?>
                                </span>
                            </li>
                            <li class="li_1 clearfix">
                                <span class="name">账号：</span>
                                <span class="sr">
                                <?php echo $form1->textField($memalipay_model, 'account', array('class' => 'sframe sframe_1')); ?>
                                </span>
                                <?php $account = $memalipay_model->getError("account"); ?>
                                <span class="zs <?php
                                          if (!empty($account)) {
                                              echo "red";
                                          }
                                          ?>"><i>*&nbsp;</i>
                                          <?php
                                          if (!empty($account)) {
                                              echo $account;
                                          } else {
                                              echo "请输入支付宝登陆账号";
                                          }
                                          ?>
                                </span>

                            </li>
                            <li class="li_1 clearfix">
                                <span class="name">确认账号：</span>
                                <span class="sr">
                                <?php echo $form1->textField($memalipay_model, 'account2', array('class' => 'sframe sframe_1')); ?>
                                </span>

                                          <?php $account2 = $memalipay_model->getError("account2"); ?>
                                <span class="zs <?php
                                          if (!empty($account2)) {
                                              echo "red";
                                          }
                                          ?>"><i>*&nbsp;</i>
                                          <?php
                                          if (!empty($account2)) {
                                              echo $account2;
                                          } else {
                                              echo "请再次输入支付宝登陆账号";
                                          }
                                          ?>
                                </span>
                            </li>
                            <li class="li_2">
                                <a class="ann_1"  href="javascript:document.getElementById('alipay').submit();" >确定</a>
                            </li>
                        </ul>
<?php
$this->endWidget();
$form2 = $this->beginWidget('CActiveForm', array('id' => 'treasure'));
?>
                        <ul class="input_k clearfix" id="con_two_2" style="display:none">
                            <li class="li_1 clearfix">
                                <span class="name">姓名：</span>
                                <span class="sr">
                                      <?php echo $form2->textField($memtreasure_model, 'name', array('class' => 'sframe sframe_1')); ?>
                                </span>

                                          <?php $name1 = $memtreasure_model->getError("name"); ?>
                                <span class="zs <?php
                                          if (!empty($account2)) {
                                              echo "red";
                                          }
                                          ?>"><i>*&nbsp;</i>
<?php
if (!empty($name1)) {
    echo $name1;
} else {
    echo "请务必填写您的真实姓名";
}
?>
                                </span>
                            </li>
                            <li class="li_1 clearfix">
                                <span class="name">账号：</span>
                                <span class="sr">
                                          <?php echo $form2->textField($memtreasure_model, 'account', array('class' => 'sframe sframe_1')); ?>
                                </span>
                                          <?php $account3 = $memtreasure_model->getError("account"); ?>
                                <span class="zs <?php
                                          if (!empty($account2)) {
                                              echo "red";
                                          }
                                          ?>"><i>*&nbsp;</i>
<?php
if (!empty($account3)) {
    echo $account3;
} else {
    echo "请输入财付通登陆账号";
}
?>
                                </span>
                            </li>
                            <li class="li_1 clearfix">
                                <span class="name">确认账号：</span>
                                <span class="sr">
                                          <?php echo $form2->textField($memtreasure_model, 'account2', array('class' => 'sframe sframe_1')); ?>
                                </span>

                                          <?php $account4 = $memtreasure_model->getError("account2"); ?>
                                <span class="zs <?php
                                          if (!empty($account2)) {
                                              echo "red";
                                          }
                                          ?>"><i>*&nbsp;</i>
                        <?php
                        if (!empty($account4)) {
                            echo $account4;
                        } else {
                            echo "请再次输入财付通登陆账号";
                        }
                        ?>
                                </span>
                            </li>
                            <li class="li_2">
                                <a class="ann_1"  href="javascript:document.getElementById('treasure').submit();" >确定</a>
                            </li>
                        </ul>
<?php
$this->endWidget();
$form3 = $this->beginWidget('CActiveForm', array('id' => 'bank'));
?>
                        <ul class="input_k clearfix" id="con_two_3" style="display:none;">
                            <li class="li_1 clearfix">
                                <span class="name">银行：</span>
                                <span class="sr">
                                    <select class="sframe sframe_1"  id="Membank_bank" name="Membank[bank]">
                                        <option value="中国银行">中国银行</option>
                                        <option value="工商银行">工商银行</option>
                                        <option value="建设银行">建设银行</option>
                                        <option value="农业银行">农业银行</option>
                                        <option value="招商银行">招商银行</option>
                                        <option value="平安银行">平安银行</option>
                                        <option value="交通银行">交通银行</option>
                                        <option value="广发银行">广发银行</option>
                                        <option value="中信银行">中信银行</option>
                                        <option value="邮政储蓄">邮政储蓄</option>
                                        <option value="农村信用社">农村信用社</option>
                                    </select>
                                </span>
<?php $bank = $membank_model->getError("bank"); ?>
                                <span class="zs <?php
if (!empty($account2)) {
    echo "red";
}
?>"><i>*&nbsp;</i>
<?php
if (!empty($bank)) {
    echo $bank;
} else {
    echo "请选择相关银行";
}
?>
                                </span>
                            </li>
                            <li class="li_1 clearfix">
                                <span class="name">开户银行：</span>
                                <span class="sr">
                                          <?php echo $form3->textField($membank_model, 'banksub', array('class' => 'sframe sframe_1')); ?>

                                </span>

<?php $banksub = $membank_model->getError("banksub"); ?>
                                <span class="zs <?php
if (!empty($account2)) {
    echo "red";
}
?>"><i>*&nbsp;</i>
                                <?php
                                if (!empty($banksub)) {
                                    echo $banksub;
                                } else {
                                    echo "请填写相关开户行银行";
                                }
                                ?>
                                </span>

                            </li>
                            <li class="li_1 clearfix">
                                <span class="name">姓名：</span>
                                <span class="sr">
<?php echo $form3->textField($membank_model, 'name', array('class' => 'sframe sframe_1')); ?>
                                </span>

                                    <?php $name3 = $membank_model->getError("name"); ?>
                                <span class="zs <?php
                                if (!empty($name3)) {
                                    echo "red";
                                }
                                ?>"><i>*&nbsp;</i>
                                          <?php
                                          if (!empty($name3)) {
                                              echo $name3;
                                          } else {
                                              echo "请务必填写您的真实姓名";
                                          }
                                          ?>
                                </span>
                            </li>
                            <li class="li_1 clearfix">
                                <span class="name">卡号：</span>
                                <span class="sr">
                                    <?php echo $form3->textField($membank_model, 'account', array('class' => 'sframe sframe_1')); ?>
                                </span>
                                <?php $account5 = $membank_model->getError("account"); ?>
                                <span class="zs <?php
                                if (!empty($account5)) {
                                    echo "red";
                                }
                                ?>"><i>*&nbsp;</i>
                                          <?php
                                          if (!empty($account5)) {
                                              echo $account5;
                                          } else {
                                              echo "请输入银行卡号";
                                          }
                                          ?>
                                </span>
                            </li>
                            <li class="li_1 clearfix">
                                <span class="name">确认卡号：</span>
                                <span class="sr">
<?php echo $form3->textField($membank_model, 'account2', array('class' => 'sframe sframe_1')); ?>
                                </span>
<?php $account6 = $membank_model->getError("account2"); ?>
                                <span class="zs <?php
if (!empty($account2)) {
    echo "red";
}
?>"><i>*&nbsp;</i>
<?php
if (!empty($account6)) {
    echo $account6;
} else {
    echo "请再次输入银行卡号";
}
?>
                                </span>
                            </li>
                            <li class="li_2">
                                <a class="ann_1"  href="javascript:document.getElementById('bank').submit();" >确定</a>
                            </li>
                        </ul>
<?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!--底部1-->
<?php include_once("./protected/views/vipdesign/footer.php"); ?>
<?php include_once("./protected/views/vipdesign/kefu.php") ?>
    </body>
</html>
