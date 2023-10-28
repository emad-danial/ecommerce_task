
<html>
<head>
    <style>
    .social-menu ul{
        /*position: absolute;*/
        /*top: 50%;*/
        /*left: 50%;*/
        /*padding: 0;*/
        /*margin: 0;*/
        /*transform: translate(-50%, -50%);*/
        display: flex;
    }

    .social-menu ul li{
        list-style: none;
        margin: auto;
    }

    .social-menu ul li .fab{
        font-size: 30px;
        line-height: 60px;
        transition: .3s;
        color: #000;
    }

    .social-menu ul li .fab:hover{
        color: #fff;
    }

    .social-menu ul li a{
        position: relative;
        display: block;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: #fff;
        text-align: center;
        transition: .6s;
        box-shadow: 0 5px 4px rgba(0,0,0,.5);
    }

    .social-menu ul li a:hover{
        transform: translate(0, -10%);
    }

    .social-menu ul li:nth-child(1) a:hover{
        background-color: rgba(0, 0, 0, 0.829);
    }
    .social-menu ul li:nth-child(2) a:hover{
        background-color: #E4405F;
    }
    .social-menu ul li:nth-child(3) a:hover{
        background-color: #0077b5;
    }
    .social-menu ul li:nth-child(4) a:hover{
        background-color: #000;
    }
    </style>
</head>
<body>
<div class="user-form-logo">
    <a href="/"><img src="web/assets/img/logo.svg" alt="logo"   width="200" height="150" style="width: 200px;height: 150px" /></a>
</div>

<br>
<br>
<p style='text-align: center;color:rgb(0, 148, 167);'>Your New Password : <br>{{$data['password']}}</p>


<p style='text-align: center;font-size:10px;color:rgb(0, 148, 167);'>This message is from a notification-only address. Please do not reply to this email</p>

<p style='color:rgb(0, 148, 167);' >Can we help?</p>


<p style='color:rgb(0, 148, 167);' >If you encounter an issue, please contact</p>

    <p><a style='color:rgb(0, 148, 167);  text-decoration: none;' href = 'mailto: emaddanialrefaat@gmail.com'> <span style="font-weight: bolder;"> Email:</span> emaddanialrefaat@gmail.com</a></p>
    <a style='color:rgb(0, 148, 167);  text-decoration: none;' href = 'https://wa.me/1113267477'> <span style="font-weight: bolder;"> WhatsApp:</span> +201113267477</a>
<div class="social-menu">
    <ul>
        <li><a href="https://www.facebook.com//" target="blank"><img style="
    width: 50%;
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    margin: auto;
    right: 0;
" src="{{asset('images/facebook.png')}}"></a></li>
    </ul>
</div>
</body>
</html>
