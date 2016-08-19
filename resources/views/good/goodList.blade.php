@include('includes.head')
    <title>先锋市场</title>
</head>
<body>
@include('layout.header')
<script language="javascript" type="text/javascript">
    function test(Names) {
        if(Names=="mune_x0")
        {
            var Nnews = document.querySelectorAll(".cat1")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = '';
            }
            var Nnews = document.querySelectorAll(".cat2")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = '';
            }
            var Nnews = document.querySelectorAll(".cat3")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = '';
            }
            var Nnews = document.querySelectorAll(".cat4")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = '';
            }
        }else if(Names=="mune_x1")
        {
            var Nnews = document.querySelectorAll(".cat1")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = '';
            }
            var Nnews = document.querySelectorAll(".cat2")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = 'none';
            }
            var Nnews = document.querySelectorAll(".cat3")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = 'none';
            }
            var Nnews = document.querySelectorAll(".cat4")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = 'none';
            }
        }else if(Names=="mune_x2")
        {
            var Nnews = document.querySelectorAll(".cat1")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = 'none';
            }
            var Nnews = document.querySelectorAll(".cat2")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = '';
            }
            var Nnews = document.querySelectorAll(".cat3")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = 'none';
            }
            var Nnews = document.querySelectorAll(".cat4")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = 'none';
            }
        }else if(Names=="mune_x3")
        {
            var Nnews = document.querySelectorAll(".cat1")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = 'none';
            }
            var Nnews = document.querySelectorAll(".cat2")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = 'none';
            }
            var Nnews = document.querySelectorAll(".cat3")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = '';
            }
            var Nnews = document.querySelectorAll(".cat4")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = 'none';
            }
        } else if(Names=="mune_x4")
        {
            var Nnews = document.querySelectorAll(".cat1")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = 'none';
            }
            var Nnews = document.querySelectorAll(".cat2")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = 'none';
            }
            var Nnews = document.querySelectorAll(".cat3")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = 'none';
            }
            var Nnews = document.querySelectorAll(".cat4")
            for (var i = 0, len = Nnews.length; i < len; i++) {
                var Nnew = Nnews.item(i);
                Nnew.style.display = '';
            }
        }
    }
</script>
<div class="page-content">
{{--<ul>--}}
{{--@foreach($cats as $cat)--}}
    {{--<li>{{ $cat->cat_name  }}</li>--}}
{{--@endforeach--}}
{{--</ul>--}}
    <table border="0" align="center" cellpadding="0" cellspacing="0" style="width: 50%;margin-bottom: 0">
        <tr>
            <td>
                <select size="1" name="D1" onChange="javascript:test('mune_x'+this.value)">
                    <option value="0" selected="selected">全部显示</option>
                    <option value="1" >我是分类1</option>
                    <option value="2">我是分类2</option>
                    <option value="3">我是分类4</option>
                    <option value="4">我是滑稽</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                @foreach($goods as $good)
                    <div class="cat{{ $good->cat_id }}"><a href="/good/{{ $good->id }}">{{ $good->good_name }}</a></div>
                @endforeach
            </td>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <td align="right">
                            @if($user_id != NULL)
                                <a href='/good/add'>添加商品</a>
                            @endif
                        </td>
                        <td>
                            @if($user_id != NULL)
                                <a href='/good/mygood'>我的商品</a>
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
@include('layout.footer')
@include('includes.foot')
