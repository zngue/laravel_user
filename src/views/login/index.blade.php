<!DOCTYPE html>
<html lang="zh_cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>登录</title>
    <link rel="stylesheet" href="{{asset('static/plugins/layui/css/layui.css')}}" media="all" />
    <link rel="stylesheet" href="{{'/static/admin/css/login.css'}}" />
    <link rel="stylesheet" href="{{asset('static/common/css/font.css')}}" />
</head>
<body class="beg-login-bg">
<div class="container login">
    <div class="content">
        <div id="large-header" class="large-header">
            <canvas id="demo-canvas"></canvas>
            <div class="main-title">
                <div class="beg-login-box">
                    <header>
                        <h1>{{config('zngue.user.sys_name')}}后台登录</h1>
                    </header>
                    <div class="beg-login-main">
                        <form class="layui-form layui-form-pane" method="post">
                            <div class="layui-form-item">
                                <label class="beg-login-icon fs1">
                                    <span class="icon icon-user"></span>
                                </label>
                                <input type="text" name="username" lay-verify="required" placeholder="这里输入登录名" value="admin" class="layui-input">
                            </div>
                            <div class="layui-form-item">
                                <label class="beg-login-icon fs1">
                                    <i class="icon icon-key"></i>
                                </label>
                                <input type="password" name="password" lay-verify="required" placeholder="这里输入密码" value="admin123" class="layui-input">
                            </div>
                            @if( config('zng_user.code') =='open' )
                            <div class="layui-form-item">
                                <input type="text" name="vercode" id="captcha" lay-verify="required" placeholder="验证码" autocomplete="off" class="layui-input">
                                <div class="captcha">
                                    <img src="{:url('verify')}" alt="captcha" onclick="this.src='{:url("verify")}?'+'id='+Math.random()"/>
                                </div>
                            </div>
                            @endif
                            <div class="layui-form-item">
                                <button type="submit" class="layui-btn btn-submit btn-blog" lay-submit lay-filter="login">登录</button>
                            </div>
                        </form>
                    </div>
                    <footer>
                        <p>{{config('zngue.user.sys_name')}} © {{config('zngue.user.url_domain_root')}}</p>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('static/admin/js/rAF.js')}}"></script>
<script src="{{asset('static/admin/js/login.js')}}"></script>
<script type="text/javascript" src="{{asset('static/plugins/layui/layui.js')}}"></script>
<script>
    layui.use('form',function(){
        var form = layui.form,$ = layui.jquery;
        //监听提交
        form.on('submit(login)', function(data){
            loading =layer.load(1, {shade: [0.1,'#fff'] });//0.1透明度的白色背景
            $.post("{{route('login.doLogin')}}",data.field,function(res){
                layer.close(loading);
                if(res.statusCode == 200){
                    layer.msg(res.message, {icon: 1, time: 2500}, function(){
                        location.href = "{{route('index')}}";
                    });
                }else{
                    $('#captcha').val('');
                    layer.msg(res.message, {icon: 2, anim: 6, time: 1000});
                    //$('.captcha img').attr('src','{:url("verify")}?id='+Math.random());
                }
            });
            return false;
        });
    });
</script>
</body>
</html>
