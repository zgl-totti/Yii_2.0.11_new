<?=\yii\helpers\Html::jsFile('@web/js/jquery.countdown.min.js')?>
<style type="text/css">
    .active1{
        background-color: red;
        color: white;
    }
    label{
        cursor: pointer;
    }
</style>
<script type="text/javascript">
    //立即兑换
    function addToBuy(){
        //判断用户是否登陆过
        var mid=$('#mid').val();
        if( mid){
            $.post("{:U('Order/toBuyCreateOrder')}",$("#saleForm").serialize(),function(res){
                if(res.status=="ok"){
                    layer.msg(res.msg,{icon:6,time:2000},function(){
                        window.location.href="{:U('Order/showlist')}?oid="+res.oid;
                    })
                }else{
                    layer.alert(res.msg,{icon:4})
                }
            });
        }else{
            layer.alert("登陆成功后才能抢购",{icon:4},function(){
                layer.open({
                    type:2,
                    title:"",
                    skin:'demo-class',
                    area:["480px","56%"],
                    shadeClose: true,
                    shade: 0.8,
                    content:"<?=\yii\helpers\Url::to(['sale/login'])?>"
                })
            })
        }
    }
</script>
<body>

<!--团购详细样式-->
<div class="Inside_pages">
    <div class="Location_link">
        <em></em><a href="#">限时抢购商品</a>
    </div>
    <div class="clearfix detail_main " id="goodsInfo">
        <!--图片展示样式-->
        <div class=" left">
            <div class="picFocus">
                <div class="bd">
                    <ul>
                        <li>
                            <a target="_blank" href="#">
                                <img src="<?=\yii\helpers\Url::to('@web/uploads/goods/thumb350/350_').\yii\helpers\Html::encode($info['goods']['pic'])?>" />
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="hd">
                    <ul>
                        <?php foreach($info['pics'] as $v): ?>
                            <li><a target="_blank" href="#">
                                <img src="<?=\yii\helpers\Url::to('@web/uploads/goods/thumb350/350_').\yii\helpers\Html::encode($v['picname'])?>" /></a>
                            </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
            <script type="text/javascript">jQuery(".picFocus").slide({ mainCell:".bd ul",autoPlay:false });</script>
        </div>
        <form action="{:U('Order/toBuyCreateOrder')}" method="post" id="saleForm">
            <input type="hidden" id="mid" value="<?=\yii\helpers\Html::encode($this->params['info']['id'])?>"/>
        <input name="gid" id="gid" type="hidden" value="<?=\yii\helpers\Html::encode($info['gid'])?>">
        <input name="price" type="hidden" value="<?=\yii\helpers\Html::encode($info['goods']['price'])?>">
        <div class="left main_box">
            <h2 class="title">[限时抢购 八折优惠]<?=\yii\helpers\Html::encode($info['goods']['goodsname'])?>（每个ID限购5件）</h2>
            <div class="time">
                <input id="endTime" type="hidden" value="<?=\yii\helpers\Html::encode($info['endtime'])?>">
                <input id="TIME" type="hidden" value="<?=time();?>">
                <div class="icon_time"></div><span style="color:#ff635b;" id="shijian"></span></div>
            <div class="Numbers">购买数量
                <a href="javascript:void(0);" id="min">-</a>
                <input id="text_box" name="buynum" type="text" value="1" class="number_text">
                <a href="javascript:void(0);" id="add">+</a>
                <span style="color:#ff635b;">最多购买五件商品</span>
            </div>
            <div class="status_banner">
                <div class="currentPrice"> <small>¥</small><?=\yii\helpers\Html::encode($info['goods']['price'])*0.8;?></div>
                <div class="left"><del class="originPrice">¥<?=\yii\helpers\Html::encode($info['goods']['marketprice']);?></del></div>
                <div style="padding-left:20px;"><a  style="margin-top:14px;padding-left:20px;" href="javascript:addToBuy()"  class="buyaction J_BuySubmit"><span>马上抢</span></a></div>
            </div>
            <div class="numOfPeople"><span class="num"><?=\yii\helpers\Html::encode($info['goods']['num']);?></span>件已售</div>
        </div>
        </form>
        <script type="text/javascript">
            $(document).ready(function() {
                $(function () {
                    $("#add").click(function () {
                        var t = $('#text_box');
                        t.val(parseInt(t.val()) + 1)
                        if (parseInt(t.val()) > 5) {
                            layer.alert("每个人最多限购五件商品",{icon:4});
                            t.val(5);
                        }
                    })
                    $("#min").click(function () {
                        var t = $('#text_box');
                        t.val(parseInt(t.val()) - 1)
                        if (parseInt(t.val()) < 1) {
                            layer.alert("商品数量至少为一件",{icon:2});
                            t.val(1);
                        }
                    })
                })
            })
        </script>
        <script type="text/javascript">
            //限时促销
            setInterval(changTime, 1000);    //每一秒都循环一次函数
            function changTime(){
                for(i=1;i<=5;i++){
                    $('#shijian').html(getTime());
                }
            }
            function getTime() {
                var now = new Date().getTime(); //获取当前的
                var end = ($('#endTime').val()) * 1000;
                var temp = end - now;
                if (temp <= 0) {
                    return "本次抢购已结束,敬请期待下次活动";
                } else {
                    var temp2 = new Date();
                    temp2.setTime(temp);
                    var sec = Math.floor((temp) / 1000 % 60);
                    var min = Math.floor(temp / (60 * 1000) % 60);
                    var hou = Math.floor(temp / (60 * 60 * 1000) % 24);
                    var day = Math.floor(temp / (24 * 60 * 60 * 1000));
                    return day + " 天 " + hou + " 小时 " + min + " 分钟 " + sec + " 秒";
                }
            }
        </script>
        <!--品牌样式-->
    </div>
    <!--样式-->
    <div class="clearfix">
        <div class="left_style">
            <div class="user_Records">
                <div class="title_name">用户浏览记录</div>
                <ul>
                    <volist name="historyInfo" id="historyList" key="k">
                        <if condition="$k elt 6">
                            <if condition="$historyList['id'] gt 0">
                                <li>
                                    <a href="{:U('Detail/detail',array('gid'=>$historyList['id']))}">
                                        <p><img src="__PUBLIC__/Admin/Uploads/goods/{$historyList['pic']}" data-bd-imgshare-binded="1"></p>
                                        <p class="p_name">{$historyList['goodsname']}</p>
                                    </a>
                                    <p><span class="p_Price"><i>￥</i>{$historyList['price']}</span><b>{$historyList['marketprice']}</b></p>
                                </li>
                            </if>
                        </if>
                    </volist>
                </ul>
            </div>
        </div>
        <div class="right_style">
            <div class="inDetail_boxOut ">
                <div class="inDetail_box">
                    <div class="fixed_out ">

                        <ul class="sit" style="width: 950px;height: 41px;background: white">
                            <li class="active1" style="width: 231px;border: 1px solid #ccc;height: 40px;display: block;font-size: 15px;text-align: center;line-height: 40px;float: left;cursor: pointer">商品详情</li>
                            <li style="width: 231px;border: 1px solid #ccc;height: 40px;display: block;font-size: 15px;text-align: center;line-height: 40px;float: left;cursor: pointer">卖家承诺</li>
                            <li class="sdetail" style="width: 231px;border: 1px solid #ccc;height: 40px;display: block;font-size: 15px;text-align: center;line-height: 40px;float: left;cursor: pointer">买家评论</li>
                        </ul>
                        <div class="subbuy" style="width: 220px;height: 40px;text-align: center">
                            <!--<span class="extra currentPrice">{$detailInfo["price"]}</span>-->
                            <a href="javascript:addToBuy()" class="extra  notice J_BuyButtonSub">立即购买</a></div>
                    </div>
                    <div class="change" style="max-height: 30000px;position: relative">
                        <div class="active2">
                            <?php foreach($info['pics'] as $v): ?>
                                <img src="<?=\yii\helpers\Url::to('@web/uploads/goods/thumb800/800_').\yii\helpers\Html::encode($v['picname'])?>" />
                            <?php endforeach;?>
                        </div>
                        <div style="display: none;text-align: left;width:1000px;line-height: 30px">
                            <pre>
                            <p style="text-align: center">质量安全承诺书</p>
                            为了认真贯彻执行《食品安全法》和《农产品质量安全法》，确保农产品流通安全，本市场（店）郑重承诺：
                            一、严格依照《食品安全法》、《农产品质量安全法》等法律法规从事农产品经营活动，对社会和公众负责，诚信经营，保证所经营农产品的安全，<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;接受社会监督，承担社会责任。
                            二、具有与经营的品种、数量相适应的农产品包装、贮存等场地且符合下列要求：
                            1、经营场所与有毒、有害场所以及其他污染源保持规定距离；
                            2、经营场所与个人生活空间分开；
                            3、经营场所保持内部环境整洁；【水果产品质量承诺书】
                            三、具有与经营的品种、数量相适应防腐、洗涤以及处理废水、存放垃圾和废弃物的设备或者设施且符合下列要求：
                            1、设备及设施空间布局和操作流程设计符合规定，合理布局；
                            2、贮存、运输和装卸农产品的容器、工具和设备安全、无害、保持清洁，符合保证安全所需的温度等特殊要求，不得将农产品与有毒、有害物品一起运输；
                            3、备有数量足够、安全无害的工具、容器，标志明显，防止直接入口农产品与非直接入口农产品类食品、原料与成品交叉污染；
                            4、容器、工具和设备与个人生活用品严格分开。
                            四、建立食品进货查检记录制度。采购农产品时查验供货者的农产品合格的证明文件，并如实记录农产品的名称、规格、数量、供货者名称及联系方<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;式、进货日期等内容，保存期限不少于二年。
                            五、所经营的下列农产品符合农产品质量安全规定的要求。
                            1、蔬菜（含食用菌）、水果类——有机磷类、氨基甲酸脂类农药残留，重金属含量符合质量安全要求。
                            2、畜禽类——不含瘦肉精、莱克多巴胺及激素类。
                            3、水产类——甲醛、氯霉素及重金属含量不超标。
                            六、实行市场准入制度
                            【水果产品质量承诺书】
                            1、创造条件设立检测室，配备配备符合检测要求的速测仪器和专职的检测人员，适时开展农产品质量检测工作，并将检测结果在醒目位置公示。
                            2、对获得国家无公害农产品（产地）、绿色食品、有机食品的食用农产品，凭认证证书和专用标志直接进入市场销售；国外入境上市农产品凭入境<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;检验检疫证书入市销售。
                            3、对行业行政主管部门认定的无公害农产品生产基地的产品和实行定点屠宰并取得检疫合格证的畜产品，实行索证抽检。凭农产品产地认定证书<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;、近期产品检测合格证明和畜产品定点屠宰印章、检疫合格证可以直接进入市场销售；无近期产品检测合格证明的，进行现场抽检，合格后方可进入市场销售。
                            4、对来源于非认证基地的农产品并且未取得任何认证的产品，实行现场检测，由市场开办者进行检测，经检测合格后，进入市场销售。
                            5、不盗用、伪造使用无公害、绿色、有机农产品标示，以及农产品产地证明。
                            七、实行不合格农产品退市制度
                            对检测不合格的农产品，禁止进入市场销售，进行退市、无害化处理或销毁，并向农产品质量监管部门报告。
                            八、实行质量安全结果公示制度
                            应在场内显著位置设立“农产品质量安全公示牌”，对进场销售的农产品质量安全状况进行公示。公示内容包括农产品的品名、产地、质量安全状况等信息。
                            九、实行标识管理制度
                            制作不同标识牌，挂牌销售，推行产品分级包装和产地标识管理。标识牌要注明产品名称、产地、生产者、生产日期、产品质量等内容。
                            十、销售明知是不符合食品安全标准的农产品，承诺赔偿消费者损失，并支付价款十倍的赔偿金。自觉接受群众监督。
                            十一、以上承诺如有违反，自愿接受农产品质量管理部门依照法律法规给予的处罚。
                        </pre></div>
                        <div style="display: none ">
                            <h2 style="font-size: 25px;margin-right: 300px;">全部评论</h2>
                            <d style="display: block;width: 82%;height: 100px;border: 1px solid #c2ccd1;margin-top: 20px">
                                <p style="height: 60%;width:100px;border-right: 1px solid #c2ccd1;margin-top: 20px;text-align: center">评分<br><r style="width: 98px;height: 98px;text-align: center;font-size: 23px;color: orangered">5.0</r></p><p style="margin-bottom: 20px;background: url(__PUBLIC__/Home/images/pf.jpg) no-repeat;width:70%;margin:-35px -30px 80px 230px">
                                0
                            </p>
                            </d>
                            <ul>
                                <br>
                                <form action="" method="get">
                                    <label><input name="Fruit" type="radio" value="" />全部</label>　
                                </form>
                            </ul>
                            <ul class="jiesou" style="margin-top: 50px;color: #6c6c6c">
                                <!--<li style="float: left;width: 1000px"><li>买家评论:{$val.commentcontent}</li><li style="width: 200px;float: right;"> {$val.username}</li></li>
                                <p>{$val['addtime']|date="Y/m/d",###}</p>
                                    <br>
                                <li style="color: orangered;width: 600px">卖家回复:
                                    <if condition="$val['isreply'] eq 1">
                                        {$val['replycontent']}
                                        <else/>
                                        亲的好评对小店来说是多么重要，它是对小店服务的肯定，更是对小店工作的默默支持，它激发了小店追求更高标准的潜力，让小店感觉到一切的付出都是那么的值得，感谢亲的支持，相信小店会做的更好，因为有亲。也希望亲时刻记得有小店这样一位朋友在期待亲的再次光临！
                                    </if>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.sit li').click(function(){
            var i=$(this).index();
            $('.sit li').removeClass('active1').eq(i).addClass('active1');
            $('.change div').hide().eq(i).show();
        })
    })
    $(function () {
        $('.sdetail').click(function () {
            var gid=$('#gid').val();
            $.post("{:U('shower')}",'gid='+gid,function (res) {
                var str='';
                for(var i in res){
                    str+="买家评论:";
                    str+="<li style='float: left;width: 1000px'><li>"+res[i].commentcontent+"</li><li style='width: 200px;float: right;'> 会员:"+res[i].username+"</li></li>";
                    str+="<p>"+res[i].addtime+"</p><br>";
                    str+="卖家回复:<li style='color:#AF874D'>";
                    if(res[i].isreply== 1){
                        str+= ""+res[i].replycontent+"<br><br><hr style='color: #c5d9e8;width: 82%'><br>";
                    }else{
                        str+="亲的好评对小店来说是多么重要,它是对小店服务的肯定,更是对小店工作的默默支持,它激发了小店追求更高标准的潜力,让小店感觉到一切的付出都是<br>那么的值得,感谢亲的支持,相信小店会做的更好,因为有亲.也希望亲时刻记得有小店这样一位朋友在期待亲的再次光临!<br><br><hr style='color: #c5d9e8;width: 82%'></li><br>";
                    }
                }
                $('.jiesou').html(str);
            },'json')
        })
    })
</script>

