<form action="/insert" method="post" class="demo">{{ csrf_field() }}
<input type="text" name="username">
<input type="password" name="password">
<input type="submit" name="submit">
</form>