
<style type="text/css">
    .pagination{
        float: right;
        letter-spacing: 3px;
        font-size: 12px;
        text-align: center;
    }
    .pagination a{
        border-radius: 50px;
        margin: 2px;
        width: 50px;
        height: 20px;
        line-height: 20px;
        border: 1px solid #ccc;
        display: inline-block;
        text-align: center;
        background-color:orangered ;
        padding: 5px;
        font-weight: bolder;
    }
    .pagination a:hover{
        background-color: yellowgreen;
        color: black;
        font-weight: bolder;
    }
    .current{
        border-radius: 50px;
        width: 50px;
        height: 20px;
        border: 1px solid #ccc;
        background-color: yellowgreen;
        line-height: 23px;
        display: inline-block;
        padding: 5px;
        text-align: center;}
    .bs{
        width: 60px;
        float: left;
        text-align: center;
        margin: 0 10px;
    }
    .bs a{
        display: block;
        text-align: center;
        padding: 8px;
        color: #FFFFFF;
        background: #FF6060;
        width: 50px;
        height: 20px;

    }
    .hy{
        width: 60px;
        float: left;
        text-align: center;
        margin: 0 10px;
    }
    .hy a{ display: block;
        text-align: center;
        padding: 8px;
        width: 50px;
        height: 20px;
    }
</style>
<script type="text/javascript">
    $(function(){
        var i=$('#brandstyle input:hidden').val();
        var b=$('#brandstyle #'+i).attr('id');
        $('#'+b).css('background-color','#FF6060');
    })
</script>
<!--产品列表样式-->
<div class="Inside_pages clearfix">
    <!--筛选样式-->
    <div id="Filter_style">
        <!--条件筛选样式-->
        <div class="Filter">
            <div class="Filter_list clearfix" id="brandstyle">
                <div class="Filter_title"><span>品牌：</span></div>
                <div class="Filter_Entire"><a id="0" href="<?=\yii\helpers\Url::to(['product/index'])?>" class="Complete">全部</a></div>
                <div class="p_f_name infonav_hidden" style="height: 85px;">
                    <input type="hidden" value="<?=\yii\helpers\Html::encode($bid)?>">
                    <p>
                        <?php foreach($brand as $k=>$v): ?>
                            <a id="<?=\yii\helpers\Html::encode($v['id'])?>" href="<?=\yii\helpers\Url::to(['product/index','bid'=>\yii\helpers\Html::encode($v['id'])])?>"><?=\yii\helpers\Html::encode($v['bname'])?></a>
                        <?php endforeach;?>
                    </p>
                </div>
                <p class="infonav_more"><a class="more" onclick="infonav_more_down(0);return false;" href="javascript:">更多<em class="pullup"></em></a></p>
            </div>
            <div class="Filter_list clearfix">
                <div class="Filter_title"><span>价格：</span></div>
                <div class="<?=\yii\helpers\Html::encode($min)==0?'bs':'hy';?>"><a href="<?=\yii\helpers\Url::to(['product/index'])?>">全部</a></div>
                <div class="<?=\yii\helpers\Html::encode($min)==1?'bs':'hy';?>"><a href="<?=\yii\helpers\Url::to(['product/index','minprice'=>1,'maxprice'=>50])?>">1-50</a></div>
                <div class="<?=\yii\helpers\Html::encode($min)==50?'bs':'hy';?>"><a href="<?=\yii\helpers\Url::to(['product/index','minprice'=>50,'maxprice'=>150])?>">50-150</a></div>
                <div class="<?=\yii\helpers\Html::encode($min)==150?'bs':'hy';?>"> <a href="<?=\yii\helpers\Url::to(['product/index','minprice'=>150,'maxprice'=>500])?>">150-500</a></div>
                <div class="<?=\yii\helpers\Html::encode($min)==500?'bs':'hy';?>"><a href="<?=\yii\helpers\Url::to(['product/index','minprice'=>500,'maxprice'=>1000])?>">500-1000</a></div>
                <div class="<?=\yii\helpers\Html::encode($min)==1000?'bs':'hy';?>"><a href="<?=\yii\helpers\Url::to(['product/index','minprice'=>1000,'maxprice'=>100000000])?>">1000以上</a></div>
            </div>
        </div>

    <!--样式-->
    <div  class="scrollsidebar side_green clearfix" id="scrollsidebar">
        <div class="show_btn" id="rightArrow"><span></span></div>
        <!--左侧样式-->
        <div class="page_left_style side_content"  >
            <!--浏览记录-->
            <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
            <div class=" side_list">
                <div class="Record">
                    <div class="title_name">浏览记录</div>
                    <ul>
                        <volist name="historyInfo" id="historyList" key="k">
                            <if condition="$k elt 6">
                                <if condition="$historyList['id'] gt 0">
                                    <li>
                                        <a href="{:U('Detail/detail',array('gid'=>$historyList['id']))}">
                                            <p><img src="__PUBLIC__/Admin/Uploads/goods/{$historyList['pic']}" data-bd-imgshare-binded="1"></p>
                                            <p class="p_name">{$historyList['goodsname']}</p>
                                        </a>
                                        <p><b class="p_Price"><i>￥</i>{$historyList['price']}</b></p>
                                    </li>
                                </if>
                            </if>
                        </volist>
                    </ul>
                </div>
                <!--销售排行-->
                <div class="pro_ranking">
                    <div class="title_name"><em></em>销量排行</div>
                    <div class="ranking_list">
                        <ul id="tabRank">
                            <?php foreach($sales as $k=>$v): ?>
                            <li class="t_p on">
                                <em class="icon_ranking"><?=$k+1;?></em>
                                <dt><h3><a href="<?=\yii\helpers\Url::to(['goods/index','gid'=>\yii\helpers\Html::encode($v['id'])])?>"><?=\yii\helpers\Html::encode($v['goodsname'])?></a></h3></dt>
                                <dd class="clearfix">
                                    <a href="<?=\yii\helpers\Url::to(['goods/index','gid'=>\yii\helpers\Html::encode($v['id'])])?>"><img src="<?=\yii\helpers\Url::to('@web/uploads/goods/thumb100/100_').\yii\helpers\Html::encode($v['pic']);?>" width="90" height="90" /></a>
                                    <span class="Price">￥<?=\yii\helpers\Html::encode($v['price'])?></span>
                                    <span class="Price" style="font-size: 12px;margin: 10px"> 销量:<?=\yii\helpers\Html::encode($v['salenum'])?></span>
                                </dd>
                            </li>
                          <?php endforeach;?>
                        </ul>
                    </div>
                </div>
                <script type="text/javascript">
                    jQuery("#tabRank li").hover(function(){ jQuery(this).addClass("on").siblings().removeClass("on")},function(){ });
                    jQuery("#tabRank").slide({ titCell:"dt h3",autoPlay:false,effect:"left",delayTime:300 });
                </script>
            </div>
        </div>
        <script type="text/javascript">
            $(function() {
                $("#scrollsidebar").fix({
                    float : 'left',
                    //minStatue : true,
                    skin : 'green',
                    durationTime : 600
                });
            });
        </script>
        <!--列表样式属性-->
        <div class="page_right_style">
            <div id="Sorted" >
                <div class="Sorted">
                    <div class="Sorted_style">
                        <a id="a0" class="<?=\yii\helpers\Html::encode($order)==0?'on':''?>" href="<?=\yii\helpers\Url::to(['product/index','order'=>0])?>" class="on">综合<i class="iconfont icon-fold"></i></a>
                        <a id="a1" class="<?=\yii\helpers\Html::encode($order)==1?'on':''?>" href="<?=\yii\helpers\Url::to(['product/index','order'=>1])?>">销量<i class="iconfont icon-fold"></i></a>
                        <a id="a2" class="<?=\yii\helpers\Html::encode($order)==2?'on':''?>" href="<?=\yii\helpers\Url::to(['product/index','order'=>2])?>">价格<i class="iconfont icon-fold"></i></a>
                        <a id="a3" class="<?=\yii\helpers\Html::encode($order)==3?'on':''?>" href="<?=\yii\helpers\Url::to(['product/index','order'=>3])?>">新品<i class="iconfont icon-fold"></i></a>
                    </div>
                    <!--产品搜索-->
                    <!--<div class="products_search">
                        <input name="" type="text" class="search_text" value="请输入你要搜索的产品" onfocus="this.value=''" onblur="if(!value){value=defaultValue;}"><input name="" type="submit" value="" class="search_btn">
                    </div>-->
                    <!--页数-->

                </div>
            </div>
            <!--产品列表样式-->
            <div class="p_list  clearfix">
                <ul>
                    <?php foreach($goodsList as $v): ?>
                        <li class="gl-item">
                            <em class="icon_special tejia"></em>
                            <div class="Borders">
                                <div class="img"><a href="<?=\yii\helpers\Url::to(['goods/index','gid'=>\yii\helpers\Html::encode($v['id'])])?>"><img src="<?=\yii\helpers\Url::to('@web/uploads/goods/').\yii\helpers\Html::encode($v['pic']);?>" style="width:220px;height:220px"></a></div>
                                <div class="Price"><b>¥<?=\yii\helpers\Html::encode($v['price'])?></b><span style="text-decoration: line-through">[¥<?=\yii\helpers\Html::encode($v['marketprice'])?>]</span></div>
                                <div class="name"><a href="<?=\yii\helpers\Url::to(['goods/index','gid'=>\yii\helpers\Html::encode($v['id'])])?>"><?=mb_substr(\yii\helpers\Html::encode($v['goodsname']),0,15,'utf-8')?></a></div>
                                <div class="Review">已有<span style="color: #f43838"><?=\yii\helpers\Html::encode($v['salenum']?$v['salenum']:0)?></span>人购买</div>
                            </div>
                        </li>
                    <?php endforeach;?>
                </ul>
                <div class="pagination">
                    <?=\yii\widgets\LinkPager::widget(['pagination'=>$pages])?>
                </div>
            </div>
        </div>
    </div>
</div>
    <?=\yii\helpers\Html::jsFile('@web/js/lrtk.js')?>
<script type="text/javascript" charset="UTF-8">
    <!--
    //点击效果start
    function infonav_more_down(index)
    {
        var inHeight = ($("div[class='p_f_name infonav_hidden']").eq(index).find('p').length)*30;//先设置了P的高度，然后计算所有P的高度
        if(inHeight > 60){
            $("div[class='p_f_name infonav_hidden']").eq(index).animate({height:inHeight});
            $(".infonav_more").eq(index).replaceWith('<p class="infonav_more"><a class="more"  onclick="infonav_more_up('+index+');return false;" href="javascript:">收起<em class="pulldown"></em></a></p>');
        }else{
            return false;
        }
    }
    function infonav_more_up(index)
    {
        var infonav_height = 85;
        $("div[class='p_f_name infonav_hidden']").eq(index).animate({height:infonav_height});
        $(".infonav_more").eq(index).replaceWith('<p class="infonav_more"> <a class="more" onclick="infonav_more_down('+index+');return false;" href="javascript:">更多<em class="pullup"></em></a></p>');
    }

    function onclick(event) {
        info_more_down();
        return false;
    }
    //点击效果end
    //-->
    <!--实现手风琴下拉效果-->
    $(function(){
        $(".nav").accordion({
            //accordion: true,
            speed: 500,
            closedSign: '+',
            openedSign: '-'
        });
    });

    $(function() {
        $("#scrollsidebar").fix({
            float : 'left',
            //minStatue : true,
            skin : 'green',
            durationTime : 600
        });
    });
</script>
<script type="text/javascript">
    $(function(){
        var i=$('.brandslist input:hidden').val();
        var b=$('.brandslist #'+i).attr('id');
        $('#'+b).css('color','red');
    })
</script>

