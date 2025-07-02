<html>
    <body>
        <form name="worker" method="post" action="{{ Route('store_employee') }}">
            @csrf
            <label for="first_name">First name: </label><input type="text" name="first_name" value="@if ($employee) {{$employee->first_name}} @endif"><br>
            <label for="last_name">Last name: </label><input type="text" name="last_name" value="@if ($employee) {{$employee->last_name}} @endif"><br>
            <label for="department">Select Department</label>
            {{-- <select name="department"> --}}
                <input type="checkbox" name="department[]" value="finance" @if ($employee && in_array('finance', unserialize($employee->department))) checked @endif">Finance</input>
                <input type="checkbox" name="department[]" value="it" @if ($employee && in_array('it',unserialize( $employee->department))) checked @endif">IT</input>
                <input type="checkbox" name="department[]" value="internal service" @if ($employee && in_array('internal service',unserialize( $employee->department))) checked @endif">Internal service</input>
            {{-- </select><br> --}}
            <input type="submit" value="Send">

        </form>
    </body>
</html>
