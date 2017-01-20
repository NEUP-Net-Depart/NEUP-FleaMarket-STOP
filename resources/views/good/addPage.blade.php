@include('includes.head')
<title>添加出售 - 先锋市场</title>
<style>
    label {
        text-align: right;
        font-size: medium;
        color: #ffffff;
        min-width: 80px;
        max-width: 100px;
        float: right;
    }
</style>
</head>
<body>
@include('layout.header')
<div class="page-content">
    <div class="row">
    <div class="m8 offset-m2 s10 offset-s1 col card-panel">
        <br/>
        <form action="/good/add" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="small-2 columns">
                    <label class="right inline">商品名称:</label>
                </div>
                <div class="small-10 columns">
                    <input type="text" name="good_name" placeholder="商品名称">
                </div>
            </div>
            <div class="row">
                <div class="small-2 columns">
                    <label class="right inline">商品分类:</label>
                </div>
                <div class="small-10 columns">
                    <select name="cat_id" class="browser-default">
                        @foreach($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="small-2 columns">
                    <label class="right inline">商品描述:</label>
                </div>
                <div class="small-10 columns">
                    <textarea name="description" placeholder="商品描述（此处应支持HTML）"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="small-2 columns">
                    <label class="right inline">最低价格:</label>
                </div>
                <div class="small-10 columns">
                    <input type="number" name="pricemin" placeholder="最低价格">
                </div>
            </div>
            <div class="row">
                <div class="small-2 columns">
                    <label class="right inline">最高价格:</label>
                </div>
                <div class="small-10 columns">
                    <input type="number" name="pricemax" placeholder="最高价格">
                </div>
            </div>
            <div class="row">
                <div class="small-2 columns">
                    <label class="right inline">商品类型:</label>
                </div>
                <div class="small-10 columns">
                    <select name="type" class="browser-default">
                        <option value="0">普通商品</option>
                        <option value="1">拍卖商品</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="small-2 columns">
                    <label class="right inline">商品数量:</label>
                </div>
                <div class="small-10 columns">
                    <input type="number" name="counts" placeholder="库存">
                </div>
            </div>
            <div class="row">
                <div class="small-2 columns">
                    <label class="right inline">商品标签:</label>
                </div>
                <div class="small-10 columns">
                    <input type="text" name="good_tag" placeholder="TAG">
                </div>
            </div>
            <div class="row">
                <div class="small-4 columns">
                    <label for="goodTitleUpload" class="btn">上传封面</label>
                </div>
                <div id="preview" class="small-8 columns"></div>
                <div style="display: none">
                    <input type="file" id="goodTitleUpload" class="show-for-sr" name="goodTitlePic"
                           onchange="preview(this)"/>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="small-2 small-offset-3 columns">
                    <input type="submit" class="btn" value="添加" style="margin: 0;"/>
                </div>
            </div>
            {!! csrf_field() !!}
        </form>
    </div>
    @if(count($errors) > 0)
        @foreach($errors as $error)
            {{$error}}
        @endforeach
    @endif
    </div>
</div>
<script type="text/javascript">
    function preview(file)
    {
        var prevDiv = document.getElementById('preview');
        if (file.files && file.files[0])
        {
            var reader = new FileReader();
            reader.onload = function(evt){
                prevDiv.innerHTML = '<img src="' + evt.target.result + '" />';
            }
            reader.readAsDataURL(file.files[0]);
        }
        else
        {
            prevDiv.innerHTML = '<div class="img" style="filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale,src=\'' + file.value + '\'"></div>';
        }
    }
</script>
@include('layout.footer')
@include('includes.foot')
