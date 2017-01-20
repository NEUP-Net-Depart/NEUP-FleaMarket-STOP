@include('includes.head')
    <title>注册 - 先锋市场</title>
</head>
<body>
@include('layout.header')
    <div class="row">
        <div class="card-panel m10 offset-m1 s10 offset-s1 col">
            <div class="row"><div class="m4 offset-m4 s12 offset-s0 col">
            <br/>
            @if (count($errors) > 0)
                <label>
                    <span class="red-text">{!! $errors->first() !!}</span>
                </label>
            @endif
            <form action="/register" method="POST" class="center-align">
                <div class="input-field">
                    <input type="text" name="username" length="64">
                    <label>用户名</label>
                </div>
                <div class="input-field">
                    <input type="password" id="password" name="password" length="128">
                    <label>密码</label>
                </div>
                <div class="input-field">
                    <input type="password" name="password_confirmation">
                    <label>确认密码</label>
                </div>
                <div class="input-field">
                    <input type="text" name="email">
                    <label>邮箱</label>
                </div>
                <div class="input-field">
                    <input type="text" name="nickname" length="128">
                    <label>昵称</label>
                </div>
                {!! csrf_field() !!}
                <input type="submit" class="btn" value="注册">
            </form>
            </div></div>
        </div>
    </div>
@include('layout.footer')
@include('includes.foot')
