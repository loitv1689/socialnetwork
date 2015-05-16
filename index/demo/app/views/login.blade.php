<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="author" content="GallerySoft.info" />
    <script type="text/javascript" src="bootstrap-3.3.4-dist/js/jquery/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="{{Asset('bootstrap-3.3.4-dist/js/jquery/jquery.validate.js')}}"></script>

    {{ HTML::style('bootstrap-3.3.4-dist/css/bootstrap.min.css'); }}
    {{ HTML::style('bootstrap-3.3.4-dist/css/bootstrap-theme.min.css');}}
    {{ HTML::style('font-awesome-4.3.0/css/font-awesome.min.css'); }}
    <title>Login</title>
    <style>
        *{
            margin: auto;
            padding: 0;
            font-family: arial;
        }
        div.background{
            width: 100%;
            height: 100%;
            background-image: url('images/background1.jpg');
            background-size: 100%;
            position: fixed;
            top: 0px;
            left: 0px;
        }
        div.main{
            width: 1100px;
            height: 500px;
            color: #000000;
            border-radius: 10px;
            margin-top: 70px;
            padding-top: 30px;
            text-align: center;
        }
        div.main h2.header{
            color: #272727;
        }
        div.main p{
            font-size: 18px;
            margin-top: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #E7E0E0;
        }
        form{
            padding: 20px 40px;
            text-align: left;
            float: left;
            list-style-type: none;
        }
        input{
            font-size: 15px;
            padding: 20px;
            width: 400px;
            height: 0px;
            margin: 10px 0;
            display:block;
            color:#4D4949;
            border:1px solid #EBEBEB;
            border-radius: 5px;
            outline: none;
        }
        button{
            padding:10px 20px;
            border-radius:0.3em;
            color:#4D4949;
            background:#F3F3F3;
            border:1px solid #EBEBEB;
            font-weight:bold;
            font-size:15px;
            outline:none;
            margin-top:15px;
            cursor: pointer;
        }
        button:hover {
            background:#2E2D2D;
            color:#fff;
        }
    </style>
</head>

<body>
<!-- {{ HTML::script('bootstrap-3.3.4-dist/jquery/jquery-1.11.2.min.js') }} -->
    {{ HTML::script('bootstrap-3.3.4-dist/js/bootstrap.min.js') }}
    <div class="background">
        <div class="main">
            <h2>
                Login or Create a Free Account
            </h2>
            <p>
                Participants to communicate, make friends and share information
            </p>
            <form method="post" action=" {{Asset("login")}}" class="login">
                <h4>Login:</h4>
                <input type="text" name="email" placeholder="Your email"/>
                <input type="password" name="password" placeholder="Password" />
                <button class="btn btn-primary">Login</button>
                <div class="modal-header" style="margin-top : 15px; font-size: 20px; color: #b71f1f">{{$noti}}</div>
            </form>
            <form method="post" action="{{ Asset("register")}}" class="register" id="register">
                <h4>Register:</h4>
                <input type="text" name="username" id="username" placeholder="Username"/>
                <input type="email" name="email" id="email" placeholder="Email" />
                <input type="password" name="password" id="password" placeholder="Password" />
                <button class="btn btn-primary">Creat account</button>

            </form>


            <script type="text/javascript">
                $("#register").validate({
                    rules:{
                        username: {
                            required : true,
                            minlength : 3
                        },
                        email:{
                            required: true,
                            email : true
                        },
                        password:{
                            required: true,
                            minlength : 6
                        }

                    },
                    messages:{
                        username:{
                            required:"Vui lòng nhập username",
                            minlength:"Username ít nhất 3 ký tự"
                        },
                        email:{
                            required:"Hãy nhập email",
                            email:"Email nhập không đúng"
                        },
                        password:{
                            required:"Hãy nhập mật khẩu",
                            minlength:"Mật khẩu ít nhất 6 ký tự"
                        }

                    }
                })
</script>
</div>
</div>
<!-- 
<div class="modal fade name" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm"><div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Chỉnh sửa họ tên</h4>
        </div>
        <div class="modal-body">
            <form class="form-inline" method="post" action = {{Asset('save_user_name')}}>
                <div class="form-group">
                    <input type="text" class="form-control" name="name-txt" id="name-txt" placeholder="">
                </div>
                <div class="form-group">
                    <input id="name-btn" name="name-btn" type="submit" class="btn btn-primary" value="Sửa">
                </div>
            </form>
        </div>
    </div></div>
</div> -->
</body>
</html>