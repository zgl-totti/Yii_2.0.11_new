

<div style="width:1200px;margin-top:20px;">
    <div style="width:960px;float: left;height:800px;margin-top:-10px;">
        <div style="height:40px;line-height:40px;font-size:20px;margin-top:15px;padding-left:30px;">
            <span style="border-bottom:2px solid red;">我的会员等级</span>
        </div>
        <div style="width:900px;height:500px;border:1px solid gray;">
            <div style="float: left;width:40%;height:480px;">
                <div style="height:40px;margin-top:30px;">
                    <span style="padding-left:30px;line-height:40px;font-size:24px;">用户名:</span>
                    <span style="padding-left:30px;font-size:20px;"><?=\yii\helpers\Html::encode($info['username'])?></span>
                </div>
                <div style="height:40px;margin-top:30px;">
                    <span style="padding-left:30px;line-height:40px;font-size:24px;">性别:</span>
                    <?php if(\yii\helpers\Html::encode($info['gender'])==0): ?>
                        <span style="padding-left:30px;font-size:20px;">男</span>
                    <?php elseif(\yii\helpers\Html::encode($info['gender'])==1): ?>
                        <span style="padding-left:30px;font-size:20px;">女</span>
                    <?php else: ?>
                        <span style="padding-left:30px;font-size:20px;">保密</span>
                    <?php endif;?>
                </div>
                <div style="height:40px;margin-top:30px;">
                    <span style="padding-left:30px;line-height:40px;font-size:24px;">会员等级:</span>
                    <span style="padding-left:30px;font-size:20px;font-weight:bolder;color:red;"><?=\yii\helpers\Html::encode($info['level']['level_name'])?></span>
                </div>
                <div style="height:40px;margin-top:30px;">
                    <span style="padding-left:30px;line-height:40px;font-size:24px;">当前消费额度:</span>
                    <span style="padding-left:30px;font-size:24px;color:#FF7200"><?=\yii\helpers\Html::encode($info['costs'])?></span>
                </div>
            </div>
            <div style="float: right;width:60%;height:480px;">
                <div style="height:40px;margin-top:30px;">
                    <span style="padding-left:20px;line-height:40px;font-size:24px;">等级规则:</span>
                    <div style="height:400px;margin-left:30px;margin-top:20px;">
                        <span style="padding-left:20px;line-height:40px;font-size:16px;">
                            <font color="#EF1C55">0~2999</font>&nbsp;&nbsp;
                            <font size="4" color="#FF7200">为普通会员</font>&nbsp;&nbsp;
                                <font color="#EF1C55">享受99折</font>&nbsp;&nbsp;
                        </span><br/>
                       <span style="padding-left:20px;line-height:40px;font-size:16px;">
                            <font color="#EF1C55">2999~4999</font>&nbsp;&nbsp;
                            <font size="4" color="#FF7200">为黄铜会员</font>&nbsp;&nbsp;
                            <font color="#EF1C55">享受96折</font>
                        </span><br/>
                        <span style="padding-left:20px;line-height:40px;font-size:16px;">
                            <font color="#EF1C55">4999~7999</font>&nbsp;&nbsp;
                            <font size="4" color="#FF7200">为白银会员</font>&nbsp;&nbsp;
                                <font color="#EF1C55">享受92折</font>&nbsp;&nbsp;
                        </span><br/>
                       <span style="padding-left:20px;line-height:40px;font-size:16px;">
                            <font color="#EF1C55">7999~9999</font>&nbsp;&nbsp;
                           <font size="4" color="#FF7200">为黄金会员</font>&nbsp;&nbsp;
                            <font color="#EF1C55">享受89折</font>&nbsp;&nbsp;
                        </span><br/>
                        <span style="padding-left:20px;line-height:40px;font-size:16px;">
                            <font color="#EF1C55">10000~~~</font>&nbsp;&nbsp;
                            <font size="4" color="#FF7200">为钻石会员</font>&nbsp;&nbsp;
                            <font color="#EF1C55">享受85折</font>&nbsp;&nbsp;
                        </span><br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="clear:both"></div>