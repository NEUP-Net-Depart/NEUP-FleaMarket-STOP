@include('includes.head')
    <title>登录 - 先锋市场</title>
</head>
<body>
@include('layout.header')
    <div class="row align-middle">
        <div class="hide-for-small-only medium-7 columns thumbnail">
            <img src="/img/loginpic.jpg"/>
        </div>
        <div class="small-10 offset-1 medium-4 medium-offset-1 columns card">
            <div class="card-section">
    		@if (count($errors) > 0)
        		<label>
		            <span class="form-error is-visible">{!! $errors->first() !!}</span>
		        </label>
    		@endif
    		<form action="/sso" method="POST" data-abide novalidate>
		        <label>学号<input type="text" name="stuid"></label>
		        {!! csrf_field() !!}
                <input type="submit" class="hollow button" value="登录">
		    </form>
            </div>
		</div>
	</div>
@include('layout.footer')
@include('includes.foot')
