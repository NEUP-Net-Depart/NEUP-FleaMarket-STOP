@include('includes.head')
    <title>登录 - 先锋市场</title>
</head>
<body>
@include('layout.header')
    <div class="row valign-wrapper loginpage">
        <div class="card-panel hide-on-small-only m5 offset-m1 col logincard">
            <div class="row">
            <br/>
            <img src="/img/loginpic.jpg" class="s0 m12 col"></img>
            </div>
        </div>
        <div class="card-panel s10 offset-s1 m4 offset-m1 col logincard">
            <br/>
            <div class="row">
    		@if (count($errors) > 0)
        		<label>
		            <span class="red-text">{!! $errors->first() !!}</span>
		        </label>
    		@endif
    		<form action="/login" method="POST" class="center-align">
                <div class="input-field">
    		        <input type="text" name="username">
                    <label>用户名</label>
                </div>
                <div class="input-field">
    		        <input type="password" id="password" name="password">
                    <label>密码</label>
                </div>
		        {!! csrf_field() !!}
                <input type="submit" class="btn" value="登录">
		    </form>
            </div>
		</div>
	</div>
<script>
$('.page-content').css('height', '100%');
</script>
@include('layout.footer')
@include('includes.foot')
