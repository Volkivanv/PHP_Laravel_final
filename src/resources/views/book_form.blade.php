<html>

<head>
<style>
        .aalert-danger {color : red}
        </style>
</head>

<body>
    <div class="add-books__form-wrapper">
        <form name="add-new-book" id="add-new-book" method="post" action="{{ Route('post_book_form') }}">
            @csrf
            <div class="form-section">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>
            <div class="form-section">
                <label for="author">Author</label>
                <input type="text" id="author" name="author" class="form-control" required>
            </div>
            <div class="form-section">
                <label for="genre">Choose Genre:</label>
                <select name="genre" id="genre">
                    <option value="fantasy">Fantasy</option>
                    <option value="sci-fi">Sci-Fi</option>
                    <option value="mystery">Mystery</option>
                    <option value="drama">Drama</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>

        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif

    </div>
</body>

</html>
