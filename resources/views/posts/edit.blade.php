
@if($errors)
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="/posts/update/{{$post->id}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="text" name="title" value="{{$post->title}}"> <br>
    <input type="text" name="content" value="{{$post->content}}"> <br>
    <input type="text" name="user_id" value="{{$post->user_id}}"> <br>
    <input type="file" name="image"> <br>
    <input type="submit">
</form>

{{Form::open(['url' => '/posts/update/'.$post->id, 'method' => 'post'])}}

{{Form::token()}}
{{Form::text('title', $post->title)}}
{{Form::text('content', $post->content)}}
{{Form::text('user_id', $post->user_id)}}
{{Form::submit()}}