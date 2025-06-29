<html>
    <body>
        <form name="test_csrf" method="post" action="">
            @csrf
            <input type="text" name="test_name">
            <input type="submit" value="send">
        </form>
    </body>
</html>
