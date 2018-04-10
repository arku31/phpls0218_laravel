<form action="/posts/store" method="POST">
    {{csrf_field()}}
    <input type="text" name="title"> <br>
    <input type="text" name="content"> <br>
    <input type="submit">
</form>