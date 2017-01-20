@include('includes.head')
    <title>先锋市场</title>
</head>
<body>
@include('layout.header')
    <div class="row">
    <div class="s10 offset-s1 hide-on-med-and-up col">
        <script>
            $(document).ready(function() {
                $('select').material_select();
            });
        </script>
        <div class="input-field">
        <select name="D1" onChange="javascript:goodList_changeCat(this.value)">
            <option value="0" @if($cat_id == 0) selected @endif>*</option>
            @foreach($cats as $cat)
                <option value="{{$cat->id}}" @if($cat_id == $cat->id) selected @endif>{{$cat->cat_name}}</option>
            @endforeach
        </select>
        <label>分类</label>
        </div>
    </div>
    <div class="hide-on-small-only m2 col">
        <div class="collection">
            <a href="/good" class="collection-item @if($cat_id == 0) active @endif">*</a>
            @foreach($cats as $cat)
                <a href="/good?cat_id={{$cat->id}}" class="collection-item @if($cat_id == $cat->id) active @endif">{{$cat->cat_name}}</a>
            @endforeach
        </div>
    </div>
    <div class="s10 offset-s1 m9 offset-m1 col">
        <table class="striped">
            <tbody valign="middle">
            @foreach($goods as $good)
                <tr class="cat{{ $good->cat_id }}">
                    <div class="row valign-wrapper">
                    <td class="s3 col"><a href="/good/{{$good->id}}"><img src="/good/{{ sha1($good->id) }}/titlepic" class="s12 col"/></a></td>
                    <td class="s3 col"><a href="/good/{{$good->id}}">{{ $good->good_name }}</a></td>
                    <td class="s2 col"><span style="color: #FF0033"><b><div>￥{{ $good->pricemin }}@if($good->type == 0)</div><div>-</div><div>￥{{ $good->pricemax }}@else（拍卖中）@endif</div></b></span></td>
                    <td class="s2 col">@if($good->counts > 0)<span style="color: #3333FF">库存：{{ $good->counts }}@else<span style="color: #FF5555">无库存QAQ @endif</span></td>
                    <td class="s2 col"><div>月销：{{ $good->sold_month }}单</div><div>总计：{{ $good->sold_total }}单</div></td>
                    </div>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>
<script>
$('#nav-market').addClass('active');
</script>
@include('layout.footer')
@include('includes.foot')
