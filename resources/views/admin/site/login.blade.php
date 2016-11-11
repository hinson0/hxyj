<!doctype html>
<html lang="cn">

<head>
    <meta charset="UTF-8"/>
    <title>后台管理</title>
    <link rel="shortcut icon" href="/image/admin/14.ico" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="/css/admin/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/admin/index.css"/>
    <script type="text/javascript" src="/js/admin/jquery-3.1.0.js"></script>

    <style type="text/css">
        html, body {
            height: 100%;
        }

        .box {
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#6699FF', endColorstr='#6699FF'); /*  IE */
            background-image: linear-gradient(bottom, #6699FF 0%, #6699FF 100%);
            background-image: -o-linear-gradient(bottom, #6699FF 0%, #6699FF 100%);
            background-image: -moz-linear-gradient(bottom, #6699FF 0%, #6699FF 100%);
            background-image: -webkit-linear-gradient(bottom, #6699FF 0%, #6699FF 100%);
            background-image: -ms-linear-gradient(bottom, #6699FF 0%, #6699FF 100%);

            margin: 0 auto;
            position: relative;
            width: 100%;
            height: 100%;
        }

        .login-box {
            width: 100%;
            max-width: 500px;
            height: 400px;
            position: absolute;
            top: 50%;
            margin-top: -200px;

        }

        @media screen and (min-width: 500px) {
            .login-box {
                left: 50%;
                margin-left: -250px;
            }
        }

        .form {
            width: 100%;
            max-width: 500px;
            height: 275px;
            margin: 25px auto 0px auto;
            padding-top: 25px;
        }

        .login-content {
            height: 300px;
            width: 100%;
            max-width: 500px;
            background-color: rgba(255, 250, 2550, .6);
            float: left;
        }

        .input-group {
            margin: 0px 0px 30px 0px !important;
        }

        .form-control,
        .input-group {
            height: 40px;
        }

        .form-group {
            margin-bottom: 0px !important;
        }

        .login-title {
            padding: 20px 10px;
            background-color: rgba(0, 0, 0, .6);
        }

        .login-title h1 {
            margin-top: 10px !important;
        }

        .login-title small {
            color: #fff;
        }

        .link p {
            line-height: 20px;
            margin-top: 30px;
        }

        .btn-sm {
            padding: 8px 24px !important;
            font-size: 16px !important;
        }
    </style>


</head>
<body>

<div class="box">
    <div class="login-box">
        <div class="login-title text-center">
            <h1>
                <small>登录</small>
            </h1>
        </div>
        <div class="login-content ">
            <div class="form">
                <form action="#" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-xs-12  ">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" id="tel" name="username" class="form-control" placeholder="手机号码">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12  ">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                <input type="password" id="password" name="password" class="form-control"
                                       placeholder="密码">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-4 col-xs-offset-4 ">
                            <button type="button" id="sub" class="btn btn-sm btn-info"><span
                                        class="glyphicon glyphicon-off"></span> 登录
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6 link">
                            <p class="text-center remove-margin">
                                <small>忘记密码？</small>
                                <a href="javascript:void(0)">
                                    <small>找回</small>
                                </a>
                            </p>
                        </div>
                        <div class="col-xs-6 link">
                            <p class="text-center remove-margin">
                                <small>还没注册?</small>
                                <a href="javascript:void(0)">
                                    <small>注册</small>
                                </a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</body>
<script type="text/javascript" src="/js/admin/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#sub").click(function () {
            if ($("#tel").val() == "") {
                alert("请输入手机号码");
            }
            else if ($("#password").val() == "") {
                alert("请输入密码");
            }
            else {
                var JSon = {
                    tel: $("#tel").val(),
                    password: $("#password").val(),
                    _token: $("input[name='_token']").val()
                }
                $.ajax({
                    url: '/admin/doLogin',
                    type: 'post',
                    data: JSon,
                    datatype: 'json',
                    error:function (XMLHttpRequest, textStatus, errorThrown) {
                        // 通常 textStatus 和 errorThrown 之中
                        // 只有一个会包含信息
                        this; // 调用本次AJAX请求时传递的options参数
                        console.log(XMLHttpRequest);
                        console.log(textStatus);
                        console.log(errorThrown);
                    },
                    statusCode:{403:function(){
                        console.log('data');
                    }},
                    success: function (data,textStatus) {
                        if(data.msg=="用户不存在"){
                            alert("用户不存在,请核实后登录");
                            console.log(textStatus);
                        }
                        else{
//                            window.location.href="/admin";
                            console.log('ddd');
                        }
                    }
                })
            }
        })
    })


</script>
</html>

