@include('includes.head')
<title>先锋市场</title>
</head>
<body>
@include('layout.header')
        性别:{{$user->gender}}
        <br/>
        真实姓名:{{$user->realname}}
        <br/>
        手机号:{{$user->tel_num}}
        <br/>
        地址:{{$user->address}}
        <br/>
        <a class="btn" href='/user/{{$user->id}}/edit'>编辑</a>
        <br/>
        <br/>
        <a class="btn" href='/logout'>登出</a>
        <br/>
        <br/>
        <a class="btn" href='/good/check'>Check</a>
@include('layout.footer')
@include('includes.foot')
