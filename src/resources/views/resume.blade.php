<html>

<head>

</head>

<body>
    {{-- <td>{{$data->id}}</td> --}}
    <table>
        <tr>
            <td>Name: </td>
            <td>{{ $data['name'] }}</td>
        </tr>
        <tr>
            <td>Surname: </td>
            <td>{{ $data['surname'] }}</td>
        </tr>
        <tr>
            <td>Email: </td>
            <td>{{ $data['email'] }}</>
        </tr>
    </table>

</body>

</html>
