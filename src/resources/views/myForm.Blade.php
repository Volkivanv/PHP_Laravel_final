<html>
    <body>
        <form  action="{{Route('post_form')}}" method="post" name="myname">
            <label for="my_name">Name</label><input type="text" name="my_name"><br>
            <label for="password">Password</label><input type="password" name="password"><br>
            {{-- <label for="Age">Age</label> --}}
            <input type="hidden" name="age" value="36"><br>

            <label>Notebook</label><input type="checkbox" name="category[]" value="notebooks">
            <label>Display</label><input type="checkbox" name="category[]" value="displays">
            <label>KeyBoard</label><input type="checkbox" name="category[]" value="keyboards">
            <input type="submit" value="Отправить">

            @csrf
        </form>
    </body>
</html>
