@foreach($goods as $good)
    {{$good->description}}<br/>
    @if($user_id==$good->user_id)
        <a href='/good/{{$good->id}}/edit'>Edit</a><br/>
        <form action='/good/{{$good->id}}/delete' method='POST'>
            {!! csrf_field() !!}
            {{ method_field('DELETE') }}
            <input type="submit" value="Delete"/>
        </form>
    @endif
@endforeach
<a href='/good'>GoodList</a>