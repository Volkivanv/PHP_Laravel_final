<html lang="en">

<head>
    <title>Upload-Form</title>
</head>

<body>
    <form name="file-upload" enctype="multipart/form-data" method="post" action="{{Route('uploadFile') }}">
        <input type="file" name="upload-photo" value="File to upload">
        <input type="submit" value="Send">
        @csrf
    </form>
</body>

</html>
