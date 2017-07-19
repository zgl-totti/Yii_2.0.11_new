<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>小米登陆页面</title>
    <style type="text/css">
        input{ border: 0; }
        body{ background-color: #f5f5f5; }
        .zong{ width:450px; height: 400px; background-color: #fff; margin: 0 auto; position: relative;}
        .neirong{ width: 358px; height: 420px; margin:50px auto;}
        .logo{ text-align: center;}
        .neirong h3{ text-align: center; }
        .name{ width: 100%; height:40px; border: 1px solid #959595; color: #959595; font-size: 12px; margin-top: 10px;}
        .submit{cursor:pointer; width: 100%; height: 40px; background-color: #ef5b00; text-align: center; line-height: 40px; font-size: 16px; color: #fff; margin-top: 30px; }
        .zhuce a{color:grey;text-decoration: none;font-size: 12px;padding-right: 10px}
        .di a{font-size: 12px;color: grey;text-decoration: none;}
        .di p{font-size: 10px;color: grey;float: left;padding: 10px}
    </style>
    <script type="text/javascript" src="__PUBLIC__/Home/js/jquery.min.1.8.2.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Home/js/jquery.validate.js"></script>
    <script type="text/javascript" src="__PUBLIC__/Home/js/layer/layer.js"></script>
</head>
<body>
<div class="zong">
    <div class="neirong">
        <form action="" method="post" id="myform1">
            <div class="logo" ><img src="__PUBLIC__/Home/images/tu.gif" style="height: 90px;margin-top: 20px"></div>
            <h3>用户登陆</h3>
            <input  class="name" type="text" name="username" placeholder="  邮箱 / 手机号 / 账号">
            <input  class="name" type="password" name="password" placeholder="   密码">
            <input class="submit" type="button" name="" value="立即提交">
            <div class="wx"></div>
        </form>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    $(function(){
        $(".submit").click(function(){
            $.post("{:U('Member/login')}",$("#myform1").serialize(),function(res){
                if(res.status==1){
                    layer.msg(res.info,{icon:1,time:1000},function(){
//                        parent.layer.closeAll();
                        parent.location.reload();
                       // parent.location.href="{:U('Detail/detail')}";
                    })
                }else{
                    layer.msg(res.info,{icon:2,time:1000})
                }
            })
        })
    })
</script>