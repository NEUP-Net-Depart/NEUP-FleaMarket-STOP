@include('includes.head')
    <title>先锋市场</title>
</head>
<body>
@include('layout.header')
<script>
$(document).ready(function() {
    $('.slider').slider();
});
</script>
<div class="row">
    <div class="s12 m8 col">
        <div class="row">
            <div class="s12 col">
            <div class="slider">
                <ul class="slides">
                    @foreach($hotgoods as $hotgood)
                    <li>
                    <a href="/good/{{ $hotgood->id }}"><img src="/good/{{ sha1($hotgood->id) }}/titlepic"/></a>
                    <div class="caption right-align">
                        <h3>{{ $hotgood->good_name }}</h3>
                        <h5 class="light grey-text text-lighten-3">{{ $hotgood->description }}</h5>
                    </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            </div>
        </div>
    <div class="row">
    <h4>新品</h4>
    @foreach($newgoods as $newgood)
        <div class="s4 m2 col">
            <div>
                <a href="/good/{{ $newgood->id }}"><img src="/good/{{ sha1($newgood->id) }}/titlepic" class="s12 col"/></a>
            </div>
            {{ $newgood->good_name }}
        </div>
        <div class="s1 m1 col"></div>
    @endforeach
    </div>
    </div>
    <div class="s12 m4 col">
        <div class="s12 offset-s0 m10 offset-m2 col" style="background-color:#66ccff">
            公告的位置
        </div>
    </div>
</div>
@include('layout.footer')
@include('includes.foot')
