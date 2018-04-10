<style>
    table, tr, td, th {
        border: 1px solid;
        border-collapse: collapse;
    }
</style>

<div class="topbar">
    <a href="{{route('posts_create')}}">Create</a>
</div>

<table>
    <tr>
        <th>id</th>
        <th>post_title</th>
        <th>post_content</th>
        <th>user_id</th>
        <th>Controls</th>
    </tr>
    @foreach ($posts as $post)
        <tr>
            <th>{{$post->id}}</th>
            <th>{{$post->title}}</th>
            <th>{{$post->content}}</th>
            <th>{{$post->user_id}}</th>
            <th>
                <a href="/posts/edit/{{$post->id}}">Edit</a>
                <a href="/posts/destroy/{{$post->id}}">Delete</a>
            </th>
        </tr>
    @endforeach

</table>

@if ($posts->count() == 0)
    No posts
@endif