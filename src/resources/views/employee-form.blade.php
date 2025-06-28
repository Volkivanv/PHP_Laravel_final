<html lang="en">

<head>
    <title>Upload-Form</title>
</head>

<body>
    <form name="employee-form" id="employee-form" method="post" action="{{ url('store-form') }}">

        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control" required="true">
        </div>
        <div class="form-group">
            <label for="email">Description</label>
            <input type="text" id="email" name="email" class="form-control" required="true">
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input type="text" id="rating" name="rating" class="form-control" required="true">
        </div>
        <div class="form-group">
            <label for="workData">workData</label>
            <textarea name="workData" class="form-control" required="true"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить POST</button>


    </form>
</body>

{{-- <form name="employee-form" id="employee-form" method="post" action="{{url('user/' . 'id')}}">

    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <label for="id">Id</label>
        <input type="text" id="id" name="id" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="email">Description</label>
        <input type="text" id="email" name="email" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="rating">Rating</label>
        <input type="text" id="rating" name="rating" class="form-control" required="true">
    </div>
    <div class="form-group">
        <label for="workData">workData</label>
        <textarea name="workData" class="form-control" required="true"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Отправить PUT</button>


</form> --}}
</body>

</html>
