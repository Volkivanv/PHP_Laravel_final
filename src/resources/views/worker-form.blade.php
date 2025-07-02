<html>
    <head>
        <style>
            .title{
                background:yellow;
            }
        </style>
    </head>

<body>
    <form name="employee" method="post" action="{{ Route('save_worker') }}">
        @csrf
        <label for="name">Name: </label><input type="text" name="name"
            value="@if ($worker) {{ $worker->name }} @endif"><br>
        <label for="surname">Surname: </label><input type="text" name="surname"
            value="@if ($worker) {{ $worker->surname }} @endif"><br>
        <label for="email">email: </label><input type="email" name="email"
            value="@if ($worker) {{ $worker->email }} @endif"><br>

        <input type="submit" value="Send">

    </form>


    @if ($workers)
    <h2>List of workers</h2>
        <table border="3px">
            <tr class="title"><td>id</td><td>Name</td><td>Surname</td><td>Email</td></tr>
            @foreach ($workers as $key => $one)
                <tr>
                    <td>{{$one->id}}</td><td>{{$one->name}}</td><td>{{$one->surname}}</td><td>{{$one->email}}</td>
                </tr>
            @endforeach
        </table>
    @endif
</body>

</html>
