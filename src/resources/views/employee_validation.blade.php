<html>
    <head>
        <style>
            .invalid {color : red}
        </style>
    </head>
    <body>
        <form name="validation_test" method="post" action="{{ Route('post_validation_form')}}">
            @csrf
            <label for="" @error('fullname') class="invalid" @enderror>Name @error('fullname') <b>{{ $message }}</b> @enderror </label><input type="text" name="fullname"><br>
            <label for="" @error('password') class="invalid" @enderror>Password @error('password') <b>{{ $message }}</b> @enderror </label><input type="password" name="password"><br>
            <label for="">Confirm Password</label><input type="password" name="confirm_password"><br>
            <input type="submit" value="create user">

        </form>
        @foreach ($errors->all() as $error)
            {{$error}} <br>
        @endforeach
    </body>
</html>
