<nav style="background-color: transparent">
<div class="nav-wrapper">
    <ul class="right hide-on-med-and-up">
        <li><a href="#!" class="dropdown-button" data-beloworigin="true" data-activates="nav-dropdown">菜单</a></li>
    </ul>
    <ul id="nav-dropdown" class="dropdown-content">
        <li><a href="/">聚焦</a></li>
        <li><a href="/good">集市</a></li>
        <li class="divider"></li>
        <li>@include("layout.search")</li>
        @if(Session::has('user_id'))
        <li><a href="/user/{{Session::get('user_id')}}">{{Session::get('nickname')}}@if(Session::get('nickname')=="") {{ Session::get('username')}}@endif</a></li>
        <li><a href="/message">消息</a></li>
        <li><a href="/user/get_favlist">收藏夹</a></li>
        <li><a href="/good/add" class="btn">出售</a></li>
        @else
        <li><a href="/register" class="btn">注册</a></li>
        <li><a href="/login" class="btn">登录</a></li>
        @endif
    </ul>
    <div class="row">
    <div class="s12 offset-s0 m8 offset-m2 col">
    <ul class="left hide-on-small-only">
        <li id="nav-focus"><a href="/">聚焦</a></li>
        <li id="nav-market"><a href="/good">集市</a></li>
    </ul>
    <ul class="right hide-on-small-only">
        <li>@include("layout.search")</li>
        @if(Session::has('user_id'))
        <li><a href="/user/{{Session::get('user_id')}}">{{Session::get('nickname')}}@if(Session::get('nickname')=="") {{Session::get('username')}} @endif</a></li>
        <li id="nav-message"><a href="/message">消息</a></li>
        <li id="nav-favlist"><a href="/user/get_favlist">收藏夹</a></li>
        <li><a href="/good/add" class="btn">出售</a></li>
        @else
        <li><a href="/register" class="btn">注册</a></li>
        <li><a href="/login" class="btn">登录</a></li>
        @endif
    </ul>
    </div>
    </div>
    <div class="top-bar-back">
        <div class="top-bar-bg"></div>
        <div class="top-bar-filter"></div>
    </div>
</div>
</nav>
<div class="row">
<div class="m8 offset-m2 s12 offset-s0 col">
<div class="page-content">
